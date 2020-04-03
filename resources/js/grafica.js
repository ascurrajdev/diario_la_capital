import ApexCharts from 'apexcharts';
    var options = {
      series: [44, 55, 13, 33],
      labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
    };
var chart = new ApexCharts(document.querySelector("#grafica"), options);
chart.render();