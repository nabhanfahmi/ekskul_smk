<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilKonseling;
use App\Models\Ekstrakurikuler;
use App\Models\Pertanyaan;

class KonselingController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::with('ekstrakurikuler')->get();

        return view('siswa.konseling.index', compact('pertanyaan'));
    }

    public function store(Request $request)
    {
        $jawaban = $request->jawaban ?? [];

        if (empty($jawaban)) {
            return back()->with(
                'error',
                'Pilih minimal satu jawaban.'
            );
        }

        $ekstrakurikuler = Ekstrakurikuler::all();

        $skor = [];

        foreach ($ekstrakurikuler as $ekstra) {

            $totalPertanyaan = Pertanyaan::where(
                'ekstrakurikuler_id',
                $ekstra->id
            )->count();

            $jawabanCocok = 0;

            foreach ($jawaban as $id) {

                if ($id == $ekstra->id) {
                    $jawabanCocok++;
                }
            }

            $persen = $totalPertanyaan > 0
                ? round(($jawabanCocok / $totalPertanyaan) * 100)
                : 0;

            $skor[$ekstra->id] = [
                'skor'   => $jawabanCocok,
                'persen' => $persen
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | SORTING
        |--------------------------------------------------------------------------
        */

        uasort($skor, function ($a, $b) {
            return $b['persen'] <=> $a['persen'];
        });

        $topSkor = array_slice($skor, 0, 1, true);

        $skorLainnya = array_slice($skor, 1, 2, true);

        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI UTAMA
        |--------------------------------------------------------------------------
        */

        $rekomendasi = [];

        foreach ($topSkor as $id => $data) {

            if ($data['persen'] <= 0) {
                continue;
            }

            $ekstra = Ekstrakurikuler::find($id);

            if ($ekstra) {

                $rekomendasi[] = [
                    'id' => $ekstra->id,
                    'nama' => $ekstra->nama,
                    'deskripsi' => $ekstra->deskripsi,
                    'deskripsi_rekomendasi' => $ekstra->deskripsi_rekomendasi,
                    'gambar' => $ekstra->gambar,
                    'skor' => $data['skor'],
                    'persen' => $data['persen']
                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI ALTERNATIF
        |--------------------------------------------------------------------------
        */

        $rekomendasiLainnya = [];

        foreach ($skorLainnya as $id => $data) {

            if ($data['persen'] <= 0) {
                continue;
            }

            $ekstra = Ekstrakurikuler::find($id);

            if ($ekstra) {

                $rekomendasiLainnya[] = [
                    'id' => $ekstra->id,
                    'nama' => $ekstra->nama,
                    'deskripsi' => $ekstra->deskripsi,
                    'deskripsi_rekomendasi' => $ekstra->deskripsi_rekomendasi,
                    'gambar' => $ekstra->gambar,
                    'skor' => $data['skor'],
                    'persen' => $data['persen']
                ];
            }
        }

        $rekomendasiLainnya = collect($rekomendasiLainnya)
    ->take(2)
    ->values()
    ->toArray();

    if (!empty($rekomendasi) && !empty($rekomendasiLainnya)) {

    $persenUtamaAsli = $rekomendasi[0]['persen'];
    $persenAlternatifAsli = $rekomendasiLainnya[0]['persen'];

    $total = $persenUtamaAsli + $persenAlternatifAsli;

    if ($total > 0) {

        $persenUtamaChart =
            round(($persenUtamaAsli / $total) * 100);

        $persenAlternatifChart =
            100 - $persenUtamaChart;

        $rekomendasi[0]['persen_chart'] =
            $persenUtamaChart;

        $rekomendasiLainnya[0]['persen_chart'] =
            $persenAlternatifChart;
    }
}

        /*
        |--------------------------------------------------------------------------
        | SIMPAN SEMUA REKOMENDASI
        |--------------------------------------------------------------------------
        */

        $semuaRekomendasi = array_merge(
            $rekomendasi,
            $rekomendasiLainnya
        );

        $hasil = collect($rekomendasi)
            ->pluck('nama')
            ->join(', ');

        HasilKonseling::create([
            'user_id' => auth()->id(),

            'minat' => $hasil,

            'ekstrakurikuler_id' =>
                $rekomendasi[0]['id'] ?? null,

            'hasil' => json_encode([
    'utama' => $rekomendasi,
    'alternatif' => $rekomendasiLainnya,
])
        ]);

        /*
        |--------------------------------------------------------------------------
        | CHART (TOP 3)
        |--------------------------------------------------------------------------
        */

        $chartData = [];

if (!empty($rekomendasi)) {

    $chartData[$rekomendasi[0]['nama']] =
        $rekomendasi[0]['persen_chart']
        ?? $rekomendasi[0]['persen'];

    if (!empty($rekomendasiLainnya)) {

        $chartData[$rekomendasiLainnya[0]['nama']] =
            $rekomendasiLainnya[0]['persen_chart']
            ?? $rekomendasiLainnya[0]['persen'];
    }
}

        return view('siswa.konseling.hasil', [

            'hasil' => $hasil,

            'rekomendasi' => $rekomendasi,

            'rekomendasiLainnya' => $rekomendasiLainnya,

            'skor' => $chartData

        ]);
    }
}