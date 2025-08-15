<?php
view::header("权限错误");
?>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">x_x 出错了！</p>
                <p>Error:403</p>
                <p>可能的原因：</p>
                <ul>
                    <li class="text-danger">本学期填报尚未开始</li>
                    <li>您没有足够的权限访问此页面。</li>
                    <li>该页面可能已被删除或不存在。</li>
                </ul>
                <a href="/" class="btn btn-light">返回首页</a>
            </div>
        </div>
    </div>
</div>
<?php
view::foot();
?>