<div class="sidebar">

    <div class="logo">
        <i class="bi bi-mortarboard-fill"></i>
        EduStudent
    </div>

    {{-- DASHBOARD --}}
    <a href="{{ route('siswa.dashboard') }}"
       class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">

        <i class="bi bi-grid-fill"></i>
        Dashboard
    </a>

    {{-- KONSELING --}}
    <a href="{{ route('konseling.index') }}"
       class="{{ request()->routeIs('konseling.index') ? 'active' : '' }}">

        <i class="bi bi-chat-dots-fill"></i>
        Konseling
    </a>

    {{-- EKSTRAKURIKULER (SISWA) --}}
    <a href="{{ route('ekstrakurikuler.siswa') }}"
       class="{{ request()->routeIs('ekstrakurikuler.siswa') ? 'active' : '' }}">

        <i class="bi bi-trophy-fill"></i>
        Ekstrakurikuler
    </a>

    {{-- PROGRESS --}}
    <a href="#">

        <i class="bi bi-bar-chart-fill"></i>
        Progress

    </a>

    {{-- PROFIL (optional nanti) --}}
    <a href="#">

        <i class="bi bi-person-circle"></i>
        Profil Saya

    </a>

    {{-- LOGOUT --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </button>

    </form>

</div>