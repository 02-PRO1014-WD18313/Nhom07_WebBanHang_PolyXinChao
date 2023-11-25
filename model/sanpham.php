<?php
    function insert_sanpham($tensp,$giasp,$anhsp,$created_at,$mmota,$iddm,$id_size,$id_tp){
        $sql="INSERT INTO sanpham(name,price,img,created_at,description,iddm,id_size,id_tp) values('$tensp','$giasp','$anhsp','$created_at','$mmota','$iddm','$id_size','$id_tp')";
        pdo_execute($sql); 
    }

    function delete_sanpham($id){
        $sql="delete FROM sanpham WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadall_sanpham_top10(){
        $sql="SELECT * FROM sanpham where 1 order by view desc limit 0,10"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_home(){
        $sql="SELECT * FROM sanpham where 1 order by id desc limit 0,9"; 
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw="", $iddm=0){
        $sql="SELECT * FROM sanpham where 1"; 
        if($kyw!= ""){
            $sql.=" and name like '%".$kyw. "%'";
        } 
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" ORDER BY id desc";
           $listsanpham=pdo_query($sql);
           return $listsanpham;
    }
    function load_ten_dm($iddm){
        if($iddm>0){
            $sql="SELECT * FROM danhmuc WHERE  id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
        
    }
    function loadone_sanpham($id){
        // $sql="SELECT * FROM sanpham  WHERE  id=".$id;
        $sql = "SELECT sanpham.*, size.name as name_size FROM sanpham JOIN size ON sanpham.id_size = size.id WHERE sanpham.id='$id'";
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="SELECT * FROM sanpham WHERE iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function  update_sanpham($id,$tensp,$giasp,$mmota,$anhsp,$iddm,$id_size,$id_t){
        if($anhsp!="")
            $sql="UPDATE sanpham SET name='".$tensp."', price='".$giasp."', description='".$mmota."', img='".$anhsp."', iddm='".$iddm."' WHERE id=".$id;
        else
            $sql="UPDATE sanpham SET name='".$tensp."', price='".$giasp."', description='".$mmota."',  iddm='".$iddm."' WHERE id=".$id;
        pdo_execute($sql);
    }

    function load_sanpham_tu_10_20(){
        $sql ="selec * from sanpham where price between 10000 and 20000 order by id desc limit 0,15";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function deleteAll ($id){
        $sql = "DELETE FROM `sanpham` WHERE `sanpham`.`iddm`=".$id;
        pdo_execute($sql);
    }
    function load_sanpham_tu_10_30(){
        $sql ="select * from sanpham where price between 10000 and 30000 order by id desc limit 0,15";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function load_sanpham_tu_30_50(){
        $sql ="select * from sanpham where price between 30000 and 50000 order by id desc limit 0,15";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function load_sanpham_tu_50_90(){
        $sql ="select * from sanpham where price between 50000 and 90000 order by id desc limit 0,15";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

?>