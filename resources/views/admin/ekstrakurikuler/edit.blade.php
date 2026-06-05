@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    *{
        font-family: 'Poppins', sans-serif;
    }

    body{
        background:
            radial-gradient(circle at top left, rgba(59,130,246,.18), transparent 30%),
            radial-gradient(circle at bottom right, rgba(139,92,246,.18), transparent 30%),
            linear-gradient(135deg,#020617,#0f172a);
        min-height: 100vh;
    }

    .glass-card{
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 30px;
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,.25);
    }

    .form-control{
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.08);
        color: white;
        border-radius: 16px;
        padding: 14px;
    }

    .form-control:focus{
        background: rgba(255,255,255,.12);
        color: white;
        box-shadow: none;
        border-color: #3b82f6;
    }

    .form-control::placeholder{
        color: rgba(255,255,255,.5);
    }

    textarea.form-control{
        resize: none;
    }

    label{
        margin-bottom: 10px;
        font-weight: 500;
        color: rgba(255,255,255,.9);
    }

    .btn-modern{
        background: linear-gradient(135deg,#3b82f6,#6366f1);
        border: none;
        color: white;
        border-radius: 50px;
        padding: 14px 28px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-modern:hover{
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 10px 25px rgba(59,130,246,.35);
    }

    .page-title{
        font-size: 32px;
        font-weight: 700;
    }

    .error-text{
        color: #fca5a5;
        font-size: 14px;
        margin-top: 8px;
    }

    .preview-image{
        width: 220px;
        border-radius: 20px;
        border: 2px solid rgba(255,255,255,.1);
        box-shadow: 0 10px 25px rgba(0,0,0,.25);
    }

    select.form-control option{
        background: #0f172a;
        color: white;
    }

    .form-control{
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.08);
    color: white;
    border-radius: 16px;
    padding: 14px;
}

.form-control:focus{
    background: rgba(255,255,255,.12);
    color: white;
    box-shadow: none;
    border-color: #3b82f6;
}

.form-control::placeholder{
    color: rgba(255,255,255,.5);
}

</style>

<div class="container py-5">

    <div class="glass-card p-4 p-lg-5">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h2 class="page-title">
                    Edit Ekstrakurikuler
                </h2>

                <p class="text-light opacity-75 mb-0">
                    Update data ekstrakurikuler
                </p>

            </div>

            <a href="{{ route('admin.ekstrakurikuler.index') }}"
               class="btn btn-outline-light rounded-pill px-4">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

        @if(session('success'))

            <div class="alert alert-success rounded-4 border-0 mb-4">
                {{ session('success') }}
            </div>

        @endif

        <form
            action="{{ route('admin.ekstrakurikuler.update', $ekstra->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-4">

                    <label>Nama Ekstrakurikuler</label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $ekstra->nama) }}"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukkan nama ekstrakurikuler">

                    @error('nama')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-4">

                    <label>Kategori</label>

                    <select
                        name="kategori"
                        class="form-control">

                        <option value="">-- Pilih Kategori --</option>

                        <option value="Olahraga" {{ old('kategori', $ekstra->kategori) == 'Olahraga' ? 'selected' : '' }}>
                            Olahraga
                        </option>

                        <option value="Seni" {{ old('kategori', $ekstra->kategori) == 'Seni' ? 'selected' : '' }}>
                            Seni
                        </option>

                        <option value="Akademik" {{ old('kategori', $ekstra->kategori) == 'Akademik' ? 'selected' : '' }}>
                            Akademik
                        </option>

                        <option value="Teknologi" {{ old('kategori', $ekstra->kategori) == 'Teknologi' ? 'selected' : '' }}>
                            Teknologi
                        </option>

                        <option value="Keagamaan" {{ old('kategori', $ekstra->kategori) == 'Keagamaan' ? 'selected' : '' }}>
                            Keagamaan
                        </option>

                        <option value="Organisasi" {{ old('kategori', $ekstra->kategori) == 'Organisasi' ? 'selected' : '' }}>
                            Organisasi
                        </option>

                        <option value="Keterampilan" {{ old('kategori', $ekstra->kategori) == 'Keterampilan' ? 'selected' : '' }}>
                            Keterampilan
                        </option>

                        <option value="Karakter" {{ old('kategori', $ekstra->kategori) == 'Karakter' ? 'selected' : '' }}>
                            Karakter
                        </option>

                    </select>

                </div>

            </div>

            <div class="mb-4">

                <label>Deskripsi Ekstrakurikuler</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi', $ekstra->deskripsi) }}</textarea>

            </div>

            <div class="mb-4">

    <label>Deskripsi Hasil Rekomendasi</label>

    <textarea
        name="deskripsi_rekomendasi"
        rows="6"
        class="form-control"
        placeholder="Masukkan deskripsi yang akan tampil pada hasil rekomendasi siswa">{{ old('deskripsi_rekomendasi', $ekstra->deskripsi_rekomendasi) }}</textarea>

</div>

            <div class="row">

                <div class="col-md-4 mb-4">

                    <label>Jadwal</label>

                    <input
                        type="text"
                        name="jadwal"
                        value="{{ old('jadwal', $ekstra->jadwal) }}"
                        class="form-control">

                </div>

                <div class="col-md-4 mb-4">

                    <label>Pembina</label>

                    <input
                        type="text"
                        name="pembina"
                        value="{{ old('pembina', $ekstra->pembina) }}"
                        class="form-control">

                </div>

                <div class="col-md-4 mb-4">

                    <label>Lokasi</label>

                    <input
                        type="text"
                        name="lokasi"
                        value="{{ old('lokasi', $ekstra->lokasi) }}"
                        class="form-control">

                </div>

            </div>

            @if($ekstra->gambar)

            <div class="mb-4">

                <label>Gambar Saat Ini</label>

                <br>

                <img
                    src="{{ asset('storage/' . $ekstra->gambar) }}"
                    class="preview-image">

            </div>

            @endif

            <div class="mb-4">

                <label>Ganti Gambar</label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control">

            </div>

            {{-- GALERI --}}
            <div class="mb-4">

                <label>Galeri Saat Ini</label>

                <div class="row">

                    @forelse($ekstra->galeri as $item)

                        <div class="col-md-4 mb-4">

                            <div class="border rounded p-3 h-100 d-flex flex-column">

                                <img
                                    src="{{ asset('storage/' . $item->gambar_galeri) }}"
                                    class="img-fluid rounded mb-3"
                                    style="height:220px;width:100%;object-fit:cover;">

                                <textarea
                                    name="deskripsi_galeri_existing[{{ $item->id }}]"
                                    class="form-control mb-3"
                                    rows="4"
                                    placeholder="Deskripsi galeri">{{ old('deskripsi_galeri_existing.' . $item->id, $item->deskripsi_galeri) }}</textarea>

                                <button
                                    type="button"
                                    class="btn btn-danger rounded-pill w-100"
                                    onclick="hapusGaleri({{ $item->id }})">

                                    <i class="bi bi-trash-fill me-1"></i>
                                    Hapus Galeri

                                </button>

                            </div>

                        </div>

                    @empty

                        <div class="text-light opacity-75">
                            Belum ada galeri
                        </div>

                    @endforelse

                </div>

            </div>

            {{-- TAMBAH GALERI --}}
            <div class="mb-4">

                <label>Tambah Galeri Baru</label>

                <div id="galeri-wrapper">

                    <div class="border p-3 mb-3 rounded">

                        <input
                            type="file"
                            name="gambar_galeri[]"
                            class="form-control mb-2">

                        <textarea
                            name="deskripsi_galeri[]"
                            class="form-control"
                            placeholder="Deskripsi galeri"></textarea>

                    </div>

                </div>

                <button
                    type="button"
                    class="btn btn-outline-light btn-sm mt-2"
                    onclick="tambahGaleri()">

                    <i class="bi bi-plus-circle me-1"></i>
                    Tambah Galeri

                </button>

            </div>

            {{-- PERTANYAAN --}}
            <div class="mb-4 mt-3">

                <label>Isi Pernyataan</label>

                @forelse($ekstra->pertanyaan as $p)

                    <input
                        type="text"
                        name="pertanyaan_existing[{{ $p->id }}]"
                        value="{{ $p->pertanyaan }}"
                        class="form-control mb-2">

                @empty

                    <div class="text-light opacity-75">
                        Belum ada pernyataan
                    </div>

                @endforelse

            </div>

            <div class="mb-4">

                <label>Tambah Pernyataan Baru</label>

                <div id="wrapper-pertanyaan">

                    <input
                        type="text"
                        name="pertanyaan_baru[]"
                        class="form-control mb-2"
                        placeholder="Isi pernyataan baru di sini!">

                </div>

                <button
                    type="button"
                    id="addPertanyaan"
                    class="btn btn-outline-light btn-sm mt-2">

                    <i class="bi bi-plus-circle me-1"></i>
                    Tambah Pernyataan

                </button>

            </div>

            <div class="d-flex gap-3 flex-wrap">

                <button type="submit" class="btn btn-modern">

                    <i class="bi bi-check-circle-fill me-2"></i>
                    Update Data

                </button>

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
                   class="btn btn-outline-light rounded-pill px-4">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

document.getElementById('addPertanyaan').addEventListener('click', function () {

    let html = `
        <input
            type="text"
            name="pertanyaan_baru[]"
            class="form-control mb-2"
            placeholder="Tambah pertanyaan baru">
    `;

    document
        .getElementById('wrapper-pertanyaan')
        .insertAdjacentHTML('beforeend', html);

});

function tambahGaleri()
{
    let html = `
        <div class="border p-3 mb-3 rounded">

            <input
                type="file"
                name="gambar_galeri[]"
                class="form-control mb-2">

            <textarea
                name="deskripsi_galeri[]"
                class="form-control"
                placeholder="Deskripsi galeri"></textarea>

        </div>
    `;

    document
        .getElementById('galeri-wrapper')
        .insertAdjacentHTML('beforeend', html);
}

function hapusGaleri(id)
{
    if(confirm('Hapus galeri ini?'))
    {
        let form = document.createElement('form');

        form.method = 'POST';
        form.action = '/admin/galeri-ekstrakurikuler/' + id;

        form.innerHTML = `
            @csrf
            <input type="hidden" name="_method" value="DELETE">
        `;

        document.body.appendChild(form);

        form.submit();
    }
}

</script>

@endsection