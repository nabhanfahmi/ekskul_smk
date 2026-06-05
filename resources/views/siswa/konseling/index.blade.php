@extends('siswa.dashboard')

@section('siswa-content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.container{
    max-width: 900px;
}

.step{
    display:none;
}

.step.active{
    display:block;
}

.question-item{

    background:#ffffff;

    padding:20px;

    border-radius:20px;

    margin-bottom:18px;

    border:2px solid #e5e7eb;

    transition:.3s;
}

.question-item:hover{

    border-color:#22c55e;

    transform:translateY(-2px);
}

.check-wrapper{

    margin-top:15px;
}

.check-card{

    display:flex;

    align-items:center;

    gap:14px;

    padding:14px 16px;

    border-radius:14px;

    background:#f8fafc;

    border:2px solid #e5e7eb;

    cursor:pointer;

    transition:.25s;
}

.check-card:hover{

    border-color:#22c55e;

    background:#f0fdf4;
}

.form-check-input{

    width:26px !important;

    height:26px !important;

    cursor:pointer;

    border:2px solid #16a34a;
}

.form-check-input:checked{

    background-color:#16a34a;

    border-color:#16a34a;
}

.check-label{

    display:none;

    font-weight:600;

    color:#166534;
}

.form-check-input:checked + .check-label{

    display:inline-block;

    animation:fadeIn .25s ease;
}

.check-card.selected{

    background:#dcfce7;

    border-color:#22c55e;
}

@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(4px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

@media(max-width:768px){

    .container{
        max-width:100%;
    }

    .card-body{
        padding:22px !important;
    }

    .question-item{
        padding:16px;
    }

    h2{
        font-size:24px;
    }

    .check-card{
        padding:12px;
    }

    .form-check-input{

        width:24px !important;
        height:24px !important;
    }

    .check-label{
        font-size:14px;
    }
}

</style>

<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-5">

            <h2 class="text-center fw-bold text-success mb-4">
                Tes Minat & Bakat
            </h2>

            <p class="text-center text-muted mb-4">
                Ceklist sesuai dengan minat yang kamu miliki!.
            </p>

            <div class="mb-4">

    <div class="d-flex justify-content-between mb-2">

        <small class="text-muted">
            Progress Tes
        </small>

        <small
            class="text-success fw-semibold"
            id="progressText"
        >
            1/1
        </small>

    </div>

    <div class="progress">

        <div
            class="progress-bar bg-success"
            id="progressBar"
            style="width:0%"
        ></div>

    </div>

</div>

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

                            <div class="check-wrapper">

    <label
        class="check-card"
        for="check{{ $loop->index }}"
    >

        <input
            class="form-check-input"
            type="checkbox"
            name="jawaban[]"
            value="{{ $p['ekstrakurikuler_id'] }}"
            id="check{{ $loop->index }}"
        >

        <span class="check-label">

    ✓ Saya sesuai dengan pernyataan ini

</span>

    </label>

</div>

                            <!-- <div class="form-check border-0 bg-transparent p-0">

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

                            </div> -->

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
                    Simpan Hasil Jawaban
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

        const progressBar =
    document.getElementById("progressBar");

const progressText =
    document.getElementById("progressText");

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

    const percent =
        ((index + 1) / steps.length) * 100;

    progressBar.style.width =
        percent + "%";

    progressText.textContent =
        `${index + 1}/${steps.length}`;
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

    document
.querySelectorAll(".form-check-input")
.forEach(input => {

    input.addEventListener("change", function(){

        const card =
            this.closest(".check-card");

        if(this.checked){

            card.classList.add("selected");

        }else{

            card.classList.remove("selected");

        }

    });

});

    showStep(stepIndex);

});

</script>

@endsection