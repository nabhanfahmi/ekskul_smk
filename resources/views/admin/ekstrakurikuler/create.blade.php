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

    .form-control[type="file"]{
        padding: 12px;
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

    /* SELECT */

    select.form-control{
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background:
            rgba(255,255,255,.08)
            url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='white' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.5 5.5l6 6 6-6'/%3E%3C/svg%3E")
            no-repeat right 16px center;

        padding-right: 50px;
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
                    Tambah Ekstrakurikuler
                </h2>

                <p class="text-light opacity-75 mb-0">
                    Tambahkan data ekstrakurikuler baru
                </p>

            </div>

            <a href="{{ route('admin.ekstrakurikuler.index') }}"
               class="btn btn-outline-light rounded-pill px-4">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="alert alert-success rounded-4 border-0 mb-4">
                {{ session('success') }}
            </div>

        @endif

        <form
            action="{{ route('admin.ekstrakurikuler.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row">

                {{-- NAMA --}}
                <div class="col-md-6 mb-4">

                    <label>Nama Ekstrakurikuler</label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukkan nama ekstrakurikuler">

                    @error('nama')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- KATEGORI --}}
                <div class="col-md-6 mb-4">

                    <label>Kategori</label>

                    <select
                        name="kategori"
                        class="form-control @error('kategori') is-invalid @enderror">

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Olahraga"
                            {{ old('kategori') == 'Olahraga' ? 'selected' : '' }}>
                            Olahraga
                        </option>

                        <option value="Seni"
                            {{ old('kategori') == 'Seni' ? 'selected' : '' }}>
                            Seni
                        </option>

                        <option value="Akademik"
                            {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>
                            Akademik
                        </option>

                        <option value="Teknologi"
                            {{ old('kategori') == 'Teknologi' ? 'selected' : '' }}>
                            Teknologi
                        </option>

                        <option value="Keagamaan"
                            {{ old('kategori') == 'Keagamaan' ? 'selected' : '' }}>
                            Keagamaan
                        </option>

                        <option value="Organisasi"
                            {{ old('kategori') == 'Organisasi' ? 'selected' : '' }}>
                            Organisasi
                        </option>

                        <option value="Karakter"
                            {{ old('kategori') == 'Karakter' ? 'selected' : '' }}>
                            Karakter
                        </option>

                    </select>

                    @error('kategori')
                        <div class="error-text">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi') }}</textarea>

            </div>

            <div class="row">

                {{-- JADWAL --}}
                <div class="col-md-4 mb-4">

                    <label>Jadwal</label>

                    <input
                        type="text"
                        name="jadwal"
                        value="{{ old('jadwal') }}"
                        class="form-control"
                        placeholder="Senin - Jumat">

                </div>

                {{-- PEMBINA --}}
                <div class="col-md-4 mb-4">

                    <label>Pembina</label>

                    <input
                        type="text"
                        name="pembina"
                        value="{{ old('pembina') }}"
                        class="form-control"
                        placeholder="Nama pembina">

                </div>

                {{-- LOKASI --}}
                <div class="col-md-4 mb-4">

                    <label>Lokasi</label>

                    <input
                        type="text"
                        name="lokasi"
                        value="{{ old('lokasi') }}"
                        class="form-control"
                        placeholder="Lapangan / Aula">

                </div>

            </div>

            {{-- GAMBAR --}}
            <div class="mb-4">

                <label>Upload Gambar</label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control @error('gambar') is-invalid @enderror">

                @error('gambar')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror

            </div>

<!-- galeri -->
            <div class="mb-3">
    <label>Galeri</label>

    <div id="galeri-wrapper">

        <div class="border p-3 mb-3 rounded">

            <input type="file"
                   name="gambar_galeri[]"
                   class="form-control mb-2">

            <textarea name="deskripsi_galeri[]"
                      class="form-control"
                      placeholder="Deskripsi galeri"></textarea>

        </div>

    </div>

    <button type="button"
            class="btn btn-sm btn-primary"
            onclick="tambahGaleri()">
        Tambah Galeri
    </button>
</div>

            {{-- PERTANYAAN --}}
<div class="mb-4 mt-3">

    <label>Pertanyaan Minat & Bakat</label>

    <div id="wrapper-pertanyaan">

        <input
            type="text"
            name="pertanyaan[]"
            class="form-control mb-2"
            placeholder="Contoh: Apakah kamu suka olahraga tim?"
        >

    </div>

    <button type="button" id="addPertanyaan" class="btn btn-outline-light btn-sm mt-2">

        <i class="bi bi-plus-circle me-1"></i>
        Tambah Pertanyaan

    </button>

</div>

            {{-- BUTTON --}}
            <div class="d-flex gap-3 flex-wrap">

                <button type="submit" class="btn btn-modern">

                    <i class="bi bi-save-fill me-2"></i>
                    Simpan Data

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
            name="pertanyaan[]"
            class="form-control mb-2"
            placeholder="Tambah pertanyaan baru"
        >
    `;

    document
        .getElementById('wrapper-pertanyaan')
        .insertAdjacentHTML('beforeend', html);

});
</script>

<script>
function tambahGaleri()
{
    let html = `
        <div class="border p-3 mb-3 rounded">

            <input type="file"
                   name="gambar_galeri[]"
                   class="form-control mb-2">

            <textarea name="deskripsi_galeri[]"
                      class="form-control"
                      placeholder="Deskripsi galeri"></textarea>

        </div>
    `;

    document.getElementById('galeri-wrapper')
        .insertAdjacentHTML('beforeend', html);
}
</script>

@endsection