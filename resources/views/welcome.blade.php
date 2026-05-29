<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Pakar Ekstrakurikuler</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

*{
    font-family: 'Poppins', sans-serif;
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

/* OVERLAY ANIMASI */

body::before{
    animation: glowMove1 8s ease-in-out infinite alternate;
}

body::after{
    animation: glowMove2 10s ease-in-out infinite alternate;
}

@keyframes glowMove1{
    0%{
        transform: translate(0,0) scale(1);
    }
    100%{
        transform: translate(40px,30px) scale(1.15);
    }
}

@keyframes glowMove2{
    0%{
        transform: translate(0,0) scale(1);
    }
    100%{
        transform: translate(-30px,-20px) scale(1.1);
    }
}

/* GLOW EFFECT */

body::before{
    content: '';
    position: fixed;
    width: 500px;
    height: 500px;
    background: rgba(34,197,94,.15);
    filter: blur(120px);
    top: -150px;
    left: -120px;
    z-index: -1;
}

body::after{
    content: '';
    position: fixed;
    width: 450px;
    height: 450px;
    background: rgba(16,185,129,.12);
    filter: blur(120px);
    bottom: -180px;
    right: -120px;
    z-index: -1;
}

/* NAVBAR */

.navbar-custom{
    background: transparent;
    backdrop-filter: blur(0px);

    padding: 10px 0;

    border-bottom: 1px solid transparent;

    transition:
        background .4s ease,
        backdrop-filter .4s ease,
        box-shadow .4s ease,
        border-color .4s ease,
        padding .4s ease;
}

/* SAAT SCROLL */

.navbar-scrolled{
    background: rgba(3, 73, 43, 0.72);
    backdrop-filter: blur(18px);

    border-bottom: 1px solid rgba(0, 255, 94, 0.12);

    padding: 6px 0;

    box-shadow:
        0 0 25px rgba(12, 119, 35, 0.56),
        0 10px 30px rgba(0,0,0,.25);
}

.navbar-brand{
    padding: 0;
}

.navbar-brand img{
    width: 88px;
    height: 88px;
    object-fit: contain;

    transition: .4s;

    filter:
        drop-shadow(0 0 12px rgba(34,197,94,.35));
}

/* LOGO MENGECIL SAAT SCROLL */

.navbar-scrolled .navbar-brand img{
    width: 72px;
    height: 72px;
}

.navbar-nav{
    align-items: center;
}

.nav-link{
    color: rgba(255,255,255,.78) !important;

    font-weight: 500;
    font-size: 14px;

    padding: 8px 14px !important;

    border-radius: 12px;

    transition: .3s;
}

.nav-link:hover{
    color: #bbf7d0 !important;

    background: rgba(0, 85, 18, 0.43);

    box-shadow:
        0 0 20px rgba(34,197,94,.15);
}

.active-nav{
    background: rgba(25, 221, 8, 0.18);

    color: #dcfce7 !important;

    box-shadow:
        0 0 20px rgba(34,197,94,.2);
}

/* BUTTON */

.btn-modern{
    border: none;
    border-radius: 16px;
    padding: 11px 22px;
    font-weight: 600;
    transition: .3s;
}

.btn-primary-modern{
    background: linear-gradient(135deg, #22c55e, #10b981);
    color: white;
    box-shadow: 0 0 25px rgba(34,197,94,.35);
}

.btn-primary-modern:hover{
    transform: translateY(-3px);
    color: white;
    box-shadow: 0 0 35px rgba(34,197,94,.5);
}

.btn-outline-modern{
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(34,197,94,.2);
    color: #dcfce7;
}

.btn-outline-modern:hover{
    background: rgba(252, 255, 253, 0.1);
    color: white;
    box-shadow: 0 0 25px rgba(34,197,94,.25);
}

.btn-danger-modern{
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-danger-modern:hover{
    transform: translateY(-2px);
    color: white;
}

.btn-success-modern{
    background: linear-gradient(135deg, #22c55e, #10b981);
    color: white;
    box-shadow: 0 0 25px rgba(34,197,94,.35);
}

.btn-success-modern:hover{
    transform: translateY(-3px);
    color: white;
    box-shadow: 0 0 35px rgba(34,197,94,.45);
}

/* USER */

.user-box{
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 14px;
    border-radius: 16px;
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(34,197,94,.12);
    box-shadow: 0 0 20px rgba(34,197,94,.08);
}

.user-icon{
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: linear-gradient(135deg, #22c55e, #10b981);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 0 20px rgba(34,197,94,.35);
}

.user-name{
    color: white;
    font-size: 14px;
    font-weight: 600;
}

.user-role{
    color: rgba(255,255,255,.6);
    font-size: 12px;
}

/* HERO */

.hero{
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 120px 0 80px;
}

.hero-title{
    color: white;
    font-size: 60px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 25px;
}

.hero-title span{
    background: linear-gradient(135deg, #4ade80, #6ee7b7);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 30px rgba(34,197,94,.35);
}

.hero-text{
    color: rgba(255,255,255,.72);
    font-size: 18px;
    line-height: 1.9;
}

.hero-buttons{
    margin-top: 35px;
}

/* .hero-image-card{
    background: rgba(255,255,255,.05);
    backdrop-filter: blur(25px);
    border: 1px solid rgba(34,197,94,.15);
    border-radius: 35px;
    overflow: hidden;
    padding: 45px;
    box-shadow:
        0 0 40px rgba(34,197,94,.12),
        0 20px 50px rgba(0,0,0,.35);
    position: relative;
} */


    /* new */
    .hero-image-card{
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(18px);
    border-radius: 30px;
    padding: 40px;
    box-shadow:
        0 0 30px rgba(0,200,83,0.25),
        0 0 60px rgba(0,230,118,0.08);
}

.login-input{
    width:100%;
    height:55px;
    border:1px solid #d1d5db;
    outline:none;
    border-radius:15px;
    padding:0 18px;
    background:#f9fafb;
    color:#111827;
}

.login-input::placeholder{
    color:#9ca3af;
}

.login-input:focus{
    background:white;
    color:#111827;
    border-color:#22c55e;
    box-shadow:0 0 0 4px rgba(34,197,94,.15);
}

.toggle-password{
    position:absolute;
    right:18px;
    top:50%;
    transform:translateY(-50%);
    color:#d0d9ff;
    cursor:pointer;
    transition:0.3s;
}

.toggle-password:hover{
    color:#00e5ff;
}

/* new */

.hero-image-card::before{
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 35px;
    padding: 1px;
    /* background: linear-gradient(
        135deg,
        rgba(34,197,94,.5),
        transparent,
        rgba(16,185,129,.5)
    );
    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude; */
    background: rgba(34,197,94,.05);
}

.hero-image-card img{
    max-height: 320px;
    filter: drop-shadow(0 0 25px rgba(34,197,94,.35));
}

/* STATS */

.stats-section{
    padding: 20px 0 80px;
}

.stats-card{
    background: rgba(255,255,255,.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(34,197,94,.12);
    border-radius: 28px;
    padding: 35px 25px;
    text-align: center;
    transition: .4s;
    height: 100%;
}

.stats-card:hover{
    transform: translateY(-8px);
    box-shadow:
        0 0 35px rgba(34,197,94,.18),
        0 20px 40px rgba(0,0,0,.35);
}

.stats-icon{
    width: 75px;
    height: 75px;
    margin: auto;
    border-radius: 22px;
    background: linear-gradient(135deg, #22c55e, #10b981);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    color: white;
    margin-bottom: 20px;
    box-shadow: 0 0 25px rgba(34,197,94,.35);
}

.stats-number{
    color: white;
    font-size: 38px;
    font-weight: 800;
}

.stats-text{
    color: rgba(255,255,255,.7);
    margin-top: 10px;
}

/* FEATURE */

.section-title{
    color: white;
    font-size: 42px;
    font-weight: 800;
}

.section-subtitle{
    color: rgba(255,255,255,.7);
}

.feature-card{
    background: rgba(255,255,255,.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(34,197,94,.12);
    border-radius: 28px;
    padding: 35px 30px;
    height: 100%;
    transition: .4s;
    text-align: center;
    box-shadow: 0 0 25px rgba(34,197,94,.06);
}

.feature-card:hover{
    transform: translateY(-8px);
    box-shadow:
        0 0 35px rgba(34,197,94,.18),
        0 20px 40px rgba(0,0,0,.35);
}

.feature-icon{
    width: 90px;
    height: 90px;
    border-radius: 24px;
    margin: auto;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: white;
    background: linear-gradient(135deg, #22c55e, #10b981);
    box-shadow: 0 0 30px rgba(34,197,94,.4);
}

.feature-title{
    color: white;
    font-weight: 700;
    margin-bottom: 15px;
}

.feature-text{
    color: rgba(255,255,255,.7);
    line-height: 1.8;
}

/* CTA */

.cta-section{
    padding: 100px 0;
}

.cta-box{
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(34,197,94,.12);
    backdrop-filter: blur(24px);
    border-radius: 40px;
    padding: 70px 50px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-box::before{
    content: '';
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(34,197,94,.15);
    filter: blur(100px);
    top: -100px;
    left: -100px;
}

.cta-title{
    color: white;
    font-size: 48px;
    font-weight: 800;
    position: relative;
    z-index: 2;
}

.cta-text{
    color: rgba(255,255,255,.72);
    font-size: 18px;
    line-height: 1.9;
    margin-top: 20px;
    position: relative;
    z-index: 2;
}

/* GALERI */
.hero-image-card{
    background: #ffffff;

    border: 1px solid rgba(0,0,0,.08);

    backdrop-filter: none;

    border-radius: 24px;

    padding: 20px;

    box-shadow:
        0 10px 30px rgba(0,0,0,.12);

    position: relative;

    overflow: hidden;
}

.hero-image-card::before{
    content: '';

    position: absolute;

    width: 220px;
    height: 220px;

    background: rgba(34,197,94,.10);

    border-radius: 50%;

    top: -100px;
    right: -100px;

    filter: blur(70px);
}

.gallery-item{
    position: relative;

    overflow: hidden;

    border-radius: 18px;

    cursor: pointer;

    height: 125px;

    border: 1px solid rgba(255,255,255,.08);

    transition: .35s;
}

.gallery-item:hover{
    transform: translateY(-6px);

    box-shadow:
        0 15px 35px rgba(34,197,94,.18);
}

.gallery-img{
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: .4s;
}

.gallery-item:hover .gallery-img{
    transform: scale(1.08);
}

.gallery-overlay{
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,.78),
            transparent
        );

    display: flex;
    align-items: flex-end;

    padding: 18px;
}

.gallery-text{
    color: white;

    font-size: 11px;

    line-height: 1.5;

    font-weight: 500;
}

.hero-image-card h3{
    font-size: 20px;
    color: #111827 !important;
}

.hero-image-card .text-light{
    color: #6b7280 !important;
    opacity: 1 !important;
}

.hero-image-card .badge{
    font-size: 11px;
}

/* FOOTER */

.footer-modern{
    margin-top: 90px;
    background: rgba(255,255,255,.04);
    backdrop-filter: blur(20px);
    border-top: 1px solid rgba(34,197,94,.10);
    padding: 60px 0 25px;
    position: relative;
    overflow: hidden;
}

.footer-modern::before{
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    background: rgba(34,197,94,.08);
    filter: blur(120px);
    top: -150px;
    right: -100px;
}

.footer-modern .container{
    position: relative;
    z-index: 2;
}

.footer-logo{
    width: 75px;
    height: 75px;
    object-fit: contain;
    filter:
        drop-shadow(0 0 18px rgba(34,197,94,.45));
}

.footer-title{
    color: white;
    font-weight: 700;
    font-size: 24px;
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
    transform: translateX(5px);
}

.footer-social{
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}

.footer-social a{
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(34,197,94,.10);

    color: #dcfce7;

    font-size: 18px;

    transition: .3s;

    box-shadow:
        0 0 18px rgba(34,197,94,.08);
}

.footer-social a:hover{
    background: linear-gradient(135deg,#22c55e,#10b981);

    color: white;

    transform: translateY(-4px);

    box-shadow:
        0 0 25px rgba(34,197,94,.35);
}

.footer-bottom{
    margin-top: 45px;

    padding-top: 25px;

    border-top: 1px solid rgba(34,197,94,.10);

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

/* PROFIL */
.user-icon{
    width: 58px;
    height: 58px;

    border-radius: 50%;

    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,.08);

    border: 1.5px solid rgba(255,255,255,.15);

    box-shadow:
        0 6px 18px rgba(0,0,0,.22);
}

.user-icon i{
    font-size: 24px;
    color: white;
}

.profile-image{
    width: 100%;
    height: 100%;

    object-fit: cover;

    border-radius: 50%;
}

/* MOBILE */

@media(max-width: 991px){

    .hero{
        padding-top: 130px;
        padding-bottom: 70px;
        text-align: center;
    }

    .hero-title{
        font-size: 42px;
        line-height: 1.25;
    }

    .hero-text{
        font-size: 15px;
        line-height: 1.9;
    }

    .hero-buttons{
        justify-content: center;
    }

    .hero-image-card{
        margin-top: 40px;
        padding: 28px 22px;
        border-radius: 28px;
    }

    .hero-image-card img{
        max-height: 240px;
    }

    /* NAVBAR MOBILE */

    .navbar-custom{
        padding: 8px 0;
    }

    .navbar-brand img{
        width: 70px;
        height: 70px;
    }

    .navbar-scrolled .navbar-brand img{
        width: 62px;
        height: 62px;
    }

    .navbar-toggler{
        padding: 8px 12px;
        border-radius: 14px;

        background: rgba(255,255,255,.05);

        border: 1px solid rgba(34,197,94,.15) !important;

        box-shadow:
            0 0 18px rgba(34,197,94,.08);
    }

    .navbar-toggler:focus{
        box-shadow:
            0 0 0 3px rgba(34,197,94,.15);
    }

    .navbar-collapse{

        margin-top: 18px;

        padding: 20px;

        border-radius: 24px;

        background: rgba(3,10,7,.82);

        backdrop-filter: blur(24px);

        border: 1px solid rgba(34,197,94,.12);

        box-shadow:
            0 0 30px rgba(34,197,94,.10),
            0 20px 40px rgba(0,0,0,.35);
    }

    .navbar-nav{
        align-items: stretch;
    }

    .nav-link{
        width: 100%;

        padding: 13px 16px !important;

        border-radius: 16px;

        font-size: 14px;
    }

    .user-box{
        margin-top: 10px;

        justify-content: center;

        padding: 12px;
    }

    .btn-modern{
        width: 100%;
    }

    .cta-title{
        font-size: 34px;
    }

    .cta-box{
        padding: 50px 25px;
    }

}

@media(max-width: 576px){

    .hero-title{
        font-size: 34px;
    }

    .hero-text{
        font-size: 15px;
    }

    .section-title{
        font-size: 30px;
    }

    .stats-number{
        font-size: 30px;
    }

    .navbar-brand img{
        width: 65px !important;
        height: 65px !important;
    }

}

</style>

</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">

    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">

            <img 
                src="{{ asset('images/logo.png') }}" 
                alt="Logo SMK"
                style="width:80px; height:80px; object-fit:contain;"
            >

        </a>

        {{-- TOGGLER --}}
        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- MENU KIRI --}}
            <ul class="navbar-nav mx-auto gap-lg-2 mt-3 mt-lg-0">

                <li class="nav-item">

                    <!-- <a href="/"
                        class="nav-link {{ request()->is('/') ? 'active-nav' : '' }}">

                        <i class="bi bi-house-door-fill me-1"></i>
                        Beranda

                    </a> -->

                </li>

                <li class="nav-item">

                    @auth

                        @if(auth()->user()->role == 'siswa')

                            <!-- <a href="{{ route('siswa.ekstrakurikuler.index') }}"
                               class="nav-link {{ request()->routeIs('siswa.ekstrakurikuler.*') ? 'active-nav' : '' }}">

                                <i class="bi bi-grid-fill me-1"></i>
                                Ekstrakurikuler

                            </a> -->

                        @else

                            <!-- <a href="{{ route('ekstrakurikuler.index') }}"
                               class="nav-link {{ request()->is('ekstrakurikuler*') ? 'active-nav' : '' }}">

                                <i class="bi bi-grid-fill me-1"></i>
                                Ekstrakurikuler

                            </a> -->

                        @endif

                    @else

                        <!-- <a href="{{ route('ekstrakurikuler.index') }}"
                           class="nav-link {{ request()->is('ekstrakurikuler*') ? 'active-nav' : '' }}">

                            <i class="bi bi-grid-fill me-1"></i>
                            Ekstrakurikuler

                        </a> -->

                    @endauth

                </li>

                @auth

                    @if(auth()->user()->role == 'admin')

                        <!-- <li class="nav-item">

                            <a href="/admin/dashboard"
                                class="nav-link {{ request()->is('admin/dashboard') ? 'active-nav' : '' }}">

                                <i class="bi bi-speedometer2 me-1"></i>
                                Dashboard

                            </a>

                        </li> -->

                    @else

                        <li class="nav-item">

                            @if(auth()->user()->role == 'siswa')

                                <!-- <a href="{{ route('siswa.konseling.index') }}"
                                   class="nav-link {{ request()->routeIs('siswa.konseling.*') ? 'active-nav' : '' }}">

                                    <i class="bi bi-chat-dots-fill me-1"></i>
                                    Konseling

                                </a> -->

                            @else

                                <!-- <a href="{{ route('konseling.index') }}"
                                   class="nav-link {{ request()->is('konseling*') ? 'active-nav' : '' }}">

                                    <i class="bi bi-chat-dots-fill me-1"></i>
                                    Konseling

                                </a> -->

                            @endif

                        </li>

                        <!-- <li class="nav-item">

                            <a href="/siswa/dashboard"
                                class="nav-link">

                                <i class="bi bi-person-workspace me-1"></i>
                                Dashboard

                            </a>

                        </li> -->

                    @endif

                @endauth

            </ul>

            {{-- MENU KANAN --}}
            <!-- <ul class="navbar-nav align-items-lg-center gap-2 mt-3 mt-lg-0">

                @auth

                    {{-- USER --}}
                    <li class="nav-item">

                        <div class="user-box">

                            <div class="user-icon">

                                @if(auth()->user()->foto)

                                    <img
                                        src="{{ asset('storage/' . auth()->user()->foto) }}"
                                        alt="Foto Profil"
                                        class="profile-image"
                                    >

                                @else

                                    <i class="bi bi-person-fill"></i>

                                @endif

                            </div>

                            <div>

                                <div class="user-name">
                                    {{ auth()->user()->name }}
                                </div>

                                <small class="user-role">
                                    {{ ucfirst(auth()->user()->role) }}
                                </small>

                            </div>

                        </div>

                    </li>

                    {{-- LOGOUT --}}
                     <li class="nav-item">

                        <form action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button class="btn btn-modern btn-danger-modern">

                                <i class="bi bi-box-arrow-right me-1"></i>
                                Logout

                            </button>

                        </form>

                    </li> -->

                @else

                    {{-- LOGIN --}}
                    <!-- <li class="nav-item">

                        <a href="{{ route('login') }}"
                            class="btn btn-modern btn-outline-modern">

                            Login

                        </a>

                    </li> -->

                    {{-- REGISTER --}}
                    <!-- <li class="nav-item">

                        <a href="{{ route('register') }}"
                            class="btn btn-modern btn-primary-modern">

                            Register

                        </a>

                    </li> -->

                @endauth

            </ul>

        </div>

    </div>

</nav>

{{-- HERO --}}
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h1 class="hero-title">

                    Temukan
                    <span>Ekstrakurikuler Terbaik</span>
                    Sesuai Minat & Bakatmu

                </h1>

                <p class="hero-text">

                    Sistem pakar modern untuk membantu siswa memilih
                    kegiatan ekstrakurikuler yang sesuai dengan
                    kemampuan, minat, dan potensi diri secara cepat,
                    akurat, dan menyenangkan.

                </p>

                <div class="hero-buttons d-flex flex-wrap gap-3">

                    @guest

                        <!-- <a href="{{ route('login') }}"
                            class="btn btn-modern btn-primary-modern btn-lg">

                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Mulai Sekarang

                        </a> -->

                        <!-- <a href="{{ route('register') }}"
                            class="btn btn-modern btn-outline-modern btn-lg">

                            <i class="bi bi-person-plus-fill me-2"></i>
                            Daftar

                        </a> -->

                    @else

                        @if(auth()->user()->role == 'admin')

                            <!-- <a href="/admin/dashboard"
                                class="btn btn-modern btn-primary-modern btn-lg">

                                <i class="bi bi-speedometer2 me-2"></i>
                                Masuk Dashboard

                            </a> -->

                        @else

                            <!-- <a href="{{ route('siswa.konseling.index') }}"
                                class="btn btn-modern btn-success-modern btn-lg">

                                <i class="bi bi-chat-dots-fill me-2"></i>
                                Mulai Konseling

                            </a> -->

                        @endif

                    @endguest

                </div>

            </div>

            <div class="col-lg-6">

    <!-- <div class="hero-image-card">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

            <div>

                <h3 class="text-white fw-bold mb-1">
                    Galeri Ekstrakurikuler
                </h3>

                <div class="text-light opacity-75">
                    Dokumentasi kegiatan siswa terbaru
                </div>

            </div>

            <span class="badge rounded-pill bg-success px-3 py-2">
                {{ \App\Models\GaleriEkstrakurikuler::count() }} Foto
            </span>

        </div>

        <div class="row g-3">

            @forelse(\App\Models\GaleriEkstrakurikuler::latest()->take(6)->get() as $galeri)

                <div class="col-6">

                    <div class="gallery-item">

                        <img
                            src="{{ asset('storage/' . $galeri->gambar_galeri) }}"
                            class="gallery-img"
                        >

                        <div class="gallery-overlay">

                            <div class="gallery-text">

                                {{ Str::limit($galeri->deskripsi_galeri, 40) }}

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center py-5">

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png"
                        width="120"
                        class="mb-3"
                    >

                    <h5 class="text-white fw-bold">
                        Belum Ada Galeri
                    </h5>

                    <div class="text-light opacity-75">
                        Foto kegiatan dari admin akan tampil di sini
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div> -->

<div class="hero-image-card">

    <div class="text-center mb-4">

        <img
            src="{{ asset('images/logo.png') }}"
            width="90"
            class="mb-3"
        >

        <h3 class="text-white fw-bold mb-1">
            Login User
        </h3>

        <div class="text-light opacity-75">
            Silakan login menggunakan akun siswa
        </div>

    </div>

    @if(session('error'))
        <div class="alert alert-danger rounded-4 text-center mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">

            <input
                type="text"
                class="form-control login-input"
                name="nim"
                id="nim"
                placeholder="NIS / Nomor Induk Siswa"
                inputmode="numeric"
                maxlength="20"
                required
            >

        </div>

        <div class="mb-4 position-relative">

            <input
                type="password"
                class="form-control login-input pe-5"
                name="password"
                id="loginPassword"
                placeholder="Masukkan Password"
                required
            >

            <i
                class="fas fa-eye toggle-password"
                onclick="togglePassword('loginPassword', this)"
            ></i>

        </div>

        <button
            type="submit"
            class="btn btn-success w-100 rounded-pill py-3 fw-bold"
        >
            Login Sekarang
        </button>

    </form>

    <!-- <a
        href="{{ url('/') }}"
        class="btn btn-outline-light w-100 rounded-pill py-3 mt-3"
    >
        ← Kembali ke Beranda
    </a> -->

</div>

        </div>

    </div>

</section>

<!-- {{-- STATISTIK --}}
<section class="stats-section">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div class="stats-number">
                        500+
                    </div>

                    <div class="stats-text">
                        Siswa Telah Menggunakan Sistem
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <div class="stats-number">
                        20+
                    </div>

                    <div class="stats-text">
                        Pilihan Ekstrakurikuler Menarik
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stats-card">

                    <div class="stats-icon">
                        <i class="bi bi-award-fill"></i>
                    </div>

                    <div class="stats-number">
                        100%
                    </div>

                    <div class="stats-text">
                        Tampilan Modern & Responsive
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- FITUR --}}
<section class="pb-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Fitur Unggulan
            </h2>

            <p class="section-subtitle mt-3">

                Sistem modern untuk membantu siswa
                dan sekolah lebih berkembang.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>

                    <h4 class="feature-title">
                        Konseling Online
                    </h4>

                    <p class="feature-text">

                        Siswa dapat melakukan konsultasi
                        dan tes minat bakat secara online.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <h4 class="feature-title">
                        Rekomendasi Akurat
                    </h4>

                    <p class="feature-text">

                        Sistem memberikan rekomendasi
                        ekstrakurikuler terbaik secara otomatis.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-phone-fill"></i>
                    </div>

                    <h4 class="feature-title">
                        Responsive Modern
                    </h4>

                    <p class="feature-text">

                        Tampilan modern yang nyaman digunakan
                        di laptop maupun smartphone.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section> -->

{{-- CTA --}}
<section class="cta-section">

    <div class="container">

        <div class="cta-box">

            <h2 class="cta-title">
                Yuk Temukan Ekstrakurikuler Favoritmu ✨
            </h2>

            <p class="cta-text">

                Bangun potensi, keterampilan, dan masa depanmu
                bersama sistem rekomendasi ekstrakurikuler modern.

            </p>

            <div class="mt-4">

                <!-- <a href="{{ route('register') }}" -->
                <a href="{{ url('/') }}"
                class="btn btn-modern btn-primary-modern btn-lg">

                    <i class="bi me-2"></i>
                    Mulai Sekarang

                </a>

            </div>

        </div>

    </div>

</section>

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

                        <!-- <a href="{{ route('ekstrakurikuler.index') }}">
                            <i class="bi bi-grid-fill me-2"></i>
                            Ekstrakurikuler
                        </a> -->

                        <!-- <a href="{{ route('login') }}"> -->
                        <a href="{{ url('/') }}">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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

<!-- new -->
 <script>

function togglePassword(inputId, icon){

    const input = document.getElementById(inputId);

    if(input.type === "password"){
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }else{
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }

}

</script>

</body>
</html>