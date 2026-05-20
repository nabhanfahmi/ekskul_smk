<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register User | SMK Syafi'i Akrom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px 20px;
            overflow:hidden;

            background:
            linear-gradient(rgba(5,8,22,0.78), rgba(5,8,22,0.78)),
            url('{{ asset("images/bgok.jpg") }}');

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
        }

        .stars{
            position:fixed;
            inset:0;

            background-image:
            radial-gradient(2px 2px at 20px 30px, #fff, transparent),
            radial-gradient(2px 2px at 40px 70px, #00e5ff, transparent),
            radial-gradient(1px 1px at 90px 40px, #7f5cff, transparent);

            background-size:200px 200px;

            opacity:0.25;

            animation:starsMove 100s linear infinite;
        }

        @keyframes starsMove{
            from{
                transform:translateY(0);
            }
            to{
                transform:translateY(-200px);
            }
        }

        .register-card{

    position:relative;
    z-index:2;

    width:100%;
    max-width:390px;

    background:rgba(255,255,255,0.06);

    border:1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(18px);

    border-radius:24px;

    padding:30px;

    box-shadow:
    0 0 30px rgba(0,200,83,0.20),
    0 0 60px rgba(0,230,118,0.06);

}

        .title{
    text-align:center;
    color:white;
    margin-bottom:22px;
    font-size:1.6rem;
    font-weight:700;
}

        .form-control{
    width:100%;
    height:48px;

    border:none;
    outline:none;

    border-radius:13px;

    padding:0 16px;

    margin-bottom:14px;

    background:rgba(255,255,255,0.08);

    color:white;

    font-size:14px;
}

        .form-control::placeholder{
            color:#d0d9ff;
        }

        .register-btn{

    width:100%;
    height:48px;

    border:none;

    border-radius:13px;

    background:linear-gradient(135deg,#00c853,#00e676);

    color:white;

    font-weight:600;

    font-size:14px;

    transition:0.4s;

}

        .register-btn:hover{
            transform:translateY(-3px);

            box-shadow:
            0 0 20px rgba(0,230,118,0.4);
        }

        .text-link{
            text-align:center;
            margin-top:20px;
        }

        .text-link a{
            color:#00e5ff;
            text-decoration:none;
        }

        .alert{
            padding:15px;
            border-radius:15px;
            margin-bottom:20px;
            background:#ff3d71;
            color:white;
        }

        .password-box{
    position:relative;
    margin-bottom:14px;
}

        .password-box .form-control{
            margin-bottom:0;
            padding-right:50px;
        }

        .toggle-password{
            position:absolute;
            right:18px;
            top:50%;
            transform:translateY(-50%);
            color:#d0d9ff;
            cursor:pointer;
            transition:0.3s;
        }

        .toggle-password:hover{
            color:#00e5ff;
        }

        @media(max-width:500px){

    .register-card{
        padding:24px 20px;
        border-radius:20px;
    }

    .title{
        font-size:1.4rem;
    }

}

    </style>
</head>

<body>

<div class="stars"></div>

<div class="register-card">

    <h1 class="title">Register User</h1>

    @if ($errors->any())
        <div class="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text"
               class="form-control"
               name="name"
               placeholder="Nama Lengkap"
               required>

        <input type="text"
                class="form-control"
                name="nim"
                id="nim"
                placeholder="NIM / Nomor Induk Siswa"
                inputmode="numeric"
                maxlength="20"
                required>

        <input type="email"
               class="form-control"
               name="email"
               placeholder="Email"
               required>

        <div class="password-box">
            <input type="password"
                class="form-control"
                name="password"
                id="registerPassword"
                placeholder="Password"
                required>

            <i class="fas fa-eye toggle-password"
            onclick="togglePassword('registerPassword', this)">
            </i>
        </div>

        <div class="password-box">
            <input type="password"
                class="form-control"
                name="password_confirmation"
                id="confirmPassword"
                placeholder="Konfirmasi Password"
                required>

            <i class="fas fa-eye toggle-password"
            onclick="togglePassword('confirmPassword', this)">
            </i>
        </div>

        <button type="submit" class="register-btn">
            Daftar Sekarang
        </button>

    </form>

    <div class="text-link">
        <a href="{{ route('login') }}">
            Sudah punya akun? Login di sini
        </a>
    </div>

</div>

<script>
    function togglePassword(inputId, icon){

        const input = document.getElementById(inputId);

        if(input.type === "password"){
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }else{
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }

    }
</script>

<!-- NIM -->
 <script>

    const nimInput = document.getElementById('nim');

    nimInput.addEventListener('input', function () {

        this.value = this.value.replace(/[^0-9]/g, '');

    });

</script>

</body>
</html>