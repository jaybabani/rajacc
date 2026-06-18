var colors_arr = ['#6c5dd3', '#d3845d', '#5dc1d3', '#d3be5d', '#5dd392'];


// overlayscrollbar
var docReady = function docReady(fn) {
  // see if DOM is already available
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', fn);
  } else {
    setTimeout(fn, 1);
  }
};

var scrollbarInit = function scrollbarInit() {
  console.log("initialize os");
  Array.prototype.forEach.call(document.querySelectorAll('.scrollbar-overlay'), function (el) {
    return new window.OverlayScrollbars(el, {
      // className : "os-theme-dark",
      scrollbars: {
        autoHide: 'leave',
        autoHideDelay: 200
      }
    });
  });
};
docReady(scrollbarInit);







// Form validation

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()







// charts 


function legend_formatter(seriesName, opts) {
  return "<span style='margin-left:5px;color: #888;margin-bottom:10px;'>" + seriesName + "</span> "; //  [seriesName, " - ", opts.w.globals.series[opts.seriesIndex]]
}
var fill = {
  type: "gradient",
  gradient: {
    shadeIntensity: 1,
    opacityFrom: 0.5,
    opacityTo: 0.7,
    stops: [0, 90, 100]
  }
};

var legend_options = {
  position: 'top',
  horizontalAlign: 'right',
  offsetX: 0,
  offsetY: 0,
  floating: false,
  fontSize: '16px',
  fontFamily: 'Poppins, sans-serif',
  fontWeight: 400,
  formatter: function (seriesName, opts) {
    return legend_formatter(seriesName, opts);
  },
  markers: {
    width: 12,
    height: 12,
    strokeWidth: 0,
    strokeColor: '#fff',
    fillColors: undefined,
    radius: 10,
    customHTML: undefined,
    onClick: undefined,
    offsetX: 0,
    offsetY: 0
  },
  itemMargin: {
    horizontal: 15,
    vertical: 0
  },
  onItemClick: {
    toggleDataSeries: true
  },
  onItemHover: {
    highlightDataSeries: true
  },
};

var xaxis_label = {
  show: true,
  // align: 'right',
  // minWidth: 40,
  // maxWidth: 160,
  style: {
    colors: "#aaaaaa",
    fontSize: '14px',
    fontFamily: 'Poppins, sans-serif',
    fontWeight: 400,
    cssClass: 'apexcharts-yaxis-label',
  },
  // offsetX: 0,
  // offsetY: 0,
  // rotate: 0,
  // formatter: (value) => { return val },
};

var xaxis = {
  // type: 'datetime',
  categories: ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
  lines: {
    show: false,
  },
  labels: xaxis_label,
  axisBorder: {
    show: true,
    color: '#f5f5f5',
    offsetX: 0,
    offsetY: 0
  },
  axisTicks: {
    show: true,
    borderType: 'solid',
    color: '#f5f5f5',
    width: 6,
    offsetX: 0,
    offsetY: 0
  },
};

var yaxis_label = {
  show: false,
  align: 'right',
  minWidth: 0,
  maxWidth: 160,
  style: {
    colors: [],
    fontSize: '12px',
    fontFamily: 'Poppins, sans-serif',
    fontWeight: 400,
    cssClass: 'apexcharts-yaxis-label',
  },
  offsetX: 0,
  offsetY: 0,
  rotate: 0,
  // formatter: (value) => { return val },
};

var yaxis = {
  lines: {
    show: false,
  },
  labels: yaxis_label,

  // labels: {
  //   formatter: function (value) {
  //     return ".";
  //   }
  // },
  axisBorder: {
    show: false,
    color: '#ffffff',
    offsetX: 0,
    offsetY: 0
  },
  axisTicks: {
    show: false,
    borderType: 'solid',
    color: '#ffffff',
    width: 6,
    offsetX: 0,
    offsetY: 0
  },
};


var grid = {
  show: true,
  borderColor: '#f5f5f5',
  strokeDashArray: 0,
  position: 'back',
  xaxis: {
    lines: {
      show: true
    }
  },
  yaxis: {
    lines: {
      show: false
    }
  },
  row: {
    colors: undefined,
    opacity: 1
  },
  column: {
    colors: undefined,
    opacity: 1
  },
  padding: {
    top: 30,
    right: 0,
    bottom: 0,
    left: 0
  },
};

var tooltip = {
  enabled: true,
  enabledOnSeries: undefined,
  shared: true,
  followCursor: false,
  intersect: false,
  inverseOrder: false,
  custom: undefined,
  fillSeriesColor: false,
  theme: "dark",
  style: {
    fontSize: '12px',
    fontFamily: 'Poppins, sans-serif',
  },
  onDatasetHover: {
    highlightDataSeries: false,
  },
  x: {
    show: true,
    // format: 'dd MMM',
    // formatter: undefined,
  },
  y: {
    formatter: undefined,
    title: {
      // formatter: (seriesName) => seriesName,
    },
  },
  // z: {
  //   formatter: undefined,
  //   title: 'Size: '
  // },
  marker: {
    show: true,
  },
  // items: {
  //   display: flex,
  // },
  fixed: {
    enabled: false,
    position: 'topRight',
    offsetX: 0,
    offsetY: 0,
  },
};


var responsive = [
  {
    breakpoint: 600,
    options: {
      // plotOptions: {
      //   bar: {
      //     horizontal: false
      //   }
      // },
      legend: {
        position: "bottom",
        horizontalAlign: 'center',
        offsetX: 0,
        offsetY: 10,
      },
    }
  }
];

var widget_area_chart_options = {
  colors: colors_arr,
  fill: fill,
  series: [{
    name: 'Sales',
    data: [131, 60, 128, 151, 142, 89, 100]
  }, {
    name: 'Profit',
    data: [111, 180, 145, 132, 94, 152, 141]
  }, {
    name: 'Growth',
    data: [41, 30, 45, 112, 34, 52, 41]
  }],
  chart: {
    height: 320,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
  xaxis: xaxis,
  yaxis: yaxis,
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};



var widget_column_chart_options = {
  colors: colors_arr,
  // fill: {
  //   // type: "gradient",
  //   gradient: {
  //     shadeIntensity: 1,
  //     opacityFrom: 0.5,
  //     opacityTo: 0.7,
  //     stops: [0, 90, 100]
  //   }
  // },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '40%',
      barHeight: '30%',
      endingShape: 'rounded'
    },
  },
  series: [{
    name: 'Sales',
    data: [131, 60, 128, 151, 142, 89, 100]
  }, {
    name: 'Profit',
    data: [111, 180, 145, 132, 94, 152, 141]
  }, {
    name: 'Growth',
    data: [41, 30, 45, 112, 34, 52, 41]
  }],
  chart: {
    height: 320,
    type: 'bar',
    // stacked: true,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  xaxis: xaxis,
  yaxis: yaxis,
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};


var widget_column_stacked_chart_options = {
  colors: colors_arr,
  // fill: {
  //   // type: "gradient",
  //   gradient: {
  //     shadeIntensity: 1,
  //     opacityFrom: 0.5,
  //     opacityTo: 0.7,
  //     stops: [0, 90, 100]
  //   }
  // },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '25%',
      barHeight: '30%',
      endingShape: 'rounded'
    },
  },
  series: [{
    name: 'Sales',
    data: [131, 60, 128, 151, 142, 89, 100, 128, 142]
  }, {
    name: 'Profit',
    data: [111, 180, 145, 132, 94, 180, 145, 132, 152]
  }, {
    name: 'Growth',
    data: [41, 30, 45, 112, 34, 52, 41, 112, 34]
  }],
  chart: {
    height: 320,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  xaxis: xaxis,
  yaxis: yaxis,
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};

// var widget_bar_stacked_chart_options = JSON.parse(JSON.stringify(widget_column_stacked_chart_options));
// widget_bar_stacked_chart_options.chart.stacked = true;
// widget_bar_stacked_chart_options.plotOptions.bar.horizontal = true;
// widget_bar_stacked_chart_options.chart.height = 500;

// var widget_bar_chart_options = JSON.parse(JSON.stringify(widget_column_chart_options));
// widget_bar_chart_options.chart.stacked = false;
// widget_bar_chart_options.plotOptions.bar.horizontal = true;
// widget_bar_chart_options.chart.height = 500;



var widget_bar_chart_options = {
  colors: colors_arr,
  // fill: {
  //   // type: "gradient",
  //   gradient: {
  //     shadeIntensity: 1,
  //     opacityFrom: 0.5,
  //     opacityTo: 0.7,
  //     stops: [0, 90, 100]
  //   }
  // },
  plotOptions: {
    bar: {
      horizontal: true,
      columnWidth: '40%',
      barHeight: '60%',
      endingShape: 'rounded'
    },
  },
  series: [{
    name: 'Sales',
    data: [131, 60, 128, 151, 142]
  }, {
    name: 'Profit',
    data: [111, 180, 145, 132, 94]
  }, {
    name: 'Growth',
    data: [41, 30, 45, 112, 34]
  }],
  chart: {
    height: 450,
    type: 'bar',
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  xaxis: xaxis,
  yaxis: yaxis,
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};


var widget_bar_stacked_chart_options = {
  colors: colors_arr,
  // fill: {
  //   // type: "gradient",
  //   gradient: {
  //     shadeIntensity: 1,
  //     opacityFrom: 0.5,
  //     opacityTo: 0.7,
  //     stops: [0, 90, 100]
  //   }
  // },
  plotOptions: {
    bar: {
      horizontal: true,
      columnWidth: '25%',
      barHeight: '40%',
      endingShape: 'rounded'
    },
  },
  series: [{
    name: 'Sales',
    data: [131, 60, 128, 151, 142, 89, 100]
  }, {
    name: 'Profit',
    data: [111, 180, 145, 132, 94, 180, 145]
  }, {
    name: 'Growth',
    data: [41, 30, 45, 112, 34, 52, 41]
  }],
  chart: {
    height: 450,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth',
    width: 2,
  },
  xaxis: xaxis,
  yaxis: yaxis,
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};



var widget_bar_negative_chart_options = {
  colors: colors_arr,
  series: [
    {
  name: 'Cash Flow',
  data: [1.45, 5.42, 5.9, -0.42, -12.6, -18.1, -18.2, -14.16, -11.1, -6.09, 0.34, 3.88, 13.07,
    5.8, 2, 7.37, 8.1, 13.57, 15.75, 17.1, 19.8, -27.03, -54.4, -47.2, -43.3, -18.6, -
    48.6, -41.1, -39.6, -37.6, -29.4, -21.4, -2.4
  ]
},


],
  chart: {
  type: 'bar',
  height: 350,
  toolbar: {
    show: false,
  },
},
plotOptions: {
  bar: {
    colors: {
      ranges: [{
        from: -100,
        to: -46,
        color: colors_arr[1]
      }, {
        from: -45,
        to: 0,
        color: colors_arr[2]
      }]
    },
    columnWidth: '80%',
  }
},
dataLabels: {
  enabled: false,
},
yaxis: {
  title: {
    text: 'Growth',
  },
  labels: {
    formatter: function (y) {
      return y.toFixed(0) + "%";
    }
  }
},
xaxis: {
  type: 'datetime',
  categories: [
    '2011-01-01', '2011-02-01', '2011-03-01', '2011-04-01', '2011-05-01', '2011-06-01',
    '2011-07-01', '2011-08-01', '2011-09-01', '2011-10-01', '2011-11-01', '2011-12-01',
    '2012-01-01', '2012-02-01', '2012-03-01', '2012-04-01', '2012-05-01', '2012-06-01',
    '2012-07-01', '2012-08-01', '2012-09-01', '2012-10-01', '2012-11-01', '2012-12-01',
    '2013-01-01', '2013-02-01', '2013-03-01', '2013-04-01', '2013-05-01', '2013-06-01',
    '2013-07-01', '2013-08-01', '2013-09-01'
  ],
  labels: {
    rotate: -90
  }
},

xaxis: xaxis,
yaxis: yaxis,
grid: grid,
tooltip: tooltip,
legend: legend_options,
responsive: responsive,

};

var widget_bar_negative_chart_options1 = {
  colors: colors_arr,
  series: [{
    name: 'Cash Flow',
    data: [1.45, 5.42, 5.9, -0.42, -12.6, -18.1, -18.2, -14.16, -11.1, -6.09, 0.34, 3.88, 13.07,
      5.8, 2, 7.37, 8.1, 13.57, 15.75, 17.1, 19.8, -27.03, -54.4, -47.2, -43.3, -18.6, -
      48.6, -41.1, -39.6, -37.6, -29.4, -21.4, -2.4
    ]
  },
  {
    name: 'Sales',
    data: [1.45, 5.42, 5.9, -0.42, -12.6, -18.1, -18.2, -14.16, -11.1, -6.09, 0.34, 3.88, 13.07,
      5.8, 2, 7.37, 8.1, 13.57, 15.75, 17.1, 19.8, -27.03, -54.4, -47.2, -43.3, -18.6, -
      48.6, -41.1, -39.6, -37.6, -29.4, -21.4, -2.4
    ]
  }

  ],
  chart: {
    offsetY: 0,
    type: 'bar',
    height: 200,
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      colors: {
        ranges: [{
          from: -100,
          to: -46,
          // color: colors_arr[2],
        }, {
          from: -45,
          to: 0,
          // color: colors_arr[2],
        }]
      },
      columnWidth: '80%',
    }
  },
  dataLabels: {
    enabled: false,
  },
  yaxis: {
    show: false,
    labels: yaxis_label,
    title: {
      text: '',
    },
    // labels: {
    //   formatter: function (y) {
    //     return y.toFixed(0) + "%";
    //   }
    // }
  },
  xaxis: {
    type: 'datetime',
          categories: [
            '2011-01-01', '2011-02-01', '2011-03-01', '2011-04-01', '2011-05-01', '2011-06-01',
            '2011-07-01', '2011-08-01', '2011-09-01', '2011-10-01', '2011-11-01', '2011-12-01',
            '2012-01-01', '2012-02-01', '2012-03-01', '2012-04-01', '2012-05-01', '2012-06-01',
            '2012-07-01', '2012-08-01', '2012-09-01', '2012-10-01', '2012-11-01', '2012-12-01',
            '2013-01-01', '2013-02-01', '2013-03-01', '2013-04-01', '2013-05-01', '2013-06-01',
            '2013-07-01', '2013-08-01', '2013-09-01'
          ],
    // type: 'datetime',
    // labels: xaxis_label,
    // categories: [
    //   '01', '02', '03', '04', '05', '06',
    //   '07', '08', '09', '10', '11', '12',
    //   '13', '14', '15', '16', '17', '18',
    // ],
    // labels: {
    //   rotate: -90
    // }
  },
  grid: grid,
  tooltip: tooltip,
  legend: legend_options,
  responsive: responsive,
};



var randomizeArray = function (arg) {
  var array = arg.slice();
  var currentIndex = array.length,
    temporaryValue, randomIndex;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

// data for the sparklines that appear below header area
var sparklineData = [17, 15, 54,51, 35, 41, 35, 27, 93,];

//////////////////////////////
var sparkline_chart_1 = {
  colors: [colors_arr[0]],
  series: [{
    data: [17, 15, 54,51, 35, 41, 35, 27, 93,], // randomizeArray(sparklineData)
  }],
  chart: {
    type: 'area',
    height: 200,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
};


var sparkline_chart_2 = {
  colors: [colors_arr[2]],
  series: [{
    data: [17, 15, 35, 41, 35, 27, 54, 51,  93,], // randomizeArray(sparklineData)
  }],
  chart: {
    type: 'area',
    height: 200,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
};

var sparkline_chart_3 = {
  colors: [colors_arr[1]],
  series: [{
    data: [17, 15, 37, 54, 51, 35, 41, 35, 73,], // randomizeArray(sparklineData)
  }],
  chart: {
    type: 'area',
    height: 200,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
};


var sparkline_chart_4 = {
  colors: colors_arr,
  series: [{
    data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
  }],
  chart: {
    type: 'line',
    width: 100,
    height: 90,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
  tooltip: {
    fixed: {
      enabled: false
    },
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
  }
};


var sparkline_chart_5 = {
  colors: colors_arr,
  series: [{
    data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
  }],
  chart: {
    type: 'line',
    width: 100,
    height: 95,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    curve: 'smooth',
    width: 3,
  },
  tooltip: {
    fixed: {
      enabled: false
    },
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
  }
};

var sparkline_chart_6 = {
  colors: colors_arr,
  series: [43, 32, 12, 9],
  chart: {
    type: 'pie',
    width: 80,
    height: 80,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    width: 1,
  },

  // plotOptions: {
  //   pie: {
  //     size: '75%'
  //     // donut: {
  //     //   size: '75%'
  //     // }
  //   }
  // },

  tooltip: {
    fixed: {
      enabled: false
    },
  }
};


var sparkline_chart_7 = {
  colors: colors_arr,
  series: [43, 32, 12, 9],
  chart: {
    type: 'donut',
    width: 100,
    height: 100,
    sparkline: {
      enabled: true
    }
  },
  stroke: {
    width: 1
  },
  plotOptions: {
    pie: {
      donut: {
        size: '75%'
      }
    }
  },
  tooltip: {
    fixed: {
      enabled: false
    },
  }
};


var sparkline_chart_8 = {
  colors: colors_arr,
  series: [{
    data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
  }],
  chart: {
    type: 'bar',
    width: 100,
    height: 85,
    sparkline: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      columnWidth: '40%'
    }
  },
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
  xaxis: {
    crosshairs: {
      width: 1
    },
  },
  tooltip: {
    fixed: {
      enabled: false
    },
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
  }
};


var sparkline_chart_9 = {
  colors: colors_arr,
  series: [{
    data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
  }],
  chart: {
    type: 'bar',
    width: 100,
    height: 85,
    sparkline: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      columnWidth: '40%'
    }
  },
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
  xaxis: {
    crosshairs: {
      width: 1
    },
  },
  tooltip: {
    fixed: {
      enabled: false
    },
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
  }
};


var sparkline_chart_10 = {
  colors: colors_arr,
  series: [45],
  chart: {
    type: 'radialBar',
    width: 100,
    height: 100,
    sparkline: {
      enabled: true
    }
  },
  dataLabels: {
    enabled: false
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: '50%'
      },
      track: {
        margin: 5,
        background: "rgba(33, 33, 33, .05)",
      },
      dataLabels: {
        show: false
      }
    }
  },
  tooltip: {
    fixed: {
      enabled: false
    },
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
  }
};

var sparkline_chart_11 = {
  colors: colors_arr,
  series: [53, 67, 80],
  chart: {
    type: 'radialBar',
    width: 100,
    height: 100,
    sparkline: {
      enabled: true
    }
  },
  dataLabels: {
    enabled: false
  },
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: '30%'
      },
      track: {
        margin: 3,
        background: "rgba(33, 33, 33, .05)",
      },
      dataLabels: {
        show: false
      }
    }
  }
};

var sparkline_chart_4_small = JSON.parse(JSON.stringify(sparkline_chart_4));
sparkline_chart_4_small.chart.height = 60;
sparkline_chart_4_small.chart.width = 70;

var sparkline_chart_5_small = JSON.parse(JSON.stringify(sparkline_chart_5));
sparkline_chart_5_small.chart.height = 60;
sparkline_chart_5_small.chart.width = 70;

var sparkline_chart_6_small = JSON.parse(JSON.stringify(sparkline_chart_6));
sparkline_chart_6_small.chart.height = 60;
sparkline_chart_6_small.chart.width = 70;

var sparkline_chart_7_small = JSON.parse(JSON.stringify(sparkline_chart_7));
sparkline_chart_7_small.chart.height = 60;
sparkline_chart_7_small.chart.width = 70;

var sparkline_chart_8_small = JSON.parse(JSON.stringify(sparkline_chart_8));
sparkline_chart_8_small.chart.height = 60;
sparkline_chart_8_small.chart.width = 70;

var sparkline_chart_9_small = JSON.parse(JSON.stringify(sparkline_chart_9));
sparkline_chart_9_small.chart.height = 60;
sparkline_chart_9_small.chart.width = 70;

var sparkline_chart_10_small = JSON.parse(JSON.stringify(sparkline_chart_10));
sparkline_chart_10_small.chart.height = 70;
sparkline_chart_10_small.chart.width = 70;

var sparkline_chart_11_small = JSON.parse(JSON.stringify(sparkline_chart_11));
sparkline_chart_11_small.chart.height = 70;
sparkline_chart_11_small.chart.width = 70;


var widget_donut_chart_legend = JSON.parse(JSON.stringify(legend_options));
widget_donut_chart_legend.position = "right";
widget_donut_chart_legend.horizontalAlign = "center";
widget_donut_chart_legend.offsetY = 20;

widget_donut_chart_legend.formatter = function (seriesName, opts) {
  return legend_formatter(seriesName, opts);
};

var widget_donut_chart_options = {
  colors: colors_arr,
  chart: {
    type: 'donut',
    width: '100%',
    height: 270
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    pie: {
      customScale: 0.8,
      donut: {
        size: '75%',
      },
      offsetY: 0,
    },
    stroke: {
      colors: undefined
    }
  },
  // colors: colorPalette,
  title: {
    // text: 'Statistics',
    // style: {
    //   fontSize: '18px'
    // }
  },
  series: [21, 23, 19, 14],
  labels: ['Sales', 'Products', 'Revenue', 'Profit'],

  // legend: widget_donut_chart_legend,
  legend: {
    show: false,
    position: 'right',
    offsetY: 80
  }
}


var widget_semidonut_chart_options = {
  colors: colors_arr,
  chart: {
    type: 'donut',
    width: '100%',
    height: 280
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    pie: {
      // customScale: 1.1,
      donut: {
        size: '80%',
      },
      startAngle: -90,
      endAngle: 90,
      offsetY: 0
    }
  },
  series: [21, 23, 19, 14],
  labels: ['Sales', 'Products', 'Revenue', 'Profit'],
  // plotOptions: {
  //   pie: {
  //     // customScale: 0.8,
  //     // donut: {
  //     //   size: '75%',
  //     // },
  //     pie: {
  //       startAngle: -90,
  //       endAngle: 90,
  //       offsetY: 10
  //     },
  //     offsetY: 0,
  //   },
  //   stroke: {
  //     colors: undefined
  //   }
  // },
  // colors: colorPalette,
  // title: {
  //   // text: 'Statistics',
  //   // style: {
  //   //   fontSize: '18px'
  //   // }
  // },

  // legend: widget_donut_chart_legend,
  legend: {
    show: false,
    // position: 'right',
    // offsetY: 80
  }
}


var widget_radialbar_chart_options = {
  series: [76, 67, 61, 90],
  chart: {
    height: 270,
    type: 'radialBar',
  },
  plotOptions: {
    radialBar: {
      offsetY: 0,
      startAngle: 0,
      endAngle: 270,
      hollow: {
        margin: 5,
        size: '40%',
        background: 'transparent',
        image: undefined,
      },
      dataLabels: {
        name: {
          show: true,
        },
        value: {
          show: true,
        }
      }
    }
  },
  colors: colors_arr,
  labels: ['Sales', 'Products', 'Revenue', 'Profit'],
  responsive: [{
    breakpoint: 480,
    options: {
      legend: {
        show: false
      }
    }
  }]
};