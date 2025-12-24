import { Chart } from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    renderUserChart();
    renderPetugasChart();
    renderLaporanChart();
    tableLaporan();
});

const tableLaporan = () => {
    var tugaskanModal = document.getElementById("updateLaporan");
    tugaskanModal.addEventListener("show.bs.modal", function (event) {
        // Tombol yang memicu modal
        var button = event.relatedTarget;
        // Ambil ID dari data-id tombol
        var id = button.getAttribute("data-id");
        // Set value input hidden di modal
        var input = tugaskanModal.querySelector("#laporan_id");
        input.value = id;
    });
};

function renderUserChart() {
    const canvas = document.getElementById("chartUsers");
    const dataUsers = document.querySelector("input[id='dataUsers']");
    const dataLaporanTotals = document.querySelector(
        "input[id='dataUserLaporanTotals']"
    );

    if (!canvas || !dataUsers || !dataLaporanTotals) return;

    const ctx = canvas.getContext("2d");
    const labels = JSON.parse(dataUsers.value).map((item) => item.username);
    const data = JSON.parse(dataLaporanTotals.value);

    console.info(labels);
    console.info(data);

    new Chart(ctx, {
        type: "pie",
        data: {
            labels,
            datasets: [
                {
                    label: "Jumlah laporan per User",
                    data: data,
                    backgroundColor: [
                        "#2B68FF", // sidebar
                        "#34D399", // sukses
                        "#FBBF24", // proses
                        "#F87171", // urgent
                        "#1E293B", // utama
                        "#5F9EA0", // teal
                    ],
                    borderColor: "#FFFFFF",
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        color: "#1E293B",
                        font: {
                            size: 12,
                            weight: "500",
                        },
                    },
                },
                tooltip: {
                    backgroundColor: "#1E293B",
                    titleColor: "#FFFFFF",
                    bodyColor: "#FFFFFF",
                    padding: 10,
                    cornerRadius: 8,
                },
            },
        },
    });
}
function renderPetugasChart() {
    const canvas = document.getElementById("chartPetugas");
    const dataPetugas = document.querySelector("input[id='dataPetugas']");
    const dataLaporanTotals = document.querySelector(
        "input[id='dataPetugasLaporanSuccessTotals']"
    );

    if (!canvas || !dataPetugas || !dataLaporanTotals) return;

    const ctx = canvas.getContext("2d");
    const labels = JSON.parse(dataPetugas.value).map((item) => item.username);
    const data = JSON.parse(dataLaporanTotals.value);

    console.info(labels);
    console.info(data);

    new Chart(ctx, {
        type: "pie",
        data: {
            labels,
            datasets: [
                {
                    label: "Petugas laporan succces",
                    data: data,
                    backgroundColor: [
                        "#2B68FF", // sidebar
                        "#34D399", // sukses
                        "#FBBF24", // proses
                        "#F87171", // urgent
                        "#1E293B", // utama
                        "#5F9EA0", // teal
                    ],
                    borderColor: "#FFFFFF",
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: "bottom",
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        color: "#1E293B",
                        font: {
                            size: 12,
                            weight: "500",
                        },
                    },
                },
                tooltip: {
                    backgroundColor: "#1E293B",
                    titleColor: "#FFFFFF",
                    bodyColor: "#FFFFFF",
                    padding: 10,
                    cornerRadius: 8,
                },
            },
        },
    });
}
function renderLaporanChart() {
    const canvas = document.getElementById("chartLaporan");

    const dataLaporan = document.querySelector("input[id='dataLaporan']");

    if (!canvas || !dataLaporan) return;

    const ctx = canvas.getContext("2d");
    const data = JSON.parse(dataLaporan.value);
    console.info("data laporan:", data);

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Pending", "Ditugaskan", "Selesai"],

            datasets: [
                {
                    label: "Jumlah Laporan",
                    // data: [0, 0, 0], // example
                    data,
                    backgroundColor: [
                        "#2B68FF", // sidebar
                        "#34D399", // sukses
                        "#F87171", // urgent
                    ],
                    borderColor: "#FFFFFF",
                    borderWidth: 2,
                },
            ],
        },
    });
}
