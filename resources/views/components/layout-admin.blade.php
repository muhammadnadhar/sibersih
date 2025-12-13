@props(['isSidebar' => false, 'admin' => null, 'css' => false])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SIBERSIH' }}</title>

    <!-- csss style include   -->
    @if ($css)
        @vite($css)
    @endif

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- bootstrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .cl-utama {
            color: #1E293B;
        }

        .cl-sidebar {
            color: #2B68FF;
        }

        .cl-sukses {
            color: #34D399;
        }

        .cl-proses {
            color: #FBBF24;
        }

        .cl-urgent {
            color: #F87171;
        }

        #color-abu-bg {
            color: #F8FAFC;
        }

        .cl-kartu {
            color: #FFFFFF;
        }

        /* BACKGROUND */
        .bg-utama {
            background-color: #1E293B;
        }

        .bg-sidebar {
            background-color: #2B68FF;
        }

        .bg-sukses {
            background-color: #34D399;
        }

        .bg-proses {
            background-color: #FBBF24;
        }

        .bg-urgent {
            background-color: #F87171;
        }

        .bg-abu {
            background-color: #F8FAFC;
        }

        .bg-kartu {
            background-color: #FFFFFF;
        }
    </style>

</head>

<body>

    <!-- validasi popup untuk "success" | "error" | " info" start-->
    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-sukses cl-kartu">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                            Berhasil
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu fw-semibold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('info'))
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-sidebar cl-kartu">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                            Terjadi Kesalahan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('info') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu fw-semibold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-urgent cl-kartu">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                            Terjadi Kesalahan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu fw-semibold" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <!-- validasi popup untuk "success" | "error" | " info" start-->

        <body class="d-flex">
            @if ($isSidebar)
                <!-- Sidebar start -->
                <nav class="d-flex flex-column p-3"
                    style="width: 250px; min-height: 100vh; background: var(--color-biru-sidebar); color: white;">
                    <h3 class="text-white mb-4"><i class="bi bi-speedometer2 me-2"></i>Admin {{ $admin ?? '' }}</h3>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item mb-2">
                            <a href="#users" class="nav-link text-white"><i class="bi bi-people me-2"></i>Kelola
                                Users</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#petugas" class="nav-link text-white"><i class="bi bi-person-badge me-2"></i>Kelola
                                Petugas</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#laporan" class="nav-link text-white"><i
                                    class="bi bi-file-earmark-text me-2"></i>Laporan</a>
                        </li>
                    </ul>
                </nav>
                <!-- Sidebar end -->
            @endif

            {{ $slot }}



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>


            <script>
                @if (session('success'))
                    const successModal = new bootstrap.Modal('#successModal');
                    successModal.show();
                @endif

                @if (session('info'))
                    const errorModal = new bootstrap.Modal('#infoModal');
                    errorModal.show();
                @endif
                @if (session('error'))
                    const errorModal = new bootstrap.Modal('#errorModal');
                    errorModal.show();
                @endif
            </script>

        </body>

</html>
