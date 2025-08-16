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
        $viewimport['js'].=$newjs;
    }
}
