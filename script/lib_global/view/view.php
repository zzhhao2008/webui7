<?php
$viewimport = [];
class view
{
    // 定义一个静态函数，用于生成HTML的头部
    public static function header($title = "主页", $oh = "", $nav = 1)
    {
        $title = $title . $GLOBALS['titleSuffix'];
        // 输出HTML的头部
        echo "<!DOCTYPE html>\n";
        echo "<head>\n";
        // 引入头部文件
        include includeViewer("header");
        // 输出标题
        echo "\n<title>", $title . "</title>\n";
        // 输出oh变量
        echo $oh;

        echo "</head>\n";
        // 引入导航文件
        if ($nav) include includeViewer("nav");
        echo '<div class="main-panel full-scroll"><div class="content-wrapper">';
    }
    // 定义一个静态函数，用于生成HTML的尾部
    public static function foot()
    {
        // 输出容器结束
        echo "\n</div>\n";
        // 引入尾部文件
        include includeViewer("foot");
        echo "\n</div>\n";
        view::import();
    }
    public static function import()
    {
        global $viewimport;
        if ($viewimport['messagebox']) {
            echo "<div class=\"toast-container right-pos\" id='messageboxbox'>" . $viewimport['messagebox'] . "</div>";
            $viewimport['messagebox'] = "";
        } else {
            echo "<div class=\"toast-container right-pos\" id='messageboxbox'></div>";
        }
        if ($viewimport['alert']) {
            echo "<div class=\"top-pos\" id='alertboxbox'>" . $viewimport['alert'] . "</div>";
            $viewimport['alert'] = "";
        } else {
            echo "<div class=\"top-pos\" id='alertboxbox'></div>";
        }
        if ($viewimport['js']) {
            echo "\n<script>\n" . $viewimport['js'] . "\n</script>\n";
            $viewimport['js'] = "";
        }
        if ($viewimport['css']) {
            echo "\n<style>\n" . $viewimport['css'] . "\n</style>\n";
            $viewimport['css'] = "";
        }
        echo "\n</body>\n</html>";
    }
    public static function B404()
    {
        include includePage("error/404");
        view::import();
        exit;
    }
    public static function B403()
    {
        include includePage("error/403");
        view::import();
        exit;
    }

    /** TOOLS： */
    // 定义一个静态函数，用于生成图标
    public static function icon($name, $other = "")
    {
        // 返回图标
        return "<i class='mdi mdi-$name $other'></i>";
    }
    // 定义一个静态函数，用于生成jsMdLt
    public static function jsMdLt($id = "pFace", $text)
    {
        // 输出JSMarkdown解析器
        echo "
        <script>
        document.getElementById('$id').innerHTML = marked.parse(`" . str_replace("`", "\`", addslashes($text)) . "`);
    </script>";
    }
    public static function jsMdLt_GetOnly($id = "pFace", $noecho = 0)
    {
        // 输出JSMarkdown解析器
        $s = "
        <script>
        document.getElementById('$id').innerHTML = marked.parse(document.getElementById('$id').innerHTML);
    </script>";
        if ($noecho) {
            return $s;
        } else {
            echo $s;
        }
    }
    public static function alert($text, $type = "info", $currenttime = 5000)
    {
        global $viewimport;
        $id = "alert" . time() . rand(1000, 9999) . rand(1000, 9999);
        $viewimport['alert'] = "<div class='alert alert-$type' role='alert' id='$id'>
        $text" .
            //五秒后使用JS删除这个元素
            "<script>setTimeout(function(){document.getElementById('$id').remove();},$currenttime);</script></div>"
            . $viewimport['alert'];
        return $text;
    }
    public static function pageCutNav($now, $total, $url)
    {
        //if ($total <= 1) return; // 如果总页数小于等于1，则无需显示分页导航

        // 判断url中是否已经包含GET参数
        $url .= (strpos($url, "?") !== false) ? "&" : "?";

        echo "<div class='my-2'><ul class=\"pagination justify-content-center\">";

        // 显示“上一页”按钮
        if ($now > 1) {
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}page=" . ($now - 1) . "\">上一页</a></li>";
        } else {
            echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">上一页</a></li>";
        }

        // 显示页码
        if ($total <= 10) {
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $now) {
                    echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"{$url}page={$i}\">{$i}</a></li>";
                } else {
                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}page={$i}\">{$i}</a></li>";
                }
            }
        } else
            for ($i = 1; $i <= $total; $i++) {
                // 控制始终给出9个块（除非页数不够），其余使用...代替，至少应该显示第一页和最后一页以及当前页前后2页
                if ($i == 1 || $i == $total || ($i >= $now - 2 && $i <= $now + 2)) {
                    if ($i == $now) {
                        echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"#\">$i</a></li>";
                    } else {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}page=$i\">$i</a></li>";
                    }
                } elseif (($i == 2 && $now > 4) || ($i == $total - 1 && $now < $total - 3)) {
                    echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">...</a></li>";
                }
            }

        // 显示“下一页”按钮
        if ($now < $total) {
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$url}page=" . ($now + 1) . "\">下一页</a></li>";
        } else {
            echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">下一页</a></li>";
        }

        echo "</ul></div>";
    }
    public static function aceeditor($code = "", $language = "c_cpp", $rl = 0, $outname = "")
    {
        global $editorthemeid;
        $code = str_replace("`", "\`", $code);
        global $viewimport;
        $id = 0;
        if (!$viewimport['temp']['acecnt']) $viewimport['temp']['acecnt'] = 1;
        else $id = $viewimport['temp']['acecnt']++;
        if ($outname == "") {
            $outname = "ace-$id";
        }
        echo <<<HTML
        <input id="ace-$id" name="$outname" type="hidden">
        <pre id='codeEditor{$id}' class="ace_editor" style="min-height:320px"><s:textarea class="ace_text-input"   cssStyle="width:97.5%;height:320px;"/></pre>
        <script>
        initEditor($id,'$language',$rl);
        editors[$id].insert(`$code`);
        editors[$id].setTheme("ace/theme/$editorthemeid");
        </script>
HTML;
        return $id;
    }
    public static function message($text, $title = '消息', $icon = "bell", $time = "刚刚")
    {
        global $viewimport;
        $icon = view::icon($icon);
        $id = "message" . time() . rand(1000, 9999) . rand(1000, 9999);
        $viewimport['messagebox'] =  <<<EOF
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" id="$id">
            <div class="toast-header">
            $icon
            <strong class="me-auto">$title</strong>
            <small class="text-muted">$time</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            $text
        </div>
        </div>
        EOF . $viewimport['messagebox'];
    }
    public static function addMessage($text, $title = '消息', $icon = "bell", $url = "", $show = 0, $time = "刚刚")
    {
        if ($show) self::message($text, $title, $icon, $time);
        global $viewimport;
        $text = str_replace("'", "\\'", $text);
        $title = str_replace("'", "\\'", $title);
        $url = str_replace("'", "\\'", $url);
        $viewimport['js'] .= "addMessage(`$title`,`$text` ,`$icon`, `$url`);\n";
    }
    public static function activeMB()
    {
        $GLOBALS['activeMB'] = 1;
        global $viewimport;
        $viewimport['js'] .= "activeMB();\n";
    }
    public static function deactiveMB()
    {
        $GLOBALS['activeMB'] = 0;
        global $viewimport;
        $viewimport['js'] .= "deactiveMB();\n";
    }
}
