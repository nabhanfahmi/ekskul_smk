<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HasilKonseling;

class HasilKonselingController extends Controller
{
    public function downloadPdf()
    {
        $hasil = HasilKonseling::where(
            'user_id',
            auth()->id()
        )->latest()->first();

        if (!$hasil) {

            return back()->with(
                'error',
                'Hasil konseling belum tersedia'
            );

        }

        $rekomendasi = json_decode(
            $hasil->hasil,
            true
        );

        if (!is_array($rekomendasi)) {

            $rekomendasi = [];

        }

        $skor = [];

        foreach ($rekomendasi as $item) {

            $skor[$item['nama']] =
                $item['skor'];

        }

        $pdf = Pdf::loadView(
            'siswa.hasil_pdf',
            compact(
                'rekomendasi',
                'skor'
            )
        );

        return $pdf->download(
            'hasil-konseling.pdf'
        );
    }

    public function downloadPdfDetail($id)
{
    $hasil = HasilKonseling::where('user_id', auth()->id())
                ->findOrFail($id);

    $rekomendasi = json_decode($hasil->hasil, true);

    if (!is_array($rekomendasi)) {
        $rekomendasi = [];
    }

    $pdf = Pdf::loadView(
        'siswa.hasil_pdf',
        compact('hasil', 'rekomendasi')
    );

    return $pdf->download(
        'hasil-konseling-'.$hasil->id.'.pdf'
    );
}

}