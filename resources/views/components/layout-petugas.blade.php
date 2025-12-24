@props(['isSidebar' => false, 'isFooter' => false, 'title' => 'SIBERSIh', 'css' => false])
{{-- Layout utama App --}}

<!DOCTYPE html>
<html lang="id">

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

        .floating-alert-container {
            position: fixed;
            top: 1.5rem;
            right: 2.5rem;
            z-index: 1055;
            display: flex;
            flex-direction: column;
        }

        .floating-alert-container .alert {
            margin: 0;
        }
    </style>
</head>

<body class="bg-utama-gradient">

    <div class="floating-alert-container">

        @if (session('success'))
            <div
                class="alert bg-sukses cl-kartu border-0 rounded-3 py-3 px-4
                d-flex gap-2 align-items-center justify-content-between
                alert-dismissible fade show shadow-sukses">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn" data-bs-dismiss="alert">X</button>
            </div>
        @endif

        @if (session('info'))
            <div
                class="alert bg-sidebar cl-kartu border-0 rounded-3 py-3 px-4
                d-flex gap-5 align-items-center justify-content-between
                alert-dismissible fade show shadow-sidebar">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <span>{{ session('info') }}</span>
                </div>
                <button type="button" class="btn" data-bs-dismiss="alert">X</button>
            </div>
        @endif

        @if (session('warning'))
            <div
                class="alert bg-proses cl-kartu border-0 rounded-3 py-3 px-4
                d-flex gap-2 align-items-center justify-content-between
                alert-dismissible fade show shadow-proses">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <span>{{ session('warning') }}</span>
                </div>
                <button type="button" class="btn " data-bs-dismiss="alert">X</button>
            </div>
        @endif

        @if (session('error'))
            <div
                class="alert bg-urgent cl-kartu border-0 rounded-3 py-3 px-4
                d-flex align-items-center justify-content-between
                alert-dismissible fade show shadow-urgent">
                <div class="d-flex align-items-center">
                    <i class="bi bi-x-circle-fill me-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="btn" data-bs-dismiss="alert">X</button>
            </div>
        @endif

    </div>

    <main class="d-md-flex gap-1 ">

        @if ($isSidebar)
            {{-- DESKTOP LEFT SIDEBAR --}}
            <nav
                class="d-none d-md-flex flex-column
           vh-100
           bg-sidebar-gradient shadow-sidebar px-3">
                {{-- APP LOGO / ICON --}}
                <div class="pt-4 pb-3 text-center">
                    <div class="mx-auto mb-2 rounded-circle bg-kartu shadow-kartu
                    d-flex align-items-center justify-content-center"
                        style="width:56px;height:56px;">

                        {{-- <i class="bi bi-shield-lock-fill fs-3 cl-sidebar"></i> --}}
                        <a class="nav-link" href="{{ route('index') }}">
                            <img style="width: 100%; height: 100%; border-radius: 50%;" src="{{ asset('favicon.ico') }}"
                                alt="SIBERSIH">
                        </a>
                    </div>
                    <div class="small fw-semibold cl-kartu">
                        SIBERSIH
                    </div>
                </div>

                <div class="d-flex flex-column justify-content-center flex-grow-1">
                    <ul class="navbar-nav gap-2 text-center">

                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a href="{{ route('petugas.dashboard') }}"
                                class="nav-link d-flex flex-column align-items-center
               cl-kartu fw-semibold rounded-3 px-3 py-3
               bg-kartu-hover shadow-kartu">
                                <i class="bi bi-speedometer2 fs-4 mb-1"></i>
                                <span class="small">Dashboard</span>
                            </a>
                        </li>

                        {{-- Laporan --}}
                        <li class="nav-item">
                            <a href="{{ route('petugas.laporan') }}"
                                class="nav-link d-flex flex-column align-items-center
               cl-kartu rounded-3 px-3 py-3
               bg-kartu-hover opacity-75">
                                <i class="bi bi-hourglass-split fs-4 mb-1"></i>
                                <span class="small">Laporan</span>
                            </a>
                        </li>

                        {{-- Peta --}}
                        <li class="nav-item">
                            <a href="{{ route('petugas.map') }}"
                                class="nav-link d-flex flex-column align-items-center
               cl-kartu rounded-3 px-3 py-3
               bg-kartu-hover opacity-75">
                                <i class="bi bi-geo-alt fs-4 mb-1"></i>
                                <span class="small">Peta</span>
                            </a>
                        </li>

                        {{-- Riwayat --}}
                        <li class="nav-item">
                            <a href="{{ route('petugas.history') }}"
                                class="nav-link d-flex flex-column align-items-center
               cl-kartu rounded-3 px-3 py-3
               bg-kartu-hover opacity-75">
                                <i class="bi bi-clock-history fs-4 mb-1"></i>
                                <span class="small">Riwayat</span>
                            </a>
                        </li>

                        {{-- Profil --}}
                        <li class="nav-item">
                            <a href="{{ route('petugas.profile') }}"
                                class="nav-link d-flex flex-column align-items-center
               cl-kartu rounded-3 px-3 py-3
               bg-kartu-hover opacity-75">
                                <i class="bi bi-person-circle fs-4 mb-1"></i>
                                <span class="small">Profil</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>


            {{-- sidebar (Mobile Version Alternative) --}}

            <nav class="navbar bg-primary text-white fixed-bottom shadow d-md-none">
                <ul class="navbar-nav d-flex flex-row justify-content-around w-100 text-center">

                    <li class="nav-item">
                        <a href="{{ route('petugas.dashboard') }}"
                            class="nav-link text-white d-flex flex-column align-items-center small fw-semibold">
                            <i class="bi bi-speedometer2 fs-4"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('petugas.laporan') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-file-earmark-text fs-4"></i>
                            Laporan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('petugas.history') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-people fs-4"></i>
                            riwayat
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('petugas.map') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-geo fs-4"></i>
                            Peta
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('petugas.profile') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-person-circle fs-4"></i>
                            Profil
                        </a>
                    </li>

                </ul>
            </nav>
        @endif

        {{ $slot }}
        <!-- Slot utama, isi halaman atau isi di dalamnya -->
    </main>

    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                bootstrap.Alert.getOrCreateInstance(alert).close();
            });
        }, 5000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @if ($isFooter)
        <footer>
            <p>exmaple aja</p>
        </footer>
    @endif

</body>
