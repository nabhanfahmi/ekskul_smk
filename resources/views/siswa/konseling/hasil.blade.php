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

    @if(count($skor))

        <canvas id="resultChart"></canvas>

    @else

        <div class="text-center text-muted py-5">

            Tidak ada data grafik.

        </div>

    @endif

</div>

                </div>

                {{-- REKOMENDASI --}}
                <div class="col-lg-7">

                    <div class="d-flex flex-column gap-4">

                        @if(count($rekomendasi))

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

                                        <div class="mb-2 d-flex gap-2 flex-wrap">

    <span class="badge bg-success">

        Skor:
        {{ $item['skor'] }}

    </span>

    <span class="badge bg-dark">

        {{ $item['persen'] }}%
        Cocok

    </span>

</div>

                                        <p class="text-muted mb-0">

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

</p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

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

const chartData = @json($skor);

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