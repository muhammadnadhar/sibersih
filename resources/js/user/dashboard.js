import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    renderLaporanChart();
    renderStatusLaporan();
});

function renderStatusLaporan() {
    const inputEl = document.querySelector("#data-laporan-status");
    if (!inputEl)
        return console.warn("Input data-laporan-status tidak ditemukan");

    let dataParse = [];
    try {
        dataParse = JSON.parse(inputEl.value);
    } catch (e) {
        console.error("JSON parse error:", e);
    }
    const labels = Object.keys(dataParse);
    const data = Object.values(dataParse);
    console.info("data status:", dataParse);

    const statusColors = {
        pending: "#FBBF24", // kuning (proses)
        selesai: "#34D399", // hijau (success)
        ditugaskan: "#2B68FF", // biru
        urgent: "#F87171", // merah
    };

    const getbackgroudColor = labels.map((v) => {
        return statusColors[v];
    });

    const ctx = document.getElementById("statusChart")?.getContext("2d");
    if (!ctx) return console.warn("Canvas #statusChart tidak ditemukan");

    new Chart(ctx, {
        type: "pie",
        data: {
            labels: labels,
            datasets: [
                {
                    data,
                    backgroundColor: getbackgroudColor,
                },
            ],
        },
        options: { responsive: true },
    });
}

function renderLaporanChart() {
    const inputEl = document.querySelector("#data-laporan-mingguan");
    if (!inputEl)
        return console.warn("Input data-laporan-mingguan tidak ditemukan");

    let dataParse = [];
    try {
        dataParse = JSON.parse(inputEl.value);
    } catch (e) {
        console.error("JSON parse error:", e);
    }

    console.info("data mingguan:", dataParse);

    const ctx = document.getElementById("laporanChart")?.getContext("2d");
    if (!ctx) return console.warn("Canvas #laporanChart tidak ditemukan");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: dataParse.map((v) => v["tanggal"]),
            datasets: [
                {
                    label: "Total laporan",
                    data: dataParse.map((v) => v["total"]),
                    borderColor: "#2B68FF",
                    tension: 0.3,
                    fill: true,
                },
                // {
                //     label: "Laporan Selesai",
                //     data: dataParse.selesai ?? [10, 12, 20, 22, 19, 15, 12],
                //     borderColor: "#34D399",
                //     tension: 0.3,
                //     fill: false,
                // },
            ],
        },
        options: { responsive: true },
    });
}
