<?php
include "header.php";
include "sidebar.php";
include "breadcrumb.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/size.php";
include "../model/topping.php";
include "../model/cart.php";
include "../model/binhluan.php";
$listsanpham = loadall_sanpham("", 0);

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'adddm':
            //kiem tra xem ng dung co click vaof nut add hay k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $errors = [];

                if (empty($tenloai)) {
                    $errors['tenloai'] = 'Yêu cầu nhập vào tên danh mục';
                }
                if (empty($errors)) {
                    insert_danhmuc($tenloai);
                    $thongbao = "them thanh cong";
                }
            }
            include "danhmuc/add.php";
            break;
        case 'deletedm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                deletedanhmuc_from_product($id);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/edit.php";
            break;
        case 'updatedm':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "update thanh cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
///////////////controler bien the
        case 'listsz':
            $listsize = loadall_size();
            include "size/list.php";
            break;

        case 'addsz':
            //kiem tra xem ng dung co click vaof nut add hay k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensize = $_POST['tensize'];
                $price= $_POST['price'];
                $errors = [];

                if (empty($tensize)) {
                    $errors['tensize'] = 'Yêu cầu nhập vào tên danh mục';
                }
                if (empty($errors)) {
                    insert_size($tensize,$price);
                    $thongbao = "them thanh cong";
                }
            }
            include "size/add.php";
            break;

        case 'deletesz':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_size($id);
            }
            $listsize = loadall_size();
            include "size/list.php";
            break;

        case 'suasz':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sz = loadone_size($_GET['id']);
            }
            include "size/edit.php";
            break;
        case 'updatesz':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $tensize = $_POST['tensize'];
                $price= $_POST['price'];
                update_size($id,$tensize,$price);
                $thongbao = "update thanh cong";
            }
            $listsize = loadall_size();
            include "size/list.php";
            break;


//////////////////////////////////////////////////////////////////////////topping
        case 'listtp':
            $listtopping = loadall_topping();
            include "topping/list.php";
            break;

        case 'addtp':
            //kiem tra xem ng dung co click vaof nut add hay k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tentp = $_POST['tentp'];
                $price= $_POST['price'];
                $total= $_POST['total'];
                $errors = [];

                if (empty($tentp)) {
                    $errors['tentp'] = 'Yêu cầu nhập vào tên danh mục';
                }
                if (empty($errors)) {
                    insert_topping($tentp,$price,$total);
                    $thongbao = "them thanh cong";
                }
            }
            include "topping/add.php";
            break;

        case 'deletetp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                delete_topping($id);
            }
            $listtopping = loadall_topping();
            include "topping/list.php";
            break;

        case 'suatp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $tp = loadone_topping($_GET['id']);
            }
            include "topping/edit.php";
            break;
        case 'updatetp':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $tentp = $_POST['tentp'];
                $price= $_POST['price'];
                $total= $_POST['total'];
                update_topping($id,$tentp,$price,$total);
                $thongbao = "update thanh cong";
            }
            $listtopping = loadall_topping();
            include "topping/list.php";
            break;



            /////////////////////controller sản phẩm
        case 'addsp':
            //kiem tra xem ng dung co click vaof nut add hay k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mmota = $_POST['mmota'];
                $anhsp = $_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                $created_at = date("Y-m-d H-i-s");
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["anhsp"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                $iddm = $_POST['iddm'];

                $errors = [];
                if (empty($tensp)) {
                    $errors['tensp'] = 'Yêu cầu nhập vào tên sản phẩm';
                }
                if (empty($giasp)) {
                    $errors['giasp'] = 'Yêu cầu nhập giá tên sản phẩm';
                }
                if (empty($mmota)) {
                    $errors['mmota'] = 'Yêu cầu nhập mô tả tên sản phẩm';
                } else {
                    if (strlen($mmota) < 6) {
                        $errors['mmota'] = 'Mô tả lớn hơn 6 ký tự';
                    }
                }
            }
            if (empty($anhsp)) {
                $errors['anhsp'] = 'Yêu cầu chọn ảnh cho sản phẩm';
            }
            if (empty($iddm)) {
                $errors['iddm'] = 'Yêu cầu chọn danh mục cho sản phẩm';
            }

            if (empty($errors)) {
                insert_sanpham($tensp, $giasp, $anhsp, $created_at, $mmota, $iddm);
                $thongbao = "them thanh cong";
            }

            $listsize = loadall_size();
            // $listtopping = loadall_topping();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/edit.php";
            break;
        case 'updatesp':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mmota = $_POST['mmota'];
                $anhsp = $_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["anhsp"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }


                $iddm = $_POST['iddm'];
                update_sanpham($id, $tensp, $giasp, $mmota, $anhsp, $iddm,);
                $thongbao = "update thanh cong";
            }
            include "sanpham/list.php";

        case 'listtk':
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/list.php";
            break;

        case 'addtk':
            //kiem tra xem ng dung co click vaof nut add hay k
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $created_at = date("Y-m-d H-i-s");

                $errors = [];
                if (empty($user)) {
                    $errors['user'] = 'Yêu cầu nhập vào tên nhân viên';
                }
                if (empty($pass)) {
                    $errors['pass'] = 'Yêu cầu nhập mật khẩu';
                }
                if (empty($email)) {
                    $errors['email'] = 'Yêu cầu nhập địa chỉ';
                } else {
                    if (strlen($address) < 6) {
                        $errors['address'] = 'địa chỉ lớn hơn 6 ký tự';
                    }
                }

                if (empty($tel)) {
                    $errors['tel'] = 'Yêu cầu nhập số điện thoại';
                }
                if (empty($errors)) {
                    insert_taikhoan($user, $email, $pass, $address, $tel, $role);
                    $thongbao = "them thanh cong";
                }
            }
            include "taikhoan/add.php";
            break;

        case 'suatk':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $tkh = loadone_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/edit.php";
            break;

        case 'updatetk':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $created_at = date("Y-m-d H-i-s");
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $listtaikhoan = loadall_taikhoan();
                $thongbao = "update thanh cong";
            }
            include "taikhoan/list.php";

            /////
        case 'binhluan':
            $listbinhluan = load_binhluan();
            include "binhluan/list.php";
            break;   
                     
        case 'xoabl':
            if(isset($_GET['id'])&&$_GET['id']>0){
                delete_binhluan($_GET['id']);

            }
           // $listbinhluan=loadall_binhluan("",0);
            $listbinhluan=load_binhluan();
                include "binhluan/list.php";
                break;
        case 'thongke':
            $listthongke=loadall_thongke();
            include "thongke/list.php";
            break;
        
        case 'bieudo':
            $listthongke=loadall_thongke();
            include "thongke/bieudo.php";
            break;

        case 'listbill':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw=$_POST['kyw'];
            }else{
                $kyw="";
            }
            $listbill=loadall_bill($kyw,0);
                include "donhang/list.php";
                break;

        case 'xoadh':
            if(isset($_GET['id'])&&$_GET['id']>0){
                delete_donhang($_GET['id']);
            }
            $listbill=loadall_bill("",0);
                include "donhang/list.php";
                break;
    }
} else {
    include "home.php";
}

include "footer.php";
