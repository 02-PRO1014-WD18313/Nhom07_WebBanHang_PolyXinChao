<?php 
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }


    function load_binhluan() {
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan, sanpham.name 
            FROM binhluan 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            ORDER BY binhluan.id DESC";
        $listbinhluan = pdo_query($sql);
        return $listbinhluan;
    }

    function delete_binhluan($id){
        $sql="delete FROM binhluan WHERE id=".$id;
        pdo_execute($sql);
    }
    function insert_binhluan($idpro,$idUser, $noidung){
        $date = date('Y-m-d H:i:s');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung',$idUser,'$idpro','$date');
        ";
        pdo_execute($sql);
    }
    // function insert_binhluan($idpro, $noidung, $iduser) {
    //     $date = date('Y-m-d');
    //     $sql = "
    //         INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
    //         VALUES ('$noidung', '$iduser', '$idpro', '$date');
    //     ";
    //     pdo_execute($sql);
    // }
    

?>