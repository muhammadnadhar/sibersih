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

        body {
            min-height: 100vh;

            background:
                radial-gradient(circle at 10% 20%,
                    rgba(43, 104, 255, 0.35),
                    transparent 60%),
                radial-gradient(circle at 80% 30%,
                    rgba(52, 211, 153, 0.25),
                    transparent 70%),
                radial-gradient(circle at 20% 80%,
                    rgba(251, 191, 36, 0.25),
                    transparent 70%),
                radial-gradient(circle at 90% 85%,
                    rgba(248, 113, 113, 0.25),
                    transparent 65%),
                linear-gradient(180deg, #1e293b 0%, #2b68ff 100%);
            background-blend-mode: screen;
            position: relative;
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



<body>
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

    {{ $slot }}


    @if ($js)
        @vite($js)
    @endif
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

</body>

</html>
