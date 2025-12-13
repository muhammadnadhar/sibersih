@props(['css','title' => 'SIBERSIh' , 'isSidebar' => false])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "SIBERSIH" }}</title>

        <!-- csss style include   -->
        @if($css)
@vite('resources/css/base/index.css')
        @endif

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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



        <body >

        @if($isSidebar)
<nav class="navbar navbar-expand-lg bg-kartu">
<div class="container">

<a class="navbar-brand fw-semibold cl-utama" href="#">
<i class="bi bi-grid-fill cl-sidebar me-1"></i>
SIBERSIh
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarMain">
<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
<li class="nav-item">
<a class="nav-link cl-utama" href="{{ route('about')}}">
<i class="bi bi-house-door me-1"></i>  about
</a>
<!-- </li> -->
<!-- <li class="nav-item"> -->
<!-- <a class="nav-link cl-utama" href="#"> -->
<!-- <i class="bi bi-folder2 me-1"></i> Proyek -->
<!-- </a> -->
<!-- </li> -->
<!-- <li class="nav-item"> -->
<!-- <a class="nav-link cl-utama" href="#"> -->
<!-- <i class="bi bi-graph-up me-1"></i> Statistik -->
<!-- </a> -->
<!-- </li> -->
<!-- Status Badge -->
<!-- <li class="nav-item"> -->
<!-- <span class="badge bg-sukses px-3 py-2 rounded-pill"> -->
<!-- <i class="bi bi-check-circle me-1"></i> Online -->
<!-- </span> -->
<!-- </li> -->

</div>
</div>
</nav>

        @endif

            {{ $slot }}

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

        </body>

</html>
