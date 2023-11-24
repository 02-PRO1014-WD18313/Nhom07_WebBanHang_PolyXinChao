<?php
 include "header.php";
 include "sidebar.php";
 include "breadcrumb.php";
 include "../model/pdo.php";
 include "../model/danhmuc.php";
 include "../model/sanpham.php";
 include "../model/taikhoan.php";
 $listsanpham=loadall_sanpham("",0);
 //controller
if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {
        case 'listdm':
            $listdanhmuc=loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'adddm':
            //kiem tra xem ng dung co click vaof nut add hay k
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tenloai=$_POST['tenloai'];
                $errors=[];

                if(empty($tenloai)){
                    $errors['tenloai'] = 'Yêu cầu nhập vào tên danh mục';
                }
                if(empty($errors)){
                    insert_danhmuc($tenloai);
                    $thongbao="them thanh cong";
                }
                
                
            }
            include "danhmuc/add.php";
            break;
        case 'deletedm':
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id=$_GET['id'];
                deletedanhmuc_from_product ($id);
            }
            $listdanhmuc=loadall_danhmuc();
                include "danhmuc/list.php";
                break;
        case 'suadm':
            if(isset($_GET['id'])&&$_GET['id']>0){
                $dm=loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/edit.php";
            break;
        case 'updatedm':
            if(isset($_POST['update'])&&($_POST['update'])){
                $tenloai=$_POST['tenloai'];
                $id=$_POST['id'];
                update_danhmuc($id,$tenloai);
                $thongbao="update thanh cong";
            }
            $listdanhmuc=loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        /////////////////////controller sản phẩm
        case 'addsp':
            //kiem tra xem ng dung co click vaof nut add hay k
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $mmota=$_POST['mmota'];
                $anhsp=$_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                $created_at = date("Y-m-d H-i-s");
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["anhsp"]["name"])). " has been uploaded.";
                    } else {
                    // echo "Sorry, there was an error uploading your file.";
                    }
                $iddm=$_POST['iddm'];

                $errors=[];
                if(empty($tensp)){
                    $errors['tensp'] = 'Yêu cầu nhập vào tên sản phẩm';
                }
                if(empty($giasp)){
                    $errors['giasp'] = 'Yêu cầu nhập giá tên sản phẩm';
                }
                if(empty($mmota)){
                    $errors['mmota'] = 'Yêu cầu nhập mô tả tên sản phẩm';
                }else{
                    if(strlen($mmota) <6){
                        $errors['mmota'] = 'Mô tả lớn hơn 6 ký tự';
                    }
                }
                }
                if(empty($anhsp)){
                    $errors['anhsp'] = 'Yêu cầu chọn ảnh cho sản phẩm';
                }
                if(empty($iddm)){
                    $errors['iddm'] = 'Yêu cầu chọn danh mục cho sản phẩm';
                }


                if(empty($errors)){
                    insert_sanpham($tensp,$giasp,$anhsp,$created_at,$mmota,$iddm);
                    $thongbao="them thanh cong";
                }
               
            
            $listdanhmuc=loadall_danhmuc();
            include "sanpham/add.php";
            break;
        
        case 'listsp':
            if(isset($_POST['listok'])&&($_POST['listok'])){
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            }else{
                $kyw='';
                $iddm=0;
            }
            $listdanhmuc=loadall_danhmuc();
            $listsanpham=loadall_sanpham($kyw,$iddm);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if(isset($_GET['id'])&&$_GET['id']>0){
                delete_sanpham($_GET['id']);
            }
            $listsanpham=loadall_sanpham("",0);
                include "sanpham/list.php";
                break;

        case 'suasp':
            if(isset($_GET['id'])&&$_GET['id']>0){
                $sanpham=loadone_sanpham($_GET['id']);
            }
            $listdanhmuc=loadall_danhmuc();
            include "sanpham/edit.php";
            break;
        case 'updatesp':
            if(isset($_POST['update'])&&($_POST['update'])){
                $id=$_POST['id'];
                $tensp=$_POST['tensp'];
                $giasp=$_POST['giasp'];
                $mmota=$_POST['mmota'];
                $anhsp=$_FILES['anhsp']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["anhsp"]["name"])). " has been uploaded.";
                    } else {
                    // echo "Sorry, there was an error uploading your file.";
                    }


                $iddm=$_POST['iddm'];
                update_sanpham($id,$tensp,$giasp,$mmota,$anhsp,$iddm);
                $thongbao="update thanh cong";
            }
            include "sanpham/list.php";

        case 'listtk':
            $listtaikhoan=loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if(isset($_GET['id'])&&$_GET['id']>0){
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan=loadall_taikhoan("",0);
                include "taikhoan/list.php";
                break;      
        }
    }else{
        include "home.php";
    }

 include "footer.php";
?>