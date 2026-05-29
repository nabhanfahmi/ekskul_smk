@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    *{
        font-family: 'Poppins', sans-serif;
    }

    body{
        background:
        radial-gradient(circle at top left, rgba(59,130,246,.15), transparent 30%),
        radial-gradient(circle at bottom right, rgba(139,92,246,.15), transparent 30%),
        linear-gradient(135deg,#020617,#0f172a);

        min-height: 100vh;
    }

    .top-navbar{
        background: rgba(255,255,255,.07);

        backdrop-filter: blur(20px);

        border-bottom: 1px solid rgba(255,255,255,.08);

        padding: 18px 0;

        margin-bottom: 35px;
    }

    .navbar-logo{
        color: white;
        text-decoration: none;

        font-size: 26px;
        font-weight: 700;
    }

    .navbar-logo:hover{
        color: white;
    }

    .btn-dashboard{
        background: linear-gradient(
            135deg,
            #3b82f6,
            #6366f1
        );

        color: white;

        border: none;
        border-radius: 50px;

        padding: 12px 22px;

        text-decoration: none;
        font-weight: 600;

        transition: .3s;
    }

    .btn-dashboard:hover{
        color: white;

        transform: translateY(-3px);

        box-shadow: 0 15px 30px rgba(59,130,246,.35);
    }

    .page-title{
        color: white;
        font-size: 38px;
        font-weight: 800;
    }

    .page-subtitle{
        color: rgba(255,255,255,.65);
        margin-top: 10px;
    }

    .glass-card{
        background: rgba(255,255,255,.07);

        backdrop-filter: blur(20px);

        border: 1px solid rgba(255,255,255,.08);

        border-radius: 30px;

        overflow: hidden;

        box-shadow: 0 15px 40px rgba(0,0,0,.25);
    }

    .table{
        margin-bottom: 0 !important;
        color: white !important;

        --bs-table-bg: transparent !important;
        --bs-table-striped-bg: transparent !important;
        --bs-table-hover-bg: rgba(255,255,255,.03) !important;
        --bs-table-border-color: rgba(255,255,255,.06) !important;
    }

    .table thead{
        background: rgba(255,255,255,.04);
    }

    .table thead th{
        color: rgba(255,255,255,.8);

        border-bottom: 1px solid rgba(255,255,255,.08);

        padding: 20px;
        font-weight: 600;
    }

    .table tbody td{
        padding: 20px;
        vertical-align: middle;
        border-color: rgba(255,255,255,.06);
    }

    .table tbody tr{
        transition: .3s;
    }

    .table tbody tr:hover{
        background: rgba(255,255,255,.03);
    }

    .student-avatar{
        width: 50px;
        height: 50px;

        border-radius: 50%;

        object-fit: cover;
    }

    .student-name{
        font-weight: 700;
        color: white;
    }

    .student-email{
        color: rgba(255,255,255,.6);
        font-size: 13px;
    }

    .badge-modern{
        padding: 10px 18px;

        border-radius: 50px;

        font-size: 13px;
        font-weight: 600;

        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .badge-blue{
        background: rgba(59,130,246,.15);
        color: #93c5fd;
    }

    .badge-green{
        background: rgba(34,197,94,.15);
        color: #86efac;
    }

    .empty-box{
        padding: 70px 30px;
        text-align: center;
    }

    .empty-title{
        color: white;
        font-weight: 700;
        margin-top: 20px;
    }

    .empty-text{
        color: rgba(255,255,255,.65);
    }

</style>

{{-- NAVBAR --}}
<div class="top-navbar">

    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">

        <a href="{{ route('admin.dashboard') }}"
           class="navbar-logo">

            <i class="bi bi-mortarboard-fill me-2"></i>
            Admin Konseling

        </a>

        <a href="{{ route('admin.dashboard') }}"
           class="btn-dashboard">

            <i class="bi bi-arrow-left-circle-fill me-2"></i>
            Dashboard

        </a>

    </div>

</div>

<div class="container pb-5">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="page-title">
            📊 Hasil Konseling Siswa
        </h1>

        <p class="page-subtitle">
            Data rekomendasi ekstrakurikuler berdasarkan hasil konseling siswa.
        </p>

    </div>

    {{-- TABLE --}}
    <div class="glass-card">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>Siswa</th>
                        <th>Minat</th>
                        <th>Rekomendasi</th>
                        <th>Tanggal</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $d)

                    <tr>

                        {{-- SISWA --}}
                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <img
                                    src="https://i.pravatar.cc/100?img={{ $loop->iteration }}"
                                    class="student-avatar">

                                <div>

                                    <div class="student-name">
                                        {{ $d->user->name ?? '-' }}
                                    </div>

                                    <div class="student-email">
                                        NIM: {{ $d->user->nim ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </td>

                        {{-- MINAT --}}
                        <td>

                            <span class="badge-modern badge-blue">

                                <i class="bi bi-stars"></i>

                                {{ ucfirst($d->minat) }}

                            </span>

                        </td>

                        {{-- REKOMENDASI --}}
                        <td>

                            <span class="badge-modern badge-green">

                                <i class="bi bi-trophy-fill"></i>

                                {{ $d->hasil }}

                            </span>

                        </td>

                        {{-- TANGGAL --}}
                        <td>

                            {{ $d->created_at->translatedFormat('d F Y H:i') }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4">

                            <div class="empty-box">

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                                    width="140">

                                <h3 class="empty-title">
                                    Belum Ada Hasil Konseling
                                </h3>

                                <p class="empty-text">
                                    Data hasil konseling siswa akan muncul di sini.
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