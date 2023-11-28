<?php
function loadall_binhluan($idpro){
    $sql = "SELECT binhluan.id, binhluan.noidung, binhluan.iduser, binhluan.ngaybinhluan, taikhoan.user
            FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            WHERE idpro = $idpro
            ORDER BY id DESC";
    
    $listbl = pdo_query($sql);
    return $listbl;
}
function insert_binhluan($idpro, $noidung){
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','2','$idpro','$date');
    ";
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql="delete FROM binhluan WHERE id=".$id;
    pdo_execute($sql);
}
?>