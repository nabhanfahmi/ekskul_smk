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
    $skor = [];

    foreach ($request->all() as $key => $value) {

        if (str_starts_with($key, 'jawaban_')) {

            if (!empty($value)) {

                $skor[$value] = ($skor[$value] ?? 0) + 1;
            }
        }
    }

    if (empty($skor)) {
        return back()->with('error', 'Pilih minimal satu jawaban YA.');
    }

    arsort($skor);

/*
|--------------------------------------------------------------------------
| AMBIL 3 SKOR TERATAS
|--------------------------------------------------------------------------
*/

    $topSkor = array_slice($skor, 0, 3, true);

    $rekomendasi = [];

    foreach ($topSkor as $id => $nilai) {

        $ekstra = Ekstrakurikuler::find($id);

        if ($ekstra) {
            $rekomendasi[] = [
                'id' => $ekstra->id,
                'nama' => $ekstra->nama,
                'deskripsi' => $ekstra->deskripsi,
                'gambar' => $ekstra->gambar,
                'skor' => $nilai
            ];
        }
    }

/*
|--------------------------------------------------------------------------
| HASIL UTAMA
|--------------------------------------------------------------------------
*/

    $hasil = collect($rekomendasi)
        ->pluck('nama')
        ->join(', ');

    HasilKonseling::create([
    'user_id' => auth()->id(),

    'minat' => $hasil,

    'ekstrakurikuler_id' => $rekomendasi[0]['id'] ?? null,

    // SIMPAN JSON REKOMENDASI
    'hasil' => json_encode($rekomendasi)
]);

            $chartData = [];

    foreach ($skor as $id => $total) {

        $nama = Ekstrakurikuler::find($id)?->nama;

        if ($nama) {
            $chartData[$nama] = $total;
        }
    }

            return view('siswa.konseling.hasil', [
        'hasil' => $hasil,
        'rekomendasi' => $rekomendasi,
        'skor' => $chartData
    ]);
}
}