var editors = []
function initEditor(id = 0, language = "markdown",rl=0,theme = "tomorrow") {
    //获取控件   id ：codeEditor
    editors[id] = ace.edit("codeEditor"+id);
    ;
    editors[id].setTheme("ace/theme/" + theme);
    editors[id].session.setMode("ace/mode/" + language);
    //字体大小
    editors[id].setFontSize(15);
    //设置只读（true时只读，用于展示代码）
    editors[id].setReadOnly(rl);
    //自动换行,设置为off关闭
    editors[id].setOption("wrap", "free");
    //启用提示菜单
    ace.require("ace/ext/language_tools");

    if (!rl) {
        editors[id].getSession().on('change', function () {
            document.getElementById("ace-"+id).value =
            editors[id].getValue();
        });
    }

}

function changeTheme(theme,id=0) {
    editors[id].setTheme("ace/theme/" + theme);
}
function changeLanguage(language,id=0) {
    editors[id].session.setMode("ace/mode/" + language);
}
function changeFontSize(size,id=0) {
    editors[id].setFontSize(size);
}   