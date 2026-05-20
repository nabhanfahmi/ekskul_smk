@extends('siswa.dashboard')

@section('siswa-content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    font-family: 'Poppins', sans-serif;
}

/* body{
    background:
        radial-gradient(circle at top left, rgba(59,130,246,.18), transparent 30%),
        radial-gradient(circle at bottom right, rgba(139,92,246,.18), transparent 30%),
        linear-gradient(135deg,#020617,#0f172a);

    min-height: 100vh;
} */

.profile-wrapper{
    min-height: 100vh;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 40px 20px;
}

.profile-card{
    width: 100%;
    max-width: 700px;

    background: rgba(255,255,255,.06);

    backdrop-filter: blur(20px);

    border: 1px solid rgba(255,255,255,.08);

    border-radius: 32px;

    padding: 40px;

    box-shadow:
        0 10px 40px rgba(0,0,0,.3);
}

.profile-header{
    text-align: center;
    margin-bottom: 35px;
}

.profile-avatar{
    width: 110px;
    height: 110px;

    border-radius: 50%;

    object-fit: cover;

    border: 4px solid rgba(255,255,255,.15);

    margin-bottom: 18px;

    box-shadow:
        0 10px 30px rgba(59,130,246,.25);
}

.profile-title{
    color: white;

    font-size: 32px;
    font-weight: 700;
}

.profile-subtitle{
    color: rgba(255,255,255,.65);

    margin-top: 8px;
}

.form-group{
    margin-bottom: 24px;
}

.form-label{
    color: rgba(255,255,255,.9);

    font-weight: 500;

    margin-bottom: 10px;

    display: block;
}

.form-control{
    background: rgba(255,255,255,.08) !important;

    border: 1px solid rgba(255,255,255,.08) !important;

    color: white !important;

    border-radius: 18px;

    padding: 16px;

    box-shadow: none !important;
}

.form-control:focus{
    border-color: #3b82f6 !important;

    background: rgba(255,255,255,.12) !important;
}

.form-control::placeholder{
    color: rgba(255,255,255,.45);
}

.alert-success-modern{
    background: rgba(34,197,94,.12);

    border: 1px solid rgba(34,197,94,.2);

    color: #bbf7d0;

    padding: 16px 20px;

    border-radius: 18px;

    margin-bottom: 25px;
}

.error-text{
    color: #fca5a5;

    font-size: 14px;

    margin-top: 8px;
}

.btn-save{
    width: 100%;

    border: none;

    padding: 16px;

    border-radius: 18px;

    background: linear-gradient(
        135deg,
        #3b82f6,
        #6366f1
    );

    color: white;

    font-weight: 600;

    font-size: 16px;

    transition: .3s;

    box-shadow:
        0 10px 25px rgba(59,130,246,.3);
}

.btn-save:hover{
    transform: translateY(-3px);

    box-shadow:
        0 15px 35px rgba(59,130,246,.4);
}

.back-btn{
    display: inline-flex;
    align-items: center;
    gap: 10px;

    text-decoration: none;

    color: rgba(255,255,255,.7);

    margin-top: 20px;

    transition: .3s;
}

.back-btn:hover{
    color: white;

    transform: translateX(-5px);
}

@media(max-width:768px){

    .profile-card{
        padding: 28px;
    }

    .profile-title{
        font-size: 26px;
    }

}

</style>

<div class="profile-wrapper">

    <div class="profile-card">

        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="alert-success-modern">

                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

            </div>

        @endif

        {{-- HEADER --}}
        <div class="profile-header">

            <img
                src="{{ auth()->user()->foto
                    ? asset('storage/' . auth()->user()->foto)
                    : 'https://i.pravatar.cc/200?u=' . auth()->user()->id }}"
                class="profile-avatar">

            <div class="profile-title">
                Edit Profil
            </div>

            <div class="profile-subtitle">
                Perbarui informasi akun siswa
            </div>

        </div>

        {{-- FORM --}}
        <form method="POST"
            action="{{ route('siswa.profil.update') }}"
            enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            {{-- FOTO PROFIL --}}
            <div class="form-group">

                <label class="form-label">
                    Foto Profil
                </label>

                <input
                    type="file"
                    name="foto"
                    class="form-control @error('foto') is-invalid @enderror">

                @error('foto')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- NAMA --}}
            <div class="form-group">

                <label class="form-label">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', auth()->user()->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Masukkan nama lengkap">

                @error('name')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- NISN / NOMOR INDUK SISWA --}}
            <div class="form-group">

                <label class="form-label">
                    NISN / Nomor Induk Siswa
                </label>

                <input
                    type="text"
                    name="nim"
                    value="{{ old('nim', auth()->user()->nim) }}"
                    class="form-control @error('nim') is-invalid @enderror"
                    placeholder="Masukkan NISN / Nomor Induk Siswa"
                    inputmode="numeric"
                    pattern="[0-9]*"
                    oninput="this.value=this.value.replace(/[^0-9]/g,'')">

                @error('nim')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- EMAIL --}}
            <div class="form-group">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', auth()->user()->email) }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email">

                @error('email')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- PASSWORD --}}
            <div class="form-group">

                <label class="form-label">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Kosongkan jika tidak diubah">

                @error('password')

                    <div class="error-text">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            {{-- KONFIRMASI PASSWORD --}}
            <div class="form-group">

                <label class="form-label">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password baru">

            </div>

            {{-- BUTTON --}}
            <button type="submit" class="btn-save">

                <i class="bi bi-check-circle-fill me-2"></i>
                Simpan Perubahan

            </button>

        </form>

        {{-- BACK --}}
        <a href="{{ route('siswa.dashboard') }}"
           class="back-btn">

            <i class="bi bi-arrow-left"></i>
            BATAL

        </a>

    </div>

</div>

@endsection