<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th>Thao tác</th>';
        $xoasptd_2="";
    }else{
        $xoasp_th="";
        $xoasptd_2="";
    }
    echo '
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0";>
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Size-topping</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Chức năng</th>
                                '.$xoasp_th.'
                            </tr>
                        </thead>
                    </table>  
                </div>
            </div>
        </div>';
        foreach ($_SESSION['mycart'] as $cart) {
            $hinh=$img_path.$cart[2];
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;
            if($del==1){
                $xoasp_td='<td class="align-middle"><button class="btn btn-sm btn-danger"><a href="index.php?act=delcart&idcart='.$i.'"><i class="fa fa-times"></i></button></td>';
            }else{
                $xoasp_td="";
            }
            echo 
            '<tbody class="align-middle">
                <tr>
                    <td class="align-middle"><img src="'.$hinh.'" style="width: 50px;">'.$cart[1].'</td>
                    <td class="align-middle">'.$cart[2].'</td>
                    <td class="align-middle">'.$cart[3].'</td>
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-minus" >
                                <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">'.$cart[4].'</td>
                    <td class="align-middle">'.$ttien.'</td>
                    '.$xoasp_th.'
                </tr>
            </tbody>';
            $i+=1;
        }
    echo 
            '<div class="col-lg-4">
                    <form class="mb-30" action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="mã giảm giá">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Áp dụng</button>
                            </div>
                        </div>
                    </form>
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng chi đơn hàng</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3"><h6>Tổng phụ</h6><h6>'.$tong.'</h6></div>
                            <div class="d-flex justify-content-between"><h6 class="font-weight-medium">phí vận chuyển</h6><h6 class="font-weight-medium">$10</h6></div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2"><h5>Tổng cộng</h5><h5>'.$tong.'</h5></div>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến hành đặt hàng</button>
                        </div>
                    </div>
            </div>
        </div>';
}
function tongdonhang(){
    $tong=0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien=$cart[3]*$cart[4];
            $tong+=$ttien;  
}
return $tong;

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