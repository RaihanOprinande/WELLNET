<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-wellnet.svg') }}" type="image/x-icon" />
  <title>Sign In</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/quill/bubble.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/quill/snow.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>


<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ========== signin-section start ========== -->
  <section class="signin-section">
    <div class="container-fluid">
      <div class="row g-0 auth-row">
        <div class="col-lg-6">
          <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
              <div class="title text-center">
                <h1 class="text-primary mb-10">Selamat Datang Kembali</h1>
                <p class="text-medium">
                  Silakan masuk ke akun admin Anda untuk mengelola sistem.
                </p>
              </div>
              <div class="cover-image">
                <img src="assets/images/auth/signin-image.svg" alt="" />
              </div>
              <div class="shape-image">
                <img src="assets/images/auth/shape.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
          <div class="signin-wrapper">
            <div class="form-wrapper">
              <h6 class="mb-15">Sign In Form</h6>
              <p class="text-sm mb-25">
                Silakan masuk ke akun Anda untuk melanjutkan penggunaan sistem.
              </p>
              <form id="loginForm" action="#">
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Email</label>
                      <input id="email" type="email" placeholder="Masukkan email Anda" required />
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Password</label>
                      <input id="password" type="password" placeholder="Masukkan password Anda" required />
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-12 col-lg-12 col-md-12">
                    <div class="text-end mb-30">
                      <a href="reset-password.html" class="hover-underline">
                        Lupa Password?
                      </a>
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center">
                        Sign In
                      </button>
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </form>
              <div class="singin-option pt-40">
                <p class="text-sm text-medium text-dark text-center">
                  Belum punya akun?
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
              </div>
            </div>
          </div>

          <!-- ========== footer start =========== -->
          <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 order-last order-md-first">
                  <div class="copyright text-center">
                    <p class="text-sm">
                      Designed and Developed by
                      <a href="https://www.instagram.com/hydtech.official/" rel="nofollow" target="_blank">
                        Hydtech Team
                      </a>
                    </p>
                  </div>
                </div>
                <!-- end col-->
              </div>
              <!-- end row -->
            </div>
            <!-- end container -->
          </footer>
          <!-- ========== footer end =========== -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
  </section>
  <!-- ========== signin-section end ========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
<script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/js/world-merc.js') }}"></script>
<script src="{{ asset('assets/js/polyfill.js') }}"></script>
<script src="{{ asset('assets/js/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable.js') }}"></script>
<script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- CDN tetap langsung -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  {{-- <script>
    document.getElementById("loginForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      if (email === "hydtech@gmail.com" || password === "1234") {
        if (email !== "hydtech@gmail.com") {
          Swal.fire({
            title: 'Error!',
            text: 'Email anda salah, silahkan ulangi kembali',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
          })
        } else if (password !== "1234") {
          Swal.fire({
            title: 'Error!',
            text: 'Kata sandi anda salah, silahkan ulangi kembali',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
          })
        } else {
          setTimeout(() => {
            sessionStorage.setItem("isLoggedIn", "true");
            window.location.href = "dashboard.html";
          }, 500);
        }
      } else {
        Swal.fire({
          title: 'Error!',
          text: 'Email tidak terdaftar, silahkan daftar terlebih dahulu',
          icon: 'error',
          showConfirmButton: false,
          timer: 1500
        })
      }
    });
  </script> --}}
</body>

</html>
