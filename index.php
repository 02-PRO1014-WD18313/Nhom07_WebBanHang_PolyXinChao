<?php
include "model/cart.php";
include "global.php";
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm=loadall_danhmuc();
include "view/header.php";

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];


if(isset($_GET["act"])){
    $act=$_GET["act"];
    switch ($act) {
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

        case 'dangnhap':
            include "view/contact.php";
            break;
        case 'dangky':
            include "view/contact.php";
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