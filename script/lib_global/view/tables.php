<?php
class tables
{
    public static function JQDataTable($id, $info = true, $paging = true, $search = true)
    {
        $newjs = "
        $('#$id').DataTable({
            searching: $search, paging: $paging, info: $info
        });";
        global $viewimport;
        $viewimport['js'] .= $newjs;
    }
    public static function common($data, $cfg = [], $rowcfg = [], $colcfg = [])
    {
        $tableid = uuidGenerator("table-");
        $gcfg = "";
        foreach ($cfg as $value) {
            $gcfg .= " table-$value";
        }
        echo "<table class='table $gcfg' id='$tableid'>";
        $data = array_values($data);

        $rcfg = $rowcfg[0]?:"";
        echo "<thead><tr class='$rcfg'>";
        for ($i = 0; $i < count($data[0]); $i++) {
            $ccfg=$colcfg[0][$i]?:"";
            echo "<th class=\"$ccfg\">" . $data[0][$i] . "</th>";
        }
        echo "</tr></thead>";
        echo "<tbody>";
        for ($i = 1; $i < count($data); $i++) {
            $rcfg = $rowcfg[$i]?:"";
            echo "<tr class='$rcfg'>";
            for ($j = 0; $j < count($data[$i]); $j++) {
                $ccfg=$colcfg[$i][$j]?:"";
                echo "<td class='$ccfg'>" . $data[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
        return $tableid;
    }
}
