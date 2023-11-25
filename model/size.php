<?php
function loadall_size()
{
    $sql = "select * from size ";
    $listsize = pdo_query($sql);
    return $listsize;
}
?>