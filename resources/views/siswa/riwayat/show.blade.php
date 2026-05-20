@extends('siswa.dashboard')

@section('siswa-content')

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-4 p-lg-5">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-5">

                <div>

                    <h2 class="fw-bold text-success mb-2">
                        Detail Hasil Konseling
                    </h2>

                    <p class="text-muted mb-0">
                        {{ $hasil->created_at->format('d M Y H:i') }}
                    </p>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2 flex-wrap">

                    {{-- DOWNLOAD PDF --}}
                    <a href="{{ route('siswa.hasil.pdf.detail', $hasil->id) }}"
                       class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-download me-1"></i>
                        Download PDF

                    </a>

                    {{-- KEMBALI --}}
                    <a href="{{ route('siswa.riwayat.index') }}"
                       class="btn btn-outline-success rounded-pill px-4">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </div>

            <div class="row g-4">

                @foreach($rekomendasi as $item)

                    <div class="col-lg-6">

                        <div class="border rounded-4 p-4 h-100">

                            <div class="d-flex gap-3 align-items-start">

                                <img
                                    src="{{ asset('storage/'.$item['gambar']) }}"
                                    width="110"
                                    height="110"
                                    class="rounded-4 object-fit-cover">

                                <div>

                                    <h4 class="fw-bold text-success">
                                        {{ $item['nama'] }}
                                    </h4>

                                    <div class="mb-2">

                                        <span class="badge bg-success">
                                            Skor: {{ $item['skor'] }}
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

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection