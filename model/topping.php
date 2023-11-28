<?php
function loadall_topping(){
    $sql = "SELECT * from topping ORDER BY id desc";
    $listtopping = pdo_query($sql);
    return $listtopping;
}
function insert_topping($tentp,$price,$total){
    $sql="INSERT INTO topping(name,price,total) values('$tentp','$price','$total')";
    pdo_execute($sql);
}
function loadone_topping($id){
    $sql="SELECT * FROM topping WHERE id=".$id;
    $tp=pdo_query_one($sql);
    return $tp;
}
function delete_topping($id){
    $sql = "delete from topping where id=".$id;
    pdo_execute($sql);
}
function update_topping($id,$tentp,$price,$total){
    $sql="UPDATE topping set name='".$tentp."', price='".$price."', total='".$total."' WHERE id=".$id;
    pdo_execute($sql);
}

?>
