const {
    Chart,
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    BarController,
    CategoryScale,
    BarElement,
    Title,
} = require("chart.js");

Chart.register(
    BarElement,
    CategoryScale,
    BarController,
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    Title
);

const canvas = $("#myChart")[0];
const ctx = canvas.getContext("2d");

const data = JSON.parse($(canvas).attr("data"))
    .reverse()
    .map((item) => {
        return {
            amount: item.amount,
            date: new Date(item.created_at).toLocaleDateString(),
        };
    });

const chartData = {
    labels: data.map((item) => item.date),
    datasets: [
        {
            label: "My First Dataset",
            data: data.map((item) => item.amount),
            fill: true,
            borderColor: "#38c172",
            tension: 0.1,
        },
    ],
};

const myChart = new Chart(ctx, {
    type: "line",
    data: chartData,
    options: {
        responsive: true,
        maintainAspectRatio: true,
    },
});

export default myChart;
