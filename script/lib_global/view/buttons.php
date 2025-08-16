<?php
class buttons
{
    //单个按钮
    /**
     * 单个按钮
     * @param string $text 按钮文字
     * @param string $function 按钮点击事件
     * @param string $color 按钮颜色
     * @param string $border 按钮边框颜色
     * @param array $para 按钮参数
     * @param string $type 按钮类型
     * @param string $o 其他属性
     * @return string 按钮HTML代码
     */
    public static function single($text, $function = "", $color = "primary",$border="",$para=[],$type="button", $o = "")
    {
        if (strpos($function, "jump:") !== false) {
            $function = str_replace("jump:", "location.href=`", $function)."`";
        }
        if(strpos($text,"<i")!==false){
            if(strpos($text,"i>")!=strlen($text)-2){
                $para[]="icon-text";
            }else{
                $para[]="icon";
            }
        }
        $border=$border?"-$border":"";
        $paras = "";
        foreach ($para as $k => $v) {
            $paras .= " btn-$v";
        }
        return "<button type=\"$type\" class=\"btn btn$border-$color $paras\" $o onclick=\"$function\">$text</button>";
    }
    // 按钮组
    /**
     * 按钮组
     * @param array $buttons 按钮组
     * @param int $v 垂直对齐方式-0/"r" for 水平 1/v" for 垂直
     * @return string
     */
    public static function group($buttons,$v=0) {
        $html = "";
        foreach ($buttons as $button) {
            $html .= self::single(
                $button["text"],
                $button["function"]?:"",
                $button["color"]?:"primary",
                $button["border"]?:"",
                $button["para"]?:[],
                $button['type']?:"button",
                $button["o"]?:""
            );
        }
        if($v!=0&&$v!="r"){
            $cn="btn-group-vertical";
        }else{
            $cn="btn-group";
        }
        return "<div class=\"$cn\">$html</div>";
    }

}
