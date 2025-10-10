<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-wellnet.svg') }}" type="image/x-icon" />
  <title>Dashboard</title>

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

  @include('layouts.sidebar')
  <main class="main-wrapper">
    @include('layouts.topbar')
    @yield('content')
    @include('layouts.footer')
  </main>

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

  <script>
    // =========== Bar Chart
    const ctx2 = document.getElementById("Chart2").getContext("2d");
    const chart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: [
          "Seedling",
          "Sprout",
          "Explorer",
          "Trailblazer",
          "Mountaineer",
          "Skywalker",
          "Digital Sage",
        ],
        datasets: [{
          label: "",
          backgroundColor: "#4A6CF7",
          borderRadius: 30,
          data: [80, 70, 100, 70, 65, 80, 69],
        }, ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              titleColor: function(context) {
                return "#8F92A1";
              },
              label: function(context) {
                let label = context.dataset.label || "";
                if (label) label += ": ";
                label += context.parsed.y;
                return label;
              },
            },
            backgroundColor: "#F3F6F8",
            titleAlign: "center",
            bodyAlign: "center",
            titleFont: {
              size: 12,
              weight: "bold",
              color: "#8F92A1",
            },
            bodyFont: {
              size: 16,
              weight: "bold",
              color: "#171717",
            },
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
          },
        },
        layout: {
          padding: {
            top: 15,
            right: 15,
            bottom: 15,
            left: 15,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          title: {
            display: false,
          },
        },
      },
    });
    // =========== Bar Chart end
  </script>

</body>

</html>
