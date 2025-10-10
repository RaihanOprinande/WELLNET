<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-wellnet.svg') }}" type="image/x-icon" />
  <title>Sign Up</title>

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
                <h1 class="text-primary mb-10">Mulai Sekarang</h1>
                <p class="text-medium">
                  Silakan buat akun baru untuk mulai menggunakan sistem
                  <br class="d-sm-block" />
                  dan menikmati seluruh fitur yang tersedia.
                </p>
              </div>
              <div class="cover-image">
                <img src="assets/images/auth/signup-image.svg" alt="" />
              </div>
              <div class="shape-image">
                <img src="assets/images/auth/shape.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
          <div class="signup-wrapper">
            <div class="form-wrapper">
              <h6 class="mb-15">Sign Up Form</h6>
              <p class="text-sm mb-25">
                Silakan isi data berikut untuk membuat akun baru di sistem.
              </p>
              <form id="registerForm" action="#">
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
                      <label>Username</label>
                      <input id="username" type="text" placeholder="Masukkan username Anda" required />
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Kata Sandi</label>
                      <input id="password" type="password" placeholder="Masukkan kata sandi" required />
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Konfirmasi Kata Sandi</label>
                      <input id="confirmPassword" type="password" placeholder="Ulangi kata sandi" required />
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center">
                        Sign Up
                      </button>
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </form>
              <div class="signup-option pt-40">
                <p class="text-sm text-medium text-dark text-center">
                  Sudah memiliki akun?
                  <a href="{{ route('login') }}">Masuk di sini</a>
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
                    <p class="text-sm mb-5">
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
    document.getElementById("registerForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const email = document.getElementById("email").value;
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      if (email === "hydtech123@gmail.com") {
        Swal.fire({
          title: 'Warning!',
          text: 'Email sudah terdaftar',
          icon: 'warning',
          showConfirmButton: false,
          timer: 1500
        })
      } else {
        Swal.fire({
          title: 'Success!',
          text: 'Sign Up berhasil, email sedang di verifikasi oleh admin',
          icon: 'success',
          showConfirmButton: false,
          timer: 1500
        }).then(() => {
          setTimeout(() => {
            window.location.href = "signin.html";
          }, 500);
        });
      }
    });
  </script> --}}
</body>

</html>
