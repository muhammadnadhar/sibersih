@props(['css' => false, 'isSidebar' => false, 'isFooter' => false, 'title' => 'SIBERSIh'])
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SIBERSIH' }}</title>

    <!-- csss style include   -->
    @if ($css)
        @vite('resources/css/base/index.css')
    @endif

    <!-- boostrap v5 -->
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

    @if (session('success'))
        <div class="alert bg-sukses cl-kartu border-0 rounded-3 py-3 px-4 d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if (session('info'))
        <div class="alert bg-sidebar cl-kartu border-0 rounded-3 py-3 px-4 d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <span>{{ session('info') }}</span>
        </div>
      @endif

  @if (session('warning'))
        <div class="alert bg-proses cl-kartu border-0 rounded-3 py-3 px-4 d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <span>{{ session('info') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="alert bg-urgent cl-kartu border-0 rounded-3 py-3 px-4 d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <main class="d-md-flex gap-1">

        @if ($isSidebar)
            {{-- Sidebar (Desktop) --}}
            <div class="d-none d-md-flex flex-column vh-100 bg-primary text-white p-4" style="width: 240px;">
                <h4 class="text-center fw-bold mb-4"> SIBERSIH</h4>
                <nav class="nav flex-column">
                    <a href="{{ route('user.dashboard') }}"
                        class="nav-link text-white bg-opacity-50 bg-primary rounded px-3 py-2 active">Dashboard</a>
                    <a href="#" class="nav-link text-white px-3 py-2">Laporan Sampah</a>
                    <a href="#" class="nav-link text-white px-3 py-2">Petugas</a>
                    <a href="#" class="nav-link text-white px-3 py-2">Peta Lokasi</a>
                    <a href="#" class="nav-link text-white px-3 py-2">Profil</a>
                </nav>
            </div>

            {{-- Bottom Navbar (Destop) --}}
            <nav class="navbar navbar-expand bg-primary text-white fixed-bottom d-md-none">
                <ul class="navbar-nav d-flex justify-content-around w-100 text-center small">

                    <li class="nav-item">
                        <a href="{{ route('user.dashboard') }}"
                            class="nav-link text-white d-flex flex-column align-items-center">
                            <i class="bi bi-speedometer2 fs-5"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.laporan') }}"
                            class="nav-link text-white d-flex flex-column align-items-center">
                            <i class="bi bi-hourglass-split"></i>
                            Laporan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.map') }}"
                            class="nav-link text-white d-flex flex-column align-items-center">
                            <i class="bi bi-geo-alt fs-5"></i>
                            Peta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.history') }}"
                            class="nav-link text-white d-flex flex-column align-items-center">
                            <i class="bi bi-geo-alt fs-5"></i>
                            history
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}"
                            class="nav-link text-white d-flex flex-column align-items-center">
                            <i class="bi bi-person-circle fs-5"></i>
                            Profil
                        </a>
                    </li>

                </ul>
            </nav>

            {{-- Sidebar (Mobile Version Alternative) --}}
            <nav class="navbar bg-primary text-white fixed-bottom shadow d-md-none">
                <ul class="navbar-nav d-flex flex-row justify-content-around w-100 text-center">

                    <li class="nav-item">
                        <a href="{{ route('user.dashboard') }}"
                            class="nav-link text-white d-flex flex-column align-items-center small fw-semibold">
                            <i class="bi bi-speedometer2 fs-4"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.laporan') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-file-earmark-text fs-4"></i>
                            Laporan
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('user.map') }}"
                            class="nav-link text-white-50 d-flex flex-column align-items-center small">
                            <i class="bi bi-geo fs-4"></i>
                            Peta
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.history') }}"
                            class="nav-link text-white d-flex flex-column align-items-center small">
                            <i class="bi bi-geo-alt fs-5"></i>
                            history
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href=" {{ route('user.profile') }} "
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


    @if ($isFooter)
        <footer>
            <p>exmaple aja</p>
        </footer>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
