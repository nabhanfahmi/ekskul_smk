<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\HasilKonseling;

class RiwayatKonselingController extends Controller
{
    public function index()
    {
        $data = HasilKonseling::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->paginate(10);

        return view(
            'siswa.riwayat.index',
            compact('data')
        );
    }

    public function show($id)
    {
        $hasil = HasilKonseling::where(
            'user_id',
            auth()->id()
        )
        ->findOrFail($id);

        $rekomendasi = json_decode(
            $hasil->hasil,
            true
        );

        if (!is_array($rekomendasi)) {
            $rekomendasi = [];
        }

        return view(
            'siswa.riwayat.show',
            compact('hasil', 'rekomendasi')
        );
    }

    public function destroy($id)
    {
        $hasil = HasilKonseling::where(
            'user_id',
            auth()->id()
        )
        ->findOrFail($id);

        $hasil->delete();

        return back()->with(
            'success',
            'Riwayat berhasil dihapus'
        );
    }
}