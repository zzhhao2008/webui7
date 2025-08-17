<?php
view::header('按钮们');
?>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">按钮们</p>
                真的小径:<code>/script/pages/buttons.php</code>
                <p>查看说明文档：<a href="/doc?id=3">/document/buttons.md</a></p>
                <p>文档中部分原始HTML没有被修改，可以亲自尝试！</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-4">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">单个的颜色按钮们</h4>
                                        <p class="card-description">PHP Code:<code>buttons::single([str:text],[str:function],[str:Type])</code></p>
                                        <div class="template-demo">
                                            <?= buttons::single("基础的", "", "primary"); ?>
                                            <?= buttons::single("成功", "", "success"); ?>
                                            <?= buttons::single("警告", "", "warning"); ?>
                                            <?= buttons::single("危险", "", "danger"); ?>
                                            <?= buttons::single("信息", "", "info"); ?>
                                            <?= buttons::single("禁用", "", "disabled"); ?>
                                            <?= buttons::single("链接", "", "link"); ?>
                                            <?= buttons::single("光", "", "light"); ?>
                                            <?= buttons::single("黑暗", "", "dark"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">圆的按钮们</h4>
                                        <p class="card-description">Add string <code>rounded</code>to param #5 (array)</p>
                                        <div class="template-demo">
                                            <?= buttons::single("基础的", "", "primary", "", ["rounded"]); ?>
                                            <?= buttons::single("成功", "", "success", "", ["rounded"]); ?>
                                            <?= buttons::single("警告", "", "warning", "", ["rounded"]); ?>
                                            <?= buttons::single("危险", "", "danger", "", ["rounded"]); ?>
                                            <?= buttons::single("信息", "", "info", "", ["rounded"]); ?>
                                            <?= buttons::single("光", "", "light", "", ["rounded"]); ?>
                                            <?= buttons::single("黑暗", "", "dark", "", ["rounded"]); ?>
                                            <?= buttons::single("链接", "", "link", "", ["rounded"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">外框线按钮们</h4>
                                        <p class="card-description">Use string <code>rounded</code>in param #4</p>
                                        <div class="template-demo">
                                            <?= buttons::single("初级", "", "primary", "outline"); ?>
                                            <?= buttons::single("次要", "", "secondary", "outline"); ?>
                                            <?= buttons::single("成功", "", "success", "outline"); ?>
                                            <?= buttons::single("警告", "", "warning", "outline"); ?>
                                            <?= buttons::single("危险", "", "danger", "outline"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">反转按钮们</h4>
                                        <p class="card-description">Use string <code>inverse</code>in param #4</p>
                                        <div class="template-demo">
                                            <?= buttons::single("基础的", "", "primary", "inverse"); ?>
                                            <?= buttons::single("成功", "", "success", "inverse"); ?>
                                            <?= buttons::single("警告", "", "warning", "inverse"); ?>
                                            <?= buttons::single("危险", "", "danger", "inverse"); ?>
                                            <?= buttons::single("禁用", "", "disabled", "inverse"); ?>
                                            <?= buttons::single("成功", "", "success", "inverse"); ?>
                                            <?= buttons::single("光", "", "light", "inverse"); ?>
                                            <?= buttons::single("黑暗", "", "dark", "inverse"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h4 class="card-title">图标按钮们</h4>
                                        <p class="card-description">Add class <code>.btn-icon</code> for buttons with only icons</p>
                                        <div class="template-demo d-flex justify-content-between flex-nowrap">
                                            <button type="button" class="btn btn-primary btn-rounded btn-icon">
                                                <i class="mdi mdi-home-outline"></i>
                                            </button>
                                            <button type="button" class="btn btn-dark btn-rounded btn-icon">
                                                <i class="mdi mdi-internet-explorer"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-email-open"></i>
                                            </button>
                                            <button type="button" class="btn btn-info btn-rounded btn-icon">
                                                <i class="mdi mdi-star"></i>
                                            </button>
                                            <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                <i class="mdi mdi-map-marker"></i>
                                            </button>
                                        </div>
                                        <div class="template-demo d-flex justify-content-between flex-nowrap">
                                            <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                                                <i class="mdi mdi-home-outline"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-dark btn-icon">
                                                <i class="mdi mdi-internet-explorer"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-danger btn-icon">
                                                <i class="mdi mdi-email-open"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-info btn-icon">
                                                <i class="mdi mdi-star"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-success btn-icon">
                                                <i class="mdi mdi-map-marker"></i>
                                            </button>
                                        </div>
                                        <div class="template-demo d-flex justify-content-between flex-nowrap mt-4">
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-heart-outline text-danger"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-music text-dark"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-star text-primary"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-signal text-info"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-trending-up text-success"></i>
                                            </button>
                                        </div>
                                        <div class="template-demo d-flex justify-content-between flex-nowrap">
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-music"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-star"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-signal"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                                                <i class="mdi mdi-trending-up"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h4 class="card-title">按钮大小</h4>
                                        <p class="card-description">Use class <code>.btn-{size}</code></p>
                                        <div class="template-demo">
                                            <button type="button" class="btn btn-outline-secondary btn-lg">btn-lg</button>
                                            <button type="button" class="btn btn-outline-secondary btn-md">btn-md</button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm">btn-sm</button>
                                        </div>
                                        <div class="template-demo mt-4">
                                            <button type="button" class="btn btn-danger btn-lg">btn-lg</button>
                                            <button type="button" class="btn btn-success btn-md">btn-md</button>
                                            <button type="button" class="btn btn-primary btn-sm">btn-sm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">按钮块</h4>
                                <p class="card-description">Add class <code>.btn-block</code></p>
                                <div class="template-demo">
                                    <button type="button" class="btn btn-info btn-lg btn-block">Block buttons
                                        <i class="mdi mdi-menu float-right"></i>
                                    </button>
                                    <button type="button" class="btn btn-dark btn-lg btn-block">Block buttons</button>
                                    <button type="button" class="btn btn-primary btn-lg btn-block">
                                        <i class="mdi mdi-account"></i>
                                        Block buttons
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-lg btn-block">Block buttons</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">按钮组</h4>
                                        <p class="card-description">Wrap a series of buttons with <code>.btn</code>
                                            in <code>.btn-group</code></p>
                                        <div class="template-demo">
                                            <?= buttons::group([
                                                [
                                                    "text" => "按钮1",
                                                    "function" => "alert('点击了按钮1')"
                                                ],
                                                [
                                                    "text" => "按钮2",
                                                    "function" => "alert('点击了按钮2')",
                                                    "color" => "danger"
                                                ],
                                                [
                                                    "text" => view::icon("home"),
                                                    "function" => "jump:/",
                                                    "color" => "warning",
                                                ],
                                            ]) ?>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary">
                                                    <i class="mdi mdi-heart-outline"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary">
                                                    <i class="mdi mdi-calendar"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary">
                                                    <i class="mdi mdi-clock"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="template-demo">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary">1</button>
                                                <button type="button" class="btn btn-primary">2</button>
                                                <button type="button" class="btn btn-primary">3</button>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="mdi mdi-heart-outline"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="mdi mdi-calendar"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="mdi mdi-clock"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="template-demo mt-4">
                                            <?= buttons::group([
                                                [
                                                    "text" => view::icon("flag"),
                                                    "function" => "alert('点击了按钮1')",
                                                    "border"=> "inverse"
                                                ],
                                                [
                                                    "text" => view::icon("print"),
                                                    "function" => "alert('点击了按钮2')",
                                                    "color" => "danger",
                                                    "border"=> "outline"
                                                ],
                                                [
                                                    "text" => view::icon("home"),
                                                    "function" => "jump:/",
                                                    "color" => "outline-secondary",
                                                ],
                                            ], 1) ?>
                                            <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary">Default</button>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">Dropdown</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item">Go back</a>
                                                        <a class="dropdown-item">Delete</a>
                                                        <a class="dropdown-item">Swap</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-secondary">Default</button>
                                            </div>
                                            <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary">Top</button>
                                                <button type="button" class="btn btn-outline-secondary">Middle</button>
                                                <button type="button" class="btn btn-outline-secondary">Bottom</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="card-title">按钮和图标以及文字</h4>
                                        <p class="card-description">Wrap icon and text inside <code>.btn-icon-text</code> and use <code>.btn-icon-prepend</code>
                                            or <code>.btn-icon-append</code> for icon tags</p>
                                        <p class="text-red">函数会自动识别图标型按钮和图标+文字型按钮！</p>
                                        <div class="template-demo">
                                            <?=buttons::single(view::icon("file-check btn-icon-prepend")."123")?>
                                            <?=buttons::single(view::icon("file-check btn-icon-append")."123")?>
                                        </div>
                                        <div class="template-demo">
                                            <button type="button" class="btn btn-danger btn-icon-text">
                                                <i class="mdi mdi-upload btn-icon-prepend"></i>
                                                Upload
                                            </button>
                                            <button type="button" class="btn btn-info btn-icon">
                                                Print
                                                <i class="mdi mdi-printer btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-icon-text">
                                                <i class="mdi mdi-reload btn-icon-prepend"></i>
                                                Reset
                                            </button>
                                        </div>
                                        <div class="template-demo mt-2">
                                            <button type="button" class="btn btn-outline-primary btn-icon-text">
                                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                                Submit
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-icon-text">
                                                Edit
                                                <i class="mdi mdi-file-check btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-success btn-icon-text">
                                                <i class="mdi mdi-alert btn-icon-prepend"></i>
                                                Warning
                                            </button>
                                        </div>
                                        <div class="template-demo">
                                            <button type="button" class="btn btn-outline-danger btn-icon-text">
                                                <i class="mdi mdi-upload btn-icon-prepend"></i>
                                                Upload
                                            </button>
                                            <button type="button" class="btn btn-outline-info btn-icon-text">
                                                Print
                                                <i class="mdi mdi-printer btn-icon-append"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-warning btn-icon-text">
                                                <i class="mdi mdi-reload btn-icon-prepend"></i>
                                                Reset
                                            </button>
                                        </div>
                                        <div class="template-demo mt-2">
                                            <button class="btn btn-outline-dark btn-icon-text">
                                                <i class="mdi mdi-apple btn-icon-prepend mdi-36px"></i>
                                                <span class="d-inline-block text-left">
                                                    <small class="font-weight-light d-block">Available on the</small>
                                                    App Store
                                                </span>
                                            </button>
                                            <button class="btn btn-outline-dark btn-icon-text">
                                                <i class="mdi mdi-android-debug-bridge btn-icon-prepend mdi-36px"></i>
                                                <span class="d-inline-block text-left">
                                                    <small class="font-weight-light d-block">Get it on the</small>
                                                    Google Play
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
view::foot();
?>