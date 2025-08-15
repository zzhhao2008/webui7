<?php
view::header("404-出错了！");
?>
<div class="mt-4 p-5 themed-color  rounded">
    <h1>您请求的页面不存在</h1>
    <p>Error:404 Not Found</p>
    <p>请检查您输入的网址是否正确，或者点击下面的链接返回首页。</p>
    <a href="/" class="btn btn-light">返回首页</a>
</div>
<?php
view::foot();
?>