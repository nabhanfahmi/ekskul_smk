@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

/* GANTI SELURUH <style> YANG LAMA MENJADI INI */

<style>

*{
    font-family: 'Poppins', sans-serif;
}

body{
    background:
        linear-gradient(rgba(2,6,23,.84), rgba(3,10,7,.90)),
        url('{{ asset("images/bgok.jpg") }}');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    min-height: 100vh;
    overflow-x: hidden;
    position: relative;
}

/* GLOW HALUS */

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

/* WRAPPER */

.detail-wrapper{
    padding: 90px 0;
    position: relative;
    z-index: 2;
}

/* CARD */

.glass-card{
    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    backdrop-filter: blur(22px);

    border-radius: 32px;

    overflow: hidden;

    transition: .4s;

    box-shadow:
        0 0 25px rgba(34,197,94,.05);
}

.detail-image{
    width: 100%;
    height: 460px;
    object-fit: cover;
}

/* BADGE */

.badge-modern{
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 9px 18px;

    border-radius: 999px;

    background: rgba(34,197,94,.12);

    color: #86efac;

    font-size: 13px;

    border: 1px solid rgba(34,197,94,.12);
}

/* TITLE */

.detail-title{
    color: white;

    font-size: 44px;
    font-weight: 800;

    margin-top: 24px;

    line-height: 1.2;
}

/* DESC */

.detail-text{
    color: rgba(255,255,255,.74);

    line-height: 2;

    margin-top: 18px;

    font-size: 15px;
}

/* INFO */

.info-box{
    margin-top: 30px;

    background: rgba(255,255,255,.04);

    border-radius: 24px;

    padding: 24px;

    border: 1px solid rgba(255,255,255,.05);
}

.info-item{
    color: rgba(255,255,255,.82);

    font-size: 14px;

    margin-bottom: 16px;
}

.info-item:last-child{
    margin-bottom: 0;
}

.info-item i{
    color: #4ade80;
    margin-right: 10px;
}

/* BUTTON */

.btn-modern{
    border: none;

    border-radius: 16px;

    padding: 13px 24px;

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

/* GALERI */

.galeri-title{
    color: white;

    font-size: 28px;
    font-weight: 700;

    margin-top: 50px;
    margin-bottom: 24px;
}

.galeri-scroll{
    display: flex;
    gap: 20px;

    overflow-x: auto;

    padding-bottom: 10px;

    scroll-behavior: smooth;
}

.galeri-scroll::-webkit-scrollbar{
    height: 8px;
}

.galeri-scroll::-webkit-scrollbar-thumb{
    background: rgba(255,255,255,.15);
    border-radius: 999px;
}

.galeri-card{
    min-width: 290px;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    backdrop-filter: blur(20px);

    border-radius: 24px;

    overflow: hidden;

    cursor: pointer;

    transition: .35s;

    flex-shrink: 0;

    box-shadow:
        0 0 20px rgba(34,197,94,.04);
}

.galeri-card:hover{
    transform: translateY(-8px);

    box-shadow:
        0 15px 40px rgba(0,0,0,.35);
}

.galeri-img{
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.galeri-desc{
    padding: 16px;

    color: rgba(255,255,255,.72);

    line-height: 1.8;

    font-size: 14px;
}

/* MODAL */

.modal-content{
    background: rgba(3,10,7,.95);

    backdrop-filter: blur(22px);

    border-radius: 32px;

    border: 1px solid rgba(255,255,255,.06);

    overflow: hidden;
}

.modal-header{
    border-bottom: 1px solid rgba(255,255,255,.06);

    padding: 22px 26px;
}

.modal-title{
    color: white;
    font-weight: 700;
}

.btn-close{
    filter: invert(1);
}

.modal-body{
    padding: 34px;
}

/* POPUP */

.popup-layout{
    display: flex;
    align-items: center;
    gap: 30px;
}

.popup-image-box{
    width: 320px;
    flex-shrink: 0;
}

.popup-image{
    width: 100%;
    height: 320px;

    object-fit: cover;

    border-radius: 24px;

    border: 1px solid rgba(255,255,255,.06);
}

.popup-desc-box{
    flex: 1;

    background: rgba(255,255,255,.04);

    border-radius: 24px;

    padding: 28px;

    border: 1px solid rgba(255,255,255,.05);
}

.popup-desc{
    color: rgba(255,255,255,.76);

    line-height: 2;

    font-size: 15px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon{
    background-color: rgba(255,255,255,.15);

    border-radius: 50%;

    padding: 18px;
}

/* MOBILE */

@media(max-width: 991px){

    body{
        background-attachment: scroll;
    }

    .detail-wrapper{
        padding: 70px 0;
    }

    .detail-image{
        height: 320px;
    }

    .detail-title{
        font-size: 36px;
    }

    .popup-layout{
        flex-direction: column;
    }

    .popup-image-box{
        width: 100%;
    }

    .popup-image{
        height: 260px;
    }

}

@media(max-width: 576px){

    .container{
        padding-left: 16px;
        padding-right: 16px;
    }

    .detail-wrapper{
        padding: 50px 0;
    }

    .glass-card{
        border-radius: 24px;
    }

    .detail-image{
        height: 240px;
    }

    .detail-title{
        font-size: 28px;
    }

    .detail-text{
        font-size: 14px;
    }

    .info-box{
        padding: 18px;
        border-radius: 20px;
    }

    .galeri-card{
        min-width: 240px;
    }

    .galeri-img{
        height: 180px;
    }

    .modal-body{
        padding: 20px;
    }

    .popup-desc-box{
        padding: 20px;
    }

}

</style>

<div class="container detail-wrapper">

    <div class="glass-card">

        {{-- IMAGE --}}
        @if($ekstra->gambar && file_exists(public_path('storage/' . $ekstra->gambar)))

            <img
                src="{{ asset('storage/' . $ekstra->gambar) }}"
                class="detail-image"
                alt="{{ $ekstra->nama }}"
            >

        @else

            <img
                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop"
                class="detail-image"
            >

        @endif

        <div class="p-4 p-lg-5">

            {{-- CATEGORY --}}
            <span class="badge-modern">

                <i class="bi bi-stars"></i>
                {{ $ekstra->kategori }}

            </span>

            {{-- TITLE --}}
            <h1 class="detail-title">
                {{ $ekstra->nama }}
            </h1>

            {{-- DESCRIPTION --}}
            <p class="detail-text">

                @if($ekstra->deskripsi)

                    {{ $ekstra->deskripsi }}

                @else

                    Ekstrakurikuler ini membantu siswa
                    mengembangkan potensi, kreativitas,
                    dan kemampuan kerja sama tim.

                @endif

            </p>

            {{-- INFO --}}
            <div class="info-box">

                <div class="info-item">

                    <i class="bi bi-calendar-event-fill"></i>

                    <strong>Jadwal:</strong>
                    {{ $ekstra->jadwal ?? 'Belum tersedia' }}

                </div>

                <div class="info-item">

                    <i class="bi bi-person-fill"></i>

                    <strong>Pembina:</strong>
                    {{ $ekstra->pembina ?? 'Belum tersedia' }}

                </div>

                <div class="info-item">

                    <i class="bi bi-geo-alt-fill"></i>

                    <strong>Lokasi:</strong>
                    {{ $ekstra->lokasi ?? 'Belum tersedia' }}

                </div>

            </div>

            {{-- GALERI --}}
            @if($ekstra->galeri->count())

            <h3 class="galeri-title">
                <i class="bi bi-images me-2"></i>
                Galeri Kegiatan
            </h3>

            <div class="galeri-scroll">

                @foreach($ekstra->galeri as $index => $item)

                    <div
                        class="galeri-card"
                        data-bs-toggle="modal"
                        data-bs-target="#galeriModal"
                        onclick="slideTo({{ $index }})">

                        <img
                            src="{{ asset('storage/' . $item->gambar_galeri) }}"
                            class="galeri-img">

                        <div class="galeri-desc">

                            {{ Str::limit($item->deskripsi_galeri, 80) }}

                        </div>

                    </div>

                @endforeach

            </div>

            @endif

            {{-- BUTTON --}}
            <div class="mt-5 d-flex flex-wrap gap-3">

                <a href="{{ route('ekstrakurikuler.index') }}"
                    class="btn btn-modern btn-primary-modern">

                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

{{-- MODAL --}}
<div class="modal fade" id="galeriModal" tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Galeri Ekstrakurikuler
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <div id="carouselGaleri" class="carousel slide">

                    <div class="carousel-inner">

                        @foreach($ekstra->galeri as $index => $item)

                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="popup-layout">

                                    <div class="popup-image-box">

                                        <img
                                            src="{{ asset('storage/' . $item->gambar_galeri) }}"
                                            class="popup-image">

                                    </div>

                                    <div class="popup-desc-box">

                                        <div class="popup-desc">

                                            {{ $item->deskripsi_galeri }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <button class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselGaleri"
                            data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselGaleri"
                            data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function slideTo(index)
{
    let carousel = bootstrap.Carousel.getOrCreateInstance(
        document.getElementById('carouselGaleri')
    );

    carousel.to(index);
}

</script>

@endsection