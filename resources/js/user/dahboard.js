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
