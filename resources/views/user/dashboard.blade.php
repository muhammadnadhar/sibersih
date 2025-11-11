<x-layout-user  :title="'SIBERSIH'" :isNavbar="true">
        <!-- Content -->
 <div class="container my-4">

  <!-- Header -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
    <div>
      <h3 class="fw-bold text-dark">Dashboard Pelaporan Sampah</h3>
      <p class="text-muted small mb-0">Selamat datang di sistem koordinasi kebersihan</p>
    </div>
    <div class="text-md-end mt-3 mt-md-0">
      <span class="fw-semibold text-dark">User</span><br>
      <span class="text-muted small">Regular User</span>
    </div>
  </div>

  <!-- Statistik -->
  <div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-secondary mb-1">Total Laporan</h6>
          <h3 class="fw-bold text-primary mb-1">147</h3>
          <p class="text-success small mb-0">+12% dari minggu lalu</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-secondary mb-1">Laporan Selesai</h6>
          <h3 class="fw-bold text-success mb-1">89</h3>
          <p class="text-success small mb-0">+8% dari minggu lalu</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-secondary mb-1">Petugas Aktif</h6>
          <h3 class="fw-bold text-info mb-1">24</h3>
          <p class="text-warning small mb-0">2 sedang bertugas</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="text-secondary mb-1">Area Terdampak</h6>
          <h3 class="fw-bold text-danger mb-1">12</h3>
          <p class="text-danger small mb-0">3 prioritas tinggi</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Grafik -->
  <div class="row g-4 mb-4">
    <div class="col-12 col-md-6">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="fw-semibold text-secondary mb-3">Laporan Mingguan</h6>
          <canvas id="laporanChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="fw-semibold text-secondary mb-3">Status Laporan</h6>
          <canvas id="statusChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Laporan Terbaru & Petugas -->
  <div class="row g-4">
    <!-- Laporan Terbaru -->
    <div class="col-12 col-md-6">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="fw-semibold text-secondary mb-3">Laporan Terbaru</h6>

          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark">Sampah di Jl. Sudirman</span>
            <span class="badge bg-danger rounded-pill">Urgent</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark">Tumpukan Sampah Pasar</span>
            <span class="badge bg-warning text-white rounded-pill">Proses</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="text-dark">Pembersihan Taman</span>
            <span class="badge bg-success rounded-pill">Selesai</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Petugas Aktif -->
    <div class="col-12 col-md-6">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h6 class="fw-semibold text-secondary mb-3">Petugas Aktif</h6>

          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark">Ahmad Rizki (Area: Sudirman)</span>
            <span class="text-success fw-semibold">Online</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-dark">Budi Santoso (Area: Thamrin)</span>
            <span class="text-warning fw-semibold">Bertugas</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="text-dark">Citra Dewi (Area: Menteng)</span>
            <span class="text-success fw-semibold">Online</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


  <!-- Chart.js Script -->
  <script>
    // Chart Mingguan
    const ctx = document.getElementById('laporanChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
        datasets: [
          {
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

    // Chart Status
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

</x-layout-user>
