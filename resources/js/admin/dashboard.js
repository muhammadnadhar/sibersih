import { Chart } from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    renderUserChart();
    renderPetugasChart();
    renderLaporanChart();
    tableLaporan();

    deleteLaporan();
});

const deleteLaporan = () => {
    const deleteModal = document.getElementById("deleteModal");
    const confirmInput = document.getElementById("confirmInput");
    const deleteBtn = document.getElementById("deleteBtn");
    const deleteForm = document.getElementById("deleteForm");
    const judulText = document.getElementById("laporanJudulText");

    let currentJudul = "";

    deleteModal.addEventListener("show.bs.modal", (event) => {
        const button = event.relatedTarget;

        const id = button.getAttribute("data-id");
        const judul = button.getAttribute("data-judul");

        currentJudul = judul;
        judulText.textContent = `"${judul}"`;

        confirmInput.value = "";
        deleteBtn.disabled = true;

        deleteForm.action = `/laporan/destroy/${id}`; // sesuaikan route
    });

    confirmInput.addEventListener("input", () => {
        deleteBtn.disabled = confirmInput.value !== currentJudul;
    });
};

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
    console.info("laporan total", data);

    new Chart(ctx, {
        type: "pie",
        data: {
            labels,
            datasets: [
                {
                    label: "Jumlah laporan per User",
                    data:
                        data.length !== 0
                            ? data
                            : Array.from({ length: labels.length }, () => 0),
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
    const dataPetugas = document.getElementById("dataPetugas");
    const dataLaporanTotals = document.getElementById(
        "dataPetugasLaporanSuccessTotals"
    );

    if (!canvas || !dataPetugas || !dataLaporanTotals) return;

    const ctx = canvas.getContext("2d");

    let labels = [];
    let data = [];

    try {
        labels = JSON.parse(dataPetugas.value).map((item) => item.username);
        data = JSON.parse(dataLaporanTotals.value);
    } catch (e) {
        console.error("Data chart error:", e);
        return;
    }

    if (data.length !== labels.length) {
        data = Array.from({ length: labels.length }, () => 0);
    }

    const colors = [
        "#2B68FF",
        "#34D399",
        "#FBBF24",
        "#F87171",
        "#1E293B",
        "#5F9EA0",
    ];

    const bgColors = labels.map((_, i) => colors[i % colors.length]);

    new Chart(ctx, {
        type: "pie",
        data: {
            labels,
            datasets: [
                {
                    label: "Petugas laporan selesai",
                    data,
                    backgroundColor: bgColors,
                    borderColor: "#FFFFFF",
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,

            plugins: {
                legend: {
                    position: "bottom",
                },
                tooltip: {
                    callbacks: {
                        label: function (ctx) {
                            return `${ctx.label}: ${ctx.parsed}`;
                        },
                    },
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
            // labels: ["Pending", "Ditugaskan", "Selesai", "urgent"],

            datasets: [
                {
                    label: "Jumlah Laporan",
                    data: data.length !== 0 ? data : [0, 0, 0, 0],
                    backgroundColor: [
                        "#FBBF24", // pending
                        "#2B68FF", // di tugaskan
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
