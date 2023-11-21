<?php

 include "header.php";
 include "sidebar.php";
 include "breadcrumb.php";
 include "../model/pdo.php";
 include "../model/danhmuc.php";

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
                insert_danhmuc($tenloai);
                $thongbao="them thanh cong";
            }
            include "danhmuc/add.php";
            break;
        case 'deletedm':
            if(isset($_GET['id'])&&$_GET['id']>0){
                delete_danhmuc($_GET['id']);
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

    }
      

    }else{
        include "home.php";
    }

 include "footer.php";
?>