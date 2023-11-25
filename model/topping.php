<?php
function loadall_topping(){
    $sql = "SELECT * from topping ORDER BY id desc";
    $listtopping = pdo_query($sql);
    return $listtopping;
}

?>
