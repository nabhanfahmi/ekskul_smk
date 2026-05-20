@extends('layouts.app')

@section('content')

{{-- GOOGLE FONT --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- BOOTSTRAP ICON --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

    *{
        font-family: 'Poppins', sans-serif;
    }

    body{
        background:
            radial-gradient(circle at top left, rgba(59,130,246,.25), transparent 30%),
            radial-gradient(circle at bottom right, rgba(139,92,246,.25), transparent 30%),
            linear-gradient(135deg, #020617, #0f172a);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .dashboard-wrapper{
        padding: 30px;
    }

    /* TOPBAR */

    .topbar{
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 28px;
        padding: 20px 25px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,.2);
    }

    .brand-box{
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .brand-icon{
        width: 60px;
        height: 60px;
        border-radius: 18px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
        box-shadow: 0 10px 25px rgba(59,130,246,.4);
    }

    .brand-title{
        color: white;
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .brand-subtitle{
        color: rgba(255,255,255,.65);
        font-size: 14px;
    }

    .profile-box{
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .notification{
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.08);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
        cursor: pointer;
        transition: .3s;
    }

    .notification:hover{
        transform: translateY(-3px);
        background: rgba(255,255,255,.12);
    }

    .notification::after{
        content: '';
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #22c55e;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .admin-avatar{
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgba(255,255,255,.2);
    }

    /* GLASS CARD */

    .glass-card{
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 28px;
        padding: 25px;
        color: white;
        overflow: hidden;
        position: relative;
        transition: .4s;
        height: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,.2);
    }

    .glass-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,.35);
    }

    .glass-card::before{
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255,255,255,.04);
        border-radius: 50%;
        top: -120px;
        right: -120px;
    }

    /* HERO */

    .hero-card{
        min-height: 320px;
    }

    .hero-title{
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 18px;
    }

    .hero-text{
        color: rgba(255,255,255,.75);
        font-size: 16px;
        line-height: 1.8;
    }

    /* BUTTON */

    .btn-modern{
        border: none;
        border-radius: 16px;
        padding: 14px 24px;
        font-weight: 600;
        transition: .3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary-modern{
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 10px 25px rgba(59,130,246,.4);
    }

    .btn-primary-modern:hover{
        transform: translateY(-3px);
        color: white;
    }

    .btn-dark-modern{
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.08);
        color: white;
    }

    .btn-dark-modern:hover{
        background: rgba(255,255,255,.12);
        color: white;
    }

    .btn-danger-modern{
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 10px 25px rgba(239,68,68,.35);
    }

    .btn-danger-modern:hover{
        transform: translateY(-3px);
        color: white;
    }

    /* table */
    .table{
    --bs-table-bg: transparent !important;
    --bs-table-striped-bg: transparent !important;
    --bs-table-hover-bg: rgba(255,255,255,.04) !important;
    --bs-table-border-color: rgba(255,255,255,.08) !important;

    color: white;
}

.table thead th{
    background: rgba(255,255,255,.04);
    border-bottom: 1px solid rgba(255,255,255,.08);
    color: rgba(255,255,255,.8);
    font-weight: 600;
    padding: 16px;
}

.table tbody td{
    background: transparent !important;
    border-color: rgba(255,255,255,.05);
    padding: 16px;
}

.table tbody tr{
    transition: .3s;
}

.table tbody tr:hover{
    background: rgba(255,255,255,.03);
}

    /* STATS */

    .stats-card{
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .stats-icon{
        width: 70px;
        height: 70px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        flex-shrink: 0;
    }

    .bg-blue{
        background: rgba(59,130,246,.15);
        color: #60a5fa;
    }

    .bg-green{
        background: rgba(34,197,94,.15);
        color: #4ade80;
    }

    .bg-yellow{
        background: rgba(251,191,36,.15);
        color: #facc15;
    }

    .bg-red{
        background: rgba(239,68,68,.15);
        color: #f87171;
    }

    .stats-number{
        font-size: 30px;
        font-weight: 700;
    }

    .stats-label{
        color: rgba(255,255,255,.65);
    }

    /* MENU */

    .menu-card{
        text-decoration: none;
        color: white;
        display: block;
    }

    .menu-card .icon{
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 18px;
        background: rgba(255,255,255,.08);
    }

    /* CHART */

    .chart-box{
        height: 320px;
    }

    /* ACTIVITY */

    .activity-item{
        padding: 18px;
        border-radius: 18px;
        background: rgba(255,255,255,.05);
        margin-bottom: 14px;
        transition: .3s;
    }

    .activity-item:hover{
        background: rgba(255,255,255,.08);
        transform: translateX(4px);
    }

    .online-dot{
        width: 10px;
        height: 10px;
        background: #22c55e;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
    }

    /* RESPONSIVE */

    @media(max-width: 991px){

        .dashboard-wrapper{
            padding: 18px;
        }

        .hero-title{
            font-size: 30px;
        }

        .topbar{
            padding: 18px;
        }

    }

</style>

<div class="dashboard-wrapper">

    {{-- TOPBAR --}}
    <div class="topbar d-flex justify-content-between align-items-center flex-wrap gap-3" data-aos="fade-down">

        <div class="brand-box">

            <div class="brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>

                <div class="brand-title">
                    Dashboard Admin
                </div>

                <div class="brand-subtitle">
                    Sistem Pakar Ekstrakurikuler Modern
                </div>

            </div>

        </div>

        <div class="profile-box">

            <div class="notification">
                <i class="bi bi-bell-fill"></i>
            </div>

            <img
                src="https://i.pravatar.cc/150?img=12"
                class="admin-avatar"
                alt="Admin"
            >

            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="btn btn-modern btn-danger-modern">

                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout

                </button>
            </form>

        </div>

    </div>

    {{-- HERO --}}
    <div class="glass-card hero-card mb-4" data-aos="zoom-in">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1 class="hero-title">
                    Halo, {{ auth()->user()->name }} 👋
                </h1>

                <p class="hero-text">
                    Kelola ekstrakurikuler sekolah, pantau statistik siswa,
                    lihat aktivitas realtime, dan buat sistem administrasi
                    sekolah menjadi lebih modern dan profesional.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">

                    <a href="{{ route('admin.ekstrakurikuler.index') }}"
                        class="btn-modern btn-primary-modern">

                        <i class="bi bi-collection-fill me-2"></i>
                        Kelola Ekstrakurikuler

                    </a>

                    <a href="{{ route('admin.ekstrakurikuler.create') }}"
                        class="btn-modern btn-dark-modern">

                        <i class="bi bi-plus-circle-fill me-2"></i>
                        Tambah Data

                    </a>

                </div>

            </div>

            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/4207/4207247.png"
                    class="img-fluid"
                    style="max-height: 280px;"
                    alt="Dashboard"
                >

            </div>

        </div>

    </div>

    {{-- HASIL KONSELING SISWA --}}
<div class="glass-card mb-4" data-aos="fade-up">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Hasil Konseling Siswa
            </h4>

            <div class="text-light opacity-75">
                Rekomendasi ekstrakurikuler berdasarkan minat siswa
            </div>

        </div>

        <div class="badge rounded-pill bg-primary px-3 py-2">

            Total:
            {{ \App\Models\HasilKonseling::count() }}

        </div>

    </div>

    <div class="table-responsive">

        <table class="table table-dark align-middle">

            <thead>

                <tr>
                    <th>Siswa</th>
                    <th>Minat</th>
                    <th>Rekomendasi</th>
                    <th>Tanggal</th>
                </tr>

            </thead>

            <tbody>

                @forelse(
                    \App\Models\HasilKonseling::latest()->take(10)->get()
                    as $hasil
                )

                <tr>

                    {{-- SISWA --}}
                    <td>

                        <div class="d-flex align-items-center gap-3">

                            <img
                                src="{{ $hasil->user && $hasil->user->foto
                                    ? asset('storage/' . $hasil->user->foto)
                                    : 'https://i.pravatar.cc/100?u=' . $hasil->user_id }}"
                                width="45"
                                height="45"
                                class="rounded-circle border border-light border-opacity-25"
                                style="
                                    object-fit: cover;
                                    box-shadow: 0 0 15px rgba(34,197,94,.18);
                                "
                            >

                            <div>

                                <div class="fw-semibold text-white">
                                    {{ $hasil->user->name ?? '-' }}
                                </div>

                                <small class="text-light opacity-75">
                                    ID:
                                    {{ $hasil->user_id }}
                                </small>

                            </div>

                        </div>

                    </td>

                    {{-- MINAT --}}
                    <td>

                        <span class="badge rounded-pill bg-info px-3 py-2">

                            {{ ucfirst($hasil->minat) }}

                        </span>

                    </td>

                    {{-- REKOMENDASI --}}
                    <td>

                        @if($hasil->ekstrakurikuler)

                            <div class="fw-bold text-success">

                                {{ $hasil->ekstrakurikuler->nama }}

                            </div>

                            <small class="text-light opacity-75">

                                {{ $hasil->ekstrakurikuler->kategori }}

                            </small>

                        @else

                            <span class="text-warning">
                                Belum ada rekomendasi
                            </span>

                        @endif

                    </td>

                    {{-- TANGGAL --}}
                    <td>

                        <span class="text-light opacity-75">

                            {{ $hasil->created_at->format('d M Y H:i') }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-5">

                        <img
                            src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                            width="100"
                            class="mb-3"
                        >

                        <h5 class="fw-bold text-white">
                            Belum Ada Data Konseling
                        </h5>

                        <div class="text-light opacity-75">
                            Data hasil konseling siswa akan muncul di sini
                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

    {{-- STATISTIK --}}
    <!-- <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3" data-aos="fade-up">

            <div class="glass-card stats-card">

                <div class="stats-icon bg-blue">
                    <i class="bi bi-collection-fill"></i>
                </div>

                <div>

                    <div class="stats-number">
                        {{ \App\Models\Ekstrakurikuler::count() }}
                    </div>

                    <div class="stats-label">
                        Total Ekstrakurikuler
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">

            <div class="glass-card stats-card">

                <div class="stats-icon bg-green">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>

                <div>

                    <div class="stats-number">
                        {{ \App\Models\HasilKonseling::count() }}
                    </div>

                    <div class="stats-label">
                        Total Konseling
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">

            <div class="glass-card stats-card">

                <div class="stats-icon bg-yellow">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div>

                    <div class="stats-number">
                        {{ \App\Models\User::where('role','siswa')->count() }}
                    </div>

                    <div class="stats-label">
                        Total Siswa
                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">

            <div class="glass-card stats-card">

                <div class="stats-icon bg-red">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>

                <div>

                    <div class="stats-number">
                        100%
                    </div>

                    <div class="stats-label">
                        Sistem Aktif
                    </div>

                </div>

            </div>

        </div>

    </div> -->

    <!-- <div class="row g-4">

        {{-- MENU --}}
        <div class="col-lg-4" data-aos="fade-right">

            <div class="glass-card">

                <h4 class="fw-bold mb-4">
                    Menu Cepat
                </h4>

                <div class="row g-3">

                    <div class="col-6">

                        <a href="{{ route('admin.ekstrakurikuler.index') }}"
                            class="menu-card">

                            <div class="glass-card p-3">

                                <div class="icon">
                                    <i class="bi bi-grid-fill"></i>
                                </div>

                                <h6 class="fw-bold">
                                    Data Ekstra
                                </h6>

                            </div>

                        </a>

                    </div>

                    <div class="col-6">

                        <a href="{{ route('admin.ekstrakurikuler.create') }}"
                            class="menu-card">

                            <div class="glass-card p-3">

                                <div class="icon">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </div>

                                <h6 class="fw-bold">
                                    Tambah Data
                                </h6>

                            </div>

                        </a>

                    </div>

                    <div class="col-6">

                        <a href="#"
                            class="menu-card">

                            <div class="glass-card p-3">

                                <div class="icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>

                                <h6 class="fw-bold">
                                    Statistik
                                </h6>

                            </div>

                        </a>

                    </div>

                    <div class="col-6">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="menu-card border-0 bg-transparent w-100">

                                <div class="glass-card p-3 text-start">

                                    <div class="icon">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </div>

                                    <h6 class="fw-bold text-white">
                                        Logout
                                    </h6>

                                </div>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div> -->

        {{-- CHART --}}
        <!-- <div class="col-lg-5" data-aos="zoom-in">

            <div class="glass-card">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold">
                        Statistik Konseling
                    </h4>

                    <span class="text-success">
                        <i class="bi bi-graph-up-arrow"></i>
                        Naik 12%
                    </span>

                </div>

                <div class="chart-box">
                    <canvas id="chartAdmin"></canvas>
                </div>

            </div>

        </div>

        {{-- REALTIME --}}
        <div class="col-lg-3" data-aos="fade-left">

            <div class="glass-card">

                <h4 class="fw-bold mb-4">
                    Aktivitas Realtime
                </h4>

                <div class="activity-item">
                    <span class="online-dot"></span>
                    Siswa baru melakukan konseling
                </div>

                <div class="activity-item">
                    <span class="online-dot"></span>
                    Data ekstrakurikuler diperbarui
                </div>

                <div class="activity-item">
                    <span class="online-dot"></span>
                    Admin login ke sistem
                </div>

                <div class="activity-item">
                    <span class="online-dot"></span>
                    Sistem berjalan normal
                </div>

            </div>

        </div>

    </div>

</div> -->

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

    AOS.init({
        duration: 1000,
        once: true
    });

</script>

{{-- CHART --}}
<script>

    const ctx = document.getElementById('chartAdmin');

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Konseling',
                data: [12, 18, 10, 22, 30, 38],
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                borderColor: '#60a5fa',
                backgroundColor: 'rgba(96,165,250,.15)',
                pointBackgroundColor: '#60a5fa',
                pointBorderColor: '#fff',
                pointRadius: 5
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            },

            scales: {

                y: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255,255,255,.08)'
                    }
                },

                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255,255,255,.08)'
                    }
                }

            }

        }

    });

</script>

@endsection