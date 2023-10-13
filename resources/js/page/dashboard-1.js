import helper from "../helper";
import colors from "../colors";
import Chart from "chart.js/auto"
import axios from "axios";

if ($("#report-bar-chart-1").length) {
    //get data from server api
    var myLabels = [];
    var myDatasets = [];
    axios.get("/api/dashboard/sale-chart").then((response) => {
        console.log(response.data);
        myLabels = response.data.labels;
        myDatasets = response.data.datasets;
    });
    console.log(myLabels);
    console.log(myDatasets);
    let ctx = $("#report-bar-chart-1")[0].getContext("2d");
    let myChart = new Chart(ctx, {
        type: "bar",
        //get data from server api
        data: {
            labels: myLabels,
            datasets: myDatasets,
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 11,
                        },
                        color: colors.slate["500"](0.8),
                    },
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                },
                y: {
                    ticks: {
                        display: false,
                    },
                    grid: {
                        color: $("html").hasClass("dark")
                            ? colors.darkmode["300"](0.8)
                            : colors.slate["300"](),
                        borderDash: [2, 2],
                        drawBorder: false,
                    },
                },
            },
        },
    });
}