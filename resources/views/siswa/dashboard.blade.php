@extends('layouts.app')

@section('content')

{{-- GOOGLE FONT --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- BOOTSTRAP ICON --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>

*{
    font-family: 'Poppins', sans-serif;
}

html{
    scroll-behavior: smooth;
}

body{
    background:
        linear-gradient(rgba(2,6,23,.86), rgba(3,10,7,.92)),
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

    background: rgba(34,197,94,.10);

    top: -120px;
    left: -120px;

    animation: glow1 8s infinite alternate ease-in-out;
}

body::after{
    width: 340px;
    height: 340px;

    background: rgba(16,185,129,.08);

    bottom: -120px;
    right: -120px;

    animation: glow2 10s infinite alternate ease-in-out;
}

@keyframes glow1{
    100%{
        transform: translate(35px,25px) scale(1.08);
    }
}

@keyframes glow2{
    100%{
        transform: translate(-25px,-15px) scale(1.08);
    }
}

/* SIDEBAR */

.sidebar{
    width: 290px;
    height: 100vh;

    position: fixed;
    top: 0;
    left: 0;

    padding: 24px;

    z-index: 1000;
    overflow-y: auto;

    background: rgba(255,255,255,.05);

    backdrop-filter: blur(22px);

    border-right: 1px solid rgba(255,255,255,.06);

    display: flex;
    flex-direction: column;

    transition: .35s ease;

    box-shadow:
        0 0 25px rgba(34,197,94,.05);
}

/* LOGO */

.logo{
    display: flex;
    align-items: center;
    gap: 16px;

    margin-bottom: 42px;

    padding: 14px 16px;

    border-radius: 26px;

    background: rgba(255,255,255,.04);

    border: 1px solid rgba(255,255,255,.05);

    backdrop-filter: blur(18px);

    box-shadow:
        0 10px 30px rgba(0,0,0,.18);

    transition: .3s ease;
}

.logo:hover{
    transform: translateY(-2px);

    border-color: rgba(34,197,94,.15);

    box-shadow:
        0 12px 35px rgba(34,197,94,.10);
}

/* LOGO IMAGE */

.logo-icon{
    flex-shrink: 0;

    width: 74px;
    height: 74px;

    border-radius: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    background:
        linear-gradient(
            135deg,
            rgba(34,197,94,.18),
            rgba(16,185,129,.10)
        );

    border: 1px solid rgba(255,255,255,.08);

    overflow: hidden;

    box-shadow:
        0 10px 30px rgba(34,197,94,.12);
}

.logo-icon img{
    width: 58px;
    height: 58px;

    object-fit: contain;
}

/* TEXT */

.logo-text{
    display: flex;
    flex-direction: column;
    justify-content: center;

    min-width: 0;
}

.logo-title{
    color: white;

    font-size: 20px;
    font-weight: 700;

    line-height: 1.3;

    letter-spacing: .3px;
}

.logo-subtitle{
    color: rgba(255,255,255,.62);

    font-size: 13px;

    margin-top: 4px;

    line-height: 1.5;
}

.welcome-hero{
    position: relative;

    overflow: hidden;

    text-align: center;

    padding: 70px 30px;

    border-radius: 36px;

    margin-bottom: 35px;

    background:
        linear-gradient(
            135deg,
            rgba(34,197,94,.16),
            rgba(16,185,129,.08)
        );

    border: 1px solid rgba(255,255,255,.08);

    backdrop-filter: blur(22px);

    box-shadow:
        0 15px 40px rgba(0,0,0,.22);
}

/* GLOW */

.welcome-hero::before{
    content: '';

    position: absolute;

    width: 280px;
    height: 280px;

    background: rgba(34,197,94,.15);

    border-radius: 50%;

    top: -120px;
    right: -120px;

    filter: blur(90px);
}

/* BADGE */

.welcome-badge{
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 10px 18px;

    border-radius: 999px;

    background: rgba(255,255,255,.08);

    border: 1px solid rgba(255,255,255,.10);

    color: #bbf7d0;

    font-size: 14px;
    font-weight: 600;

    margin-bottom: 28px;
}

/* LOGO */

.welcome-logo{
    margin-bottom: 25px;

    animation: floatLogo 4s ease-in-out infinite;
}

.welcome-logo img{
    width: 110px;
    height: 110px;

    object-fit: contain;

    filter:
        drop-shadow(0 0 25px rgba(34,197,94,.35));
}

@keyframes floatLogo{
    50%{
        transform: translateY(-8px);
    }
}

/* TITLE */

.welcome-title{
    font-size: clamp(38px, 6vw, 64px);

    font-weight: 800;

    margin-bottom: 20px;

    line-height: 1.2;

    background:
        linear-gradient(
            135deg,
            #ffffff,
            #86efac
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* TEXT */

.welcome-text{
    max-width: 760px;

    margin: auto;

    color: rgba(255,255,255,.78);

    font-size: clamp(15px, 2vw, 20px);

    line-height: 1.9;
}

/* BUTTONS */

.welcome-buttons{
    display: flex;
    justify-content: center;
    gap: 16px;

    flex-wrap: wrap;

    margin-top: 35px;
}

.welcome-btn{
    padding: 14px 26px;

    border-radius: 18px;

    text-decoration: none;

    font-weight: 600;

    transition: .3s ease;

    display: flex;
    align-items: center;
    gap: 10px;
}

.primary-btn{
    background:
        linear-gradient(
            135deg,
            #22c55e,
            #10b981
        );

    color: white;

    box-shadow:
        0 10px 25px rgba(34,197,94,.25);
}

.primary-btn:hover{
    transform: translateY(-4px);

    color: white;
}

.secondary-btn{
    background: rgba(255,255,255,.06);

    border: 1px solid rgba(255,255,255,.08);

    color: white;
}

.secondary-btn:hover{
    background: rgba(255,255,255,.10);

    color: white;

    transform: translateY(-4px);
}

@media(max-width:768px){

    .welcome-hero{
        padding: 55px 20px;
        border-radius: 28px;
    }

    .welcome-logo img{
        width: 85px;
        height: 85px;
    }

}


/* MOBILE */

@media(max-width: 991px){

    .logo{
        padding: 12px 14px;

        border-radius: 22px;
    }

    .logo-icon{
        width: 66px;
        height: 66px;

        border-radius: 18px;
    }

    .logo-icon img{
        width: 50px;
        height: 50px;
    }

    .logo-title{
        font-size: 18px;
    }

}

@media(max-width: 576px){

    .logo{
        gap: 12px;

        padding: 10px 12px;

        margin-bottom: 30px;
    }

    .logo-icon{
        width: 58px;
        height: 58px;

        border-radius: 16px;
    }

    .logo-icon img{
        width: 42px;
        height: 42px;
    }

    .logo-title{
        font-size: 16px;
    }

    .logo-subtitle{
        font-size: 12px;
    }

}

/* MENU */

.sidebar-menu{
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.sidebar-menu a{
    width: 100%;

    display: flex;
    align-items: center;
    gap: 14px;

    padding: 16px 18px;

    border-radius: 20px;

    color: rgba(255,255,255,.74);
    text-decoration: none;

    transition: .3s ease;

    font-size: 13px;

    font-weight: 500;
}

.sidebar-menu a i{
    font-size: 18px;
}

.sidebar-menu a:hover{
    background: rgba(34,197,94,.10);

    color: white;

    transform: translateX(5px);
}

.sidebar-menu a.active{
    background: rgba(34,197,94,.12);

    color: white;

    border: 1px solid rgba(34,197,94,.12);

    box-shadow:
        0 10px 25px rgba(34,197,94,.10);
}

/* USER CARD */

.user-card{
    margin-top: auto;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    border-radius: 28px;

    padding: 20px;

    backdrop-filter: blur(20px);
}

.user-avatar{
    width: 58px;
    height: 58px;

    border-radius: 50%;
    object-fit: cover;

    border: 2px solid rgba(255,255,255,.14);
}

.user-name{
    color: white;
    font-weight: 600;
    font-size: 16px;
}

.user-role{
    color: rgba(255,255,255,.6);
    font-size: 13px;
}

/* LOGOUT */

.logout-btn{
    width: 100%;
    margin-top: 18px;

    border: none;

    padding: 14px;

    border-radius: 18px;

    background: rgba(239,68,68,.14);

    color: #fca5a5;

    transition: .3s;

    font-weight: 600;
}

.logout-btn:hover{
    background: rgba(239,68,68,.24);

    color: white;

    transform: translateY(-2px);
}

/* MAIN */

.main-content{
    margin-left: 290px;
    padding: 35px;
}

/* TOPBAR */

.topbar{
    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    backdrop-filter: blur(22px);

    border-radius: 28px;

    padding: 22px 25px;

    margin-bottom: 28px;

    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;

    box-shadow:
        0 10px 30px rgba(0,0,0,.22);
}

.topbar-title{
    color: white;

    font-size: 30px;
    font-weight: 700;
}

.topbar-subtitle{
    color: rgba(255,255,255,.65);

    margin-top: 5px;
}

.topbar-right{
    display: flex;
    align-items: center;
    gap: 16px;
}

.notification{
    width: 50px;
    height: 50px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,.06);

    border: 1px solid rgba(255,255,255,.06);

    color: white;

    position: relative;

    transition: .3s;
}

.notification:hover{
    transform: translateY(-3px);
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

    box-shadow:
        0 0 10px rgba(34,197,94,.6);
}

.topbar-avatar{
    width: 50px;
    height: 50px;

    border-radius: 50%;
    object-fit: cover;

    border: 2px solid rgba(255,255,255,.14);
}

.profile-btn{
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 12px 20px;

    border-radius: 18px;

    text-decoration: none;

    background: linear-gradient(
        135deg,
        #22c55e,
        #10b981
    );

    color: white;

    font-weight: 600;

    transition: .3s;

    box-shadow:
        0 10px 25px rgba(34,197,94,.22);
}

.profile-btn:hover{
    transform: translateY(-3px);

    color: white;

    box-shadow:
        0 15px 30px rgba(34,197,94,.30);
}

/* MOBILE */

.mobile-toggle{
    display: none;
}

.sidebar-overlay{
    display: none;
}

/* RESPONSIVE */

@media(max-width: 991px){

    body{
        background-attachment: scroll;
    }

    .sidebar{
        left: -100%;
    }

    .sidebar.active{
        left: 0;
    }

    .sidebar-overlay.active{
        display: block;

        position: fixed;
        inset: 0;

        background: rgba(0,0,0,.5);

        z-index: 999;
    }

    .main-content{
        margin-left: 0;
        padding: 20px;
    }

    .mobile-toggle{
        position: fixed;
        top: 16px;
        left: 16px;

        z-index: 1001;

        display: flex;
        align-items: center;
        justify-content: center;

        width: 48px;
        height: 48px;

        border: 1px solid rgba(255,255,255,.08);

        border-radius: 16px;

        background: rgba(255,255,255,.06);

        backdrop-filter: blur(20px);

        color: white;
    }

    .topbar{
        margin-top: 60px;
    }

    .topbar-title{
        font-size: 24px;
    }

}

</style>

{{-- MOBILE BUTTON --}}
<button class="mobile-toggle" onclick="toggleSidebar()">
    <i class="bi bi-list fs-4"></i>
</button>

{{-- OVERLAY --}}
<div
    class="sidebar-overlay"
    id="sidebarOverlay"
    onclick="toggleSidebar()">
</div>

{{-- SIDEBAR --}}
<div class="sidebar" id="sidebar">

    {{-- LOGO --}}
<a href="{{ route('siswa.dashboard') }}"
   class="logo text-decoration-none">

    <div class="logo-icon">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo SMK">

    </div>

    <div class="logo-text">

        <div class="logo-title">
            SMK Syafi'i Akrom
        </div>

        <div class="logo-subtitle">
            Dashboard Siswa
        </div>

    </div>

</a>

    {{-- MENU --}}
    <div class="sidebar-menu">

        <!-- <a href="{{ route('home') }}"
           class="{{ request()->is('/') ? 'active' : '' }}">

            <i class="bi bi-house-door-fill"></i>
            <span>Beranda</span>

        </a> -->

        <!-- <a href="{{ route('siswa.dashboard') }}"
           class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>

        </a> -->

        <a href="{{ route('siswa.ekstrakurikuler.index') }}"
           class="{{ request()->routeIs('siswa.ekstrakurikuler.*') ? 'active' : '' }}">

            <i class="bi bi-trophy-fill"></i>
            <span>Informasi Ekstrakurikuler</span>

        </a>

        <a href="{{ route('siswa.konseling.index') }}"
           class="{{ request()->routeIs('siswa.konseling.*') ? 'active' : '' }}">

            <i class="bi bi-chat-dots-fill"></i>
            <span>Konseling</span>

        </a>

        <!-- <a href="{{ route('siswa.riwayat.index') }}"
        class="{{ request()->routeIs('siswa.riwayat.index*') ? 'active' : '' }}">

            <i class="bi bi-clock-history me-2"></i>
            Riwayat Konseling

        </a> -->

        <!-- <a href="{{ route('siswa.profil') }}"
        class="{{ request()->routeIs('siswa.profil*') ? 'active' : '' }}">

            <i class="bi bi-person-circle"></i>
            <span>Edit Profil</span>

        </a> -->

        <!-- <a href="{{ route('siswa.jadwal') }}"
           class="{{ request()->routeIs('siswa.jadwal') ? 'active' : '' }}">

            <i class="bi bi-calendar-event-fill"></i>
            <span>Jadwal</span>

        </a>

        <a href="{{ route('siswa.progress') }}"
           class="{{ request()->routeIs('siswa.progress') ? 'active' : '' }}">

            <i class="bi bi-graph-up-arrow"></i>
            <span>Progress</span>

        </a>

        <a href="{{ route('siswa.pengumuman') }}"
           class="{{ request()->routeIs('siswa.pengumuman') ? 'active' : '' }}">

            <i class="bi bi-megaphone-fill"></i>
            <span>Pengumuman</span>

        </a>

        <a href="{{ route('siswa.profil') }}"
           class="{{ request()->routeIs('siswa.profil') ? 'active' : '' }}">

            <i class="bi bi-person-circle"></i>
            <span>Profil Saya</span>

        </a> -->

    </div>

    {{-- USER CARD --}}
    <div class="user-card">

        <div class="d-flex align-items-center gap-3">

            <img
                src="{{ auth()->user()->foto
    ? asset('storage/' . auth()->user()->foto)
    : 'https://i.pravatar.cc/200?u=' . auth()->user()->id }}"
                class="user-avatar">

            <div>

                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    Siswa Aktif
                </div>

            </div>

        </div>

        {{-- LOGOUT --}}
        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button type="submit" class="logout-btn">

                <i class="bi bi-box-arrow-right me-2"></i>
                Logout

            </button>

        </form>

    </div>

</div>

{{-- MAIN --}}
<div class="main-content">

    {{-- TOPBAR --}}
@if(
    !request()->routeIs('siswa.ekstrakurikuler.*') &&
    !request()->routeIs('siswa.konseling.*')
)

<div class="topbar">

    <div>

        <div class="topbar-title">
            Dashboard Siswa
        </div>

        <!-- <div class="topbar-subtitle">
            Selamat datang di sistem ekstrakurikuler SMK Syafi'i Akrom
        </div> -->

    </div>

    <div class="topbar-right">

        <img
            src="{{ auth()->user()->foto
    ? asset('storage/' . auth()->user()->foto)
    : 'https://i.pravatar.cc/200?u=' . auth()->user()->id }}"
            class="topbar-avatar">

    </div>

</div>

<div class="welcome-hero">

    <!-- <div class="welcome-badge">
        <i class="bi bi-stars"></i>
        Dashboard Siswa Aktif
    </div> -->

    <div class="welcome-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo SMK">
    </div>

    <h1 class="welcome-title">
        Selamat Datang
    </h1>

    <p class="welcome-text">
        Jelajahi ekstrakurikuler terbaik,
        kembangkan bakatmu, dan raih prestasi
        bersama SMK Syafi'i Akrom.
    </p>

    <!-- <div class="welcome-buttons">

        <a href="{{ route('siswa.ekstrakurikuler.index') }}"
           class="welcome-btn primary-btn">

            <i class="bi bi-trophy-fill"></i>
            Lihat Ekstrakurikuler

        </a>

        <a href="{{ route('siswa.konseling.index') }}"
           class="welcome-btn secondary-btn">

            <i class="bi bi-chat-dots-fill"></i>
            Mulai Konseling

        </a>

    </div> -->

</div>

@endif

    {{-- CONTENT --}}
    @yield('siswa-content')

</div>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

AOS.init({
    duration: 1000,
    once: true
});

function toggleSidebar(){

    document.getElementById('sidebar')
    .classList.toggle('active');

    document.getElementById('sidebarOverlay')
    .classList.toggle('active');

}

/* AUTO CLOSE MOBILE */
document.querySelectorAll('.sidebar-menu a').forEach(link => {

    link.addEventListener('click', () => {

        if(window.innerWidth < 992){

            document.getElementById('sidebar')
            .classList.remove('active');

            document.getElementById('sidebarOverlay')
            .classList.remove('active');

        }

    });

});

</script>

@endsection