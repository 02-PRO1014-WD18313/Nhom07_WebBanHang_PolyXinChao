<?php
include "model/cart.php";
include "global.php";
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm=loadall_danhmuc();
include "view/header.php";
include "global.php";
include "model/sanpham.php";
$spnew=loadall_sanpham_home();

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];


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
            //add thong tin san pham tu form 
            if(isset($_POST['giohang'])&&($_POST['giohang']>0)){
                $id=$_POST['id'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $price=$_POST['price'];
                $soluong=1;
                $ttien=$soluong * $price;
                $spadd=[$id,$name,$img,$price,$soluong,$ttien];
            }
            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            if(isset($_GET['idcart'])){
                array_splice($_SESSION['mycart'],$GET['mycart'],1);
            }else{
                $_SESSION['mycart']=[];
            }
            header('location: index.php?act=viewcart');
            break;  

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
            include "boloc.php";

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