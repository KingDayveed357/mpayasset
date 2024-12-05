/*=================================
    revenue chart chart CSS start
===================================*/
var optionsRevenue = {
  labels: ['BTC   45%', 'ETH  34%', 'USDT    10%', 'DOGE   11%'],

  colors: ['#FFC700', '#622CFD', '#11A679', '#FA3131'],
  series: [45, 34, 10, 11],
  chart: {
    type: "donut",
    height: 300,
    borderRadius: 15
  },
  dataLabels: {
    enabled: true,
    show: true,

  },

  legend: {
    position: "right",
    fontSize: "14px",
    verticalAlign: 'center',
    horizontalAlign: 'center',
    fontFamily: "Lato",
    fontWeight: 500,

    markers: {
      width: 6,
      height: 6,
    },
    itemMargin: {
      horizontal: 0,
      vertical: 10,
    },
  },
  plotOptions: {
    pie: {
      expandOnClick: false,
      donut: {
        size: "75%",
        radius: 30,
        labels: {
          show: true,
          name: {
            offsetY: -2,
          },
          value: {
            offsetY: 10,
          },
          total: {
            show: true,
            fontSize: "18px",
            fontFamily: "Lato",
            fontWeight: 500,
            label: "$45,256",
            formatter: () => "Revenue",

          },
        },
      },
      customScale: 1,
      offsetX: 0,
      offsetY: 0,
    },
    bar: {
      borderRadius: 30,
      borderRadiusApplication: 'around',
    },
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
            show: true,
            name: {
              offsetY: -2,
            },
            value: {
              offsetY: -5,
            },

            total: {
              show: true,
              fontSize: "12px",
              fontFamily: "Lato",
              fontWeight: 500,
              label: "$45,256",
              formatter: () => "Revenue",

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

var chartRevenue = new ApexCharts(document.querySelector("#revenue"), optionsRevenue);
chartRevenue.render();