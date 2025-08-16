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
function activeMB(){
    document.getElementById("messageDropdown").innerHTML=`<i class="mdi mdi-bell mx-0"></i><span class="count"></span>`;
}
function deactiveMB(){
    document.getElementById("messageDropdown").innerHTML=`<i class="mdi mdi-bell mx-0"></i>`;
}