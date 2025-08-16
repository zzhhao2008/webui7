<?php
function safeContent($content)
{
    // 匹配所有的 <img> 标签并提取出来
    preg_match_all('/<img\s+[^>]*src=["\']?([^"\'\s>]+)["\']?[^>]*>/i', $content, $matches);

    // 占位符替换，避免被转义
    $placeholders = [];
    foreach ($matches[0] as $index => $imgTag) {
        $placeholder = "__IMG_TAG_{$index}__";
        $placeholders[$placeholder] = $imgTag;
        $content = str_replace($imgTag, $placeholder, $content);
    }

    // 转义非 <img> 标签的内容
    $content = htmlspecialchars($content);

    // 将换行符替换为 <br>
    //$content = str_replace("\n", "<br>", $content);

    // 恢复占位符为原始 <img> 标签
    foreach ($placeholders as $placeholder => $imgTag) {
        $content = str_replace($placeholder, $imgTag, $content);
    }

    return $content;
}


function arrayDecode($array, $llimit = 8128)
{
    $req = [];
    $safeneedle = ["answer", "face", "cfg", "que", "texts", "addtext"];
    if (!is_array($array)) {
        $array = [$array];
    }
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $req[$k] = arrayDecode($v);
        } else {
            if (strlen($v) > $llimit) {
                $v = substr($v, 0, $llimit) . "...";
            }
            $v = htmlspecialchars($v);
            if (!in_array($k, $safeneedle)) $req[$k] = addslashes($v);
            else $req[$k] = $array[$k];
        }
    }
    return $req;
}
function requestDecode()
{
    $req_all = [];
    $req_all['GET'] = arrayDecode($_GET, 2560);
    $req_all['POST'] = arrayDecode($_POST, 1024 * 10);

    return $req_all;
}
function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}
function jsjump($u)
{
    echo "<script>window.location='$u'</script>";
}
function jsreload()
{
    echo "<script>window.location.reload()</script>";
}

function getstatic($name)
{
    return file_get_contents("static/$name");
}

function includePage($pagename)
{
    return "./script/page/$pagename.php";
}
function includeViewer($name)
{
    return "./script/view/$name.php";
}
function includeC($name)
{
    return "./script/$name.php";
}

function includeLib($libname)
{
    return "./script/lib/$libname.php";
}

/**
 * 生成安全可靠的唯一ID
 * 
 * @param string $prefix ID前缀（可选）
 * @param string $suffix ID后缀（可选）
 * @return string 生成的唯一ID
 */
function uuidGenerator($prefix = "", $suffix = "")
{
    // 生成16字节(128位)加密安全随机数据
    $bytes = random_bytes(16);

    // 设置UUID版本(4)和变体(RFC 4122)
    $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40); // 版本4
    $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80); // 变体10xx

    // 转换为标准UUID格式(8-4-4-4-12)
    $uuid = sprintf(
        '%s%s-%s-%s-%s-%s%s%s',
        bin2hex(substr($bytes, 0, 4)),
        bin2hex(substr($bytes, 4, 2)),
        bin2hex(substr($bytes, 6, 2)),
        bin2hex(substr($bytes, 8, 2)),
        bin2hex(substr($bytes, 10, 2)),
        bin2hex(substr($bytes, 12, 2)),
        bin2hex(substr($bytes, 14, 2)),
        bin2hex(substr($bytes, 16, 2))
    );

    return $prefix . $uuid . $suffix;
}
