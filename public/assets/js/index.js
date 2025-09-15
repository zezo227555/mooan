
/*Chart3 js*/

var options = {
series: [79, 38, 35, 25,35],
labels: ['Men', 'Women', 'Kids', 'Electronics', 'Furniture'],
chart: {
  height: 350,
  type: 'donut',
},
dataLabels: {
  enabled: false,
},

legend: {
  show: true,
  position:"bottom",
},
 stroke: {
  show: true,
  width:0
},
plotOptions: {
pie: {
  donut: {
    size: '64%',
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

colors: [ 'var(--primary-color)',"#9c52fd", '#24e4ac', "#ffa70b", "#ec5444"],
};
var chart = new ApexCharts(document.querySelector("#recent-orders"), options);
chart.render();
/*Chart3 js*/	

/* Bitcoin Chart */
var chart1 = {
  series: [{
      name: 'Total Income',
      data: [130, 90, 108,80, 136, 92, 149, 93, 113, 88, 93, 108],
}, {
name: 'Total Expances',
data: [100, 85, 128, 100, 80, 125, 105, 118, 90, 145, 105, 125]
}],
  chart: {
      type: 'area',
      height: 308
  },
  grid: {
      borderColor: 'rgba(167, 180, 201 ,0.2)',
  },
markers: {
size: [0,0],
strokeColors: '#fff',
strokeWidth: [1, 1],
strokeOpacity: 0,
},
stroke: {
curve: 'smooth',
width: 1,
dashArray: [0, 0]
},
fill: {
type: ['gradient','gradient'],
gradient: {
  shade: 'light',
  type: "vertical",
  opacityFrom: [0.6, 0.5],
  opacityTo: [0.2, 0.1],
  stops: [0, 100]
}
},
  dataLabels: {
      enabled: false,
  },
  legend: {
      show: true,
position: 'top',
      labels: {
          colors: '#74767c',
      },
  },
  yaxis: {
      labels: {
          formatter: function (y) {
              return y.toFixed(0) + "";
          }
      },
      labels: {
          style: {
              colors: "#8c9097",
              fontSize: '11px',
              fontWeight: 600,
              cssClass: 'apexcharts-xaxis-label',
          },
      }
  },
  xaxis: {
      type: 'month',
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'sep', 'oct', 'nov', 'dec'],
      axisBorder: {
          show: true,
          color: 'rgba(167, 180, 201 ,0.2)',
          offsetX: 0,
          offsetY: 0,
      },
      axisTicks: {
          show: true,
          borderType: 'solid',
          color: 'rgba(167, 180, 201 ,0.2)',
          width: 6,
          offsetX: 0,
          offsetY: 0
      },
      labels: {
          rotate: -90,
          style: {
              colors: "#8c9097",
              fontSize: '11px',
              fontWeight: 600,
              cssClass: 'apexcharts-xaxis-label',
          },
      }
  },
  
colors: [  "#f66b4e",  "#623aa2"],
};
document.getElementById('totalInvestmentsStats').innerHTML = '';
var chart1 = new ApexCharts(document.querySelector("#totalInvestmentsStats"), chart1);
chart1.render();

function index1() {
  chart1.updateOptions({
  colors: [ "#f66b4e", "rgba(" + myVarVal + ", 0.5)"],
  })
}
/* Water Tracking Chart */
var options = {
  series: [{
    data: [98, 130, 80, 145, 80, 140]
  }],
  chart: {
    height: 135,
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
document.getElementById('month_sales').innerHTML = '';
var chart2 = new ApexCharts(document.querySelector("#month_sales"), options);
chart2.render();
function month_sales() {
  chart2.updateOptions({
    colors: ["rgb(" + myVarVal + ")"],
  })
}
/* Water Tracking Chart */