<x-layout  :title="'SIBERSIH'" :isNavbar="true">
        <!-- Content -->
      
  <div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
      <div>
        <h3 class="text-2xl font-bold text-gray-800">Dashboard Pelaporan Sampah</h3>
        <p class="text-gray-500 text-sm">Selamat datang di sistem koordinasi kebersihan</p>
      </div>
      <div class="text-right mt-3 md:mt-0">
        <span class="font-semibold text-gray-800">User</span><br>
        <span class="text-gray-500 text-sm">Regular User</span>
      </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="text-gray-600">Total Laporan</h6>
        <h3 class="text-2xl font-bold text-blue-600">147</h3>
        <p class="text-green-600 text-sm">+12% dari minggu lalu</p>
      </div>

      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="text-gray-600">Laporan Selesai</h6>
        <h3 class="text-2xl font-bold text-green-600">89</h3>
        <p class="text-green-600 text-sm">+8% dari minggu lalu</p>
      </div>

      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="text-gray-600">Petugas Aktif</h6>
        <h3 class="text-2xl font-bold text-cyan-600">24</h3>
        <p class="text-yellow-500 text-sm">2 sedang bertugas</p>
      </div>

      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="text-gray-600">Area Terdampak</h6>
        <h3 class="text-2xl font-bold text-red-600">12</h3>
        <p class="text-red-600 text-sm">3 prioritas tinggi</p>
      </div>
    </div>

    <!-- Grafik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="font-semibold text-gray-700 mb-3">Laporan Mingguan</h6>
        <canvas id="laporanChart"></canvas>
      </div>
      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="font-semibold text-gray-700 mb-3">Status Laporan</h6>
        <canvas id="statusChart"></canvas>
      </div>
    </div>

    <!-- Laporan Terbaru & Petugas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="font-semibold text-gray-700 mb-3">Laporan Terbaru</h6>

        <div class="flex justify-between items-center mb-2">
          <span class="text-gray-700">Sampah di Jl. Sudirman</span>
          <span class="px-2 py-1 text-xs font-semibold bg-red-500 text-white rounded-md">Urgent</span>
        </div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-gray-700">Tumpukan Sampah Pasar</span>
          <span class="px-2 py-1 text-xs font-semibold bg-yellow-400 text-white rounded-md">Proses</span>
        </div>
        <div class="flex justify-between items-center">
          <span class="text-gray-700">Pembersihan Taman</span>
          <span class="px-2 py-1 text-xs font-semibold bg-green-500 text-white rounded-md">Selesai</span>
        </div>
      </div>

      <div class="bg-white shadow-md rounded-xl p-4">
        <h6 class="font-semibold text-gray-700 mb-3">Petugas Aktif</h6>

        <div class="flex justify-between items-center mb-2">
          <span class="text-gray-700">Ahmad Rizki (Area: Sudirman)</span>
          <span class="text-green-600 font-semibold">Online</span>
        </div>
        <div class="flex justify-between items-center mb-2">
          <span class="text-gray-700">Budi Santoso (Area: Thamrin)</span>
          <span class="text-yellow-500 font-semibold">Bertugas</span>
        </div>
        <div class="flex justify-between items-center">
          <span class="text-gray-700">Citra Dewi (Area: Menteng)</span>
          <span class="text-green-600 font-semibold">Online</span>
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
    
</x-layout>
