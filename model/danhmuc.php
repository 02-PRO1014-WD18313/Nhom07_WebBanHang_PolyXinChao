<?php
    function insert_danhmuc($tenloai){
        $sql="INSERT INTO danhmuc(name) values('$tenloai')";
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="SELECT * FROM danhmuc ORDER BY id desc";
           $listdanhmuc=pdo_query($sql);
           return $listdanhmuc;
    }
    function delete_danhmuc($id){
        $sql="delete FROM danhmuc WHERE id=".$id;
        pdo_execute($sql);
    }
    function update_danhmuc($id,$tenloai){
        $sql="UPDATE danhmuc set name='".$tenloai."'WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadone_danhmuc($id){
        $sql="SELECT * FROM danhmuc WHERE id=".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function deletedanhmuc_from_product ($id){
        deleteAll ($id);
        $sql = "DELETE FROM `danhmuc` WHERE `danhmuc`.`id`=$id";
        pdo_execute($sql);  
    }
?>