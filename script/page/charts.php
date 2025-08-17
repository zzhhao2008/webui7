<?php
view::header("图表们");
?>
<div class="row">
    <div class="col-md-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <p class="card-title">图表们</p>
                <p>依赖Chart.js实现高级图表效果</p>
                <p>并没有使用PHP实现该方法 QAQ，因为综合考量没有意义，使用前端进行数据处理反而能更好契合图表（但愿吧）</p>
                <p>请自行查看页面下方的JS实现理解代码</p>
                <p>文档最后有使用菜鸟教程提供的语法实现的图表，供参考</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">高级视觉效果的堆积图</p>
                <div id="total-sales-chart-legend"></div>
            </div>
            <canvas id="total-sales-chart"></canvas>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">折线图</p>
                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                <canvas id="cash-deposits-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">折线图</h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">条形图</h4>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">堆积图</h4>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">环形图</h4>
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">饼图</h4>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">散点图</h4>
                <canvas id="scatterChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">雷达图（使用菜鸟chart.js语法）</h4>
                <canvas id="radarChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">极地图（使用菜鸟chart.js语法）</h4>
                <canvas id="polarChart"></canvas>
            </div>
        </div>
    </div>
</div>
<?php
view::foot();
?>
<script>
    $(function() {
        /* ChartJS
         * -------
         * Data and config for chartjs
         */
        'use strict';
        var data = {
            labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
            datasets: [{
                label: '# of Votes',
                data: [10, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        };
        var multiLineData = {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                    label: 'Dataset 1',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: [
                        '#587ce4'
                    ],
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Dataset 2',
                    data: [5, 23, 7, 12, 42, 23],
                    borderColor: [
                        '#ede190'
                    ],
                    borderWidth: 2,
                    fill: false
                },
                {
                    label: 'Dataset 3',
                    data: [15, 10, 21, 32, 12, 33],
                    borderColor: [
                        '#f44252'
                    ],
                    borderWidth: 2,
                    fill: false
                }
            ]
        };
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            }

        };
        var doughnutPieData = {
            datasets: [{
                data: [30, 40, 30],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Pink',
                'Blue',
                'Yellow',
            ]
        };
        var doughnutPieOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        var areaData = {
            labels: ["2013", "2014", "2015", "2016", "2017"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: true, // 3: no fill
            }]
        };

        var areaOptions = {
            plugins: {
                filler: {
                    propagate: true
                }
            }
        }

        var multiAreaData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: 'Facebook',
                    data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
                    borderColor: ['rgba(255, 99, 132, 0.5)'],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)'],
                    borderWidth: 1,
                    fill: true
                },
                {
                    label: 'Twitter',
                    data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
                    borderColor: ['rgba(54, 162, 235, 0.5)'],
                    backgroundColor: ['rgba(54, 162, 235, 0.5)'],
                    borderWidth: 1,
                    fill: true
                },
                {
                    label: 'Linkedin',
                    data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
                    borderColor: ['rgba(255, 206, 86, 0.5)'],
                    backgroundColor: ['rgba(255, 206, 86, 0.5)'],
                    borderWidth: 1,
                    fill: true
                }
            ]
        };

        var multiAreaOptions = {
            plugins: {
                filler: {
                    propagate: true
                }
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }

        var scatterChartData = {
            datasets: [{
                    label: 'First Dataset',
                    data: [{
                            x: -10,
                            y: 0
                        },
                        {
                            x: 0,
                            y: 3
                        },
                        {
                            x: -25,
                            y: 5
                        },
                        {
                            x: 40,
                            y: 5
                        }
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Second Dataset',
                    data: [{
                            x: 10,
                            y: 5
                        },
                        {
                            x: 20,
                            y: -30
                        },
                        {
                            x: -25,
                            y: 15
                        },
                        {
                            x: -10,
                            y: 5
                        }
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }
            ]
        }

        var scatterChartOptions = {
            scales: {
                xAxes: [{
                    type: 'linear',
                    position: 'bottom'
                }]
            }
        }
        // Get context with jQuery - using jQuery's .get() method.
        if ($("#barChart").length) {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
                options: options
            });
        }

        if ($("#lineChart").length) {
            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: data,
                options: options
            });
        }

        if ($("#linechart-multi").length) {
            var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
            var lineChart = new Chart(multiLineCanvas, {
                type: 'line',
                data: multiLineData,
                options: options
            });
        }

        if ($("#areachart-multi").length) {
            var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
            var multiAreaChart = new Chart(multiAreaCanvas, {
                type: 'line',
                data: multiAreaData,
                options: multiAreaOptions
            });
        }

        if ($("#doughnutChart").length) {
            var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
        }

        if ($("#pieChart").length) {
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
        }

        if ($("#areaChart").length) {
            var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaData,
                options: areaOptions
            });
        }

        if ($("#scatterChart").length) {
            var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
            var scatterChart = new Chart(scatterChartCanvas, {
                type: 'scatter',
                data: scatterChartData,
                options: scatterChartOptions
            });
        }

        if ($("#browserTrafficChart").length) {
            var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
            var doughnutChart = new Chart(doughnutChartCanvas, {
                type: 'doughnut',
                data: browserTrafficData,
                options: doughnutPieOptions
            });
        }

        if ($('#cash-deposits-chart').length) {
            var cashDepositsCanvas = $("#cash-deposits-chart").get(0).getContext("2d");
            var data = {
                labels: ["7.0", "7.1", "7.2", "7.3", "7.4", "7.5", "7.6", "7.7", "7.8"],
                datasets: [{
                        label: '扣分',
                        data: [27, 35, 30, 40, 52, 48, 54, 46, 70],
                        borderColor: [
                            '#ff4747'
                        ],
                        borderWidth: 2,
                        fill: false,
                        pointBackgroundColor: "#fff"
                    },
                    {
                        label: '加分',
                        data: [29, 40, 37, 48, 64, 58, 70, 57, 80],
                        borderColor: [
                            '#4d83ff'
                        ],
                        borderWidth: 2,
                        fill: false,
                        pointBackgroundColor: "#fff"
                    },
                    {
                        label: '处分',
                        data: [90, 62, 80, 63, 72, 62, 40, 50, 38],
                        borderColor: [
                            '#ffc100'
                        ],
                        borderWidth: 2,
                        fill: false,
                        pointBackgroundColor: "#fff"
                    }
                ]
            };
            var options = {
                scales: {
                    yAxes: [{
                        display: true,
                        gridLines: {
                            drawBorder: false,
                            lineWidth: 1,
                            color: "#e9e9e9",
                            zeroLineColor: "#e9e9e9",
                        },
                        ticks: {
                            min: 0,
                            max: 100,
                            stepSize: 20,
                            fontColor: "#6c7383",
                            fontSize: 16,
                            fontStyle: 300,
                            padding: 15
                        }
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            drawBorder: false,
                            lineWidth: 1,
                            color: "#e9e9e9",
                        },
                        ticks: {
                            fontColor: "#6c7383",
                            fontSize: 16,
                            fontStyle: 300,
                            padding: 15
                        }
                    }]
                },
                legend: {
                    display: false
                },
                legendCallback: function(chart) {
                    var text = [];
                    text.push('<ul class="dashboard-chart-legend">');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push('<li><span style="background-color: ' + chart.data.datasets[i].borderColor[0] + ' "></span>');
                        if (chart.data.datasets[i].label) {
                            text.push(chart.data.datasets[i].label);
                        }
                    }
                    text.push('</ul>');
                    return text.join("");
                },
                elements: {
                    point: {
                        radius: 3
                    },
                    line: {
                        tension: 0
                    }
                },
                stepsize: 1,
                layout: {
                    padding: {
                        top: 0,
                        bottom: -10,
                        left: -10,
                        right: 0
                    }
                }
            };
            var cashDeposits = new Chart(cashDepositsCanvas, {
                type: 'line',
                data: data,
                options: options
            });
            document.getElementById('cash-deposits-chart-legend').innerHTML = cashDeposits.generateLegend();
        }

        if ($('#total-sales-chart').length) {
            var totalSalesChartCanvas = $("#total-sales-chart").get(0).getContext("2d");

            var data = {
                labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40'],
                datasets: [{
                        label: '4月',
                        data: [42, 42, 30, 30, 18, 22, 16, 21, 22, 22, 22, 20, 24, 20, 18, 22, 30, 34, 32, 33, 33, 24, 32, 34, 30, 34, 19, 34, 18, 10, 22, 24, 20, 22, 20, 21, 10, 10, 5, 9, 14],
                        borderColor: [
                            'transparent'
                        ],
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: "rgba(47,91,191,0.77)"
                    },
                    {
                        label: '5月',
                        data: [35, 28, 32, 42, 44, 46, 42, 50, 48, 30, 35, 48, 42, 40, 54, 58, 56, 55, 59, 58, 57, 60, 66, 54, 38, 40, 42, 44, 42, 43, 42, 38, 43, 41, 43, 50, 58, 58, 68, 72, 72],
                        borderColor: [
                            'transparent'
                        ],
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: "rgba(77,131,255,0.77)"
                    },
                    {
                        label: '6月',
                        data: [98, 88, 92, 90, 98, 98, 90, 92, 78, 88, 84, 76, 80, 72, 74, 74, 88, 80, 72, 62, 62, 72, 72, 78, 78, 72, 75, 78, 68, 68, 60, 68, 70, 75, 70, 80, 82, 78, 78, 84, 82],
                        borderColor: [
                            'transparent'
                        ],
                        borderWidth: 2,
                        fill: true,
                        backgroundColor: "rgba(77,131,255,0.43)"
                    }
                ]
            };
            var options = {
                scales: {
                    yAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            lineWidth: 1,
                            color: "#e9e9e9",
                            zeroLineColor: "#e9e9e9",
                        },
                        ticks: {
                            display: true,
                            min: 0,
                            max: 100,
                            stepSize: 10,
                            fontColor: "#6c7383",
                            fontSize: 16,
                            fontStyle: 300,
                            padding: 15
                        }
                    }],
                    xAxes: [{
                        display: false,
                        gridLines: {
                            drawBorder: false,
                            lineWidth: 1,
                            color: "#e9e9e9",
                        },
                        ticks: {
                            display: true,
                            fontColor: "#6c7383",
                            fontSize: 16,
                            fontStyle: 300,
                            padding: 15
                        }
                    }]
                },
                legend: {
                    display: false
                },
                legendCallback: function(chart) {
                    var text = [];
                    text.push('<ul class="dashboard-chart-legend mb-0 mt-4">');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push('<li><span style="background-color: ' + chart.data.datasets[i].backgroundColor + ' "></span>');
                        if (chart.data.datasets[i].label) {
                            text.push(chart.data.datasets[i].label);
                        }
                    }
                    text.push('</ul>');
                    return text.join("");
                },
                elements: {
                    point: {
                        radius: 0
                    },
                    line: {
                        tension: 0
                    }
                },
                stepsize: 1,
                layout: {
                    padding: {
                        top: 0,
                        bottom: 0,
                        left: 0,
                        right: 0
                    }
                }
            };
            var totalSalesChart = new Chart(totalSalesChartCanvas, {
                type: 'line',
                data: data,
                options: options
            });
            document.getElementById('total-sales-chart-legend').innerHTML = totalSalesChart.generateLegend();
        }

        if ($('#polarChart').length) {
            const ctx = $("#polarChart")
            const data = {
                labels: [
                    'Red',
                    'Green',
                    'Yellow',
                    'Grey',
                    'Blue'
                ],
                datasets: [{
                    label: '极地图实例',
                    data: [11, 16, 7, 3, 14],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)'
                    ]
                }]
            };
            const config = {
                type: 'polarArea',
                data: data,
                options: {
                    responsive: true, // 设置响应式
                    maintainAspectRatio: true, // 保持图表原有比例
                }
            };
            const myChart = new Chart(ctx, config);
        }

        //radarChart
        if ($("#radarChart").length) {
            const ctx = document.getElementById('radarChart').getContext('2d');
            const data = {
                labels: [
                    'Eating',
                    'Drinking',
                    'Sleeping',
                    'Designing',
                    'Coding',
                    'Cycling',
                    'Running'
                ],
                datasets: [{
                    label: '第一个数据集',
                    data: [65, 59, 90, 81, 56, 55, 40],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: '第二个数据集',
                    data: [28, 48, 40, 19, 96, 27, 100],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            };
            const config = {
                type: 'radar',
                data: data,
                options: {
                    responsive: true, // 设置图表为响应式，根据屏幕窗口变化而变化
                    maintainAspectRatio: true, // 保持图表原有比例 !!这里一定要设置true或者定义一个固定高度!!
                    elements: {
                        line: {
                            borderWidth: 3 // 设置线条宽度
                        }
                    }
                }
            };
            const myChart = new Chart(ctx, config);
        }
    });
</script>