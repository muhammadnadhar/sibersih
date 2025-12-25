import { Chart } from "chart.js";
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.querySelector("chartDataAktivitas").getContext("2d");

    const dataChart = document.querySelector("input[id='dataChartAktivitas']");

    console.info("data chart :", dataChart);
    const dataParse = JSON.parse(dataChart.value);
    console.log("data : ", dataParse);

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: Object.keys(dataParse), // ["Pending", "Ditugaskan", "Selesai"],

            datasets: [
                {
                    label: "Jumlah Laporan",
                    data: Object.values(dataParse), // data: [0, 0, 0], // example

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
});
