<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Hasil Konseling</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            padding: 30px;
            color: #222;
        }

        h1{
            text-align: center;
            color: #16a34a;
            margin-bottom: 10px;
        }

        .subtitle{
            text-align: center;
            color: #666;
            margin-bottom: 35px;
            font-size: 13px;
        }

        .card{
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .title{
            font-size: 20px;
            font-weight: bold;
            color: #16a34a;
            margin-bottom: 10px;
        }

        .score{
            display: inline-block;
            background: #16a34a;
            color: white;
            padding: 7px 14px;
            border-radius: 20px;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        .detail{
            font-size: 13px;
            color: #666;
            margin-bottom: 15px;
        }

        .description{
            line-height: 1.7;
            text-align: justify;
        }

        img{
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .footer{
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

    </style>

</head>

<body>

    <h1>
        Hasil Rekomendasi Ekstrakurikuler
    </h1>

    <div class="subtitle">
        Berdasarkan hasil Tes Minat dan Bakat yang telah dilakukan
    </div>

    @foreach($rekomendasi as $item)

        <div class="card">

            @if(!empty($item['gambar']))
                <img
                    src="{{ public_path('storage/' . $item['gambar']) }}">
            @endif

            <div class="title">
                {{ $item['nama'] }}
            </div>

            <div class="score">
                Tingkat Kecocokan:
                {{ $item['persen'] ?? 0 }}%
            </div>

            <div class="detail">
                Skor Jawaban Cocok:
                {{ $item['skor'] ?? 0 }}
            </div>

            <div class="description">

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

        </div>

    @endforeach

    <div class="footer">

        Dicetak pada:
        {{ now()->format('d M Y H:i') }}

        <br><br>

        Sistem Rekomendasi Ekstrakurikuler

    </div>

</body>
</html>