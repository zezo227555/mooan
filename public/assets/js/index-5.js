/* Website_aduience chart */
var options = {
    series: [{
        name: 'Net Profit',
        data: [44, 55, 57, 56, 61, 58, 63, 60]
    },{
        name: 'Free Cash Flow',
        data: [35, 41, 36, 26, 45, 48, 52, 53]
    }],
    chart: {
        type: 'bar',
        height: 270
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    grid: {
        borderColor: '#f2f5f7',
    },
    dataLabels: {
        enabled: false
    },
    colors: ["#525ce5", "#24e4ac"],
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021'],
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    yaxis: {
        title: {
            text: '$ (thousands)',
            style: {
                color: "#8c9097",
            }
        },
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-label',
            },
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
};
var chart1 = new ApexCharts(document.querySelector("#Website_aduience"), options);
chart1.render();

function Website_aduience(){
    chart1.updateOptions({
    colors:["rgba(" + myVarVal + ", 0.95)","#24e4ac"],
  })
}
/*Chart3 js*/
var options = {
    series: [60, 20, 25],
    labels: ['Direct', 'Organic', 'Campagin'],
    chart: {
      height: 265,
      type: 'donut',
    },
    dataLabels: {
      enabled: false,
    },
    
    legend: {
      show: false,
      position:"bottom",
    },
     stroke: {
      show: true,
      width:0
    },
    plotOptions: {
    pie: {
      donut: {
        size: '70%',
        background: 'transparent',
        labels: {
          show: true,
          name: {
            show: true,
            fontSize: '20px',
            color:'#495057',
            offsetY: -4
          },
          value: {
            show: true,
            fontSize: '18px',
            color: undefined,
            offsetY: 8,
            formatter: function (val) {
              return val + "%"
            }
          },
          total: {
            show: true,
            showAlways: true,
            label: 'Total',
            fontSize: '22px',
            fontWeight: 600,
            color: '#495057',
            // formatter: function (w) {
            //   return w.globals.seriesTotals.reduce((a, b) => {
            // 	return a + b
            //   }, 0)
            // }
            }
    
        }
      }
    }
    },
    responsive: [{
      options: {
        legend: {
          show: false,
        }
      }
    }],
    
    colors: ['var(--primary-color)', '#1cc5ef', '#24e4ac' ],
    };
var chart = new ApexCharts(document.querySelector("#canvasDoughnut2"), options);
chart.render();
/*Chart3 js*/	

// Leads By Source Chart
var options = {
    series: [{
    name: 'Sessions',
    data: [400, 430, 470, 540, 700, 800, 1080, 1100, 1400, 1540,]
    }],
      chart: {
        fontFamily: 'Poppins, Arial, sans-serif',
          toolbar: {
              show: false
          },
      type: 'bar',
      height: 390
    },
    grid: {
      borderColor: '#f2f6f7',
    },
    plotOptions: {
      bar: {
          horizontal: true,
          barHeight: "55%",
          borderRadius: 1,
      }
    },
    colors: ["#f59032"],
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: ['South Korea', 'Ireland', 'United Kingdom', 'Canada', 'Italy', 'France', 'Japan','United States','China','Australia'],
    }
  };
  var chart4 = new ApexCharts(document.querySelector("#countries"), options);
  chart4.render();
  
  function countries(){
      chart4.updateOptions({
      colors:["rgba(" + myVarVal + ", 0.95)"],
    })
  }