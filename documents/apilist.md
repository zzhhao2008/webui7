# API说明

## 路由（Router）
### /script/lib_global/basic/router.php
模块功能：提供路由功能，用于处理URL请求并调用相应的控制器方法。
路由表位置：/script/route.php
使用静态类 `Router::<functionname>` 实现基于权限控制的路由映射系统，支持不同用户角色的访问控制和请求路径解析。

#### 函数列表

##### 路径解析函数
- **`getUri($o=0)`**
  - **参数**：
    - `$o`: 是否返回完整URI（0=仅路径，1=完整URI含查询参数）
  - **返回**：
    - 当请求为根路径`/`或仅含查询参数时，返回`"/"`
    - 路径部分（去除开头`/`和查询参数）
    - 当`$o=1`时返回原始`REQUEST_URI`
  - **功能**：安全解析当前请求URI，处理特殊路径情况
  - **示例**：
    ```php
    // 假设请求为 "/user/profile?tab=settings"
    Router::getUri();       // 返回 "user/profile"
    Router::getUri(1);      // 返回 "/user/profile?tab=settings"
    ```

##### 路由注册函数
- **`any($uri, $scp)`**
  - **参数**：
    - `$uri`: 注册的路由路径（如`"user/profile"`）
    - `$scp`: 对应的脚本文件路径（如`"user/profile_view"`）
  - **功能**：注册对所有用户开放的路由
  - **使用场景**：公开页面、无需登录即可访问的内容
  - **示例**：
    ```php
    Router::any("home", "public/home");
    Router::any("about", "public/about");
    ```

- **`guest($uri, $scp)`**
  - **参数**：同上
  - **功能**：注册仅对游客（未登录用户）开放的路由
  - **权限要求**：用户权限必须为0
  - **使用场景**：登录页、注册页等游客专属页面
  - **示例**：
    ```php
    Router::guest("login", "user/login");
    Router::guest("register", "user/register");
    ```

- **`login($uri, $scp)`**
  - **参数**：同上
  - **功能**：注册需要登录用户（权限≥1）才能访问的路由
  - **权限要求**：用户权限≥1
  - **使用场景**：用户个人中心、需要认证的功能
  - **示例**：
    ```php
    Router::login("dashboard", "user/dashboard");
    Router::login("settings", "user/settings");
    ```

- **`admin($uri, $scp)`**
  - **参数**：同上
  - **功能**：注册需要管理员权限（权限≥3）才能访问的路由
  - **权限要求**：用户权限≥3
  - **使用场景**：后台管理、系统配置等高级功能
  - **示例**：
    ```php
    Router::admin("admin/users", "admin/user_management");
    Router::admin("admin/settings", "admin/system_settings");
    ```

- **`post($uri, $scp)`**
  - **参数**：同上
  - **功能**：注册仅处理POST请求的路由（当前实现仅为简单映射）
  - **注意**：当前版本未严格验证请求方法，需在业务逻辑中补充验证
  - **示例**：
    ```php
    Router::post("user/update", "user/update_handler");
    ```

##### 路由处理函数
- **`loadRouteMap()`**
  - **功能**：加载路由配置文件，初始化路由映射表
  - **实现细节**：
    - 通过`includeC("route")`引入路由配置文件
    - 填充全局变量`$routerMap`的路由映射数据
  - **最佳实践**：应在请求处理早期调用，确保路由映射已加载

- **`GetScriptPath($ru, $userpower=0)`**
  - **参数**：
    - `$ru`: 请求的URI路径（如`"user/profile"`）
    - `$userpower`: 用户权限级别（0=游客，1=普通用户，3=管理员）
  - **返回**：
    - 匹配的脚本路径（如`"user/profile_view"`）
    - 未匹配时返回`"error/404"`
    - 未登录用户访问需要登录的页面返回登录页路径
  - **匹配优先级**：
    1. `any`路由（所有用户可访问）
    2. `login`路由（登录用户可访问）
    3. `admin`路由（管理员可访问）
    4. `guest`路由（仅游客可访问）
  - **权限验证**：
    - `guest`路由：仅当`$userpower==0`时匹配
    - `login`路由：当`$userpower>=1`时匹配
    - `admin`路由：当`$userpower>=3`时匹配
  - **特殊处理**：
    - 未登录用户访问需要登录的页面，自动重定向到登录页
    - 无匹配路由返回404错误页面
  - **使用示例**：
    ```php
    $currentUri = Router::getUri();
    $userPower = $_SESSION['power'] ?? 0;
    $scriptPath = Router::GetScriptPath($currentUri, $userPower);
    
    if($scriptPath === "error/404") {
        view::B404();
    } else {
        include includePage($scriptPath);
    }
    ```

### 路由系统工作流程
1. **初始化阶段**：通过`loadRouteMap()`加载路由配置
2. **请求解析**：使用`getUri()`获取规范化请求路径
3. **权限判断**：根据当前用户权限级别
4. **路由匹配**：按优先级检查`any`→`login`→`admin`→`guest`路由
5. **脚本执行**：加载匹配的脚本文件或处理错误情况

### 最佳实践建议
1. **路由注册位置**：应在独立的路由配置文件中（通过`includeC("route")`引入）集中管理所有路由映射 
2. **权限分级**：建议采用明确的权限级别体系（0=游客，1=用户，3=管理员）
3. **错误处理**：未匹配路由应统一处理为404页面，避免信息泄露
4. **安全性**：
   - 敏感操作应使用`admin`路由而非`login`
   - POST请求应结合CSRF保护
   - 避免在路由中暴露敏感路径
5. **性能优化**：路由映射表应保持精简，避免过多正则匹配
6. **测试覆盖**：应针对不同权限用户测试各路由的访问控制 

### 示例：完整路由配置
```php
// route.php 配置文件示例
Router::any("home", "public/home");
Router::any("about", "public/about");

Router::guest("login", "user/login");
Router::guest("register", "user/register");

Router::login("dashboard", "user/dashboard");
Router::login("profile", "user/profile");

Router::admin("admin/users", "admin/user_management");
Router::admin("admin/settings", "admin/system_settings");

Router::post("user/update", "user/update_handler");
```
### 示例：使用路由
```php
include includePage(Router::GetScriptPath(Router::getUri(),$mypower));
```
- **includePage()**：用于包含脚本文件，确保路径正确
- **$mypower**：当前用户权限级别，通常从会话中获取

此路由系统实现了基于角色的访问控制(RBAC)，通过清晰的权限分级和路由映射，有效分离了URL结构与后端逻辑，提高了应用的安全性和可维护性。


## 时间处理工具
### /script/lib_global/basic/time.php
提供标准化时间和相对时间显示功能，包含时区设置和人性化时间差计算。

#### 函数列表

##### 日期格式化函数
- **`getDate_full($stamp)`**
  - **参数**：
    - `$stamp`: 时间戳（Unix timestamp）
  - **返回**：格式化后的完整日期时间字符串（`Y-m-d H:i:s`格式）
  - **功能**：
    - 自动设置时区为`Asia/Shanghai`（中国标准时间）
    - 将时间戳转换为"年-月-日 时:分:秒"格式
  - **示例**：
    ```php
    echo getDate_full(time()); 
    // 输出类似 "2023-12-25 14:30:45"
    ```
  - **最佳实践**：
    - 用于需要精确时间记录的场景（如日志记录、数据库存储）
    - 避免在循环中频繁调用，可预先设置时区

##### 相对时间计算函数
- **`getDate_ToNow($stamp)`**
  - **参数**：
    - `$stamp`: 时间戳（Unix timestamp）
  - **返回**：人性化相对时间描述字符串
  - **功能**：
    - 自动计算与当前时间的差值
    - 根据时间差动态返回最合适的表达方式
    - 时区自动设置为`Asia/Shanghai`
  - **返回规则**：
    | 时间差范围 | 返回格式示例 |
    |------------|--------------|
    | 小于0秒 | "刚刚" |
    | 0-60秒 | "5秒前" |
    | 1-60分钟 | "23分钟前" |
    | 1-24小时 | "3小时前" |
    | 1-7天 | "2.50天前"（保留两位小数）|
    | 超过7天 | "2023-12-25 14:30:45"（标准日期格式）|
  - **示例**：
    ```php
    // 假设当前时间是 2023-12-25 14:30:45
    echo getDate_ToNow(time() - 30);     // "30秒前"
    echo getDate_ToNow(time() - 90*60);  // "1小时30分钟前" → 实际输出 "1小时前"
    echo getDate_ToNow(time() - 2*86400);// "2.00天前"
    echo getDate_ToNow(time() - 10*86400);// "2023-12-15 14:30:45"
    ```
  - **技术细节**：
    - 使用`time()`获取当前时间戳
    - 通过`$diff = $now - $stamp`计算时间差
    - 采用阶梯式判断逻辑确保最优表达
    - 天数计算保留两位小数（`round($diff/86400, 2)`）
  - **使用场景**：
    - 社交媒体动态时间显示
    - 消息列表的时间戳展示
    - 用户活动记录的友好化显示

## 设计特点与最佳实践

### 时区管理
- **统一时区设置**：所有函数自动设置`Asia/Shanghai`时区，确保时间显示一致性
- **避免时区混乱**：无需在调用处重复设置时区，减少配置错误风险
- **国际化建议**：如需支持多时区，建议扩展参数添加时区选项

### 性能优化
- **计算效率**：时间差计算使用简单数学运算，避免正则表达式等高成本操作
- **缓存建议**：高频调用场景可缓存`time()`结果避免重复获取系统时间
- **临界值处理**：精确处理时间边界条件（如60秒=1分钟）

### 使用示例
```php
// 文章发布时间显示
$postTime = strtotime("2023-12-24 09:15:30");
echo "发布时间：" . getDate_ToNow($postTime);

// 日志记录精确时间
file_put_contents("log.txt", 
    "[".getDate_full(time())."] 用户登录\n", 
    FILE_APPEND
);

// 评论时间显示
$commentList = [
    ['content' => '第一条评论', 'time' => time()-45],
    ['content' => '第二条评论', 'time' => time()-3*3600],
    ['content' => '第三条评论', 'time' => time()-15*86400]
];
foreach($commentList as $c) {
    echo $c['content'] . " (" . getDate_ToNow($c['time']) . ")<br>";
}
```

### 注意事项
1. **时间戳验证**：确保输入参数为有效时间戳，避免传入非数字值
2. **夏令时处理**：由于固定使用`Asia/Shanghai`时区，无需考虑夏令时变化
3. **精度限制**：
   - 天数显示保留两位小数可能产生"1.00天前"等冗余表达
   - 小时/分钟显示采用向下取整（如59分钟显示为0小时）
4. **扩展建议**：
   - 可添加"昨天"、"前天"等中文友好表达
   - 支持自定义时间格式参数

此时间处理模块通过简洁的API设计，有效解决了Web应用中常见的日期显示需求，特别适合需要中文时间表达的国内应用场景。

## 主库
### /script/lib/main.php
#### 功能
- 自动导入项目库文件
- 定义基本函数
- 创建路由系统
- 定义全局变量
#### 函数列表
- **includeGLib($libname)**
  - **参数**：`$libname` - 库文件名（不含路径和后缀）
  - **功能**：自动导入指定的全局库文件
  - **实现**：根据项目目录结构自动拼接路径并包含文件
  - **示例**：
    ```php
    includeGLib("basic/router");
    includeGLib("view/view");
    ```
#### 全局变量
```php
$GLOBALS['titleSuffix'] = "-ZSV WebUI7.0";
$GLOBALS['logo'] = "/static/image/tool/logo.webp";
$GLOBALS['logo_long'] = "/static/image/tool/zbsytextlogo.png";
$GLOBALS['title'] = "UI7.0";
$GLOBALS["messages"]=array(
    [
        "url" => "/",
        "title" => "欢迎使用ZSV WebUI7.0",
        "content" => "欢迎使用ZSV WebUI7.0",
    ]
);
$GLOBALS["notifications"]=array(
    [
        "icon" => "check",
        "title" => "欢迎使用ZSV WebUI7.0",
        "content" => "欢迎使用ZSV WebUI7.0",
    ]
);
```
### /script/lib_global/main.php
#### 功能
- 自动导入全局库文件
- 定义基本函数
- 提供安全处理和常用操作工具

#### 函数列表

##### 安全处理函数
- **`safeContent($content)`**
  - **参数**：
    - `$content`: 需要处理的HTML内容字符串
  - **返回**：安全处理后的HTML内容
  - **功能**：
    - 保留所有`<img>`标签原始内容
    - 转义其他HTML内容防止XSS攻击
    - 特殊处理避免图片标签被转义破坏
  - **处理流程**：
    1. 提取所有img标签并用占位符替换
    2. 对剩余内容执行`htmlspecialchars`转义
    3. 将img标签恢复到原位置
  - **使用场景**：用户生成内容(UGC)的安全显示，如评论、帖子内容
  - **示例**：
    ```php
    $userInput = "<p>安全文本<img src='xss.jpg' onload='alert(1)'></p>";
    echo safeContent($userInput); 
    // 输出：<p>安全文本<img src='xss.jpg' onload='alert(1)'></p>（但onload不会执行）
    ```

- **`arrayDecode($array, $llimit=8128)`**
  - **参数**：
    - `$array`: 需要处理的数组
    - `$llimit`: 字符串长度限制（默认8128）
  - **返回**：安全处理后的数组
  - **功能**：
    - 递归处理多维数组
    - 对特定键名（answer, face, cfg等）保留原始值
    - 其他值执行htmlspecialchars和addslashes
    - 超长字符串自动截断
  - **安全策略**：
    - 白名单机制：仅特定键名不添加反斜杠
    - 长度限制：防止超长输入导致性能问题
    - 递归处理：支持多维数组结构
  - **使用场景**：处理用户提交的复杂表单数据
  - **示例**：
    ```php
    $data = [
        'username' => '<script>alert(1)</script>',
        'answer' => '<div>保留原始内容</div>'
    ];
    $safeData = arrayDecode($data);
    // $safeData['username'] 被转义，$safeData['answer'] 保持原样
    ```

- **`requestDecode()`**
  - **参数**：无
  - **返回**：包含安全处理后的GET和POST请求数据的数组
  - **功能**：
    - 分别处理GET（限制2560字符）和POST（限制10KB）请求
    - 应用arrayDecode的安全策略
    - 返回结构化请求数据
  - **返回结构**：
    ```php
    [
        'GET' => [安全处理后的GET参数],
        'POST' => [安全处理后的POST参数]
    ]
    ```
  - **使用场景**：替代直接使用`$_GET`和`$_POST`，提高应用安全性
  - **示例**：
    ```php
    $req = requestDecode();
    echo $req['GET']['search']; // 安全获取GET参数
    echo $req['POST']['content']; // 安全获取POST内容
    ```

##### 页面操作函数
- **`alert($msg)`**
  - **参数**：
    - `$msg`: 要显示的提示消息
  - **功能**：输出JavaScript alert弹窗代码
  - **注意**：
    - 不会自动转义内容，需确保$msg已安全处理
    - 执行后页面继续渲染，不会终止脚本
  - **使用场景**：简单用户提示
  - **示例**：
    ```php
    alert("操作成功！");
    // 输出：<script>alert('操作成功！')</script>
    ```

- **`jsjump($u)`**
  - **参数**：
    - `$u`: 目标URL
  - **功能**：输出JavaScript页面跳转代码
  - **特点**：
    - 使用`window.location`实现跳转
    - 不会自动验证URL安全性
  - **使用场景**：操作后重定向
  - **示例**：
    ```php
    jsjump("/dashboard");
    // 输出：<script>window.location='/dashboard'</script>
    ```

- **`jsreload()`**
  - **参数**：无
  - **功能**：输出JavaScript页面刷新代码
  - **使用场景**：提交表单后刷新当前页面
  - **示例**：
    ```php
    jsreload(); 
    // 输出：<script>window.location.reload()</script>
    ```

##### 资源定位函数
- **`getstatic($name)`**
  - **参数**：
    - `$name`: 静态文件路径（相对于static目录）
  - **返回**：文件内容字符串
  - **功能**：安全读取静态资源文件
  - **路径规则**：`static/$name`
  - **使用场景**：加载CSS、JS等静态资源
  - **示例**：
    ```php
    echo getstatic("css/main.css");
    // 返回./static/css/main.css文件内容
    ```

- **`includePage($pagename)`**
  - **参数**：
    - `$pagename`: 页面名称（不含.php扩展名）
  - **返回**：完整页面文件路径
  - **路径规则**：`./script/page/$pagename.php`
  - **功能**：生成页面文件包含路径
  - **使用场景**：与`include`配合加载页面逻辑
  - **示例**：
    ```php
    include includePage("user/profile");
    // 实际包含 ./script/page/user/profile.php
    ```

- **`includeViewer($name)`**
  - **参数**：
    - `$name`: 视图名称（不含.php扩展名）
  - **返回**：完整视图文件路径
  - **路径规则**：`./script/view/$name.php`
  - **功能**：生成视图文件包含路径
  - **使用场景**：加载HTML模板片段
  - **示例**：
    ```php
    include includeViewer("header");
    // 实际包含 ./script/view/header.php
    ```

- **`includeC($name)`**
  - **参数**：
    - `$name`: 配置文件名称（不含.php扩展名）
  - **返回**：完整配置文件路径
  - **路径规则**：`./script/$name.php`
  - **功能**：生成核心配置文件包含路径
  - **使用场景**：加载路由、系统配置等
  - **示例**：
    ```php
    include includeC("route");
    // 实际包含 ./script/route.php
    ```

- **`includeLib($libname)`**
  - **参数**：
    - `$libname`: 库文件名称（不含.php扩展名）
  - **返回**：完整库文件路径
  - **路径规则**：`./script/lib/$libname.php`
  - **功能**：生成功能库文件包含路径
  - **使用场景**：加载第三方库或自定义功能模块
  - **示例**：
    ```php
    include includeLib("markdown");
    // 实际包含 ./script/lib/markdown.php
    ```

## 安全最佳实践

### 输入处理
1. **始终使用requestDecode()**：替代直接访问`$_GET`/`$_POST`，避免XSS和SQL注入风险
2. **白名单策略**：对于需要保留HTML的内容（如富文本编辑器输出），使用`safeneedle`白名单机制
3. **长度限制**：通过`$llimit`参数防止超长输入消耗服务器资源

### 输出处理
1. **双重保护**：
   - 前端：使用`safeContent()`处理用户生成内容
   - 后端：使用`htmlspecialchars()`处理所有输出
2. **敏感操作**：
   - 跳转前验证URL有效性：`if(validateUrl($url)) jsjump($url);`
   - 避免在alert中显示敏感信息

### 路径安全
1. **路径规范化**：
   - 所有include函数自动构建安全路径，避免路径遍历攻击
   - 示例：`includePage("../../etc/passwd")` 会解析为无效路径
2. **资源隔离**：
   - 静态资源、页面、视图、配置文件分别存放于不同目录
   - 限制直接访问核心目录

## 使用示例

### 安全表单处理
```php
// 处理用户提交的表单
$req = requestDecode();

// 验证数据
if(empty($req['POST']['username'])) {
    alert("用户名不能为空！");
    jsreload();
    exit;
}

// 安全存储数据
$userData = [
    'username' => $req['POST']['username'],
    'bio' => $req['POST']['bio'] // 可能包含HTML
];

// 显示用户资料
echo "<h1>".htmlspecialchars($userData['username'])."</h1>";
echo safeContent($userData['bio']); // 安全显示富文本
```

### 路由加载流程
```php
// 加载路由配置
include includeC("route");

// 获取当前请求路径
$uri = Router::getUri();

// 获取对应脚本
$userPower = $_SESSION['power'] ?? 0;
$scriptPath = Router::GetScriptPath($uri, $userPower);

// 加载页面
if(substr($scriptPath, -4) === "404") {
    view::B404();
} else {
    include includePage($scriptPath);
}
```

### 静态资源加载
```php
// 在视图中安全加载CSS
echo "<style>".getstatic("css/main.css")."</style>";

// 或加载JS
echo "<script>".getstatic("js/app.js")."</script>";
```

此全局库通过统一的路径处理和安全过滤机制，有效降低了Web应用的安全风险，同时提高了代码的可维护性和一致性。所有函数设计遵循"安全默认"原则，确保开发者在常规使用中也能获得基本的安全保障。