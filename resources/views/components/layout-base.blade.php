@props(['css' => false, 'js' => false, 'title' => 'SIBERSIh'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIBERSIH' }}</title>

    <!-- csss style include   -->
    @if ($css)
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
            <span>{{ session('warning') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="alert bg-urgent cl-kartu border-0 rounded-3 py-3 px-4 d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif



    {{ $slot }}


    @if ($js)
        @vite($js)
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
