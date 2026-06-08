@extends('siswa.dashboard')

@section('siswa-content')

<style>

.container{
    max-width:1400px;
}

/* =========================
   CARD UTAMA
========================= */

.result-card,
.card.shadow-lg{
    border:none;
    border-radius:32px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 25px 60px rgba(15,23,42,.08);
}

/* =========================
   HEADER
========================= */

.result-header{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    padding:35px;
    color:#fff;
}

.result-header h2{
    margin:0;
}

/* =========================
   CARD CHART
========================= */

.chart-box,
.bg-light{
    border-radius:24px !important;
}

.chart-sticky{
    position:sticky;
    top:25px;
}

/* =========================
   CARD REKOMENDASI
========================= */

.rekom-card{
    background:#fff;
    border-radius:24px;
    padding:26px;
    border:1px solid #eef2f7;
    box-shadow:0 12px 35px rgba(0,0,0,.05);
    transition:.3s ease;
}

.rekom-card:hover{
    transform:translateY(-4px);
    box-shadow:0 20px 45px rgba(0,0,0,.08);
}

.rekom-img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:20px;
    flex-shrink:0;
}

/* =========================
   REKOMENDASI CUSTOM
========================= */

.bg-light.rounded-4.shadow-sm{
    background:#fff !important;
    border:1px solid #eef2f7;
    padding:28px !important;
    border-radius:24px !important;
    box-shadow:0 10px 30px rgba(15,23,42,.05) !important;
    transition:.3s ease;
}

.bg-light.rounded-4.shadow-sm:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 40px rgba(15,23,42,.08) !important;
}

/* =========================
   ALTERNATIF
========================= */

.alternatif-card,
.card.border-0.shadow-sm{
    border-radius:20px !important;
    transition:.3s ease;
}

.card.border-0.shadow-sm:hover{
    transform:translateY(-3px);
}

.card.border-0.shadow-sm .card-body{
    padding:20px;
}

/* =========================
   BADGE
========================= */

.score-badge,
.badge{
    border-radius:999px;
    padding:8px 14px;
    font-weight:600;
    letter-spacing:.2px;
}

/* =========================
   TYPOGRAPHY
========================= */

h2{
    line-height:1.3;
}

h4{
    line-height:1.4;
}

p{
    line-height:1.8;
}

.text-muted{
    line-height:1.8;
}

/* =========================
   CHART AREA
========================= */

canvas{
    max-height:400px;
}

.border-top{
    margin-top:35px;
    padding-top:30px !important;
}

/* =========================
   BUTTON
========================= */

.download-btn{
    min-width:200px;
}

.btn-success{
    font-weight:600;
}

/* =========================
   SPACING
========================= */

.row.g-4{
    --bs-gutter-x:2rem;
    --bs-gutter-y:2rem;
}

.card-body.p-5{
    padding:2.5rem !important;
}

/* =========================
   TABLET
========================= */

@media (max-width:991px){

    .chart-sticky{
        position:relative;
        top:auto;
    }

    .card-body.p-5{
        padding:2rem !important;
    }

    .row.g-4{
        --bs-gutter-x:1.5rem;
        --bs-gutter-y:1.5rem;
    }

}

/* =========================
   MOBILE
========================= */

@media (max-width:768px){

    .container{
        padding-left:14px;
        padding-right:14px;
    }

    .card-body.p-5{
        padding:1.3rem !important;
    }

    h2{
        font-size:1.4rem;
    }

    h4{
        font-size:1.1rem;
    }

    .bg-light.rounded-4.shadow-sm{
        padding:18px !important;
    }

    .rekom-img,
    img.rounded-4.object-fit-cover{
        width:90px !important;
        height:90px !important;
    }

    .download-btn,
    .btn-success{
        width:100%;
    }

    .d-flex.align-items-center.gap-4.flex-wrap{
        gap:1rem !important;
    }

    canvas{
        max-height:300px;
    }

    .badge{
        font-size:.75rem;
    }

}

/* =========================
   SMALL MOBILE
========================= */

@media (max-width:480px){

    h2{
        font-size:1.25rem;
    }

    h4{
        font-size:1rem;
    }

    p{
        font-size:.92rem;
    }

    .card.border-0.shadow-sm .card-body{
        padding:16px;
    }

    .bg-light.rounded-4.shadow-sm{
        padding:16px !important;
    }

}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
    $rekomendasiUtama = collect($rekomendasi)->first();

    $rekomendasiAlternatif = null;

    if(isset($rekomendasiLainnya) && count($rekomendasiLainnya)){
        $rekomendasiAlternatif = collect($rekomendasiLainnya)->first();
    }

    $chartSkor = [];

    if($rekomendasiUtama){
        $chartSkor[$rekomendasiUtama['nama']] = $rekomendasiUtama['persen'];
    }

    if($rekomendasiAlternatif){
        $chartSkor[$rekomendasiAlternatif['nama']] = $rekomendasiAlternatif['persen'];
    }
@endphp

<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-5">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-5">

                <h2 class="text-success fw-bold mb-0">

                    Rekomendasi Ekstrakurikuler Untuk Kamu

                </h2>

                {{-- DOWNLOAD PDF --}}
                <a
                    href="{{ route('siswa.hasil.pdf') }}"
                    class="btn btn-success rounded-pill px-4 py-2 shadow-sm">

                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                    Download PDF

                </a>

            </div>

            <div class="row g-4">

                {{-- CHART --}}
                <div class="col-lg-5">

                    <div class="bg-light rounded-4 p-4 h-100">

    @if(count($skor))

        <canvas id="resultChart"></canvas>

    @else

        <div class="text-center text-muted py-5">

            Tidak ada data grafik.

        </div>

    @endif

{{-- REKOMENDASI ALTERNATIF --}}
@if(isset($rekomendasiLainnya) && count($rekomendasiLainnya))

<div class="mt-2">

    <div class="border-top pt-4">

        <h4 class="fw-bold text-secondary mb-3">

            Rekomendasi Alternatif

        </h4>

        <p class="text-muted small mb-4">

            Selain rekomendasi utama, berikut beberapa
            ekstrakurikuler lain yang juga memiliki tingkat
            kecocokan dengan minat dan potensi yang kamu miliki.

        </p>

        <div class="row g-3">

            @if($rekomendasiAlternatif)

<div class="col-12">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <div>

                    <h6 class="fw-bold mb-1">
                        {{ $rekomendasiAlternatif['nama'] }}
                    </h6>

                    <div class="d-flex gap-2 flex-wrap">

                        <span class="badge bg-secondary">
                            Skor:
                            {{ $rekomendasiAlternatif['skor'] }}
                        </span>

                        @php
                            $persen = $rekomendasiAlternatif['persen'] ?? 0;

                            if ($persen >= 80) {
                                $kategori = 'Sangat Tinggi';
                            } elseif ($persen >= 60) {
                                $kategori = 'Cukup Baik';
                            } elseif ($persen >= 40) {
                                $kategori = 'Sedang';
                            } else {
                                $kategori = 'Rendah';
                            }
                        @endphp

                        <span class="badge bg-dark">
                            {{ $persen }}% - {{ $kategori }}
                        </span>

                    </div>

                </div>

            </div>

            <p class="text-muted small mt-3 mb-0">

                @if($persen >= 80)

                    Sebagai rekomendasi alternatif, ekstrakurikuler ini memiliki tingkat kecocokan yang sangat tinggi yaitu {{ $persen }}%.

                @elseif($persen >= 60)

                    Ekstrakurikuler ini memiliki tingkat kecocokan sebesar {{ $persen }}% dan dapat menjadi pilihan alternatif yang baik.

                @elseif($persen >= 40)

                    Dengan tingkat kecocokan {{ $persen }}%, ekstrakurikuler ini masih dapat membantu mengembangkan kemampuan dan pengalaman baru.

                @else

                    Tingkat kecocokan sebesar {{ $persen }}% menunjukkan bahwa kegiatan ini bukan pilihan utama namun tetap dapat dicoba.

                @endif

            </p>

        </div>

    </div>

</div>

@endif

        </div>

    </div>

</div>

@endif

                    </div>

                </div>

                {{-- REKOMENDASI --}}
                <div class="col-lg-7">

                    <div class="d-flex flex-column gap-4">

                        @if($rekomendasiUtama)

<div class="bg-light rounded-4 p-4 shadow-sm">

    <div class="d-flex align-items-center gap-4 flex-wrap">

        <img
            src="{{ asset('storage/'.$rekomendasiUtama['gambar']) }}"
            width="110"
            height="110"
            class="rounded-4 object-fit-cover"
        >

        <div class="flex-grow-1">

            <h4 class="fw-bold text-success mb-2">
                {{ $rekomendasiUtama['nama'] }}
            </h4>

            <div class="mb-2 d-flex gap-2 flex-wrap">

                <span class="badge bg-success">
                    Skor:
                    {{ $rekomendasiUtama['skor'] }}
                </span>

                @php
                    $persen = $rekomendasiUtama['persen'] ?? 0;

                    if ($persen >= 80) {
                        $kategori = 'Sangat Tinggi';
                    } elseif ($persen >= 60) {
                        $kategori = 'Cukup Baik';
                    } elseif ($persen >= 40) {
                        $kategori = 'Sedang';
                    } else {
                        $kategori = 'Rendah';
                    }
                @endphp

                <span class="badge bg-dark">
                    {{ $persen }}%
                </span>

            </div>

            <p class="text-muted small mt-3 mb-0">

                {{ $rekomendasiUtama['deskripsi_rekomendasi'] }}

                <br><br>

                Tingkat kecocokan:
                <strong>{{ $persen }}%</strong>

                @if($persen >= 80)
                    (Sangat Tinggi)
                @elseif($persen >= 60)
                    (Cukup Baik)
                @elseif($persen >= 40)
                    (Sedang)
                @else
                    (Rendah)
                @endif

            </p>

        </div>

    </div>

</div>

@else

<div class="alert alert-warning rounded-4">

    <h5 class="mb-2">
        Belum Ada Rekomendasi
    </h5>

    <p class="mb-0">
        Berdasarkan jawaban yang diberikan,
        belum ditemukan kecocokan yang cukup
        terhadap ekstrakurikuler tertentu.
    </p>

</div>

@endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const chartData = @json($chartSkor);

const canvas =
    document.getElementById('resultChart');

if(canvas){

    new Chart(canvas, {

        type: 'doughnut',

        data: {

            labels: Object.keys(chartData),

            datasets: [{

                data: Object.values(chartData),

                backgroundColor: [
                    '#22c55e',
                    '#16a34a',
                    '#4ade80',
                    '#86efac',
                    '#15803d',
                    '#14532d'
                ],

                borderWidth: 0

            }]

        },

        options: {

            responsive: true,

            plugins: {

                legend: {

                    position: 'bottom'

                },

                tooltip: {

                    callbacks: {

                        label: function(context){

                            return context.label +
                                ': ' +
                                context.raw +
                                '%';
                        }

                    }

                }

            }

        }

    });

}

</script>

@endsection