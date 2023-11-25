<?php
session_start();
ob_start();
include "model/taikhoan.php";
include "model/cart.php";
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm = loadall_danhmuc();
include "view/header.php";
include "global.php";
include "model/sanpham.php";
$spnew = loadall_sanpham_home();

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }

            $tk = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sptk.php";
            break;

        case 'sanphamall':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }

            $tk = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sptk.php";
            break;

        case 'spct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                include "view/spct.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'sanphamtu10_30':
            $sptu10_30 = load_sanpham_tu_10_30();
            include "view/sp10_30.php";
            break;
        case 'sanphamtu30_50':
            $sptu30_50 = load_sanpham_tu_30_50();
            include "view/sp30_50.php";
            break;
        case 'sanphamtu50_90':
            $sptu50_90 = load_sanpham_tu_50_90();
            include "view/sp50_90.php";
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
            if (isset($_POST['giohang']) && ($_POST['giohang'] > 0)) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
            }
            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $GET['mycart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;

        case 'timkiem':
            if (isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                $kyw = $_POST['search'];
            } else {
                $kyw = '';
            }
            $tk = loadall_sanpham($kyw);
            include "view/sptk.php";
            break;

        case 'sanphamtu1den2':
            if (isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                $kyw = $_POST['search'];
            } else {
                $kyw = '';
            }
            $boloc = load_sanpham_tu_10_30();
            include "view/boloc.php";
            break;
        case 'dangnhap1':
            if (isset($_POST['dangnhap1']) && ($_POST['dangnhap1'] > 0)) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php?');
                    // $thongbao="bạn đã đăng nhập thành công!";
                } else {
                    $thongbao = '
                    <div class="alert alert-danger" role="alert">
                    Tài khoản k tồn tại. Vui lòng kiểm tra hoặc đăng ký!
                    </div>';
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'dangky1':
            if (isset($_POST['dangky1']) && ($_POST['dangky1'] > 0)) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];

                $errors = [];
                if (empty($user)) {
                    $errors['user'] = 'Tên đăng nhập không được để trống';
                } else {
                    if (strlen($user) < 6) {
                        $errors['user'] = 'Tên đăng nhập phải lớn hơn 6 ký tự';
                    }
                }

                if (empty($email)) {
                    $errors['email'] = 'email không được để trống';
                } else {
                    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
                    if (!$checkEmail) {
                        $errors['email'] = 'Email không đúng định dạng';
                    }
                }

                if (empty($tel)) {
                    $errors['tel'] = 'Số điện thoại không được để trống';
                }

                if (empty($address)) {
                    $errors['address'] = 'Địa chỉ không được để trống';
                }

                if (empty($pass)) {
                    $errors['pass'] = 'Mật khẩu không được để trống';
                }
                if (empty($errors)) {
                    insert_taikhoan($user, $email, $pass, $address, $tel, $role);
                    $thongbao = '
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
} else {
    include "view/banner.php";
    include "view/home.php";
}



include "view/footer.php";
