<?php
$banIP=[];
error_reporting(E_ALL^E_NOTICE);
include "./script/lib/main.php";
Router::loadRouteMap();
$p=[];

$safereq=requestDecode();
$mypower=0;
include includePage(Router::GetScriptPath(Router::getUri(),$mypower));
