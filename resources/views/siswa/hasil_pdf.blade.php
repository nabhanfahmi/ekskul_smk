<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Hasil Konseling</title>

    <style>

        body{
            font-family: sans-serif;
            padding: 30px;
            color: #222;
        }

        h1{
            text-align: center;
            color: #16a34a;
            margin-bottom: 40px;
        }

        .card{
            border: 1px solid #ddd;
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
            padding: 6px 12px;
            border-radius: 20px;
            margin-bottom: 15px;
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
        }

    </style>

</head>
<body>

    <h1>
        Hasil Rekomendasi Ekstrakurikuler
    </h1>

    @foreach($rekomendasi as $item)

        <div class="card">

            @if(isset($item['gambar']))
                <img
                    src="{{ public_path('storage/' . $item['gambar']) }}">
            @endif

            <div class="title">
                {{ $item['nama'] }}
            </div>

            <div class="score">
                Skor: {{ $item['skor'] }}
            </div>

            <div>

    @if($item['skor'] >= 7)

        Ekstrakurikuler ini sangat direkomendasikan untuk kamu karena
        hasil penilaian menunjukkan tingkat kecocokan yang sangat tinggi
        berdasarkan jawaban yang telah diberikan.

    @elseif($item['skor'] >= 5)

        Ekstrakurikuler ini direkomendasikan karena kamu memiliki
        minat dan kecocokan yang cukup baik pada bidang tersebut.

    @elseif($item['skor'] >= 3)

        Ekstrakurikuler ini cukup sesuai untuk kamu dan masih dapat
        membantu mengembangkan kemampuan maupun pengalaman baru.

    @else

        Ekstrakurikuler ini memiliki tingkat kecocokan yang rendah,
        namun tetap bisa dicoba untuk menambah pengalaman dan wawasan.

    @endif

</div>

        </div>

    @endforeach

    <div class="footer">

        Dicetak pada:
        {{ now()->format('d M Y H:i') }}

    </div>

</body>
</html>