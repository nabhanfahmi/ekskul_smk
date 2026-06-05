<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\GaleriEkstrakurikuler;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = Ekstrakurikuler::latest()->get();

        return view('admin.ekstrakurikuler.index', compact('data'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'nullable',
            'jadwal' => 'nullable',
            'pembina' => 'nullable',
            'lokasi' => 'nullable',

            'gambar' => 'nullable|image|max:2048',

            'gambar_galeri.*' => 'nullable|image|max:2048',
            'deskripsi_galeri.*' => 'nullable',

            'pertanyaan.*' => 'nullable',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstra = Ekstrakurikuler::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'deskripsi_rekomendasi' => $request->deskripsi_rekomendasi,
            'jadwal' => $request->jadwal,
            'pembina' => $request->pembina,
            'lokasi' => $request->lokasi,
            'gambar' => $gambar,
        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN GALERI
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar_galeri')) {

            foreach ($request->file('gambar_galeri') as $index => $file) {

                if ($file) {

                    $path = $file->store('galeri_ekstrakurikuler', 'public');

                    GaleriEkstrakurikuler::create([
                        'ekstrakurikuler_id' => $ekstra->id,
                        'gambar_galeri' => $path,
                        'deskripsi_galeri' => $request->deskripsi_galeri[$index] ?? null,
                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PERTANYAAN
        |--------------------------------------------------------------------------
        */

        if ($request->pertanyaan) {

            foreach ($request->pertanyaan as $item) {

                if (!empty($item)) {

                    Pertanyaan::create([
                        'ekstrakurikuler_id' => $ekstra->id,
                        'pertanyaan' => $item,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $ekstra = Ekstrakurikuler::with([
            'galeri',
            'pertanyaan'
        ])->findOrFail($id);

        return view('admin.ekstrakurikuler.show', compact('ekstra'));
    }

    public function edit($id)
    {
        $ekstra = Ekstrakurikuler::with([
            'galeri',
            'pertanyaan'
        ])->findOrFail($id);

        return view('admin.ekstrakurikuler.edit', compact('ekstra'));
    }

    public function update(Request $request, $id)
{
    $ekstra = Ekstrakurikuler::with([
        'galeri',
        'pertanyaan'
    ])->findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'nullable',
        'deskripsi_rekomendasi' => 'nullable|string',
        'jadwal' => 'nullable',
        'pembina' => 'nullable',
        'lokasi' => 'nullable',

        'gambar' => 'nullable|image|max:2048',

        'gambar_galeri.*' => 'nullable|image|max:2048',
        'deskripsi_galeri.*' => 'nullable',

        'pertanyaan_baru.*' => 'nullable',
        'pertanyaan_existing.*' => 'nullable',
    ]);

    $gambar = $ekstra->gambar;

    /*
    |--------------------------------------------------------------------------
    | UPDATE GAMBAR UTAMA
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('gambar')) {

        if (
            $ekstra->gambar &&
            Storage::disk('public')->exists($ekstra->gambar)
        ) {
            Storage::disk('public')->delete($ekstra->gambar);
        }

        $gambar = $request->file('gambar')
            ->store('ekstrakurikuler', 'public');
    }

    $ekstra->update([
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'deskripsi' => $request->deskripsi,
        'deskripsi_rekomendasi' => $request->deskripsi_rekomendasi,
        'jadwal' => $request->jadwal,
        'pembina' => $request->pembina,
        'lokasi' => $request->lokasi,
        'gambar' => $gambar,
    ]);

    /*
    |--------------------------------------------------------------------------
    | UPDATE DESKRIPSI GALERI LAMA
    |--------------------------------------------------------------------------
    */

    if ($request->deskripsi_galeri_existing) {

        foreach ($request->deskripsi_galeri_existing as $idGaleri => $deskripsi) {

            $galeri = GaleriEkstrakurikuler::find($idGaleri);

            if ($galeri) {

                $galeri->update([
                    'deskripsi_galeri' => $deskripsi
                ]);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | TAMBAH GALERI BARU
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('gambar_galeri')) {

        foreach ($request->file('gambar_galeri') as $index => $file) {

            if ($file) {

                $path = $file->store(
                    'galeri_ekstrakurikuler',
                    'public'
                );

                GaleriEkstrakurikuler::create([
                    'ekstrakurikuler_id' => $ekstra->id,
                    'gambar_galeri' => $path,
                    'deskripsi_galeri' =>
                        $request->deskripsi_galeri[$index] ?? null,
                ]);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PERTANYAAN LAMA
    |--------------------------------------------------------------------------
    */

    if ($request->pertanyaan_existing) {

        foreach ($request->pertanyaan_existing as $idPertanyaan => $isi) {

            $pertanyaan = Pertanyaan::find($idPertanyaan);

            if ($pertanyaan) {

                $pertanyaan->update([
                    'pertanyaan' => $isi
                ]);
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | TAMBAH PERTANYAAN BARU
    |--------------------------------------------------------------------------
    */

    if ($request->pertanyaan_baru) {

        foreach ($request->pertanyaan_baru as $item) {

            if (!empty($item)) {

                Pertanyaan::create([
                    'ekstrakurikuler_id' => $ekstra->id,
                    'pertanyaan' => $item,
                ]);
            }
        }
    }

    return redirect()
        ->route('admin.ekstrakurikuler.edit', $ekstra->id)
        ->with('success', 'Data berhasil diupdate');
}

public function hapusGaleri($id)
{
    $galeri = GaleriEkstrakurikuler::findOrFail($id);

    if (
        $galeri->gambar_galeri &&
        Storage::disk('public')->exists($galeri->gambar_galeri)
    ) {
        Storage::disk('public')->delete($galeri->gambar_galeri);
    }

    $galeri->delete();

    return back()->with('success', 'Galeri berhasil dihapus');
}

    public function destroy($id)
    {
        $ekstra = Ekstrakurikuler::with('galeri')->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR UTAMA
        |--------------------------------------------------------------------------
        */

        if ($ekstra->gambar && Storage::disk('public')->exists($ekstra->gambar)) {

            Storage::disk('public')->delete($ekstra->gambar);
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS FILE GALERI
        |--------------------------------------------------------------------------
        */

        foreach ($ekstra->galeri as $galeri) {

            if (
                $galeri->gambar_galeri &&
                Storage::disk('public')->exists($galeri->gambar_galeri)
            ) {
                Storage::disk('public')->delete($galeri->gambar_galeri);
            }
        }

        $ekstra->delete();

        return redirect()
            ->route('admin.ekstrakurikuler.index')
            ->with('success', 'Data berhasil dihapus');
    }

    /*
    |--------------------------------------------------------------------------
    | PUBLIC
    |--------------------------------------------------------------------------
    */

    public function publicIndex()
    {
        $data = Ekstrakurikuler::latest()->get();

        return view('ekstrakurikuler.index', compact('data'));
    }

    public function publicShow($id)
    {
        $ekstra = Ekstrakurikuler::with([
            'galeri',
            'pertanyaan'
        ])->findOrFail($id);

        return view('ekstrakurikuler.show', compact('ekstra'));
    }

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */

    public function siswa()
    {
        $data = Ekstrakurikuler::latest()->get();

        return view('siswa.ekstrakurikuler.index', compact('data'));
    }

    public function showSiswa($id)
    {
        $ekstra = Ekstrakurikuler::with([
            'galeri',
            'pertanyaan'
        ])->findOrFail($id);

        return view('siswa.ekstrakurikuler.show', compact('ekstra'));
    }
}