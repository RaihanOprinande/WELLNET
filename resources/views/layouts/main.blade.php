<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logotanpafont.png') }}" type="image/x-icon" />
    <title>Wellnet</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/quill/bubble.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/quill/snow.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Scroll khusus untuk tabel DataTables */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
        }

        .dataTables_wrapper {
            width: 100%;
            overflow-x: auto;
        }

        /* **PERBAIKAN CSS TAMBAHAN UNTUK MERAPIKAN DATA KOSONG** */
        .dataTables_empty {
            border-top: none !important;
            border-bottom: none !important;
        }

        /* Mengatur ulang margin pada dataTables_info agar tidak terlalu menempel jika kosong */
        .dataTables_wrapper .dataTables_info {
            font-size: 0.875rem;
            color: #555;
            padding-top: 10px;
            margin-top: 10px;
            /* Tambahkan sedikit jarak dari area tabel di atas */
        }

        /* **AKHIR PERBAIKAN CSS** */


        /* ==== DataTables Styling ==== */
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 6px 12px;
            outline: none;
            transition: all 0.2s ease;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #4f46e5;
            /* warna primary (biru keunguan) */
            box-shadow: 0 0 5px rgba(79, 70, 229, 0.3);
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 10px;
            padding: 5px 8px;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 10px;
            text-align: right;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            border-radius: 8px;
            margin: 0 2px;
            border: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #4f46e5 !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #6366f1 !important;
            color: white !important;
        }

        .hover-bg-warning:hover {
            background-color: #ffc107 !important;
            color: #fff !important;
        }

        .hover-bg-danger:hover {
            background-color: #ff0707 !important;
            color: #fff !important;
        }

        .hover-bg-info:hover {
            background-color: #77ff07 !important;
            color: #fff !important;
        }

        .transition {
            transition: all 0.3s ease;
        }

        .hover-bg-warning:hover i {
            color: #fff !important;
        }

        .hover-bg-danger:hover i {
            color: #fff !important;
        }

        .hover-bg-info:hover i {
            color: #fff !important;
        }
    </style>

</head>

<body>

    <div id="preloader">
        <div class="spinner"></div>
    </div>
    @include('layouts.sidebar')
    <main class="main-wrapper">
        @include('layouts.topbar')
        @yield('content')
        @include('layouts.footer')
    </main>

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
    {{-- <script src="{{ asset('assets/js/datatable.js') }}"></script> File yang memuat logika DataTables --}}
    <script src="{{ asset('assets/js/Sortable.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="path/to/chartjs/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- TEMPAT MODAL GLOBAL --}}
    @yield('modals')

    {{-- TEMPAT SCRIPT SPESIFIK HALAMAN --}}
    @yield('script')

    {{-- KODE MODAL GLOBAL & SCRIPT MODAL DI SINI (Dipindahkan dari Index) --}}

    {{-- MODAL SUKSES --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content card-style text-center">
                <div class="modal-body">
                    <div class="p-4">
                        <div style="color: #4CAF50; font-size: 80px;">
                            <i class="lni lni-checkmark-circle"></i>
                        </div>
                        <h2 class="mt-3">Success!</h2>
                        <p id="successModalMessage" class="mb-4">Data berhasil disimpan!</p>
                        <button type="button" class="main-btn primary-btn btn-hover"
                            data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL SUKSES --}}

    {{-- MODAL GAGAL --}}
    <div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content card-style text-center">
                <div class="modal-body">
                    <div class="p-4">
                        <div style="color: #f44336; font-size: 80px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                                class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                        <h2 class="mt-3">Failed!</h2>
                        <p id="failedModalMessage" class="mb-4">Terjadi kesalahan.</p>
                        <button type="button" class="main-btn danger-btn-outline btn-hover"
                            data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL GAGAL --}}

    {{-- MODAL KONFIRMASI HAPUS --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content card-style text-center">
                <div class="modal-body">
                    <div class="p-4">
                        <div style="color: #ffc107; font-size: 80px;">
                            <i class="lni lni-warning"></i>
                        </div>
                        <h2 class="mt-3">Konfirmasi Hapus</h2>
                        <p class="mb-4">Apakah Anda yakin ingin menghapus data ini secara permanen?</p>

                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="main-btn danger-btn-outline btn-hover m-2"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="main-btn primary-btn btn-hover m-2">Ya, Hapus!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL KONFIRMASI HAPUS --}}

    <script>
        $(document).ready(function() {
            // DataTables Initialization
            if ($('#table').length) {
                $('#table').DataTable({
                    searchable: true,
                    scrollX: true,
                    pageLength: 10,
                    ordering: true,
                    language: {
                        search: "",
                        searchPlaceholder: "Cari data...",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        zeroRecords: "Tidak ada data ditemukan", // Muncul di tengah tabel
                        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        infoEmpty: "Tidak ada data tersedia", // Muncul di bagian bawah info
                        infoFiltered: "(disaring dari total _MAX_ data)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "›",
                            previous: "‹"
                        }
                    }
                });
            }
        });

        // SCRIPT MODAL SUKSES & HAPUS (LOGIKA GLOBAL - Tidak diubah)
        document.addEventListener('DOMContentLoaded', function() {
            // LOGIKA MODAL SUKSES (Cek session dan tampilkan)
            @if (session('status') == 'success_modal')
                const successMessage = "{{ session('message') }}";
                document.getElementById('successModalMessage').innerText = successMessage;
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif

            @if (session('status') == 'failed_modal')
                const successMessage = "{{ session('message') }}";
                document.getElementById('failedModalMessage').innerText = successMessage;
                const successModal = new bootstrap.Modal(document.getElementById('failedModal'));
                successModal.show();
            @endif

            // LOGIKA MODAL KONFIRMASI HAPUS (Mempersiapkan form action)
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');

            if (deleteModal && deleteForm) {
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const itemId = button.getAttribute('data-id');
                    let baseUrl = button.getAttribute('data-base-url');

                    // Hapus ID placeholder '/0' dari URL dasar (jika ada)
                    if (baseUrl && baseUrl.endsWith('/0')) {
                        baseUrl = baseUrl.substring(0, baseUrl.length - 2);
                    }

                    if (baseUrl) {
                        let deleteUrl = baseUrl.endsWith('/') ? baseUrl : baseUrl + '/';
                        deleteUrl += itemId;
                        deleteForm.setAttribute('action', deleteUrl);
                    } else {
                        console.error('Error: data-base-url is missing on the delete button.');
                    }
                });
            }
        });

        // =========== Bar Chart (DIBIARKAN)
        const ctx2 = document.getElementById("Chart2").getContext("2d");
        const chart2 = new Chart(ctx2, {
            type: "bar",
            data: {
                /* ... */
            },
            options: {
                /* ... */
            },
        });
        // =========== Bar Chart end
    </script>
</body>

</html>
