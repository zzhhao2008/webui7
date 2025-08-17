<?php
view::header("表格们");
?>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">表格们</p>
                真的小径:<code>/script/pages/tables.php</code>
                <p>查看说明文档：<a href="/doc?id=4">/document/tables.md</a></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">典型列表</h4>
                <p class="card-description">
                    添加类 <code>.table</code>
                </p>
                <div class="table-responsive">
                    <?php
                    tables::common(
                        [
                            ["姓名", "职位", "办公室", "年龄", "入职日期", "薪资"],
                            ["张三", "系统架构师", "爱丁堡", "61", "2011/04/25", "320,800元"],
                            ["李四", "会计师", "东京", "63", "2011/07/25", "70,750元"],
                            ["王五", "初级技术作者", "旧金山", "66", "2009/01/12", "86,000元"],
                        ],
                        [],
                        [],
                        []
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">悬停表格</h4>
                <p class="card-description">
                    添加类 <code>.table-hover</code>
                </p>
                <div class="table-responsive">
                    <?php
                    tables::common(
                        [
                            ["用户", "产品", "销量", "状态"],
                            ["张三", "Photoshop", '28.76% <i class="mdi mdi-arrow-down"></i>', '<label class="badge badge-danger">待处理</label>'],
                            ["李四", "Flash", '21.06% <i class="mdi mdi-arrow-down"></i>', '<label class="badge badge-warning">进行中</label>'],
                            ["王五", "Premier", '35.00% <i class="mdi mdi-arrow-down"></i>', '<label class="badge badge-info">已修复</label>'],
                            ["赵六", "After effects", '82.00% <i class="mdi mdi-arrow-up"></i>', '<label class="badge badge-success">已完成</label>'],
                            ["孙七", "53275535", '98.05% <i class="mdi mdi-arrow-up"></i>', '<label class="badge badge-warning">进行中</label>'],
                        ],
                        ['hover'],
                        [],
                        [
                            2 => ['', '', 'text-danger', ''],
                            3 => ['', '', 'text-danger', ''],
                            4 => ['', '', 'text-danger', ''],
                            5 => ['', '', 'text-success', ''],
                            6 => ['', '', 'text-success', '']
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">条纹表格</h4>
                <p class="card-description">
                    添加类 <code>.table-striped</code>
                </p>
                <div class="table-responsive">
                    <?php
                    $data = [
                        ["", "姓名", "进度", "金额", "截止日期"],
                        ['<img src="../../images/faces/face1.jpg" alt="image" />', "张三", '<div class="progress"><div class="progress-bar bg-success" style="width:25%"></div></div>', "77.99元", "2015年5月15日"],
                        ['<img src="../../images/faces/face2.jpg" alt="image" />', "李四", '<div class="progress"><div class="progress-bar bg-danger" style="width:75%"></div></div>', "245.30元", "2015年7月1日"],
                        ['<img src="../../images/faces/face3.jpg" alt="image" />', "王五", '<div class="progress"><div class="progress-bar bg-warning" style="width:90%"></div></div>', "138.00元", "2015年4月12日"],
                        ['<img src="../../images/faces/face4.jpg" alt="image" />', "赵六", '<div class="progress"><div class="progress-bar bg-primary" style="width:50%"></div></div>', "77.99元", "2015年5月15日"],
                        ['<img src="../../images/faces/face5.jpg" alt="image" />', "孙七", '<div class="progress"><div class="progress-bar bg-danger" style="width:35%"></div></div>', "160.25元", "2015年5月3日"],
                        ['<img src="../../images/faces/face6.jpg" alt="image" />', "周八", '<div class="progress"><div class="progress-bar bg-info" style="width:65%"></div></div>', "123.21元", "2015年4月5日"],
                        ['<img src="../../images/faces/face7.jpg" alt="image" />', "吴九", '<div class="progress"><div class="progress-bar bg-warning" style="width:20%"></div></div>', "150.00元", "2015年6月16日"],
                    ];
                    $colcfg = [];
                    for ($i = 2; $i <= 8; $i++) {
                        $colcfg[$i] = ['py-1', '', '', '', ''];
                    }
                    tables::common($data, ['striped'], [], $colcfg);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">带边框表格</h4>
                <p class="card-description">
                    添加类 <code>.table-bordered</code>
                </p>
                <div class="table-responsive pt-3">
                    <?php
                    tables::common(
                        [
                            ["#", "姓名", "进度", "金额", "截止日期"],
                            ["1", "张三", '<div class="progress"><div class="progress-bar bg-success" style="width:25%"></div></div>', "77.99元", "2015年5月15日"],
                            ["2", "李四", '<div class="progress"><div class="progress-bar bg-danger" style="width:75%"></div></div>', "245.30元", "2015年7月1日"],
                            ["3", "王五", '<div class="progress"><div class="progress-bar bg-warning" style="width:90%"></div></div>', "138.00元", "2015年4月12日"],
                            ["4", "赵六", '<div class="progress"><div class="progress-bar bg-primary" style="width:50%"></div></div>', "77.99元", "2015年5月15日"],
                            ["5", "孙七", '<div class="progress"><div class="progress-bar bg-danger" style="width:35%"></div></div>', "160.25元", "2015年5月3日"],
                            ["6", "周八", '<div class="progress"><div class="progress-bar bg-info" style="width:65%"></div></div>', "123.21元", "2015年4月5日"],
                            ["7", "吴九", '<div class="progress"><div class="progress-bar bg-warning" style="width:20%"></div></div>', "150.00元", "2015年6月16日"],
                        ],
                        ['bordered']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">反色表格</h4>
                <p class="card-description">
                    添加类 <code>.table-dark</code>
                </p>
                <div class="table-responsive pt-3">
                    <?php
                    tables::common(
                        [
                            ["#", "姓名", "金额", "截止日期"],
                            ["1", "张三", "77.99元", "2015年5月15日"],
                            ["2", "李四", "245.30元", "2015年7月1日"],
                            ["3", "王五", "138.00元", "2015年4月12日"],
                            ["4", "赵六", "77.99元", "2015年5月15日"],
                            ["5", "孙七", "160.25元", "2015年5月3日"],
                            ["6", "周八", "123.21元", "2015年4月5日"],
                            ["7", "吴九", "150.00元", "2015年6月16日"],
                        ],
                        ['dark']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">上下文类表格</h4>
                <p class="card-description">
                    添加类 <code>.table-{颜色}</code>
                </p>
                <div class="table-responsive pt-3">
                    <?php
                    tables::common(
                        [
                            ["#", "姓名", "产品", "金额", "截止日期"],
                            ["1", "张三", "Photoshop", "77.99元", "2015年5月15日"],
                            ["2", "李四", "Flash", "245.30元", "2015年7月1日"],
                            ["3", "王五", "Premiere", "138.00元", "2015年4月12日"],
                            ["4", "赵六", "After effects", "77.99元", "2015年5月15日"],
                            ["5", "孙七", "Illustrator", "160.25元", "2015年5月3日"],
                        ],
                        ['bordered'],
                        [
                            2 => 'table-info',
                            3 => 'table-warning',
                            4 => 'table-danger',
                            5 => 'table-success',
                            6 => 'table-primary'
                        ]
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
view::foot();
?>