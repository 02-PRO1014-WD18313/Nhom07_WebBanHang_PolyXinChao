<?php

function tongdonhang(){
    $tong=15000;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;  
}
return $tong;

}

function load_lichsudh($id){
    $sql = "SELECT cart.*, bill.iduser, bill.trangthai FROM cart  JOIN bill ON cart.idbill = bill.id WHERE bill.iduser = $id";
    return pdo_query($sql);
}

function insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang){
    $sql = "INSERT INTO bill (iduser, bill_name, bill_address, bill_tel, bill_email, bill_pttt, ngaydathang, total) values('$iduser','$name','$address','$tel','$email','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="INSERT INTO cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    pdo_execute($sql);
}
function loadone_bill($id){
    $sql="SELECT * FROM bill WHERE  id=".$id;
    $bill=pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql="SELECT * FROM cart WHERE  idbill=".$idbill;
    $bill=pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill){
    $sql="SELECT * FROM cart WHERE  idbill=".$idbill;
    $bill=pdo_query($sql);
    return sizeof($bill);
}
function loadall_bill($kyw=0,$iduser=0){
    $sql="SELECT * FROM bill WHERE 1";
    if ($iduser>0) $sql.=" AND iduser=".$iduser;
    if ($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function delete_donhang($id){
    $sql="delete FROM bill WHERE id=".$id;
    pdo_execute($sql);
}

function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        default:
            $tt="Đơn hàng mới";
            break;
    }
    return $tt;
}
?>