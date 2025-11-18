<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="{{ asset('assets/images/logo/logotanpafont.png') }}" type="image/x-icon" />
  <title>Wellnet</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    .illustration {
  width: 85%;
  max-width: 380px;
  animation: floating 3.5s ease-in-out infinite;
}

/* ANIMASI FLOATING */
@keyframes floating {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-12px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes mascotMove {
  0% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-10px) rotate(1deg); }
  100% { transform: translateY(0) rotate(0deg); }
}

.illustration {
  animation: mascotMove 3.8s ease-in-out infinite;
}


    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #ffffff; /* Latar polos */
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
  width: 100%;
  max-width: 1200px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  border-radius: 30px;
  overflow: hidden;

  /* SHADOW LEBIH TEBAL */
  box-shadow:
      0 20px 50px rgba(0, 0, 0, 0.15),
      0 35px 70px rgba(0, 0, 0, 0.10);

  background: #ffffff;
}

    /* LEFT SIDE */
    .login-left {
      background: #f3f4f6; /* abu-abu lembut */
      padding: 80px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .login-left h1 {
      font-size: 38px;
      font-weight: 800;
      margin-bottom: 20px;
      color: #111827;
    }

    .login-left p {
      font-size: 17px;
      color: #4b5563;
      margin-bottom: 30px;
      line-height: 1.6;
      max-width: 400px;
    }

    .illustration {
  width: 85%;
  max-width: 380px;
  animation: mascotMove 3.8s ease-in-out infinite;

  /* SHADOW TEBAL */
  filter: drop-shadow(0px 10px 28px rgba(0, 0, 0, 0.45))
          drop-shadow(0px 18px 40px rgba(0, 0, 0, 0.30));
}


    /* RIGHT FORM */
    .login-right {
      padding: 80px 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .logo-wellnet {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.logo-wellnet img {
    width: 150px;        /* perbesar ukuran logo */
    height: auto;
}


    .login-title {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 10px;
      color: #1f2937;
      text-align: center;
    }

    .login-desc {
      color: #6b7280;
      margin-bottom: 35px;
      font-size: 15px;
      text-align: center;
    }

    .input-group {
      margin-bottom: 25px;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #374151;
      font-size: 14px;
    }

    .input-group input {
      width: 100%;
      padding: 15px 18px;
      border-radius: 14px;
      border: 1.8px solid #d1d5db;
      font-size: 15px;
      background: #f9fafb;
      transition: all 0.3s ease;
    }

    .input-group input:focus {
      outline: none;
      border-color: #6366f1;
      background: white;
      box-shadow: 10 10 10 10px rgba(99, 102, 241, 0.12);
    }

    .primary-btn {
      width: 100%;
      padding: 16px;
      background: #4f46e5;
      border: none;
      border-radius: 16px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    .primary-btn:hover {
      background: #4338ca;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(79, 70, 229, 0.25);
    }

    .custom-alert {
      padding: 14px 18px;
      border-radius: 12px;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 500;
      display: none;
    }

    .alert-danger {
      background: #fef2f2;
      color: #dc2626;
      border: 1px solid #fecaca;
    }

    .alert-success {
      background: #f0fdf4;
      color: #16a34a;
      border: 1px solid #bbf7d0;
    }

    .footer-text {
      margin-top: 25px;
      text-align: center;
      font-size: 13px;
      color: #9ca3af;
    }

    .footer-text a {
      color: #4f46e5;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <div class="login-container">

    <!-- LEFT -->
    <div class="login-left">
      <h1>Selamat Datang Admin</h1>
      <p>Akses dashboard Anda dengan mudah dan aman. Kelola seluruh kebutuhan Anda dalam satu platform.</p>

      <img src="{{ asset('assets/images/auth/login.png') }}"
     class="illustration"
     alt="Login Illustration">

    </div>

    <!-- RIGHT -->
    <div class="login-right">

      <div class="logo-wellnet">
        <img src="{{ asset('assets/images/logo/logowellnet.png') }}" alt="Wellnet Logo">
      </div>

      <h2 class="login-title">Sign In</h2>
      <p class="login-desc">Masukkan email dan password Anda untuk melanjutkan</p>

      <form method="POST" action="{{ route('login.process') }}">
        @csrf

        @if ($errors->any())
        <div class="custom-alert alert-danger" style="display: block;">
          {{ $errors->first() }}
        </div>
        @endif

        @if (session('success'))
        <div class="custom-alert alert-success" style="display: block;">
          {{ session('success') }}
        </div>
        @endif

        <div class="input-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
        </div>

        <div class="input-group" style="position: relative;">
  <label>Password</label>

  <input type="password" id="password" name="password" placeholder="Masukkan password" required>

  <span onclick="togglePassword()"
        style="position:absolute; right:15px; top:43px; cursor:pointer; font-size:14px;">
      👁
  </span>
</div>



        <button class="primary-btn">Masuk</button>
      </form>

      <div class="footer-text">
        © 2025 Wellnet • Developed by Hydtech
      </div>

    </div>

  </div>

<script>
function togglePassword() {
    const input = document.getElementById("password");
    input.type = input.type === "password" ? "text" : "password";
}
</script>



</body>

</html>
