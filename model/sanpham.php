<?php
    function insert_sanpham($tensp,$giasp,$anhsp,$mmota,$iddm){
        $sql="INSERT INTO sanpham(name,price,img,description,iddm) values('$tensp','$giasp','$anhsp','$mmota','$iddm')";
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
        $sql="SELECT * FROM sanpham WHERE  id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="SELECT * FROM sanpham WHERE iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function  update_sanpham($id,$tensp,$giasp,$mmota,$anhsp,$iddm){
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
    // function checktrungsp($id) {
    //     $vitri = -1;
    //     for ($i = 0; $i < sizeof($_SESSION["mycart"]); $i++) {
    //         if ($_SESSION["mycart"][$i][0] == $id) {
    //             $vitri = $i;
    //             break;  
    //         }
    //     }
    //     return $vitri;
    // }
    
    // function updatesoluong($vitri) {
    //     if ($vitri != -1) {
    //         $_SESSION["mycart"][$vitri][4] += 1;  
    //     }
    //     return $vitri;
    // }
    
?>