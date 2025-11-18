@props(['isSidebar' => false, 'admin' => null])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SIBERSIH' }}</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- bootstrap Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        :root {
            --color-teks-utama: #1E293B;
            --color-biru-sidebar: #2B68FF;
            --color-hijau-sukses: #34D399;
            --color-kuning-proses: #FBBF24;
            --color-merah-urgent: #F87171;
            --color-abu-bg: #F8FAFC;
            --color-putih-kartu: #FFFFFF;
        }
    </style>

</head>

<body>

    <body class="d-flex">
        @if ('isSidebar')
            <!-- Sidebar start -->
            <nav class="d-flex flex-column p-3"
                style="width: 250px; min-height: 100vh; background: var(--color-biru-sidebar); color: white;">
                <h3 class="text-white mb-4"><i class="bi bi-speedometer2 me-2"></i>Admin {{ $admin ?? '' }}</h3>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item mb-2">
                        <a href="#users" class="nav-link text-white"><i class="bi bi-people me-2"></i>Kelola Users</a>
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

    </body>

</html>
