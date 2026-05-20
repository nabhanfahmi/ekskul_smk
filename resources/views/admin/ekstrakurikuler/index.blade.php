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

    /* NAVBAR */

    .top-navbar{
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255,255,255,.08);
        padding: 18px 0;
        margin-bottom: 30px;
    }

    .navbar-brand-custom{
        color: white;
        font-size: 24px;
        font-weight: 700;
        text-decoration: none;
    }

    .navbar-brand-custom:hover{
        color: white;
    }

    .btn-dashboard{
        background: linear-gradient(135deg,#3b82f6,#6366f1);
        border: none;
        color: white;
        border-radius: 50px;
        padding: 12px 22px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s;
    }

    .btn-dashboard:hover{
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 10px 25px rgba(59,130,246,.35);
    }

    /* GLASS CARD */

    .glass-card{
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 30px;
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,.25);
    }

    .page-title{
        font-size: 34px;
        font-weight: 700;
        color: white;
    }

    .page-subtitle{
        color: rgba(255,255,255,.65);
    }

    .btn-modern{
        background: linear-gradient(135deg,#3b82f6,#6366f1);
        border: none;
        color: white;
        border-radius: 50px;
        padding: 14px 24px;
        font-weight: 600;
        transition: .3s;
        text-decoration: none;
    }

    .btn-modern:hover{
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 10px 25px rgba(59,130,246,.35);
    }

    /* TABLE */

    .table{
        color: white !important;
        vertical-align: middle;
        margin-bottom: 0;

        --bs-table-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        --bs-table-hover-bg: rgba(255,255,255,.03) !important;
        --bs-table-active-bg: rgba(255,255,255,.03) !important;
        --bs-table-border-color: rgba(255,255,255,.06) !important;
    }

    .table > :not(caption) > * > *{
        background: transparent !important;
        color: white !important;
        box-shadow: none !important;
    }

    .table thead{
        background: rgba(255,255,255,.03);
    }

    .table thead th{
        border-bottom: 1px solid rgba(255,255,255,.08);
        color: rgba(255,255,255,.8) !important;
        font-weight: 600;
        padding: 18px 14px;
        background: rgba(255,255,255,.03) !important;
    }

    .table tbody td{
        border-color: rgba(255,255,255,.05);
        padding: 18px 14px;
        background: transparent !important;
    }

    .table tbody tr{
        transition: .3s;
        background: transparent !important;
    }

    .table tbody tr:hover{
        background: rgba(255,255,255,.03) !important;
    }

    .table-responsive{
        border-radius: 24px;
        overflow: hidden;
    }

    .table-image{
        width: 90px;
        height: 70px;
        object-fit: cover;
        border-radius: 16px;
        border: 2px solid rgba(255,255,255,.08);
    }

    .desc-text{
        color: rgba(255,255,255,.6);
        font-size: 13px;
    }

    /* BUTTON AKSI */

    .btn-action{
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: .3s;
        text-decoration: none;
    }

    .btn-edit{
        background: linear-gradient(135deg,#f59e0b,#d97706);
    }

    .btn-delete{
        background: linear-gradient(135deg,#ef4444,#dc2626);
    }

    .btn-action:hover{
        transform: translateY(-3px);
        color: white;
    }

    /* EMPTY */

    .empty-box{
        text-align: center;
        padding: 60px 20px;
    }

    .empty-box img{
        width: 120px;
        margin-bottom: 20px;
    }

    .empty-title{
        font-weight: 700;
        color: white;
    }

    /* ALERT */

    .alert-success{
        background: rgba(34,197,94,.15);
        border: 1px solid rgba(34,197,94,.25);
        color: #bbf7d0;
        border-radius: 20px;
    }

    /* SCROLLBAR */

    ::-webkit-scrollbar{
        width: 10px;
    }

    ::-webkit-scrollbar-track{
        background: #0f172a;
    }

    ::-webkit-scrollbar-thumb{
        background: rgba(255,255,255,.15);
        border-radius: 20px;
    }

    ::-webkit-scrollbar-thumb:hover{
        background: rgba(255,255,255,.25);
    }

</style>

{{-- NAVBAR --}}
<div class="top-navbar">

    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">

        <a href="{{ route('admin.dashboard') }}"
           class="navbar-brand-custom">

            <i class="bi bi-mortarboard-fill me-2"></i>
            Admin Dashboard

        </a>

        <a href="{{ route('admin.dashboard') }}"
           class="btn-dashboard">

            <i class="bi bi-arrow-left-circle-fill me-2"></i>
            Kembali ke Dashboard

        </a>

    </div>

</div>

<div class="container pb-5">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="page-title">
                Data Ekstrakurikuler
            </h2>

            <p class="page-subtitle mb-0">
                Kelola seluruh data ekstrakurikuler sekolah
            </p>

        </div>

        <a href="{{ route('admin.ekstrakurikuler.create') }}"
           class="btn-modern">

            <i class="bi bi-plus-circle-fill me-2"></i>
            Tambah Data

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>

    @endif

    {{-- TABLE --}}
    <div class="glass-card p-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jadwal</th>
                        <th>Pembina</th>
                        <th width="140">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $d)

                    <tr>

                        {{-- GAMBAR --}}
                        <td>

                            @if($d->gambar)

                                <img
                                    src="{{ asset('storage/' . $d->gambar) }}"
                                    class="table-image">

                            @else

                                <img
                                    src="https://via.placeholder.com/90x70"
                                    class="table-image">

                            @endif

                        </td>

                        {{-- NAMA --}}
                        <td>

                            <h6 class="fw-bold mb-1 text-white">
                                {{ $d->nama }}
                            </h6>

                            <div class="desc-text">
                                {{ Str::limit($d->deskripsi, 50) }}
                            </div>

                        </td>

                        {{-- KATEGORI --}}
                        <td>{{ $d->kategori }}</td>

                        {{-- JADWAL --}}
                        <td>{{ $d->jadwal }}</td>

                        {{-- PEMBINA --}}
                        <td>{{ $d->pembina }}</td>

                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.ekstrakurikuler.edit', $d->id) }}"
                                   class="btn-action btn-edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                {{-- DELETE --}}
                                <form
                                    action="{{ route('admin.ekstrakurikuler.destroy', $d->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="btn-action btn-delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-box">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png">

                                <h4 class="empty-title">
                                    Belum Ada Data
                                </h4>

                                <p class="text-light opacity-75">
                                    Tambahkan data ekstrakurikuler terlebih dahulu
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection