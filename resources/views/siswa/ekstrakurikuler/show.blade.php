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
        radial-gradient(circle at top left, rgba(59,130,246,.15), transparent 30%),
        radial-gradient(circle at bottom right, rgba(139,92,246,.15), transparent 30%),
        linear-gradient(135deg, #020617, #0f172a);

        min-height: 100vh;
    } */

    .detail-wrapper{
        min-height: 100vh;
    }

    .glass-card{
        background: rgba(255,255,255,.07);
        backdrop-filter: blur(20px);

        border: 1px solid rgba(255,255,255,.08);
        border-radius: 30px;

        overflow: hidden;

        box-shadow: 0 20px 40px rgba(0,0,0,.25);
    }

    .cover-image{
        width: 100%;
        height: 420px;
        object-fit: cover;
    }

    .content-box{
        padding: 35px;
    }

    .badge-modern{
        background: rgba(59,130,246,.15);
        color: #93c5fd;

        padding: 8px 18px;
        border-radius: 50px;

        font-size: 13px;
        font-weight: 600;

        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .title{
        color: white;
        font-size: 42px;
        font-weight: 800;
        margin-top: 20px;
    }

    .description{
        color: rgba(255,255,255,.72);
        line-height: 1.9;
        margin-top: 25px;
        font-size: 15px;
    }

    .info-grid{
        margin-top: 35px;
    }

    .info-card{
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.06);

        border-radius: 24px;

        padding: 24px;
        height: 100%;
    }

    .info-icon{
        width: 55px;
        height: 55px;

        border-radius: 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: linear-gradient(135deg,#3b82f6,#6366f1);

        color: white;
        font-size: 22px;

        margin-bottom: 18px;
    }

    .info-title{
        color: rgba(255,255,255,.6);
        font-size: 14px;
        margin-bottom: 8px;
    }

    .info-value{
        color: white;
        font-size: 18px;
        font-weight: 700;
    }

    .btn-back{
        background: linear-gradient(135deg,#3b82f6,#6366f1);
        border: none;

        color: white;
        text-decoration: none;

        border-radius: 50px;

        padding: 14px 28px;

        font-weight: 600;

        transition: .3s;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-back:hover{
        transform: translateY(-3px);
        color: white;

        box-shadow: 0 12px 25px rgba(59,130,246,.35);
    }

    /* ======================
       GALERI
    ====================== */

    .galeri-title{
        color: white;
        font-size: 28px;
        font-weight: 700;
        margin-top: 55px;
        margin-bottom: 25px;
    }

    .galeri-scroll{
        display: flex;
        gap: 22px;
        overflow-x: auto;
        padding-bottom: 12px;
        scroll-behavior: smooth;
    }

    .galeri-scroll::-webkit-scrollbar{
        height: 8px;
    }

    .galeri-scroll::-webkit-scrollbar-thumb{
        background: rgba(255,255,255,.18);
        border-radius: 50px;
    }

    .galeri-card{
        min-width: 290px;
        max-width: 290px;

        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.08);

        border-radius: 26px;
        overflow: hidden;

        cursor: pointer;
        flex-shrink: 0;

        transition: .35s;
    }

    .galeri-card:hover{
        transform: translateY(-8px);
        box-shadow: 0 18px 30px rgba(0,0,0,.28);
    }

    .galeri-img{
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .galeri-desc{
        padding: 18px;
        color: rgba(255,255,255,.75);
        font-size: 14px;
        line-height: 1.8;
    }

    /* ======================
       MODAL
    ====================== */

    .modal{
    backdrop-filter: blur(10px);
}

.modal-backdrop.show{
    opacity: .45;
    background: rgba(3, 10, 18, .55);
}

    .modal-content{
    background: rgba(8,15,25,.45);

    backdrop-filter: blur(30px);

    border: 1px solid rgba(255,255,255,.08);

    border-radius: 32px;

    overflow: hidden;

    box-shadow:
        0 0 30px rgba(34,197,94,.12),
        0 0 80px rgba(34,197,94,.06),
        0 20px 60px rgba(0,0,0,.45);

    position: relative;
}

.modal-content::before{
    content: '';

    position: absolute;

    width: 280px;
    height: 280px;

    background: rgba(34,197,94,.10);

    border-radius: 50%;

    top: -120px;
    right: -100px;

    filter: blur(80px);

    z-index: 0;
}

.modal-content::after{
    content: '';

    position: absolute;

    width: 220px;
    height: 220px;

    background: rgba(16,185,129,.08);

    border-radius: 50%;

    bottom: -100px;
    left: -80px;

    filter: blur(80px);

    z-index: 0;
}

.modal-header,
.modal-body{
    position: relative;
    z-index: 2;
}

    .modal-header{
    border-bottom: 1px solid rgba(255,255,255,.08);
    padding: 20px 25px;
    background: rgba(255,255,255,.03);
}

    .modal-title{
    color: white;
    font-weight: 700;
}

    .btn-close{
    filter: invert(1);
}

    .modal-body{
    padding: 35px;
}

    .popup-layout{
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .popup-image-box{
        width: 280px;
        flex-shrink: 0;
    }

    .popup-image{
        width: 100%;
        height: 280px;
        object-fit: cover;

        border-radius: 24px;

        border: 1px solid rgba(255,255,255,.08);

        box-shadow: 0 15px 35px rgba(0,0,0,.35);
    }

    .popup-desc-box{
        flex: 1;

        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.08);

        border-radius: 28px;

        padding: 30px;

        backdrop-filter: blur(15px);
    }

    .popup-desc-title{
        color: white;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .popup-desc{
        color: rgba(255,255,255,.78);
        line-height: 2;
        font-size: 15px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon{
        background-color: rgba(0,0,0,.45);
        border-radius: 50%;
        padding: 18px;
    }

    @media(max-width:768px){

        .title{
            font-size: 30px;
        }

        .cover-image{
            height: 260px;
        }

        .content-box{
            padding: 25px;
        }

        .popup-layout{
            flex-direction: column;
        }

        .popup-image-box{
            width: 100%;
        }

        .popup-image{
            height: 240px;
        }

    }

</style>

<div class="container-fluid py-4 detail-wrapper">

    <a href="{{ route('siswa.ekstrakurikuler.index') }}"
       class="btn-back mb-4">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

    <div class="glass-card">

        {{-- COVER IMAGE --}}
        @if($ekstra->gambar && file_exists(public_path('storage/' . $ekstra->gambar)))

            <img
                src="{{ asset('storage/' . $ekstra->gambar) }}"
                class="cover-image"
                alt="{{ $ekstra->nama }}"
            >

        @else

            <img
                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop"
                class="cover-image"
                alt="Default"
            >

        @endif

        <div class="content-box">

            {{-- BADGE --}}
            <span class="badge-modern">

                <i class="bi bi-stars"></i>
                {{ $ekstra->kategori }}

            </span>

            {{-- TITLE --}}
            <h1 class="title">

                {{ $ekstra->nama }}

            </h1>

            {{-- DESCRIPTION --}}
            <div class="description">

                {{ $ekstra->deskripsi ?? 'Belum ada deskripsi ekstrakurikuler.' }}

            </div>

            {{-- INFO --}}
            <div class="row g-4 info-grid">

                <div class="col-md-4">

                    <div class="info-card">

                        <div class="info-icon">
                            📅
                        </div>

                        <div class="info-title">
                            Jadwal
                        </div>

                        <div class="info-value">
                            {{ $ekstra->jadwal ?? 'Belum tersedia' }}
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card">

                        <div class="info-icon">
                            👨‍🏫
                        </div>

                        <div class="info-title">
                            Pembina
                        </div>

                        <div class="info-value">
                            {{ $ekstra->pembina ?? 'Belum tersedia' }}
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="info-card">

                        <div class="info-icon">
                            📍
                        </div>

                        <div class="info-title">
                            Lokasi
                        </div>

                        <div class="info-value">
                            {{ $ekstra->lokasi ?? 'Belum tersedia' }}
                        </div>

                    </div>

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
                                class="galeri-img"
                            >

                            <div class="galeri-desc">

                                {{ Str::limit($item->deskripsi_galeri, 80) }}

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</div>

{{-- MODAL GALERI --}}
<div class="modal fade" id="galeriModal" tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bi bi-images me-2"></i>
                    Detail Galeri

                </h5>

                <button
                    type="button"
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

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselGaleri"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button
                        class="carousel-control-next"
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