<?php
session_start();
ob_start();
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm=loadall_danhmuc();
include "view/header.php";
include "global.php";
include "model/sanpham.php";
$spnew=loadall_sanpham_home();

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}


if((isset($_GET['act']))&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch ($act) {
        case 'sanpham':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm=$_GET['iddm'];
            }else{
                $iddm=0;
            }   

            $tk=loadall_sanpham($kyw,$iddm);
            $tendm=load_ten_dm($iddm);
            include "view/sptk.php";
            break;
        
        case 'sanphamall':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm=$_GET['iddm'];
            }else{
                $iddm=0;
            }   

            $tk=loadall_sanpham($kyw,$iddm);
            $tendm=load_ten_dm($iddm);
            include "view/sptk.php";
            break;
            
        case 'spct':
            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id=$_GET['idsp'];
                $onesp=loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai=load_sanpham_cungloai($id,$iddm);
                include "view/spct.php";
            }else{
                include "view/home.php";
            }
            break;

        case 'contact':
            include "view/contact.php";
            break;
        case 'checkout':
            include "view/checkout.php";
            break;
        case 'spct':
            include "view/spct.php";
            break;
        case 'giohang':
                include "view/giohang.php";
                break;
        case 'addtocart':
            // Add product information from the form 
            if (isset($_POST['addtocart']) && ($_POST['addtocart']) >0) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                if(isset($_POST['soluong']) && ($_POST['soluong'])>0){
                    $soluong=$_POST['soluong'];
                }else{
                    $soluong = 1;  
                }
                $fg=0;
                // kiểm tra sp có tồn tại trong giỏ hàng hay không
                $i=0;
                foreach ($_SESSION['mycart'] as $item) {
                    if ($item[1] === $name) { // Use $name instead of $tensp
                        $slnew = $soluong + $item[4];
                        $_SESSION['mycart'][$i][4] = $slnew;                        
                        $fg = 1;
                        break;
                    }
                    $i++;
                }                
                if($fg==0){
                    $sl=$soluong * $price;
                    $ttien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    array_push($_SESSION['mycart'], $spadd);
                   
                }
            }            
            // include "view/cart/mybill.php";
            // break;
            header("location: index.php?act=viewcart");

        case 'viewcart':
                include "view/cart/viewcart.php";
                break; 
                   
        case 'delcart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case 'billcomfirm':
            if(isset($_SESSION['dathang']) && ($_SESSION['dathang'])){
                $name=$_POST['user'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $tel=$_POST['tel'];
                $pttt=$_POST['pttt'];
                $ngaydathang = date('h:i:sa d-m-Y');
                $tongdonhang=tongdonhang();

                $idbill= insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang);
                
                foreach($_SESSION['mycart'] as $cart){
                    insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                }
            }
            $bill= loadone_bill($id);
            $billct=loadall_cart($id);
            include "view/cart/billcomfirm.php";
            break; 
            // include "view/cart/billcomfirm.php";
            break; 
        // case 'thanhtoan':
        //     if(isset($_SESSION['thanhtoan']) && ($_SESSION['thanhtoan'])){
        //         // Lấy dữ liệu
        //         $tongdonhang=$_POST['tongdonhang'];
        //         $name=$_POST['name'];
        //         $address=$_POST['address'];
        //         $email=$_POST['email'];
        //         $tel=$_POST['tel'];
        //         $pttt=$_POST['pttt'];
        //         // mã đơn hàng
        //         $madh="POLYXINCHAO"rand(0,999999);
        //         // TẠO ĐƠN HÀNG và trả về 1 id đơn hàng
        //         $iddh=taodonhang($madh,$tongdonhang,$pttt,$name,$address,$email,$tel);
                
        //     }
        //     include "view/contact.php";
        //     break;

        case 'timkiem':
            if(isset($_POST['timkiem'])&& ($_POST['timkiem'])){
                $kyw=$_POST['search'];
            }else{
                $kyw='';
            }
            $tk=loadall_sanpham($kyw);
            include "view/sptk.php";
            break;  
        
        case 'sanphamtu1den2':
            if(isset($_POST['timkiem'])&& ($_POST['timkiem'])){
                $kyw=$_POST['search'];
            }else{
                $kyw='';
            }
            $boloc=load_sanpham_tu_10_20();
            include "view/boloc.php";
            break;
        case 'dangnhap1':
            if(isset($_POST['dangnhap1'])&&($_POST['dangnhap1']>0)){
                $user=$_POST['user'];                
                $pass=$_POST['pass'];
                $checkuser=checkuser($user,$pass);
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    header('location: index.php?');
                    // $thongbao="bạn đã đăng nhập thành công!";
                }else{
                    $thongbao='
                    <div class="alert alert-danger" role="alert">
                    Tài khoản k tồn tại. Vui lòng kiểm tra hoặc đăng ký!
                    </div>';
                   
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'dangky1':
            if(isset($_POST['dangky1'])&&($_POST['dangky1']>0)){
                $user=$_POST['user'];
                $email=$_POST['email'];                
                $pass=$_POST['pass'];   
                $address=$_POST['address'];
                $tel=$_POST['tel'];
                
                $errors = [];
                if(empty($user)){
                    $errors['user'] = 'Tên đăng nhập không được để trống';
                }else{
                    if(strlen($user) <6){
                        $errors['user'] = 'Tên đăng nhập phải lớn hơn 6 ký tự';
                    }
                }

                if(empty($email)){
                    $errors['email'] = 'email không được để trống';
                }else{
                    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
                    if(!$checkEmail){
                        $errors['email'] = 'Email không đúng định dạng';
                    }
                }

                if(empty($tel)){
                    $errors['tel'] = 'Số điện thoại không được để trống';
                }

                if(empty($address)){
                    $errors['address'] = 'Địa chỉ không được để trống';
                }

                if(empty($pass)){
                    $errors['pass'] = 'Mật khẩu không được để trống';
                }
                if(empty($errors)){
                    insert_taikhoan($user,$email,$pass,$address,$tel);
                    $thongbao='
                        <div class="alert alert-success" role="alert">
                            Đăng ký thành công. Bây giờ bạn có thể đăng nhập!
                        </div>';
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'thoat':
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
            header('location: index.php?');
            break;


default:
        include "view/banner.php";
        include "view/home.php";
        
            break;
    }

}else{
    include "view/banner.php";
    include "view/home.php";
}



include "view/footer.php";
?>