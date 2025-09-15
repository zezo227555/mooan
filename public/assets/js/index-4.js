/* students Chart */
var options = {
    chart: {
        height: 110,
        width: 100,
        type: "radialBar",
    },

    series: [55],
    colors: ["#ec5444"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "45%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "12px",
                    show: true,
                    fontWeight: 800
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
document.querySelector("#students").innerHTML = ""
var chart5 = new ApexCharts(document.querySelector("#students"), options);
chart5.render();
/* students Chart */


/* instructors Chart */
var options = {
    chart: {
        height: 110,
        width: 100,
        type: "radialBar",
    },

    series: [55],
    colors: ["#9c52fd"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "45%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "12px",
                    show: true,
                    fontWeight: 800
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
document.querySelector("#instructors").innerHTML = ""
var chart7 = new ApexCharts(document.querySelector("#instructors"), options);
chart7.render();
/* instructors Chart */


/* courses Chart */
var options = {
    chart: {
        height: 110,
        width: 100,
        type: "radialBar",
    },

    series: [55],
    colors: ["#24e4ac"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "45%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "12px",
                    show: true,
                    fontWeight: 800
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
document.querySelector("#courses").innerHTML = ""
var chart2 = new ApexCharts(document.querySelector("#courses"), options);
chart2.render();
/* courses Chart */


/* assignments Chart */
var options = {
    chart: {
        height: 110,
        width: 100,
        type: "radialBar",
    },

    series: [55],
    colors: ["#f18238"],
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: "45%",
                background: "#fff"
            },
            dataLabels: {
                name: {
                    offsetY: -10,
                    color: "#4b9bfa",
                    fontSize: "10px",
                    show: false
                },
                value: {
                    offsetY: 5,
                    color: "#4b9bfa",
                    fontSize: "12px",
                    show: true,
                    fontWeight: 800
                }
            }
        }
    },
    stroke: {
        lineCap: "round"
    },
    labels: ["Followers"]
};
document.querySelector("#assignments").innerHTML = ""
var chart2 = new ApexCharts(document.querySelector("#assignments"), options);
chart2.render();
/* assignments Chart */

/* learners bar chart */
var options = {
    series: [{
        data: [44, 55, 41, 64, 22, 43, 21,44, 33, 42, 46, 55]
    }],
    chart: {
        type: 'bar',
        height: 345
    },
    plotOptions: {
        bar: {
            horizontal: true,
            dataLabels: {
                position: 'top',
            },
        }
    },
    grid: {
        borderColor: '#949eb7',
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          type: "horizontal",
          shadeIntensity: 0.5,
          gradientToColors: ['#525ce5', '#30a4fc'], // optional, if not defined - uses the shades of same color in series
          shadeIntensity: 5,
        inverseColors: true,
        type: 'horizontal',
        opacityFrom: .9,
        opacityTo: .9,
        }
      },
    dataLabels: {
        enabled: true,
        offsetX: -6,
        style: {
            fontSize: '10px',
            colors: ['#fff']
        }
    },
    stroke: {
        show: true,
        width: 1,
        colors: ['#fff']
    },
    tooltip: {
        shared: true,
        intersect: false
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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
        labels: {
            show: true,
            style: {
                colors: "#8c9097",
                fontSize: '11px',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-label',
            },
        }
    }
};
var chart = new ApexCharts(document.querySelector("#learners"), options);
chart.render();

function learners(){
    chart.updateOptions({
    colors:["rgba(" + myVarVal + ", 0.95)",'#30a4fc'],
  })
}
/* learners bar chart */


/*Chart3 js*/
var options = {
    series: [3567, 1456, 456, 133],
    labels: ['Completed', 'In Progress', 'Not Completed', 'Not Started'],
    chart: {
      height: 250,
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
    
    colors: [ '#1cc5ef','#ec447c', '#24e4ac', 'var(--primary-color)'],
    };
var chart2 = new ApexCharts(document.querySelector("#recent-orders"), options);
chart2.render();

function recent_orders(){
    chart2.updateOptions({
    colors:['#1cc5ef','#ec447c', '#24e4ac', 'var(--primary-color)'],
  })
}
/*Chart3 js*/	