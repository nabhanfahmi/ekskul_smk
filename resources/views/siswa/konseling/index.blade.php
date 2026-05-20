@extends('siswa.dashboard')

@section('siswa-content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.step{
    display:none;
}

.step.active{
    display:block;
}

.question-item{
    background:#f9fdf9;
    padding:14px;
    border-radius:12px;
    margin-bottom:14px;
    border:1px solid #e5e7eb;
}

</style>

<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-5">

            <h2 class="text-center fw-bold text-success mb-4">
                Tes Minat & Bakat
            </h2>

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif

            <form
                method="POST"
                action="{{ route('siswa.konseling.store') }}"
            >

                @csrf

                <div id="questionWrapper">

                    @foreach($pertanyaan as $p)

                        <div class="question-item">

                            <p class="fw-semibold mb-3">
                                {{ $p['pertanyaan'] }}
                            </p>

                            <div class="form-check mb-2 border-0 bg-transparent p-0">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="jawaban_{{ $loop->index }}"
                                    value="{{ $p['ekstrakurikuler_id'] }}"
                                    id="yes{{ $loop->index }}"
                                >

                                <label
                                    class="form-check-label"
                                    for="yes{{ $loop->index }}"
                                >
                                    Ya
                                </label>

                            </div>

                            <div class="form-check border-0 bg-transparent p-0">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="jawaban_{{ $loop->index }}"
                                    value=""
                                    id="no{{ $loop->index }}"
                                    checked
                                >

                                <label
                                    class="form-check-label"
                                    for="no{{ $loop->index }}"
                                >
                                    Tidak
                                </label>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div
                    class="d-flex justify-content-between mt-4"
                    id="navBtns"
                >

                    <button
                        type="button"
                        class="btn btn-secondary"
                        id="prevBtn"
                    >
                        Kembali
                    </button>

                    <button
                        type="button"
                        class="btn btn-success"
                        id="nextBtn"
                    >
                        Berikutnya
                    </button>

                </div>

                <button
                    type="submit"
                    class="btn btn-success w-100 mt-4 d-none"
                    id="submitBtn"
                >
                    Simpan Hasil Tes
                </button>

            </form>

        </div>

    </div>

</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

    const wrapper =
        document.getElementById("questionWrapper");

    const questions =
        Array.from(
            wrapper.querySelectorAll(".question-item")
        );

    const chunkSize = 5;

    let stepIndex = 0;

    wrapper.innerHTML = "";

    for(let i = 0; i < questions.length; i += chunkSize){

        let step = document.createElement("div");

        step.classList.add("step");

        if(i === 0){
            step.classList.add("active");
        }

        questions
            .slice(i, i + chunkSize)
            .forEach(q => step.appendChild(q));

        wrapper.appendChild(step);
    }

    const steps =
        document.querySelectorAll(".step");

    const prevBtn =
        document.getElementById("prevBtn");

    const nextBtn =
        document.getElementById("nextBtn");

    const submitBtn =
        document.getElementById("submitBtn");

    function showStep(index){

        steps.forEach((step,i)=>{

            step.classList.toggle(
                "active",
                i === index
            );

        });

        prevBtn.style.display =
            index === 0
            ? "none"
            : "inline-block";

        nextBtn.style.display =
            index === steps.length - 1
            ? "none"
            : "inline-block";

        if(index === steps.length - 1){

            submitBtn.classList.remove("d-none");

        }else{

            submitBtn.classList.add("d-none");

        }
    }

    nextBtn.addEventListener("click", ()=>{

        if(stepIndex < steps.length - 1){

            stepIndex++;

            showStep(stepIndex);

        }

    });

    prevBtn.addEventListener("click", ()=>{

        if(stepIndex > 0){

            stepIndex--;

            showStep(stepIndex);

        }

    });

    showStep(stepIndex);

});

</script>

@endsection