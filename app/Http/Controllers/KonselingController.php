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

    /*
    |--------------------------------------------------------------------------
    | AMBIL SEMUA EKSTRA
    |--------------------------------------------------------------------------
    */

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

        /*
        |--------------------------------------------------------------------------
        | HITUNG PERSENTASE
        |--------------------------------------------------------------------------
        */

        $persen = $totalPertanyaan > 0
            ? round(($jawabanCocok / $totalPertanyaan) * 100)
            : 0;

        $skor[$ekstra->id] = [

            'skor' => $jawabanCocok,

            'persen' => $persen
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | SORTING BERDASARKAN PERSENTASE
    |--------------------------------------------------------------------------
    */

    uasort($skor, function ($a, $b) {

        return $b['persen'] <=> $a['persen'];

    });

    $topSkor = array_slice($skor, 0, 3, true);

$rekomendasi = [];

foreach ($topSkor as $id => $data) {

    // Jangan tampilkan jika 0%
    if ($data['persen'] <= 0) {
        continue;
    }

    $ekstra = Ekstrakurikuler::find($id);

    if ($ekstra) {

        $rekomendasi[] = [

            'id' => $ekstra->id,

            'nama' => $ekstra->nama,

            'deskripsi' => $ekstra->deskripsi,

            'gambar' => $ekstra->gambar,

            'skor' => $data['skor'],

            'persen' => $data['persen']

        ];
    }
}

    /*
    |--------------------------------------------------------------------------
    | HASIL
    |--------------------------------------------------------------------------
    */

    $hasil = collect($rekomendasi)
        ->pluck('nama')
        ->join(', ');

    HasilKonseling::create([

        'user_id' => auth()->id(),

        'minat' => $hasil,

        'ekstrakurikuler_id' =>
            $rekomendasi[0]['id'] ?? null,

        'hasil' => json_encode($rekomendasi)

    ]);

    /*
    |--------------------------------------------------------------------------
    | CHART
    |--------------------------------------------------------------------------
    */

    $chartData = [];

    foreach ($rekomendasi as $item) {

        $chartData[$item['nama']] =
            $item['persen'];
    }

    return view('siswa.konseling.hasil', [

        'hasil' => $hasil,

        'rekomendasi' => $rekomendasi,

        'skor' => $chartData

    ]);
}
}