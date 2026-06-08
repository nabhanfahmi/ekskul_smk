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

        $data = json_decode(
            $hasil->hasil,
            true
        );

        if (!is_array($data)) {
            $data = [];
        }

        $rekomendasiUtama =
            $data['utama'][0] ?? null;

        $rekomendasiAlternatif =
            $data['alternatif'][0] ?? null;

        $skor = [];

        foreach ($data['utama'] ?? [] as $item) {

            if (isset($item['nama'], $item['skor'])) {

                $skor[$item['nama']] =
                    $item['skor'];
            }
        }

        foreach ($data['alternatif'] ?? [] as $item) {

            if (isset($item['nama'], $item['skor'])) {

                $skor[$item['nama']] =
                    $item['skor'];
            }
        }

        $pdf = Pdf::loadView(
            'siswa.hasil_pdf',
            compact(
                'rekomendasiUtama',
                'rekomendasiAlternatif',
                'skor'
            )
        );

        return $pdf->download(
            'hasil-konseling.pdf'
        );
    }

    public function downloadPdfDetail($id)
    {
        $hasil = HasilKonseling::where(
            'user_id',
            auth()->id()
        )->findOrFail($id);

        $data = json_decode(
            $hasil->hasil,
            true
        );

        if (!is_array($data)) {
            $data = [];
        }

        $rekomendasiUtama =
            $data['utama'][0] ?? null;

        $rekomendasiAlternatif =
            $data['alternatif'][0] ?? null;

        $skor = [];

        foreach ($data['utama'] ?? [] as $item) {

            if (isset($item['nama'], $item['skor'])) {

                $skor[$item['nama']] =
                    $item['skor'];
            }
        }

        foreach ($data['alternatif'] ?? [] as $item) {

            if (isset($item['nama'], $item['skor'])) {

                $skor[$item['nama']] =
                    $item['skor'];
            }
        }

        $pdf = Pdf::loadView(
            'siswa.hasil_pdf',
            compact(
                'hasil',
                'rekomendasiUtama',
                'rekomendasiAlternatif',
                'skor'
            )
        );

        return $pdf->download(
            'hasil-konseling-' . $hasil->id . '.pdf'
        );
    }
}