<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Peran</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style> utama
    /* Warna tema khusus dengan kelas Bootstrap utility override */
    .bg-main-blue { background-color: #2B68FF !important; }
    .text-main { color: #1E293B !important; }
    .bg-gray { background-color: #F8FAFC !important; }
    .bg-card { background-color: #FFFFFF !important; }
    .btn-user { background-color: #34D399 !important; color: #fff !important; }
    .btn-admin { background-color: #FBBF24 !important; color: #1E293B !important; }
    .btn-petugas { background-color: #F87171 !important; color: #fff !important; }
  </style>
</head>
    <body class="bg-gray text-main">

    {{ $slot }}
    <!-- Slot utama, isi halaman atau isi di dalamnya -->

    </body>
</html>
