## 按钮组件库
### /script/lib_global/view/buttons.php
提供标准化的按钮生成工具，支持单个按钮和按钮组的创建，兼容Bootstrap样式体系，简化UI开发流程。

#### 类：`buttons`

##### 单个按钮
- **`single($text, $function = "", $color = "primary", $border = "", $para = [], $type = "button", $o = "")`**
  - **参数**：
    - `$text`: 按钮显示文本（支持HTML内容，如图标）
    - `$function`: 点击事件处理函数（支持特殊前缀`jump:`实现页面跳转）
    - `$color`: 按钮主题颜色（默认`primary`，支持`secondary`, `success`, `danger`等）
    - `$border`: 边框颜色（为空表示实心按钮，设置值表示边框按钮）
    - `$para`: 附加参数数组（用于添加额外CSS类，如`["icon", "lg"]`）
    - `$type`: 按钮类型（默认`button`，可选`submit`, `reset`）
    - `$o`: 其他HTML属性（直接插入到button标签中）
  - **返回**：格式化的按钮HTML代码
  - **功能特性**：
    1. **智能跳转处理**：
       - 当`$function`以`jump:`开头时，自动转换为`location.href='目标URL'`
       - 示例：`jump:/dashboard` → `location.href='/dashboard'`
    2. **图标自动识别**：
       - 当`$text`包含`<i>`标签时，自动添加图标相关CSS类
       - 仅含图标 → 添加`btn-icon`类
       - 图标+文字 → 添加`btn-icon-text`类
    3. **边框按钮支持**：
       - 设置`$border`参数时，生成`btn-outline-*`样式按钮
  - **CSS类生成规则**：
    ```
    btn [btn-outline-$border] btn-$color [btn-$para[0] btn-$para[1]...]
    ```
  - **使用示例**：
    ```php
    // 基本按钮
    echo buttons::single("提交", "submitForm()", "primary");
    
    // 边框按钮
    echo buttons::single("取消", "", "secondary", "secondary");
    
    // 图标按钮（仅图标）
    echo buttons::single("<i class='mdi mdi-home'></i>", "jump:/home");
    
    // 图标+文字按钮
    echo buttons::single("<i class='mdi mdi-account'></i> 个人中心", "jump:/profile", "info", "", ["icon-text", "lg"]);
    
    // 提交按钮
    echo buttons::single("保存", "", "success", "", [], "submit", "form='myForm'");
    ```

##### 按钮组
- **`group($buttons, $v = 0)`**
  - **参数**：
    - `$buttons`: 按钮配置数组，每个元素是single()所需的参数数组
      ```php
      [
        [
          "text" => "按钮1",
          "function" => "func1()",
          "color" => "primary",
          // ...其他参数
        ],
        // ...更多按钮
      ]
      ```
    - `$v`: 布局方向（`0`或`"r"`=水平，其他值=垂直）
  - **返回**：按钮组HTML代码（包裹在btn-group或btn-group-vertical容器中）
  - **功能特性**：
    1. **自动布局**：
       - 水平布局：使用`btn-group`容器
       - 垂直布局：使用`btn-group-vertical`容器
    2. **参数透传**：
       - 完全支持single()的所有参数特性
       - 每个按钮可独立配置样式和行为
  - **使用示例**：
    ```php
    // 水平按钮组
    $btns = [
        ["text" => "保存", "color" => "success", "function" => "save()"],
        ["text" => "预览", "color" => "info", "function" => "preview()"],
        ["text" => "取消", "color" => "secondary"]
    ];
    echo buttons::group($btns);
    
    // 垂直按钮组
    $verticalBtns = [
        ["text" => "<i class='mdi mdi-home'></i>", "function" => "jump:/home", "para" => ["icon"]],
        ["text" => "<i class='mdi mdi-account'></i> 个人中心", "function" => "jump:/profile", "para" => ["icon-text"]],
        ["text" => "设置", "color" => "warning"]
    ];
    echo buttons::group($verticalBtns, 1);
    ```

## 高级用法指南

### 特殊前缀处理
- **`jump:`前缀**：简化页面跳转逻辑
  ```php
  // 等效于 onclick="location.href='/dashboard'"
  buttons::single("仪表盘", "jump:/dashboard");
  
  // 支持动态URL
  $userId = 123;
  buttons::single("用户详情", "jump:/user/{$userId}");
  ```

### 图标按钮最佳实践
| 按钮类型 | text参数示例 | 自动添加类 |
|----------|--------------|------------|
| 纯图标按钮 | `"<i class='mdi mdi-home'></i>"` | `btn-icon` |
| 图标+文字按钮 | `"<i class='mdi mdi-home'></i> 首页"` | `btn-icon-text` |

```php
// 纯图标按钮（紧凑型）
echo buttons::single("<i class='mdi mdi-magnify'></i>", "", "primary", "", ["icon", "sm"]);

// 图标+文字按钮（大号）
echo buttons::single("<i class='mdi mdi-bell'></i> 通知", "", "info", "", ["icon-text", "lg"]);
```

### 边框按钮组合
```php
// 成套边框按钮
echo buttons::group([
    ["text" => "普通", "color" => "primary", "border" => "primary"],
    ["text" => "成功", "color" => "success", "border" => "success"],
    ["text" => "警告", "color" => "warning", "border" => "warning"]
]);
```

### 复杂交互按钮
```php
// 带确认对话框的删除按钮
$confirmScript = "if(confirm('确定要删除吗？')){deleteItem()}";
echo buttons::single("删除", $confirmScript, "danger", "", [], "button", "data-id='123'");

// 带加载状态的按钮
echo buttons::single("加载更多", "loadMore()", "primary", "", ["loading"]);
```

## 样式定制指南

### 颜色方案
| 颜色值 | 适用场景 | 边框按钮示例 |
|--------|----------|--------------|
| `primary` | 主要操作 | `buttons::single("...", "primary", "primary")` |
| `success` | 成功操作 | `buttons::single("...", "success", "success")` |
| `danger` | 危险操作 | `buttons::single("...", "danger", "danger")` |
| `warning` | 警告操作 | `buttons::single("...", "warning", "warning")` |
| `info` | 信息操作 | `buttons::single("...", "info", "info")` |
| `light/dark` | 特殊场景 | `buttons::single("...", "dark", "dark")` |

### 尺寸控制
通过`$para`参数添加尺寸类：
- `["sm"]`：小型按钮
- `[]`：默认尺寸（中等）
- `["lg"]`：大型按钮

```php
// 尺寸对比
echo buttons::single("小", "", "primary", "", ["sm"]);
echo buttons::single("中", "", "primary");
echo buttons::single("大", "", "primary", "", ["lg"]);
```

### 附加样式
通过`$para`参数添加特殊效果：
- `["icon"]`：纯图标按钮
- `["icon-text"]`：图标+文字按钮
- `["loading"]`：加载状态（需配合前端JS）
- `["disabled"]`：禁用状态（建议用`$o = "disabled"`更标准）

## 安全与最佳实践

### 安全建议
1. **避免内联JS**：
   ```php
   // 不推荐
   buttons::single("删除", "deleteItem({$_GET['id']})");
   
   // 推荐：先安全处理参数
   $id = intval($_GET['id']);
   buttons::single("删除", "deleteItem($id)");
   ```

2. **URL安全**：
   ```php
   // 验证跳转URL
   $url = validateUrl($_GET['next']) ? $_GET['next'] : '/';
   echo buttons::single("继续", "jump:$url");
   ```

### 性能优化
1. **减少按钮数量**：
   - 按钮组建议不超过5个，避免UI混乱
   - 重要操作优先，次要操作可放入下拉菜单

2. **图标优化**：
   - 使用Material Design Icons（mdi）确保图标一致性
   - 避免混合使用不同图标库

### 响应式设计
```php
// 移动端适配
echo buttons::group([
    ["text" => "<i class='mdi mdi-home'></i>", "function" => "jump:/", "para" => ["icon", "sm"]],
    ["text" => "<i class='mdi mdi-magnify'></i>", "function" => "search()", "para" => ["icon", "sm"]],
    ["text" => "<i class='mdi mdi-account'></i>", "function" => "jump:/profile", "para" => ["icon", "sm"]]
], 1); // 垂直布局更适合移动端
```

## 完整示例：操作面板

```php
// 文章操作按钮组
$articleActions = [
    [
        "text" => "<i class='mdi mdi-pencil'></i> 编辑",
        "function" => "jump:/article/edit?id=123",
        "color" => "info",
        "para" => ["icon-text"]
    ],
    [
        "text" => "<i class='mdi mdi-content-copy'></i> 复制",
        "function" => "copyArticle(123)",
        "color" => "primary",
        "para" => ["icon-text"]
    ],
    [
        "text" => "<i class='mdi mdi-delete'></i> 删除",
        "function" => "if(confirm('确定删除？')){deleteArticle(123)}",
        "color" => "danger",
        "para" => ["icon-text"]
    ]
];

// 水平布局（桌面端）
echo "<div class='d-none d-md-block'>";
echo buttons::group($articleActions);
echo "</div>";

// 垂直布局（移动端）
echo "<div class='d-md-none'>";
echo buttons::group($articleActions, 1);
echo "</div>";
```

此按钮组件库通过统一的接口规范和智能特性处理，显著提高了开发效率和UI一致性，特别适合需要大量交互按钮的企业级应用。结合Bootstrap的样式体系，可快速构建专业级的用户界面。