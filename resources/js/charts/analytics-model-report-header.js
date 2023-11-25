import Chart from "chart.js/auto";

console.log("heelo");

const data = {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    datasets: [
        {
            lineTension: 0.35,
            fill: true,
            label: "Weekly Sales",
            pointRadius: 0,
            data: [18, 12, 6, 9, 12, 3, 9],
            backgroundColor: [
                // "rgba(255, 26, 104, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                // "rgba(255, 206, 86, 0.2)",
                // "rgba(75, 192, 192, 0.2)",
                // "rgba(153, 102, 255, 0.2)",
                // "rgba(255, 159, 64, 0.2)",
                // "rgba(0, 0, 0,  0.2)",
            ],
            borderColor: [
                // "rgba(255, 26, 104, 1)",
                "rgba(54, 162, 235, 1)",
                // "rgba(255, 206, 86, 1)",
                // "rgba(75, 192, 192, 1)",
                // "rgba(153, 102, 255, 1)",
                // "rgba(255, 159, 64, 1)",
                // "rgba(0, 0, 0, 1)",
            ],
            borderWidth: 1,
        },
    ],
};

// config
const config = {
    type: "line",
    data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                display: false,
            },
            x: {
                display: false,
            },
        },
        plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                enabled: false,
            },
        },
    },
};

// render init block
const myChart = new Chart(document.getElementById("myChart"), config);

const myChart_2 = new Chart(
    document.getElementById("shop-perception-chart"),
    config,
);
const myChart_3 = new Chart(
    document.getElementById("shop-sentiment-chart"),
    config,
);
