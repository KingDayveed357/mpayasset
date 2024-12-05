/*=================================
    category chart chart CSS start
===================================*/
var optionsCategory = {
    series: [44, 60, 30, 38],
    colors: ['#6FE79F', '#FF8F3F', '#06BFFA', '#F8E00D'],
    chart: {
        type: "donut",
        height: 300,
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        show: false,
    },
    stroke: {
        width: 10,
        colors: ["rgba(98,44,253)"],
        lineCap: 'round',
    },

    plotOptions: {
        pie: {
            expandOnClick: false,
            startAngle: -90,
            endAngle: 90,
            offsetY: 10,
            donut: {
                size: "80%",
                labels: {
                    show: true,
                    name: {
                        offsetY: -10,
                    },
                    value: {
                        offsetY: -50,
                    },
                    total: {
                        show: true,
                        fontSize: "12px",
                        fontFamily: "Lato",
                        fontWeight: 500,
                        label: "$ 52,253.23",
                        formatter: () => "Total spent",
                    },
                },
            },
            customScale: 1,
            offsetX: 0,
            offsetY: 0,
        },
    },
    grid: {
        padding: {
            bottom: -100,
            top: 0,
        }
    },


    yaxis: {
        labels: {
            offsetY: 0,
        },
        show: true,
        title: {},
    },
    states: {

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
        breakpoint: 320,
        options: {
            chart: {
                height: 250,
            },
        },
        plotOptions: {
            pie: {
                expandOnClick: false,
                donut: {
                    size: "75%",
                    labels: {

                        total: {
                            show: true,
                            fontSize: "12px",
                            fontFamily: "Lato",
                            fontWeight: 500,
                            formatter: () => "Revenue",
                            label: "$45,256",
                        },
                    },
                },
                customScale: 1,
                offsetX: 0,
                offsetY: 0,
            },
            legend: {
                position: "right",
                fontSize: "12px",
                verticalAlign: 'center',
                horizontalAlign: 'center',
                fontFamily: "Lato",
                fontWeight: 500,
                labels: {
                    colors: ["#000000"],
                },
            },
            itemMargin: {
                horizontal: 10,
                vertical: 1,
            },
        },
    }, ],
};

var categoryChart = new ApexCharts(document.querySelector("#category-chart"), optionsCategory);
categoryChart.render();



var optionsAnalytics = {
    series: [{
        data: [70, 40, 90, 40, 70]

    }, {
        data: [-70, -40, -90, -40, -70]
    }],
    colors: ['#622CFD', '#E2E5EB'],
    chart: {
        type: 'bar',
        height: 412,
        stacked: true,

        toolbar: {
            show: false,
            tools: {
                download: false,
            }
        },
        zoom: {
            enabled: true
        }
    },
    grid: {
        show: true,
        strokeDashArray: 4,
        xaxis: {
            lines: {
                show: false,
            },
        },
    },
    legend: {
        show: false,
    },

    plotOptions: {
        bar: {
            // horizontal: false,
            // vertical: true,
            borderRadius: 5,
            columnWidth: '10%',
        },
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        categories: ['March', 'April', 'May', 'June', 'July'],
    },

    fill: {
        opacity: 1
    }
};

var analyticsChart = new ApexCharts(document.querySelector("#analytics-chart"), optionsAnalytics);
analyticsChart.render();