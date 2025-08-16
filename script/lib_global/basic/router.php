<?php
$routerMap=[];
class Router{
    static public function getUri($o=0){
        $uri=$_SERVER['REQUEST_URI'];
        if($uri==='/'||$uri[1]==='?') return '/';
        $uri=addslashes($uri);
        $qp=stripos($uri,"?")-1;
        if($qp<=0) $qp=strlen($uri)-1;
        $uri=substr($uri,1,$qp);
        $uri=str_replace("//","/",$uri);
        $uri=str_replace("\\","/",$uri);
        $uri=trim($uri);
        $uri=str_replace("..","",$uri);
        $uri=str_replace([".aspx",".php",".html",".md",".htm",".js",".css"],"",$uri);
        return $o?$_SERVER['REQUEST_URI']:$uri;
    }
    static public function login($uri,$scp){
        global $routerMap;
        $routerMap['login'][$uri]=$scp;
    }
    static public function any($uri,$scp){
        global $routerMap;
        $routerMap['any'][$uri]=$scp;
    }
    static public function guest($uri,$scp){
        global $routerMap;
        $routerMap['guest'][$uri]=$scp;
    }
    static public function admin($uri,$scp){
        global $routerMap;
        $routerMap['admin'][$uri]=$scp;
    }
    static public function post($uri,$scp){
        global $routerMap;
        $routerMap['post'][$uri]=$scp;
    }
    static public function loadRouteMap(){
        global $routerMap;
        include includeC("route");
        return;
    }
    static public function GetScriptPath($ru,$userpower=0){
        global $routerMap;
        if(empty($routerMap)) Router::loadRouteMap();
        if(isset($routerMap['any'][$ru])) return $routerMap['any'][$ru];
        if(isset($routerMap['login'][$ru])&&$userpower>=1) return $routerMap['login'][$ru];
        if(isset($routerMap['admin'][$ru])&&$userpower>=3) return $routerMap['admin'][$ru];
        if(isset($routerMap['guest'][$ru])&&$userpower==0) return $routerMap['guest'][$ru];
        if(isset($routerMap['login'][$ru])&&$userpower==0) return "../../../global/user/stulogin";
        return "error/404";
    }
}