<?php
view::header("权限错误");
?>
<div class="mt-4 p-5 themed-color rounded">
    <h1>您当前无法访问此页面</h1>
    <p>Error:403</p>
    <p>可能的原因：</p>
    <ul>
        <li class="text-danger">本学期填报尚未开始</li>
        <li>您没有足够的权限访问此页面。</li>
        <li>该页面可能已被删除或不存在。</li>
    </ul>
    <a href="/" class="btn btn-light">返回首页</a>
</div>
<?php
view::foot();
?>