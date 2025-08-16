<?php
$doclist = [
    [
        "title" => "渲染管线及小组件",
        "uri" => "documents/viewapi.md"
    ],
    [
        "title" => "API列表及系统级组件",
        "uri" => "documents/apilist.md"
    ],
    [
        "title" => "组件列表",
        "uri" => "documents/componentlist.md"
    ],
    [
        "title" => "按钮组件",
        "uri" => "documents/buttons.md"
    ],
];
$docid = $_GET['id'] ?? 0;
if ($docid < 0 || $docid >= count($doclist)) {
    $docid = 0;
}
$doc = $doclist[$docid];

view::header('阅读文档-' . $doc['title']);
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-4">
                <div id="docr" class="markdown-body">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    fetch("<?php echo $doc['uri'] ?>").then(function(response) {
        return response.text();
    }).then(function(text) {
        document.getElementById('docr').innerHTML = marked.parse(text);
    });
</script>

<?php
view::foot();
?>