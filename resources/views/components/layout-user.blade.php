@props(['isSidebar' => false, 'isFooter' => false, 'title' => 'SIBERSIh'])
 {{-- Layout utama App --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'SIBERSIH' }}</title>
     {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body>

    <main class="d-md-flex gap-1">

@if ("isSidebar")
    {{-- Sidebar (Desktop) --}}
    <div class="d-none d-md-flex flex-column vh-100 bg-primary text-white p-4" style="width: 240px;">
        <h4 class="text-center fw-bold mb-4">🧹 SIBERSIH</h4>
        <nav class="nav flex-column">
            <a href="#" class="nav-link text-white bg-opacity-50 bg-primary rounded px-3 py-2 active">Dashboard</a>
            <a href="#" class="nav-link text-white px-3 py-2">Laporan Sampah</a>
            <a href="#" class="nav-link text-white px-3 py-2">Petugas</a>
            <a href="#" class="nav-link text-white px-3 py-2">Peta Lokasi</a>
            <a href="#" class="nav-link text-white px-3 py-2">Profil</a>
        </nav>
    </div>

    {{-- Bottom Navbar (Mobile) --}}
    <nav class="navbar navbar-expand bg-primary text-white fixed-bottom d-md-none">
        <ul class="navbar-nav d-flex justify-content-around w-100 text-center small">
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M13 5v14" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m2 0a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v4a2 2 0 002 2m10 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6" />
                    </svg>
                    Laporan
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2" />
                    </svg>
                    Petugas
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c0-3.866 3.134-7 7-7m0 0a7 7 0 010 14m0 0c-3.866 0-7-3.134-7-7m0 0a7 7 0 01-7 7" />
                    </svg>
                    Peta
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                    </svg>
                    Profil
                </a>
            </li>
        </ul>
    </nav>

    {{-- Sidebar (Mobile Version Alternative) --}}
    <nav class="navbar bg-primary text-white fixed-bottom shadow d-md-none">
        <ul class="navbar-nav d-flex flex-row justify-content-around w-100 text-center">
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex flex-column align-items-center small fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M3 13h18v8H3zm0-8h18v5H3z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white-50 d-flex flex-column align-items-center small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M11 2v20h2V2h-2zm-8 8v12h2V10H3zm16 4v6h2v-6h-2z" />
                    </svg>
                    Laporan
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white-50 d-flex flex-column align-items-center small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2" />
                    </svg>
                    Petugas
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white-50 d-flex flex-column align-items-center small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2C8.1 2 5 5.1 5 9c0 6.6 7 13 7 13s7-6.4 7-13c0-3.9-3.1-7-7-7zM12 11.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z" />
                    </svg>
                    Peta
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white-50 d-flex flex-column align-items-center small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 12c2.67 0 8 1.34 8 4v4H4v-4c0-2.66 5.33-4 8-4zm0-2a4 4 0 110-8 4 4 0 010 8z" />
                    </svg>
                    Profil
                </a>
            </li>
        </ul>
    </nav>
@endif


    {{ $slot }}
    <!-- Slot utama, isi halaman atau isi di dalamnya -->
    </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    @if ("isNavbar")
    <footer>
        <p>exmaple aja</p>
    </footer>

    @endif

</body>
