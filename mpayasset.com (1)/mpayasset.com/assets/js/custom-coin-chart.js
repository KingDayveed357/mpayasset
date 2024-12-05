/*=================================
    coin chart chart CSS start
===================================*/
var optionsCoin = {
    series: [{
        name: "coin",
        type: "area",
        data: [65, 43, 80, 90, 75, 52, 67, 90],
    }, ],
    chart: {
        height: 300,
        type: "line",
        stacked: false,
        toolbar: {
            show: false,
        },
    },
    stroke: {
        width: [2, 2, 2],
        curve: "smooth",
    },
    grid: {
        show: true,
        borderColor: "",
        strokeDashArray: 0,
        position: "back",
        xaxis: {
            lines: {
                show: true,
            },
        },
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0,
        },
    },
    plotOptions: {
        bar: {
            columnWidth: "50%",
        },
    },
    colors: ["#11A679"],
    fill: {
        type: "gradient",
        gradient: {
            shade: "light",
            type: "vertical",
            opacityFrom: 0.7,
            opacityTo: 0,
            stops: [0, 100],
        },
    },
    labels: [
        "21 May", "22 May", "23 May", "24 May", "25 May", "26 May", "27 May", "28 May",

    ],
    markers: {
        discrete: [{
                seriesIndex: 1,
                dataPointIndex: 2,
                fillColor: "#54BA4A",
                strokeColor: "var(--white)",
                size: 5,
            },

            {
                seriesIndex: 1,
                dataPointIndex: 5,
                fillColor: "#54BA4A",
                strokeColor: "var(--white)",
                size: 5,
            },
            {
                seriesIndex: 1,
                dataPointIndex: 9,
                fillColor: "#54BA4A",
                strokeColor: "var(--white)",
                size: 5,
            },
        ],
        hover: {
            size: 5,
            sizeOffset: 0,
        },
    },
    xaxis: {
        type: "category",
        tickAmount: 4,
        tickPlacement: "between",
        axisBorder: {
            show: true,
        },
        tooltip: {
            enabled: false,
        },
        axisBorder: {
            color: "var(--chart-border)",
        },
        axisTicks: {
            show: false,
        },
    },
    legend: {
        show: false,
    },
    yaxis: {
        min: 0,
        tickAmount: 6,
        tickPlacement: "between",
        axisBorder: {
            show: false,
        },
        labels: {
            show: false,
        },
    },

    tooltip: {
        shared: false,
        intersect: false,
    },
    responsive: [{
        breakpoint: 1200,
        options: {
            chart: {
                height: 250,
            },
        },
    }, ],
};
var chartCoin = new ApexCharts(document.querySelector("#coin"), optionsCoin);
chartCoin.render();

// bar overview chart
var optionsorder = {
    series: [{
        name: "Revenue",
        data: [
            30, 40, 18, 25, 18, 10, 20, 35, 22, 40, 30, 38, 20, 35, 11, 28, 40, 11,
            28, 40, 11, 28, 40, 11, 28, 40, 11,
        ],
    }, ],
    chart: {
        type: "bar",
        height: 200,
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "55%",
        },
    },
    colors: ["#9fa8be66"],
    grid: {
        show: false,
        xaxis: {
            lines: {
                show: true
            }
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
    xaxis: {
        categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
        labels: {
            show: false,
        },
        axisBorder: {
            show: true,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {

        labels: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    fill: {
        opacity: 0.7,
    },
    tooltip: {
        enabled: false,
    },
    states: {
        normal: {
            filter: {
                type: "none",
            },
        },
        hover: {
            filter: {
                type: "none",
            },
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: "none",
            },
        },
    },
    responsive: [{
        breakpoint: 405,
        options: {
            chart: {
                height: 150,
            },
        },
    }, ],
};

var chartorder = new ApexCharts(
    document.querySelector("#order-bar"),
    optionsorder
);
chartorder.render();