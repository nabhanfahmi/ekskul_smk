@extends('siswa.dashboard')

@section('siswa-content')

<style>

.page-title{
    color: white;
    font-size: 34px;
    font-weight: 700;

    line-height: 1.2;
}

.page-subtitle{
    color: rgba(255,255,255,.68);

    margin-top: 8px;

    font-size: 15px;
}

/* CARD */

.glass-card{
    background: rgba(255,255,255,.05);

    backdrop-filter: blur(22px);

    border: 1px solid rgba(255,255,255,.06);

    border-radius: 30px;

    overflow: hidden;

    transition: .35s;

    /* height: 100%; */

    position: relative;

    box-shadow:
        0 0 25px rgba(34,197,94,.05);
}

.glass-card a{
    display: block;
    overflow: hidden;
}

.glass-card::before{
    content: '';

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            180deg,
            rgba(255,255,255,.04),
            transparent
        );

    pointer-events: none;
}

.glass-card:hover{
    transform: translateY(-8px);

    border-color: rgba(34,197,94,.14);

    box-shadow:
        0 20px 45px rgba(0,0,0,.35),
        0 0 35px rgba(34,197,94,.08);
}

/* IMAGE */

.ekstra-image{
    width: 100%;
    /* height: 230px; */
    height: 140px;

    object-fit: cover;

    transition: .4s;

    margin-bottom: 10px;

    cursor: pointer;
}

.glass-card:hover .ekstra-image{
    transform: scale(1.06);
}

/* CONTENT */

.ekstra-content{
    /* padding: 24px; */
    padding: 5px;
}

/* BADGE */

.ekstra-badge{
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 6px 13px;

    border-radius: 999px;

    background: rgba(34,197,94,.10);

    border: 1px solid rgba(34,197,94,.12);

    color: #86efac;

    font-size: 10px;
    font-weight: 600;

    margin-bottom: 20px;
}

/* TITLE */

.ekstra-title{
    color: white;

    font-size: 18px;
    font-weight: 700;

    margin-bottom: 10px;

    line-height: 1.3;
}

/* DESC */

.ekstra-desc{
    color: rgba(255,255,255,.72);

    line-height: 1.8;

    font-size: 12px;

    margin-bottom: 22px;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: auto;

    /* min-height: 78px;

    font-size: 14px; */
}

/* INFO */

.info-item{
    display: flex;
    align-items: center;
    gap: 12px;

    color: rgba(255,255,255,.78);

    margin-bottom: 10px;

    font-size: 13px;
}

.info-item i{
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: rgba(34,197,94,.10);

    color: #4ade80;

    font-size: 12px;

    flex-shrink: 0;
}

/* BUTTON */

.btn-detail{
    width: 100%;

    border: none;

    border-radius: 18px;

    padding: 9px;

    margin-top: 9px;

    background:
        linear-gradient(
            135deg,
            #22c55e,
            #10b981
        );

    color: white;

    font-weight: 600;

    text-decoration: none;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    transition: .3s;

    box-shadow:
        0 10px 25px rgba(34,197,94,.22);
}

.btn-detail:hover{
    transform: translateY(-3px);

    color: white;

    box-shadow:
        0 18px 35px rgba(34,197,94,.30);
}

/* EMPTY */

.empty-box{
    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.06);

    border-radius: 32px;

    padding: 70px 30px;

    text-align: center;

    backdrop-filter: blur(20px);

    box-shadow:
        0 0 25px rgba(34,197,94,.05);
}

.empty-box img{
    width: 140px;

    margin-bottom: 22px;

    filter: drop-shadow(0 10px 20px rgba(34,197,94,.15));
}

.empty-title{
    color: white;

    font-size: 26px;
    font-weight: 700;
}

.empty-subtitle{
    color: rgba(255,255,255,.66);

    margin-top: 10px;

    font-size: 15px;
}

/* RESPONSIVE */

@media(max-width: 991px){

    .page-title{
        font-size: 28px;
    }

}

@media(max-width: 576px){

    .page-title{
        font-size: 24px;
    }

    .page-subtitle{
        font-size: 14px;
    }

    .glass-card{
        border-radius: 24px;
    }

    .ekstra-image{
        height: 210px;
    }

    .ekstra-content{
        padding: 20px;
    }

    .ekstra-title{
        font-size: 21px;
    }

    .btn-detail{
        border-radius: 16px;
    }

    .empty-box{
        padding: 55px 22px;
    }

}

</style>

<div class="container-fluid">

    <div class="mb-4">

        <h1 class="page-title">
            Ekstrakurikuler Sekolah
        </h1>

        <p class="page-subtitle">
            Lihat seluruh ekstrakurikuler yang diminati siswa
        </p>

    </div>

    <div class="row g-4">

        @forelse($data as $d)

            <div class="col-md-6 col-xl-4">

                <a href="{{ route('siswa.ekstrakurikuler.show', $d->id) }}"
                class= "text-decoration-none">
                <div class="glass-card">

                        @if($d->gambar)

                            <img
                                src="{{ asset('storage/' . $d->gambar) }}"
                                class="ekstra-image">

                        @else

                            <img
                                src="https://via.placeholder.com/600x400"
                                class="ekstra-image">

                        @endif
                    

                    <div class="ekstra-content">

                        <div class="ekstra-badge">
                            {{ $d->kategori }}
                        </div>

                        <h3 class="ekstra-title">
                            {{ $d->nama }}
                        </h3>

                        <div class="ekstra-desc">
                            {{ Str::limit($d->deskripsi, 80) }}
                        </div>

                        <div class="info-item">
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>{{ $d->jadwal ?? 'Jadwal belum tersedia' }}</span>
                        </div>

                        <div class="info-item">
                            <i class="bi bi-person-fill"></i>
                            <span>{{ $d->pembina ?? 'Pembina belum tersedia' }}</span>
                        </div>

                        <div class="info-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>{{ $d->lokasi ?? 'Lokasi belum tersedia' }}</span>
                        </div>

                        <!-- <a
                            href="{{ route('siswa.ekstrakurikuler.show', $d->id) }}"
                            class="btn-detail">

                            <i class="bi bi-eye-fill"></i>
                            Lihat Detail

                        </a> -->

                    </div>

                </div>
                </a>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-box">

                    <img
                        src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png">

                    <div class="empty-title">
                        Belum Ada Ekstrakurikuler
                    </div>

                    <div class="empty-subtitle mt-2">
                        Data ekstrakurikuler dari admin belum tersedia
                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection