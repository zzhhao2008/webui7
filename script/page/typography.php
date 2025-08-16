<?php
view::header("字体排印");
?>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">标题</h4>
                <p class="card-description">
                    添加标签 <code>&lt;h1&gt;</code> 到 <code>&lt;h6&gt;</code> 或类 <code>.h1</code> 到 <code>.h6</code>
                </p>
                <div class="template-demo">
                    <h1>h1. 标题</h1>
                    <h2>h2. 标题</h2>
                    <h3>h3. 标题</h3>
                    <h4>h4. 标题</h4>
                    <h5>h5. 标题</h5>
                    <h6>h6. 标题</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">带辅助文本的标题</h4>
                <p class="card-description">
                    为标题添加淡色的辅助文本
                </p>
                <div class="template-demo">
                    <h1>
                        h1. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h1>
                    <h2>
                        h2. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h2>
                    <h3>
                        h3. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h3>
                    <h4>
                        h4. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h4>
                    <h5>
                        h5. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h5>
                    <h6>
                        h6. 标题
                        <small class="text-muted">
                            辅助文本
                        </small>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">展示型标题</h4>
                <p class="card-description">
                    添加类 <code>.display1</code> 到 <code>.display-4</code>
                </p>
                <div class="template-demo">
                    <h1 class="display-1">展示 1</h1>
                    <h1 class="display-2">展示 2</h1>
                    <h1 class="display-3">展示 3</h1>
                    <h1 class="display-4">展示 4</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 d-flex align-items-stretch">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">段落</h4>
                        <p class="card-description">
                            在 <code>&lt;p&gt;</code> 标签中书写文本
                        </p>
                        <p>
                            Lorem Ipsum 是印刷和排版行业的简单虚拟文本。
                            自 1500 年代以来，Lorem Ipsum 一直是行业的标准虚拟文本，
                            当时一位不知名的印刷商采用了一种排版方式，不仅延续了五个世纪，
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">图标大小</h4>
                        <p class="card-description">
                            添加类 <code>.icon-lg</code>、<code>.icon-md</code>、<code>.icon-sm</code>
                        </p>
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="mdi mdi-compass-outline icon-lg text-warning"></i>
                                    <p class="mb-0 ms-1">
                                        图标-lg
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="mdi mdi-compass-outline icon-md text-success"></i>
                                    <p class="mb-0 ms-1">
                                        图标-md
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <i class="mdi mdi-compass-outline icon-sm text-danger"></i>
                                    <p class="mb-0 ms-1">
                                        图标-sm
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">引用块</h4>
                <p class="card-description">
                    将内容包裹在 <code>&lt;blockquote class="blockquote"&gt;</code> 中
                </p>
                <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                </blockquote>
            </div>
            <div class="card-body">
                <blockquote class="blockquote blockquote-primary">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <footer class="blockquote-footer">某位名人来自 <cite title="来源标题">来源标题</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">地址</h4>
                <p class="card-description">
                    使用 <code>&lt;address&gt;</code> 标签
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <p class="font-weight-bold">Majestic 公司</p>
                            <p>
                                695 lsom 大道,
                            </p>
                            <p>
                                00 套房
                            </p>
                            <p>
                                旧金山, 加利福尼亚州 94107
                            </p>
                        </address>
                    </div>
                    <div class="col-md-6">
                        <address class="text-primary">
                            <p class="font-weight-bold">
                                电子邮件
                            </p>
                            <p class="mb-2">
                                johndoe@examplemeail.com
                            </p>
                            <p class="font-weight-bold">
                                网站地址
                            </p>
                            <p>
                                www.Majestic.com
                            </p>
                        </address>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">强调段落</h4>
                <p class="card-description">
                    使用类 <code>.lead</code>
                </p>
                <p class="lead">
                    Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">文本颜色</h4>
                <p class="card-description">
                    使用类 <code>.text-primary</code>、<code>.text-secondary</code> 等，为文本设置主题颜色
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-primary">.text-primary</p>
                        <p class="text-success">.text-success</p>
                        <p class="text-danger">.text-danger</p>
                        <p class="text-warning">.text-warning</p>
                        <p class="text-info">.text-info</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-light bg-dark ps-1">.text-light</p>
                        <p class="text-secondary">.text-secondary</p>
                        <p class="text-dark">.text-dark</p>
                        <p class="text-muted">.text-muted</p>
                        <p class="text-white bg-dark ps-1">.text-white</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">顶部对齐媒体</h4>
                <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-start me-3"></i>
                    <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">居中对齐媒体</h4>
                <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-center me-3"></i>
                    <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">底部对齐媒体</h4>
                <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-end me-3"></i>
                    <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">高亮文本</h4>
                <p class="card-description">
                    将文本包裹在 <code>&lt;mark&gt;</code> 标签中以高亮显示
                </p>
                <p>
                    这是一个很长的 <mark class="bg-warning text-white">既定事实</mark>，读者在查看页面布局时，会被可读内容分散注意力。使用 Lorem Ipsum 的原因是它具有较为均匀的字母分布。
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">无序列表</h4>
                <ul>
                    <li>洛伦 ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">粗体文本</h4>
                <p class="card-description">
                    使用类 <code>.font-weight-bold</code>
                </p>
                <p>
                    这是一个很长的 <span class="font-weight-bold">既定事实</span>，读者在查看页面布局时，会被可读内容分散注意力。使用 Lorem Ipsum 的原因是它具有较为均匀的字母分布。
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">有序列表</h4>
                <ol>
                    <li>洛伦 ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary">下划线</h4>
                <p class="card-description">
                    使用 <code>&lt;u&gt;</code> 标签添加下划线
                </p>
                <p>
                    <u>洛伦 ipsum dolor sit amet, consectetur
                        mod tempor incididunt ut labore et dolore
                        magna aliqua.</u>
                </p>
            </div>
            <div class="card-body">
                <h4 class="card-title text-danger">小写</h4>
                <p class="card-description">
                    使用类 <code>.text-lowercase</code>
                </p>
                <p class="text-lowercase">
                    洛伦 ipsum dolor sit amet, consectetur
                    mod tempor incididunt ut labore et dolore
                    magna aliqua。
                </p>
            </div>
            <div class="card-body">
                <h4 class="card-title text-warning">大写</h4>
                <p class="card-description">
                    使用类 <code>.text-uppercase</code>
                </p>
                <p class="text-uppercase">
                    洛伦 ipsum dolor sit amet, consectetur
                    mod tempor incididunt ut labore et dolore
                    magna aliqua。
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">静音文本</h4>
                <p class="card-description">
                    使用类 <code>.text-muted</code>
                </p>
                <p class="text-muted">
                    洛伦 ipsum dolor sit amet, consectetur
                    mod tempor incididunt ut labore et dolore
                    magna aliqua。
                </p>
            </div>
            <div class="card-body">
                <h4 class="card-title text-success">删除线</h4>
                <p class="card-description">
                    将内容包裹在 <code>&lt;del&gt;</code> 标签中
                </p>
                <p>
                    <del>
                        洛伦 ipsum dolor sit amet, consectetur
                        mod tempor incididunt ut labore et dolore
                        magna aliqua。
                    </del>
                </p>
            </div>
            <div class="card-body">
                <h4 class="card-title text-info">首字母大写</h4>
                <p class="card-description">
                    使用类 <code>.text-capitalize</code>
                </p>
                <p class="text-capitalize">
                    洛伦 ipsum dolor sit amet, consectetur
                    mod tempor incididunt ut labore et dolore
                    magna aliqua。
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">带图标的列表</h4>
                <p class="card-description">在 <code>&lt;ul&gt;</code> 上添加类 <code>.list-ticked</code></p>
                <ul class="list-ticked">
                    <li>洛伦 ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">带图标的列表</h4>
                <p class="card-description">在 <code>&lt;ul&gt;</code> 上添加类 <code>.list-arrow</code></p>
                <ul class="list-arrow">
                    <li>洛伦 ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">带图标的列表</h4>
                <p class="card-description">在 <code>&lt;ul&gt;</code> 上添加类 <code>.list-star</code></p>
                <ul class="list-star">
                    <li>洛伦 ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
view::foot();
?>