<?php
view::header('首页', 1);
?>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>你好,</h2>
                    <p class="mb-md-0">ZSV Studio & 淄博实验中学电子科创社 联合为您呈现</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                    <i class="mdi mdi-download text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                </button>
                <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                </button>
                <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="purchases-tab" data-bs-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                    </li>
                </ul>
                <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">开始日期</small>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-account me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">学号</small>
                                    <h5 class="me-2 mb-0">54188</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-biohazard me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">今日量化</small>
                                    <h5 class="me-2 mb-0 text-red">-200</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-bullseye me-3 icon-lg text-warning"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">总量化</small>
                                    <h5 class="me-2 mb-0 text-red">-4444</h5>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">不知道是啥</small>
                                    <h5 class="me-2 mb-0 text-green">3497843</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Start date</small>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Downloads</small>
                                    <h5 class="me-2 mb-0">2233783</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Total views</small>
                                    <h5 class="me-2 mb-0">9833550</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Revenue</small>
                                    <h5 class="me-2 mb-0">$577545</h5>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Flagged</small>
                                    <h5 class="me-2 mb-0">3497843</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                        <div class="d-flex flex-wrap justify-content-xl-between">
                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Start date</small>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Revenue</small>
                                    <h5 class="me-2 mb-0">$577545</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Total views</small>
                                    <h5 class="me-2 mb-0">9833550</h5>
                                </div>
                            </div>
                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-download me-3 icon-lg text-warning"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Downloads</small>
                                    <h5 class="me-2 mb-0">2233783</h5>
                                </div>
                            </div>
                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                <i class="mdi mdi-flag me-3 icon-lg text-danger"></i>
                                <div class="d-flex flex-column justify-content-around">
                                    <small class="mb-1 text-muted">Flagged</small>
                                    <h5 class="me-2 mb-0">3497843</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">个人总量化</p>
                <h1 class="text-red">-4444</h1>
                <h4></h4>
                <p class="text-muted">你扣的分有点多哦！</p>
                <div id="total-sales-chart-legend"></div>
            </div>
            <canvas id="total-sales-chart"></canvas>
        </div>
    </div>
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">班级量化记录</p>
                <p class="mb-4">去开始部落格，思考一个主题关于，并且第一次的头脑风暴排队是方法去书写细节。</p>
                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                <canvas id="cash-deposits-chart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">最近记录</p>
                <div class="table-responsive">
                    <?php tables::JQDataTable("recent-purchases-listing") ?>
                    <table id="recent-purchases-listing" class="table">
                        <thead>
                            <tr>
                                <th>类型</th>
                                <th>分数</th>
                                <th>原因</th>
                                <th>更多信息</th>
                                <th>日期</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>个人</td>
                                <td>-100</td>
                                <td>桌面上有书</td>
                                <td>无</td>
                                <td>Today</td>
                            </tr>
                            <tr>
                                <td>班级</td>
                                <td>-20</td>
                                <td>垃圾桶里有垃圾</td>
                                <td>无备注</td>
                                <td>昨天</td>
                            </tr>
                            <tr>
                                <td>学校</td>
                                <td>-50</td>
                                <td>实验室设备故障</td>
                                <td>无</td>
                                <td>前天</td>
                            </tr>
                            <tr>
                                <td>家庭</td>
                                <td>-15</td>
                                <td>空调不制冷</td>
                                <td>需紧急处理</td>
                                <td>2天前</td>
                            </tr>
                            <tr>
                                <td>公司</td>
                                <td>-200</td>
                                <td>会议室投影仪损坏</td>
                                <td>无</td>
                                <td>今天</td>
                            </tr>
                            <tr>
                                <td>社团</td>
                                <td>-30</td>
                                <td>活动物资短缺</td>
                                <td>无备注</td>
                                <td>3天前</td>
                            </tr>
                            <tr>
                                <td>宿舍</td>
                                <td>-75</td>
                                <td>卫生间水管漏水</td>
                                <td>已报修</td>
                                <td>上周</td>
                            </tr>
                            <tr>
                                <td>图书馆</td>
                                <td>-10</td>
                                <td>自习室插座故障</td>
                                <td>无</td>
                                <td>4天前</td>
                            </tr>
                            <tr>
                                <td>食堂</td>
                                <td>-25</td>
                                <td>餐具消毒不彻底</td>
                                <td>无备注</td>
                                <td>5天前</td>
                            </tr>
                            <tr>
                                <td>个人</td>
                                <td>-150</td>
                                <td>电脑屏幕碎裂</td>
                                <td>无</td>
                                <td>今天</td>
                            </tr>
                            <tr>
                                <td>班级</td>
                                <td>-40</td>
                                <td>教室窗帘损坏</td>
                                <td>处理中</td>
                                <td>昨天</td>
                            </tr>
                            <tr>
                                <td>实验室</td>
                                <td>-80</td>
                                <td>实验器材缺失</td>
                                <td>无</td>
                                <td>前天</td>
                            </tr>
                            <tr>
                                <td>家庭</td>
                                <td>-60</td>
                                <td>厨房油烟机故障</td>
                                <td>无备注</td>
                                <td>2天前</td>
                            </tr>
                            <tr>
                                <td>公司</td>
                                <td>-300</td>
                                <td>打印机频繁卡纸</td>
                                <td>无</td>
                                <td>3天前</td>
                            </tr>
                            <tr>
                                <td>社团</td>
                                <td>-90</td>
                                <td>活动场地被占用</td>
                                <td>需协调</td>
                                <td>上周</td>
                            </tr>
                            <tr>
                                <td>宿舍</td>
                                <td>-45</td>
                                <td>阳台玻璃破裂</td>
                                <td>无</td>
                                <td>4天前</td>
                            </tr>
                            <tr>
                                <td>图书馆</td>
                                <td>-200</td>
                                <td>图书归还系统故障</td>
                                <td>无备注</td>
                                <td>5天前</td>
                            </tr>
                            <tr>
                                <td>食堂</td>
                                <td>-120</td>
                                <td>餐桌椅损坏</td>
                                <td>无</td>
                                <td>上个月</td>
                            </tr>
                            <tr>
                                <td>个人</td>
                                <td>-180</td>
                                <td>手机充电器丢失</td>
                                <td>无备注</td>
                                <td>今天</td>
                            </tr>
                            <tr>
                                <td>班级</td>
                                <td>-55</td>
                                <td>教室灯光昏暗</td>
                                <td>已反馈</td>
                                <td>昨天</td>
                            </tr>
                            <tr>
                                <td>学校</td>
                                <td>-130</td>
                                <td>操场设施老化</td>
                                <td>无</td>
                                <td>前天</td>
                            </tr>
                            <tr>
                                <td>家庭</td>
                                <td>-70</td>
                                <td>洗衣机无法启动</td>
                                <td>无备注</td>
                                <td>2天前</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
view::foot();
?>
<script>
    (function($) {
        'use strict';
        $(function() {

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

        });
    })(jQuery);
</script>