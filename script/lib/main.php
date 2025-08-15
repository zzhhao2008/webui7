<?php
function includeGLib($libname)
{
    return "script/lib_global/$libname.php";
}

include includeGLib("main");
include includeGLib("basic/time");
include includeGLib("basic/router");
include includeGLib("view/view");


$GLOBALS['titleSuffix'] = "-ZSV WebUI7.0";
$GLOBALS['logo'] = "/static/image/tool/logo.webp";
$GLOBALS['title'] = "UI7.0";