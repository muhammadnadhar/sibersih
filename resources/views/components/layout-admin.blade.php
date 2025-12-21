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
        /* ===== TEXT COLORS ===== */
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

        /* ===== BACKGROUND COLORS ===== */
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

        /* ===== HOVER EFFECTS ===== */
        .bg-utama-hover:hover {
            background-color: #162034;
            transition: 0.3s;
        }

        .bg-sidebar-hover:hover {
            background-color: #1e50e3;
            transition: 0.3s;
        }

        .bg-sukses-hover:hover {
            background-color: #28b07c;
            transition: 0.3s;
        }

        .bg-proses-hover:hover {
            background-color: #f9b825;
            transition: 0.3s;
        }

        .bg-urgent-hover:hover {
            background-color: #ef5d5d;
            transition: 0.3s;
        }

        .bg-kartu-hover:hover {
            background-color: #f0f0f0;
            transition: 0.3s;
        }

        /* ===== SHADOWS ===== */
        .shadow-utama {
            box-shadow: 0 4px 6px rgba(30, 41, 59, 0.3);
        }

        .shadow-sidebar {
            box-shadow: 0 4px 6px rgba(43, 104, 255, 0.3);
        }

        .shadow-sukses {
            box-shadow: 0 4px 6px rgba(52, 211, 153, 0.3);
        }

        .shadow-proses {
            box-shadow: 0 4px 6px rgba(251, 191, 36, 0.3);
        }

        .shadow-urgent {
            box-shadow: 0 4px 6px rgba(248, 113, 113, 0.3);
        }

        .shadow-kartu {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* ===== GRADIENTS ===== */
        .bg-utama-gradient {
            background: linear-gradient(135deg, #1E293B, #374151);
        }

        .bg-sidebar-gradient {
            background: linear-gradient(135deg, #2B68FF, #3f7bff);
        }

        .bg-sukses-gradient {
            background: linear-gradient(135deg, #34D399, #22c55e);
        }

        .bg-proses-gradient {
            background: linear-gradient(135deg, #FBBF24, #f59e0b);
        }

        .bg-urgent-gradient {
            background: linear-gradient(135deg, #F87171, #ef4444);
        }

        .bg-kartu-gradient {
            background: linear-gradient(135deg, #FFFFFF, #f3f4f6);
        }


        .z-index-admin {
            z-index: 50;
        }
    </style>

</head>

<body>

    <!-- validasi popup untuk "success" | "error" | " info" start-->
    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-sukses-gradient cl-kartu shadow-sukses">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2 fs-4"></i>Berhasil
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu-hover fw-semibold"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('info'))
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-sidebar-gradient cl-kartu shadow-sidebar">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>Info
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('info') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu-hover fw-semibold"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('warning'))
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-proses-gradient cl-kartu shadow-sidebar">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>Info
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('warning') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu-hover fw-semibold"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 bg-urgent-gradient cl-kartu shadow-urgent">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-semibold d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>Terjadi Kesalahan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body fs-6">
                        {{ session('error') }}
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-kartu-hover fw-semibold"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- validasi popup untuk "success" | "error" | " info" start-->

        <body>

            <!-- Sidebar start -->
            @if ($isSidebar)
            <header class="d-flex gap-3 header">
                {{-- Toggle Button untuk sidebar --}}
                <button class="btn bg-sidebar-gradient text-white shadow-sidebar"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
                    <i class="bi bi-list"></i>
                </button>

                <h3>Admin Panel</h3>


            </header>
            {{-- Offcanvas Sidebar --}}
            <div class="offcanvas offcanvas-end bg-sidebar-gradient text-white shadow-sidebar" tabindex="-1"
                id="adminSidebar" aria-labelledby="adminSidebarLabel">

                {{-- Header --}}
                <div class="offcanvas-header border-bottom border-white">
                    <h5 class="offcanvas-title" id="adminSidebarLabel">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Admin {{ $admin->name ?? '' }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                {{-- Body / Menu Dashboar --}}
                <div class="offcanvas-body p-3">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item mb-2">
                            <a href="#users" class="nav-link text-white bg-sidebar-hover rounded shadow-sm mb-1">
                                <i class="bi bi-people me-2"></i>
                                <span class="cl-kartu">Kelola Users</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#petugas" class="nav-link text-white bg-sidebar-hover rounded shadow-sm mb-1">
                                <i class="bi bi-person-badge me-2"></i>
                                <span class="cl-kartu">Kelola Petugas</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="#laporan" class="nav-link text-white bg-sidebar-hover rounded shadow-sm mb-1">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                <span class="cl-kartu">Laporans</span>
                            </a>
                        </li>
                    </ul>
                    {{-- menu untuk Admin --}}
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.profile') }}"
                                class="nav-link text-white bg-sidebar-hover rounded shadow-sm mb-1">
                                <i class="bi bi-people me-2"></i>
                                <span class="cl-kartu">Profile</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        @endif
        <!-- Sidebar end -->

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
