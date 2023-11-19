<?php
include "view/header.php";

if(isset($_GET["act"])){
    $act=$_GET["act"];
    switch ($act) {
        case 'contact':
            include "view/contact.php";
            break;
        case 'spct':
            include "view/spct.php";
            break;
        case 'giohang':
            include "view/giohang.php";
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