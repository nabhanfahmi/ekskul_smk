<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Hasil Rekomendasi Ekstrakurikuler</title>

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    color:#1f2937;
    margin:0;
    padding:0;
    font-size:13px;
    line-height:1.7;
}

/* ======================
   HEADER
====================== */

.header{
    background:white;
    color:white;
    padding:25px 35px;
}

.header h1{
    margin:0;
    font-size:24px;
}

.header p{
    margin:5px 0 0;
    font-size:12px;
}

.logo-wrapper{
    text-align:center;
    margin-bottom:15px;
}

.logo{
    width:90px;
    height:90px;
    object-fit:contain;
}

/* ======================
   CONTENT
====================== */

.content{
    padding:25px;
}

.card{
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:18px;
    margin-bottom:18px;
}

.rank{
    display:inline-block;
    background:#dcfce7;
    color:#166534;
    font-weight:bold;
    font-size:12px;
    padding:6px 12px;
    border-radius:20px;
    margin-bottom:12px;
}

.table{
    width:100%;
    border-collapse:collapse;
}

.image-col{
    width:130px;
    vertical-align:top;
}

.info-col{
    vertical-align:top;
    padding-left:15px;
}

.image{
    width:115px;
    height:115px;
    object-fit:cover;
    border-radius:10px;
}

.nama{
    font-size:20px;
    font-weight:bold;
    color:#16a34a;
    margin-bottom:8px;
}

.badge{
    display:inline-block;
    background:#16a34a;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
    margin-right:5px;
}

.badge-dark{
    background:#1f2937;
}

.desc{
    margin-top:12px;
    text-align:justify;
}

.summary{
    background:#f0fdf4;
    border:1px solid #bbf7d0;
    border-radius:10px;
    padding:15px;
    margin-bottom:20px;
}

.summary-title{
    font-weight:bold;
    color:#166534;
    margin-bottom:8px;
}

/* ======================
   FOOTER
====================== */

.footer{
    margin-top:30px;
    text-align:center;
    font-size:11px;
    color:#6b7280;
    border-top:1px solid #e5e7eb;
    padding-top:15px;
}

</style>

</head>

<body>

<div class="header">

<div class="logo-wrapper">

    <img
        src="{{ public_path('images/logo.png') }}"
        class="logo"
        alt="Logo Sekolah">

</div>

</div>

<div class="content">
    @php
$rekomendasiUtama = $rekomendasiUtama ?? null;
$rekomendasiAlternatif = $rekomendasiAlternatif ?? null;
@endphp

@if(!empty($rekomendasiUtama) || !empty($rekomendasiAlternatif))

<div class="summary">

    <div class="summary-title">
        Kesimpulan Hasil Tes
    </div>

    Berdasarkan hasil pengisian tes minat dan bakat,
    sistem menemukan beberapa ekstrakurikuler yang
    memiliki tingkat kecocokan tertinggi dengan minat,
    potensi, dan karakteristik yang dimiliki siswa.

</div>

@endif

@if($rekomendasiUtama)

<div class="card">

    <div class="rank">
        Rekomendasi Utama
    </div>

    <table class="table">

        <tr>

            <td class="image-col">

                @if(!empty($rekomendasiUtama['gambar']))
                    <img
                        src="{{ public_path('storage/'.$rekomendasiUtama['gambar']) }}"
                        class="image">
                @endif

            </td>

            <td class="info-col">

                <div class="nama">
                    {{ $rekomendasiUtama['nama'] }}
                </div>

                <span class="badge">
                    Skor: {{ $rekomendasiUtama['skor'] ?? 0 }}
                </span>

                @php
                    $persen = $rekomendasiUtama['persen_chart'] ?? 0;

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

                {{-- <span class="badge badge-dark">
                    {{ $persen }}% - {{ $kategori }}
                </span> --}}

                <div class="desc">

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

                </div>

            </td>

        </tr>

    </table>

</div>

@endif

@if($rekomendasiAlternatif)

<div class="card">

<div class="rank">
    Rekomendasi Alternatif
</div>

<table class="table">

    <tr>

        <td class="image-col">

            @if(!empty($rekomendasiAlternatif['gambar']))
                <img
                    src="{{ public_path('storage/'.$rekomendasiAlternatif['gambar']) }}"
                    class="image">
            @endif

        </td>

        <td class="info-col">

            <div class="nama">
                {{ $rekomendasiAlternatif['nama'] }}
            </div>

            <span class="badge">
                Skor: {{ $rekomendasiAlternatif['skor'] ?? 0 }}
            </span>

            @php
                $persen = $rekomendasiAlternatif['persen_chart'] ?? 0;

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

            {{-- <span class="badge badge-dark">
                {{ $persen }}% - {{ $kategori }}
            </span> --}}

            <div class="desc">

                {{-- {{ $rekomendasiAlternatif['deskripsi_rekomendasi'] ?? '' }}

                <br><br>

                Tingkat kecocokan:
                <strong>{{ $persen }}%</strong> --}}

                @if($persen >= 80)

                    Sebagai rekomendasi alternatif, ekstrakurikuler ini memiliki tingkat kecocokan yang sangat tinggi yaitu {{ $persen }}%.

                @elseif($persen >= 60)

                    Ekstrakurikuler ini memiliki tingkat kecocokan sebesar {{ $persen }}% dan dapat menjadi pilihan alternatif yang baik.

                @elseif($persen >= 40)

                    Dengan tingkat kecocokan {{ $persen }}%, ekstrakurikuler ini masih dapat membantu mengembangkan kemampuan dan pengalaman baru.

                @else

                    Tingkat kecocokan sebesar {{ $persen }}% menunjukkan bahwa kegiatan ini bukan pilihan utama namun tetap dapat dicoba.

                @endif

            </div>

        </td>

    </tr>

</table>

</div>

@endif


<div class="footer">

    Dicetak pada:
    {{ now()->format('d M Y H:i') }}

    <br><br>

    Sistem Rekomendasi Ekstrakurikuler Berbasis Tes Minat dan Bakat

</div>

</div>

</body>
</html>
