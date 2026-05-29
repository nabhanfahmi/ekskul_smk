@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html{
    scroll-behavior: smooth;
}

body{
    background:
        linear-gradient(rgba(15, 23, 42, 0.25), rgba(6, 78, 59, 0.25)),
        url('{{ asset("images/bgok.jpg") }}');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    min-height: 100vh;
    overflow-x: hidden;
    position: relative;
}

/* GLOW */

body::before,
body::after{
    content: '';
    position: fixed;
    border-radius: 999px;
    z-index: -1;
    filter: blur(120px);
}

body::before{
    width: 420px;
    height: 420px;
    background: rgba(34,197,94,.12);
    top: -120px;
    left: -120px;
    animation: glow1 8s infinite alternate ease-in-out;
}

body::after{
    width: 350px;
    height: 350px;
    background: rgba(16,185,129,.12);
    bottom: -120px;
    right: -120px;
    animation: glow2 10s infinite alternate ease-in-out;
}

@keyframes glow1{
    100%{
        transform: translate(40px,30px) scale(1.1);
    }
}

@keyframes glow2{
    100%{
        transform: translate(-30px,-20px) scale(1.1);
    }
}

/* NAVBAR */

.navbar-custom{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;

    padding: 14px 0;

    transition: .4s;

    background: transparent;
}

.navbar-scrolled{
    background: rgba(3, 73, 43, 0.72);
    backdrop-filter: blur(18px);

    border-bottom: 1px solid rgba(255,255,255,.06);

    box-shadow:
        0 10px 30px rgba(0,0,0,.25);
}

.navbar-brand img{
    width: 84px;
    height: 84px;
    object-fit: contain;
    transition: .4s;
}

.navbar-scrolled .navbar-brand img{
    width: 70px;
    height: 70px;
}

.navbar-menu{
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.nav-link-custom{
    text-decoration: none;
    color: rgba(255,255,255,.78);

    padding: 10px 16px;

    border-radius: 14px;

    transition: .3s;

    font-size: 14px;
    font-weight: 500;
}

.nav-link-custom:hover,
.nav-link-custom.active{
    color: white;

    background: rgba(34,197,94,.14);
}

.btn-dashboard{
    background: linear-gradient(135deg,#22c55e,#10b981);

    color: white;
    text-decoration: none;

    padding: 12px 22px;

    border-radius: 16px;

    font-weight: 600;

    transition: .3s;

    box-shadow:
        0 10px 25px rgba(34,197,94,.25);
}

.btn-dashboard:hover{
    transform: translateY(-3px);
    color: white;
}

/* HERO */

.hero{
    min-height: 55vh;

    display: flex;
    align-items: center;
    justify-content: center;

    text-align: center;

    padding:
        180px
        0
        90px;
}

.hero-title{
    color: white;

    font-size: 58px;
    font-weight: 800;

    line-height: 1.2;
}

.hero-subtitle{
    color: rgba(255,255,255,.72);

    max-width: 760px;

    margin:
        22px
        auto
        0;

    line-height: 1.9;

    font-size: 16px;
}

/* CARD */

.glass-card{
    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    backdrop-filter: blur(22px);

    border-radius: 28px;

    overflow: hidden;

    height: 100%;

    transition: .4s;

    box-shadow:
        0 0 25px rgba(34,197,94,.05);
}

.glass-card:hover{
    transform: translateY(-8px);

    box-shadow:
        0 15px 40px rgba(0,0,0,.35);
}

.card-image{
    width: 100%;
    height: 240px;
    object-fit: cover;
}

.card-content{
    padding: 26px;
}

.badge-modern{
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 8px 16px;

    border-radius: 999px;

    background: rgba(34,197,94,.12);

    color: #86efac;

    font-size: 13px;

    border: 1px solid rgba(34,197,94,.12);
}

.card-title{
    color: white;

    font-size: 24px;
    font-weight: 700;

    margin-top: 18px;
}

.card-text{
    color: rgba(255,255,255,.72);

    margin-top: 14px;

    line-height: 1.8;

    font-size: 14px;
}

.detail-box{
    margin-top: 20px;

    background: rgba(255,255,255,.04);

    border-radius: 18px;

    padding: 18px;

    border: 1px solid rgba(255,255,255,.05);
}

.detail-item{
    color: rgba(255,255,255,.82);

    font-size: 14px;

    margin-bottom: 12px;
}

.detail-item:last-child{
    margin-bottom: 0;
}

.detail-item i{
    color: #4ade80;
    margin-right: 8px;
}

.btn-modern{
    border: none;

    border-radius: 16px;

    padding: 13px 22px;

    font-weight: 600;

    transition: .3s;
}

.btn-primary-modern{
    background: linear-gradient(135deg,#22c55e,#10b981);

    color: white;

    box-shadow:
        0 10px 25px rgba(34,197,94,.22);
}

.btn-primary-modern:hover{
    transform: translateY(-3px);
    color: white;
}

/* EMPTY */

.empty-box{
    background: rgba(255,255,255,.05);

    border-radius: 28px;

    padding: 60px 30px;

    text-align: center;

    border: 1px solid rgba(255,255,255,.06);

    backdrop-filter: blur(18px);
}

.empty-title{
    color: white;

    margin-top: 24px;

    font-weight: 700;
}

.empty-text{
    color: rgba(255,255,255,.68);

    margin-top: 8px;
}

/* FOOTER */

.footer-modern{
    margin-top: 100px;

    background: rgba(255,255,255,.04);

    backdrop-filter: blur(20px);

    border-top: 1px solid rgba(255,255,255,.06);

    padding: 60px 0 25px;
}

.footer-logo{
    width: 70px;
    height: 70px;
    object-fit: contain;
}

.footer-title{
    color: white;
    font-weight: 700;
    font-size: 22px;
}

.footer-text{
    color: rgba(255,255,255,.68);

    line-height: 1.8;

    font-size: 14px;
}

.footer-heading{
    color: #dcfce7;
    font-weight: 700;
}

.footer-links a{
    color: rgba(255,255,255,.7);

    text-decoration: none;

    transition: .3s;
}

.footer-links a:hover{
    color: #86efac;
}

.footer-social{
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.footer-social a{
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    color: white;

    transition: .3s;
}

.footer-social a:hover{
    background: linear-gradient(135deg,#22c55e,#10b981);

    transform: translateY(-4px);
}

.footer-bottom{
    margin-top: 45px;

    padding-top: 25px;

    border-top: 1px solid rgba(255,255,255,.06);

    color: rgba(255,255,255,.6);

    font-size: 14px;
}

.footer-links a,
.footer-contact{
    color: rgba(255,255,255,.72);
    text-decoration: none;
    font-size: 14px;
    transition: .3s;
}

.footer-links a:hover{
    color: #86efac;
    transform: translateX(4px);
}

.footer-contact i,
.footer-links i{
    color: #4ade80;
}

.footer-social{
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.footer-social a{
    width: 45px;
    height: 45px;
    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.08);

    color: white;

    transition: .3s;
}

.footer-social a:hover{
    background: linear-gradient(135deg,#22c55e,#10b981);
    transform: translateY(-4px);
}

@media(max-width:768px){

    .footer-modern{
        text-align: center;
    }

    .footer-social{
        justify-content: center;
    }

}

/* MOBILE TOGGLE */

.mobile-toggle{
    display: none;

    width: 48px;
    height: 48px;

    border: 1px solid rgba(255,255,255,.12);

    background: rgba(255,255,255,.06);

    color: white;

    border-radius: 14px;

    align-items: center;
    justify-content: center;

    font-size: 22px;

    backdrop-filter: blur(20px);
}

/* RESPONSIVE */

@media(max-width: 991px){

    body{
        background-attachment: scroll;
    }

    .navbar-custom{
        padding: 10px 0;
    }

    .navbar-custom .container{
        align-items: center !important;
    }

    .navbar-brand img{
        width: 64px;
        height: 64px;
    }

    .navbar-scrolled .navbar-brand img{
        width: 58px;
        height: 58px;
    }

    .mobile-toggle{
        display: flex;
    }

    .navbar-menu{
        position: absolute;

        top: 100%;
        left: 12px;
        right: 12px;

        display: flex;
        flex-direction: column;

        gap: 12px;

        padding: 18px;

        background: rgba(3,10,7,.95);

        backdrop-filter: blur(22px);

        border-radius: 24px;

        border: 1px solid rgba(34,197,94,.12);

        box-shadow:
            0 20px 40px rgba(0,0,0,.35);

        opacity: 0;
        visibility: hidden;

        transform: translateY(-10px);

        transition: .3s ease;

        z-index: 999;
    }

    .navbar-menu.show{
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .nav-link-custom{
        width: 100%;

        text-align: center;

        padding: 14px 18px;

        border-radius: 16px;

        font-size: 15px;
    }

    .btn-dashboard{
        width: 100%;

        text-align: center;

        padding: 14px 18px;

        border-radius: 16px;
    }

    .hero{
        min-height: auto;

        padding-top: 150px;
        padding-bottom: 70px;
    }

    .hero-title{
        font-size: 40px;
        line-height: 1.3;
    }

    .hero-subtitle{
        font-size: 15px;
        line-height: 1.8;
        padding: 0 10px;
    }

    .glass-card{
        border-radius: 26px;
    }

    .card-image{
        height: 220px;
    }

    .card-title{
        font-size: 22px;
    }

    .footer-modern{
        text-align: center;
    }

    .footer-social{
        justify-content: center;
    }

}

@media(max-width: 576px){

    .container{
        padding-left: 16px;
        padding-right: 16px;
    }

    .hero{
        padding-top: 135px;
        padding-bottom: 50px;
    }

    .hero-title{
        font-size: 30px;
    }

    .hero-subtitle{
        font-size: 14px;
    }

    .navbar-brand img{
        width: 56px !important;
        height: 56px !important;
    }

    .navbar-menu{
        left: 10px;
        right: 10px;

        padding: 16px;
    }

    .nav-link-custom,
    .btn-dashboard{
        font-size: 14px;
        padding: 13px 15px;
    }

    .glass-card{
        border-radius: 22px;
    }

    .card-image{
        height: 200px;
    }

    .card-title{
        font-size: 20px;
    }

    .card-text{
        font-size: 14px;
    }

    .detail-box{
        padding: 14px;
    }

    .footer-modern{
        padding-top: 45px;
    }

    .footer-title{
        font-size: 20px;
    }

}

</style>

{{-- NAVBAR --}}
<nav class="navbar-custom">

    <div class="container d-flex justify-content-between align-items-center position-relative">

        <a class="navbar-brand d-flex align-items-center gap-2" href="/">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SMK">

        </a>

        <button class="mobile-toggle" id="mobileToggle">

            <i class="bi bi-list"></i>

        </button>

        <div class="navbar-menu" id="navbarMenu">

            <a href="{{ route('home') }}"
               class="nav-link-custom active">

                <i class="bi bi-house-door-fill me-1"></i>
                Beranda

            </a>

            @auth

                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                       class="btn-dashboard">

                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard Admin

                    </a>

                @elseif(auth()->user()->role === 'siswa')

                    <a href="{{ route('siswa.dashboard') }}"
                       class="btn-dashboard">

                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard Siswa

                    </a>

                @endif

            @else

                <a href="{{ route('login') }}"
                   class="btn-dashboard">

                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login

                </a>

            @endauth

        </div>

    </div>

</nav>

<section class="hero">

    <div class="container">

        <h1 class="hero-title">

            Ekstrakurikuler

            <span style="
                background: linear-gradient(135deg,#4ade80,#6ee7b7);
                -webkit-background-clip:text;
                -webkit-text-fill-color:transparent;
            ">
                SMK SYAFI'I AKROM
            </span>

            PEKALONGAN

        </h1>

        <p class="hero-subtitle">

            Temukan berbagai ekstrakurikuler terbaik untuk
            mengembangkan bakat, kreativitas, dan potensi siswa
            bersama pembina profesional dan kegiatan yang menyenangkan.

        </p>

    </div>

</section>

<div class="container pb-5">

    <div class="row g-4">

        @forelse($data as $d)

        <div class="col-12 col-md-6 col-xl-4">

            <div class="glass-card">

                @if($d->gambar && file_exists(public_path('storage/' . $d->gambar)))

                    <img
                        src="{{ asset('storage/' . $d->gambar) }}"
                        class="card-image"
                        alt="{{ $d->nama }}">

                @else

                    <img
                        src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop"
                        class="card-image"
                        alt="Default">

                @endif

                <div class="card-content">

                    <span class="badge-modern">

                        <i class="bi bi-bookmark-fill"></i>
                        {{ $d->kategori }}

                    </span>

                    <h3 class="card-title">
                        {{ $d->nama }}
                    </h3>

                    <p class="card-text">

                        @if($d->deskripsi)

                            {{ Str::limit($d->deskripsi, 120) }}

                        @else

                            Ekstrakurikuler ini membantu siswa
                            mengembangkan kreativitas dan kemampuan.

                        @endif

                    </p>

                    <div class="detail-box">

                        <div class="detail-item">

                            <i class="bi bi-calendar-event-fill"></i>

                            <strong>Jadwal:</strong>
                            {{ $d->jadwal ?? 'Belum tersedia' }}

                        </div>

                        <div class="detail-item">

                            <i class="bi bi-person-fill"></i>

                            <strong>Pembina:</strong>
                            {{ $d->pembina ?? 'Belum tersedia' }}

                        </div>

                    </div>

                    <div class="mt-4">

                        <a href="{{ route('ekstrakurikuler.show', $d->id) }}"
                           class="btn btn-modern btn-primary-modern w-100">

                            <i class="bi bi-eye-fill me-1"></i>
                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-box">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                    width="140">

                <h3 class="empty-title">
                    Belum Ada Ekstrakurikuler
                </h3>

                <p class="empty-text">
                    Data ekstrakurikuler belum tersedia.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

{{-- FOOTER --}}
<footer class="footer-modern">

    <div class="container">

        <div class="row g-5">

            {{-- BRAND --}}
            <div class="col-lg-4">

                <div class="d-flex align-items-start gap-3">

                    <img 
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo"
                        class="footer-logo"
                    >

                    <div>

                        <h4 class="footer-title mb-2">
                            Sistem Ekstrakurikuler SMK
                        </h4>

                        <p class="footer-text mb-0">
                            Platform modern untuk membantu siswa menemukan
                            ekstrakurikuler terbaik sesuai minat dan bakat.
                        </p>

                    </div>

                </div>

            </div>

            {{-- NAVIGASI --}}
            <div class="col-lg-3 col-md-6">

                <div class="footer-links">

                    <h5 class="footer-heading">
                        Navigasi
                    </h5>

                    <div class="d-flex flex-column gap-3 mt-3">

                        <a href="{{ route('home') }}">
                            <i class="bi bi-house-door-fill me-2"></i>
                            Beranda
                        </a>

                        <a href="{{ route('ekstrakurikuler.index') }}">
                            <i class="bi bi-grid-fill me-2"></i>
                            Ekstrakurikuler
                        </a>

                        <a href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Login
                        </a>

                    </div>

                </div>

            </div>

            {{-- KONTAK --}}
            <div class="col-lg-3 col-md-6">

                <div class="footer-links">

                    <h5 class="footer-heading">
                        Kontak Info
                    </h5>

                    <div class="d-flex flex-column gap-3 mt-3">

                        <div class="footer-contact">
                            <i class="bi bi-building me-2"></i>
                            SMK Syafi'i Akrom
                        </div>

                        <div class="footer-contact">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Jl. Pelita 1 No. 322 (Perum Buaran Indah) Kota Pekalongan Jawa Tengah.
                        </div>

                        <div class="footer-contact">
                            <i class="bi bi-telephone-fill me-2"></i>
                            (0285) 410447
                        </div>

                        <div class="footer-contact">
                            <i class="bi bi-envelope-fill me-2"></i>
                            smk_sa@ymail.com
                        </div>

                    </div>

                </div>

            </div>

            {{-- SOSMED --}}
            <div class="col-lg-2">

                <h5 class="footer-heading">
                    Ikuti Kami
                </h5>

                <div class="footer-social mt-3">

                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>

                </div>

            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="footer-bottom text-center">

            © {{ date('Y') }} Sistem Pakar Ekstrakurikuler SMK SA —
            Dibuat dengan 💚 untuk masa depan siswa.

        </div>

    </div>

</footer>

<script>

const navbar = document.querySelector('.navbar-custom');

window.addEventListener('scroll', () => {

    if(window.scrollY > 20){

        navbar.classList.add('navbar-scrolled');

    }else{

        navbar.classList.remove('navbar-scrolled');

    }

});

</script>

<script>

const mobileToggle = document.getElementById('mobileToggle');
const navbarMenu = document.getElementById('navbarMenu');

mobileToggle.addEventListener('click', () => {

    navbarMenu.classList.toggle('show');

});

</script>

@endsection