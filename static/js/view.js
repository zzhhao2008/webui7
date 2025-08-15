function ShowMessage(title, text, time) {
    msbox = document.getElementById("messageboxbox");
    newdiv=document.createElement('div');
    newdiv.innerHTML=`
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