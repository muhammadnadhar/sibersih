<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBERSIH - Dashboard Pelaporan Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F8FAFC;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #2B68FF;
            color: white;
            position: fixed;
            width: 230px;
            padding: 20px 10px;
        }

        .sidebar .nav-link {
            color: #E0E7FF;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .card-title {
            font-weight: 600;
            color: #1E293B;
        }

        .badge-status {
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
        }

        .badge-urgent {
            background-color: #F87171;
            color: white;
        }

        .badge-proses {
            background-color: #FBBF24;
            color: white;
        }

        .badge-selesai {
            background-color: #34D399;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h4 class="text-center fw-bold mb-4">🧹 SIBERSIH</h4>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#">Dashboard</a>
            <a class="nav-link" href="#">Laporan Sampah</a>
            <a class="nav-link" href="#">Petugas</a>
            <a class="nav-link" href="#">Peta Lokasi</a>
            <a class="nav-link" href="#">Profil</a>
        </nav>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold">Dashboard Pelaporan Sampah</h3>
                <small class="text-muted">Selamat datang di sistem koordinasi kebersihan</small>
            </div>
            <div class="text-end">
                <span class="fw-semibold">User</span><br>
                <small class="text-muted">Regular User</small>
            </div>
        </div>

        <!-- Statistik -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <h6>Total Laporan</h6>
                    <h3 class="fw-bold text-primary">147</h3>
                    <small class="text-success">+12% dari minggu lalu</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h6>Laporan Selesai</h6>
                    <h3 class="fw-bold text-success">89</h3>
                    <small class="text-success">+8% dari minggu lalu</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h6>Petugas Aktif</h6>
                    <h3 class="fw-bold text-info">24</h3>
                    <small class="text-warning">2 sedang bertugas</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h6>Area Terdampak</h6>
                    <h3 class="fw-bold text-danger">12</h3>
                    <small class="text-danger">3 prioritas tinggi</small>
                </div>
            </div>
        </div>

        <!-- Grafik & Status -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="card-title mb-3">Laporan Mingguan</h6>
                    <canvas id="laporanChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="card-title mb-3">Status Laporan</h6>
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Laporan Terbaru & Petugas -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="card-title mb-3">Laporan Terbaru</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sampah di Jl. Sudirman</span>
                        <span class="badge-status badge-urgent">Urgent</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tumpukan Sampah Pasar</span>
                        <span class="badge-status badge-proses">Proses</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Pembersihan Taman</span>
                        <span class="badge-status badge-selesai">Selesai</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="card-title mb-3">Petugas Aktif</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Ahmad Rizki (Area: Sudirman)</span>
                        <span class="text-success fw-semibold">Online</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Budi Santoso (Area: Thamrin)</span>
                        <span class="text-warning fw-semibold">Bertugas</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Citra Dewi (Area: Menteng)</span>
                        <span class="text-success fw-semibold">Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap + Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart Mingguan
        const ctx = document.getElementById('laporanChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                        label: 'Laporan Masuk',
                        data: [20, 15, 30, 28, 25, 20, 18],
                        borderColor: '#2B68FF',
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Laporan Selesai',
                        data: [10, 12, 20, 22, 19, 15, 12],
                        borderColor: '#34D399',
                        tension: 0.3,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true
            }
        });

        // Chart Status Laporan
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Menunggu', 'Proses', 'Selesai'],
                datasets: [{
                    data: [12, 25, 63],
                    backgroundColor: ['#F87171', '#FBBF24', '#34D399']
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>
