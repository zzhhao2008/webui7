<?php
function includeGLib($libname)
{
    return "script/lib_global/$libname.php";
}

include includeGLib("main");
include includeGLib("basic/time");
include includeGLib("basic/router");
include includeGLib("view/view");
include includeGLib("view/buttons");


$GLOBALS['titleSuffix'] = "-ZSV WebUI7.0";
$GLOBALS['logo'] = "/static/image/tool/logo.webp";
$GLOBALS['logo_long'] = "/static/image/tool/zbsytextlogo.png";
$GLOBALS['title'] = "UI7.0";
$GLOBALS["messages"]=array(
    [
        "url" => "/",
        "title" => "欢迎使用ZSV WebUI7.0",
        "content" => "欢迎使用ZSV WebUI7.0",
        "icon" => "home"
    ]
);
