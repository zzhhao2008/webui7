## 表格组件库
### /script/lib_global/view/tables.php
提供标准化表格生成工具，支持基础表格渲染和高级DataTables插件集成，实现数据展示与交互功能的统一管理。

#### 类：`tables`

##### 基础表格
- **`common($data, $cfg = [], $rowcfg = [], $colcfg = [])`**
  - **参数**：
    | 参数 | 类型 | 描述 |
    |------|------|------|
    | `$data` | 二维数组 | 表格数据（第一行为表头） |
    | `$cfg` | 数组 | 表格整体CSS类配置（如`["striped", "hover"]`） |
    | `$rowcfg` | 数组 | 行级CSS类配置（索引对应行号） |
    | `$colcfg` | 二维数组 | 列级CSS类配置（`$colcfg[行号][列号]`） |
  - **返回**：生成的表格唯一ID（格式：`table-{uuid}`）
  - **功能**：
    1. **自动结构生成**：
       - 自动分离表头（第一行）和表格内容
       - 生成符合语义化的`<table>`, `<thead>`, `<tbody>`结构
    2. **精细化样式控制**：
       - 全局样式：通过`$cfg`添加表格级CSS类
       - 行级样式：通过`$rowcfg`为特定行添加类
       - 列级样式：通过`$colcfg`为特定单元格添加类
    3. **唯一ID生成**：
       - 使用`uuidGenerator`创建唯一表格ID，避免冲突
  - **数据格式要求**：
    ```php
    $data = [
        ['姓名', '年龄', '职业'], // 表头
        ['张三', '25', '工程师'],
        ['李四', '30', '设计师']
    ];
    ```
  - **样式配置示例**：
    ```php
    $cfg = ['striped', 'bordered']; // 全局样式
    $rowcfg = [
        1 => 'table-success', // 第一行（表头）样式
        2 => 'table-warning'  // 第二行样式
    ];
    $colcfg = [
        1 => ['text-center', '', 'text-nowrap'], // 表头列样式
        2 => ['', 'text-right', '']             // 数据行列样式
    ];
    ```
  - **输出HTML结构**：
    ```html
    <table class="table table-striped table-bordered" id="table-abc123">
      <thead>
        <tr class="table-success">
          <th class="text-center">姓名</th>
          <th>年龄</th>
          <th class="text-nowrap">职业</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-warning">
          <td>张三</td>
          <td class="text-right">25</td>
          <td>工程师</td>
        </tr>
        <!-- 更多行... -->
      </tbody>
    </table>
    ```
  - **使用示例**：
    ```php
    $data = [
        ['ID', '名称', '状态'],
        [1, '项目A', '进行中'],
        [2, '项目B', '已完成']
    ];
    
    // 基础表格
    tables::common($data);
    
    // 带样式的表格
    tables::common($data, 
        ['striped', 'hover'], 
        [1 => 'fw-bold'], 
        [
            1 => ['text-center', '', 'status-col'],
            2 => ['', '', 'text-success']
        ]
    );
    ```

##### DataTables集成
- **`JQDataTable($id, $info = true, $paging = true, $search = true)`**
  - **参数**：
    | 参数 | 类型 | 描述 |
    |------|------|------|
    | `$id` | string | 表格DOM元素ID |
    | `$info` | bool | 是否显示分页信息（如"显示1-10条，共50条"） |
    | `$paging` | bool | 是否启用分页功能 |
    | `$search` | bool | 是否显示搜索框 |
  - **返回**：表格ID（与输入相同）
  - **功能**：
    1. **动态JS注入**：
       - 生成DataTables初始化代码
       - 通过`$viewimport['js']`延迟注入，确保DOM加载完成
    2. **配置灵活**：
       - 可独立控制分页、搜索、信息显示等核心功能
       - 默认启用所有基础功能
    3. **无侵入式集成**：
       - 不修改原始表格结构
       - 保持HTML表格的可访问性
  - **生成的JS代码**：
    ```javascript
    $('#table-abc123').DataTable({
        searching: true, 
        paging: true, 
        info: true
    });
    ```
  - **使用场景**：
    - 需要排序、分页、搜索功能的大型数据表格
    - 动态数据表格的快速增强
  - **示例**：
    ```php
    // 仅启用分页（禁用搜索和信息显示）
    tables::JQDataTable("myTable", false, true, false);
    ```

##### 高级表格（组合功能）
- **`super($data, $cfg = [], $rowcfg = [], $colcfg = [], $info = true, $paging = true, $search = true)`**
  - **参数**：
    - 前4个参数同`common()`
    - 后3个参数同`JQDataTable()`
  - **返回**：DataTables增强后的表格ID
  - **功能**：
    1. **一体化流程**：
       - 自动调用`common()`生成基础表格
       - 立即调用`JQDataTable()`应用DataTables增强
    2. **简化开发**：
       - 单次调用完成表格创建和功能增强
       - 避免手动管理表格ID
  - **执行流程**：
    ```mermaid
    graph TD
      A[调用 super 方法] --> B[生成唯一表格ID]
      B --> C[调用 common 创建基础表格]
      C --> D[获取生成的表格ID]
      D --> E[调用 JQDataTable 初始化插件]
      E --> F[返回最终表格ID]
    ```
  - **使用示例**：
    ```php
    $data = [
        ['姓名', '年龄', '部门'],
        ['王明', '28', '技术部'],
        ['李芳', '32', '市场部']
    ];
    
    // 创建带完整DataTables功能的表格
    tables::super($data, 
        ['striped', 'hover'], 
        [1 => 'table-info'],
        [
            1 => ['text-center', '', 'dept-col']
        ]
    );
    
    // 创建仅带分页的表格
    tables::super($data, [], [], [], true, true, false);
    ```

## 高级配置指南

### DataTables扩展配置
虽然基础方法提供核心功能，但可通过以下方式扩展：

1. **自定义JS增强**：
   ```php
   $tableId = tables::super($data);
   view::addMessage("表格已加载", "提示", "info", "", 1);
   global $viewimport;
   $viewimport['js'] .= "
   $('#$tableId').on('click', 'td', function() {
       alert('选中单元格: ' + $(this).text());
   });
   ";
   ```

2. **服务器端处理**：
   ```php
   $tableId = tables::common($data);
   global $viewimport;
   $viewimport['js'] .= "
   $('#$tableId').DataTable({
       processing: true,
       serverSide: true,
       ajax: '/api/data'
   });
   ";
   ```


#### 行/列样式技巧
```php
// 标记关键数据行
$rowcfg = [
    2 => 'table-danger fw-bold',  // 第2行（数据行索引1）
    3 => 'table-warning'
];

// 突出显示数值列
$colcfg = [
    1 => ['', 'text-right', 'text-right'], // 表头和数据行
    2 => ['', 'text-center', 'status-badge']
];
```

## 示例
### 复杂报表表格
```php
// 生成月度报表
$data = [
    ['月份', '收入', '支出', '利润'],
    ['1月', '120,000', '80,000', '40,000'],
    ['2月', '150,000', '90,000', '60,000']
];

// 配置财务报表样式
$cfg = ['table-bordered', 'table-hover'];
$rowcfg = [
    1 => 'fw-bold', // 表头加粗
    3 => 'table-success' // 最后一行高亮
];
$colcfg = [
    1 => ['text-center', 'text-end', 'text-end', 'text-end'],
    2 => ['', 'text-success', 'text-danger', 'text-primary']
];

// 创建表格
$tableId = tables::common($data, $cfg, $rowcfg, $colcfg);

// 添加DataTables增强（仅分页）
tables::JQDataTable($tableId, false, true, false);

// 添加财务指标说明
echo "<div class='mt-2 text-muted'>";
echo "<span class='text-success'>↑ 绿色表示正向指标</span> | ";
echo "<span class='text-danger'>↓ 红色表示支出/成本</span>";
echo "</div>";
```

## 安全与最佳实践

### 数据安全
1. **内容过滤**：
   ```php
   // 确保表格数据已安全处理
   $safeData = array_map(function($row) {
       return array_map('htmlspecialchars', $row);
   }, $rawData);
   
   tables::common($safeData);
   ```

2. **避免XSS风险**：
   - 不要直接将用户输入作为表格内容
   - 使用`htmlspecialchars`预处理数据
   - 特殊需求使用`safeContent()`处理富文本

### 可访问性(A11y)
```php
// 添加ARIA属性提升可访问性
$cfg = ['aria-sort="ascending"'];
echo "<table class='table' aria-label='用户数据表格'>";
// ...表格内容
```

此表格组件库通过分层设计满足不同场景需求：`common()`提供基础表格能力，`JQDataTable()`实现专业级数据交互，`super()`简化常见用例。结合Bootstrap样式体系和DataTables插件，可快速构建企业级数据展示界面，同时保持代码简洁性和可维护性。