@extends('siswa.dashboard')

@section('siswa-content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

                        <canvas id="resultChart"></canvas>

                    </div>

                </div>

                {{-- REKOMENDASI --}}
                <div class="col-lg-7">

                    <div class="d-flex flex-column gap-4">

                        @foreach($rekomendasi as $item)

                            <div class="bg-light rounded-4 p-4 shadow-sm">

                                <div class="d-flex align-items-center gap-4 flex-wrap">

                                    {{-- GAMBAR --}}
                                    <img
                                        src="{{ asset('storage/'.$item['gambar']) }}"
                                        width="110"
                                        height="110"
                                        class="rounded-4 object-fit-cover"
                                    >

                                    {{-- INFO --}}
                                    <div class="flex-grow-1">

                                        <h4 class="fw-bold text-success mb-2">

                                            {{ $item['nama'] }}

                                        </h4>

                                        <div class="mb-2">

                                            <span class="badge bg-success">

                                                Skor:
                                                {{ $item['skor'] }}

                                            </span>

                                        </div>

                                        <p class="text-muted mb-0">

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

</p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const chartData = @json($skor);

const ctx =
    document.getElementById('resultChart');

new Chart(ctx, {

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

            }

        }

    }

});

</script>

@endsection