function ShowMessage(title, text, time) {
    msbox = document.getElementById("messageboxbox");
    newdiv = document.createElement('div');
    newdiv.innerHTML = `
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
    <strong class="me-auto">`+ title + `</strong>
    <small class="text-muted">`+ time + `</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
    `+ text + `
</div>
</div>
    `;
    msbox.appendChild(newdiv);
}
function addMessage(title, text, icon = "bell", url = "") {
    document.getElementById("messageDrop").innerHTML += `
        <a class="dropdown-item" src="${url}">
			<div class="item-thumbnail">
            <div class="item-icon bg-success">
				<i class="mdi mdi-${icon} mx-0"></i>
			</div>
			</div>
			<div class="item-content flex-grow">
				<h6 class="ellipsis font-weight-normal">
					${title}
				</h6>
				<p class="font-weight-light small-text text-muted mb-0">
					${text}
				</p>
			</div>
		</a>\n`;
}
function activeMB() {
    document.getElementById("messageDropdown").innerHTML = `<i class="mdi mdi-bell mx-0"></i><span class="count"></span>`;
}
function deactiveMB() {
    document.getElementById("messageDropdown").innerHTML = `<i class="mdi mdi-bell mx-0"></i>`;
}
$.extend(true, $.fn.dataTable.defaults, {
    "aLengthMenu": [
        [5, 10, 15, 50, -1],
        [5, 10, 15, 50, "全部"]
    ],
    "iDisplayLength": 10,
    "language": {
        search: "",
        "sProcessing": "处理中...",
        "sLengthMenu": "显示 _MENU_ 项结果",
        "sZeroRecords": "没有匹配结果",
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
        "sInfoPostFix": "",
        "sSearch": "搜索:",
        "sUrl": "",
        "sEmptyTable": "表中数据为空",
        "sLoadingRecords": "载入中...",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "首页",
            "sPrevious": "上页",
            "sNext": "下页",
            "sLast": "末页"
        },
        "oAria": {
            "sSortAscending": ": 以升序排列此列",
            "sSortDescending": ": 以降序排列此列"
        }
    }
})
function useJQDatatable(id, info = true, paging = true, search = true) {
    $('#' + id).DataTable({
        searching: search, paging: package, info: info
    });
}