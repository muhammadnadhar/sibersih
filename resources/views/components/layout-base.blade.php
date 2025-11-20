<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* :root {
            --color-teks-utama: #1E293B;
            --color-biru-sidebar: #2B68FF;
            --color-hijau-sukses: #34D399;
            --color-kuning-proses: #FBBF24;
            --color-merah-urgent: #F87171;
            --color-abu-bg: #F8FAFC;
            --color-putih-kartu: #FFFFFF;
        } */
        #color-teks-utama {
            color: #1E293B;
        }

        #color-biru-sidebar {
            color: #2B68FF;
        }

        #color-hijau-sukses {
            color: #34D399;
        }

        #color-kuning-proses {
            color: #FBBF24;
        }

        #color-merah-urgent {
            color: #F87171;
        }

        #color-abu-bg {
            color: #F8FAFC;
        }

        #color-putih-kartu {
            color: #FFFFFF;
        }

        /* BACKGROUND */
        #bg-teks-utama {
            background-color: #1E293B;
        }

        #bg-biru-sidebar {
            background-color: #2B68FF;
        }

        #bg-hijau-sukses {
            background-color: #34D399;
        }

        #bg-kuning-proses {
            background-color: #FBBF24;
        }

        #bg-merah-urgent {
            background-color: #F87171;
        }

        #bg-abu-bg {
            background-color: #F8FAFC;
        }

        #bg-putih-kartu {
            background-color: #FFFFFF;
        }
    </style>


    >

<body class="bg-gray text-main">{{ $slot }} < !-- Slot utama, isi halaman atau isi di dalamnya -->
</body>

</html>
