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

@if(count($rekomendasi))

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

@foreach($rekomendasi as $index => $item)

<div class="card">

    <div class="rank">
        Rekomendasi #{{ $index + 1 }}
    </div>

    <table class="table">

        <tr>

            <td class="image-col">

                @if(!empty($item['gambar']))
                    <img
                        src="{{ public_path('storage/'.$item['gambar']) }}"
                        class="image">
                @endif

            </td>

            <td class="info-col">

                <div class="nama">
                    {{ $item['nama'] }}
                </div>

                <span class="badge">
                    Skor: {{ $item['skor'] ?? 0 }}
                </span>

                <span class="badge badge-dark">
                    {{ $item['persen'] ?? 0 }}% Cocok
                </span>

                <div class="desc">

                    @if(($item['persen'] ?? 0) >= 80)

                        Ekstrakurikuler ini sangat direkomendasikan karena
                        tingkat kecocokan mencapai
                        {{ $item['persen'] }}%.
                        Hasil tes menunjukkan bahwa minat, potensi,
                        dan karakteristik yang kamu miliki sangat sesuai
                        dengan kegiatan ekstrakurikuler ini sehingga dapat
                        menjadi pilihan utama untuk dikembangkan.

                    @elseif(($item['persen'] ?? 0) >= 60)

                        Ekstrakurikuler ini direkomendasikan karena memiliki
                        tingkat kecocokan sebesar
                        {{ $item['persen'] }}%.
                        Kamu menunjukkan ketertarikan dan potensi yang cukup
                        baik pada bidang ini sehingga layak dipertimbangkan
                        sebagai salah satu pilihan utama.

                    @elseif(($item['persen'] ?? 0) >= 40)

                        Ekstrakurikuler ini memiliki tingkat kecocokan
                        sebesar {{ $item['persen'] }}%.
                        Kegiatan ini masih cukup sesuai dan dapat membantu
                        mengembangkan kemampuan, pengalaman, serta wawasan
                        baru yang bermanfaat bagi diri kamu.

                    @else

                        Tingkat kecocokan pada ekstrakurikuler ini sebesar
                        {{ $item['persen'] }}%.
                        Meskipun bukan rekomendasi utama, kegiatan ini tetap
                        dapat dicoba untuk memperluas pengalaman, relasi,
                        dan keterampilan di bidang yang berbeda.

                    @endif

                </div>

            </td>

        </tr>

    </table>

</div>

@endforeach

<div class="footer">

    Dicetak pada:
    {{ now()->format('d M Y H:i') }}

    <br><br>

    Sistem Rekomendasi Ekstrakurikuler Berbasis Tes Minat dan Bakat

</div>

</div>

</body>
</html>
