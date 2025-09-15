
/* widget1 Chart */
var options = {
    series: [{
      data: [98, 130, 80, 145, 80, 140],
      labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
    }],
    chart: {
      height: 140,
      type: 'area',
      fontFamily: 'Roboto, Arial, sans-serif',
      foreColor: '#5d6162',
      zoom: {
        enabled: false
      },
      sparkline: {
        enabled: true
      }
    },
    tooltip: {
      enabled: true,
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function (seriesName) {
            return ''
          }
        }
      },
      marker: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'straight'
    },
    title: {
      text: undefined,
    },
    grid: {
      borderColor: 'transparent',
    },
    xaxis: {
      crosshairs: {
        show: false,
      }
    },
    colors: ["rgb(82, 92, 229)"],
    stroke: {
      width: [1],
    },
    fill: {
      type: 'gradient',
      gradient: {
        opacityFrom: 0.6,
        opacityTo: 0.5,
        stops: [0, 60],
      }
    },
  };
  document.getElementById('widget1').innerHTML = '';
  var chart1 = new ApexCharts(document.querySelector("#widget1"), options);
  chart1.render();
  function widget1() {
    chart1.updateOptions({
      colors: ["rgb(" + myVarVal + ")"],
    })
  }
  
/* widget2 Chart */
var options = {
    series: [{
      data: [98, 130, 80, 145, 80, 140],
      labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
    }],
    chart: {
      height: 140,
      type: 'area',
      fontFamily: 'Roboto, Arial, sans-serif',
      foreColor: '#1cc5ef',
      zoom: {
        enabled: false
      },
      sparkline: {
        enabled: true
      }
    },
    tooltip: {
      enabled: true,
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function (seriesName) {
            return ''
          }
        }
      },
      marker: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'straight'
    },
    title: {
      text: undefined,
    },
    grid: {
      borderColor: 'transparent',
    },
    xaxis: {
      crosshairs: {
        show: false,
      }
    },
    colors: ["rgb(28, 197, 239)"],
    stroke: {
      width: [1],
    },
    fill: {
      type: 'gradient',
      gradient: {
        opacityFrom: 0.6,
        opacityTo: 0.5,
        stops: [0, 60],
      }
    },
  };
  document.getElementById('widget2').innerHTML = '';
  var chart2 = new ApexCharts(document.querySelector("#widget2"), options);
  chart2.render();
  
/* Diveces chart */
var options = {
    series: [{
        name: 'Android',
        data: [11, 17, 15, 15, 21, 14, 11, 17, 15, 15, 21, 14]
    }, {
        name: 'Windows',
        data: [13, 23, 20, 8, 13, 27, 13, 23, 20, 8, 13, 27]
    }, {
        name: 'Mac',
        data: [44, 55, 41, 67, 22, 43, 44, 55, 41, 67, 22, 43]
    }],
    chart: {
        type: 'bar',
        height: 320,
        stacked: true,
        toolbar: {
            show: true
        },
        zoom: {
            enabled: true
        }
    },
    grid: {
        borderColor: '#f1f1f1',
        strokeDashArray: 3
    },
    responsive: [{
        breakpoint: 480,
        options: {
            legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
            }
        }
    }],
    colors: ["rgba(132, 90, 223, 1)", "#49d0f2", "#50eabd"],
    legend: {
        show: true,
        position: 'top'
    },
    plotOptions: {
        bar: {
            columnWidth: "25%",
        }
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },
    fill: {
        opacity: 1
    }
};
document.getElementById('devices').innerHTML = '';
var chart3 = new ApexCharts(document.querySelector("#devices"), options);
chart3.render();
function hrmdevices() {
    chart3.updateOptions({
        colors: ["rgba(" + myVarVal + ", 1)", "#49d0f2", "#50eabd"],
    })
}
/* Diveces chart */

/* total_Installed Chart */
var options = {
    series: [{
      data: [8, 70, 10, 115, 60, 130, 90]
    }],
    chart: {
      height: 210,
      type: 'area',
      fontFamily: 'Roboto, Arial, sans-serif',
      foreColor: '#5d6162',
      zoom: {
        enabled: false
      },
      sparkline: {
        enabled: true
      }
    },
    tooltip: {
      enabled: true,
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function (seriesName) {
            return ''
          }
        }
      },
      marker: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'straight'
    },
    title: {
      text: undefined,
    },
    grid: {
      borderColor: 'transparent',
    },
    xaxis: {
      crosshairs: {
        show: false,
      }
    },
    colors: ["rgb(82, 92, 229)"],
    stroke: {
      width: [2],
    },
    fill: {
      type: 'gradient',
      gradient: {
        opacityFrom: 0.6,
        opacityTo: 0.5,
        stops: [0, 60],
      }
    },
  };
  document.getElementById('total_Installed').innerHTML = '';
  var chart4 = new ApexCharts(document.querySelector("#total_Installed"), options);
  chart4.render();
  function total_Installed() {
    chart4.updateOptions({
      colors: ["rgb(" + myVarVal + ")"],
    })
  }