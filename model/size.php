<?php
function loadall_size(){
    $sql = "select * from size ";
    $listsize = pdo_query($sql);
    return $listsize;
}
function insert_size($tensize,$price){
    $sql="INSERT INTO size(name,price) values('$tensize','$price')";
    pdo_execute($sql);
}
function loadone_size($id){
    $sql="SELECT * FROM size WHERE id=".$id;
    $sz=pdo_query_one($sql);
    return $sz;
}
function delete_size($id){
    $sql = "delete from size where id=".$id;
    pdo_execute($sql);
}
function update_size($id,$tensize,$price){
    $sql="UPDATE size set name='".$tensize."', price='".$price."' WHERE id=".$id;
    pdo_execute($sql);
}
?>