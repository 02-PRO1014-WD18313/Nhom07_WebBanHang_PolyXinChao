<?php
session_start();
ob_start();
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
include "model/taikhoan.php";
include "model/cart.php";
include "model/pdo.php";
include "model/danhmuc.php";
include "model/binhluan.php";
$dsdm = loadall_danhmuc();
include "view/header.php";
include "global.php";
include "model/sanpham.php";
$spnew = loadall_sanpham_home();
$dstop10=loadall_sanpham_top4();

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
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
            if(isset($_POST['guibinhluan'])){
                insert_binhluan($_POST['idpro'],$_SESSION['user']['id'], $_POST['noidung']);
            }
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                $binhluan = loadall_binhluan($_GET['idsp']);
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
                    insert_taikhoan($user, $email, $pass, $address, $tel, 0);
                    $thongbao = '
                        <div class="alert alert-success" role="alert">
                            Đăng ký thành công. Bây giờ bạn có thể đăng nhập!
                        </div>';
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'lichsudh':
            $listdh = load_lichsudh($_SESSION['user']['id']);
            load_lichsudh($_SESSION['user']['id']);
            include 'view/cart/lichsudh.php';
            break;
        case 'thoat':
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
            unset($_SESSION['mycart']);
            header('location: index.php?');
            break;

        case 'checkout':   
            if(!empty($_POST['pttt'])){
                $tong = $_POST['tong'];
                $pttt = $_POST['pttt'];
                if($pttt == 'ttoff'){
                    if(isset($_SESSION['user'])){
                        $iduser = $_SESSION['user']['id'];
                    } else {
                        $iduser = 0;
                    }
                    // đăng nhập để đặt hàng            
                    if ($iduser === 0) {
                        header("Location: index.php?act=dangnhap1");
                        exit();
                    }
                    // $thanhtoan = $_POST['redirect'];
                    $name = $_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang = date('h:i:sa d-m-Y');
                    $tongdonhang=tongdonhang();
                    // $err = validate_form($user, $email, $sdt, $address);
                    if (empty($err)) {
                    $idbill= insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang);
                    foreach($_SESSION['mycart'] as $cart){
                            insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                            // delete_cart($idcart);
                            // $_SESSION['count_cart'] = count(count_cart($_SESSION['iduser']));
                        }
                        unset($_SESSION['mycart']);
                        $bill= loadone_bill($id);
                        $billct=loadall_cart($id);
                        include "view/cart/billcomfirm.php";
                        break; 
                }
            } else if($pttt == 'vnpay'){
                $tong = $_POST['tong'];
                $pttt = $_POST['pttt'];
                if($pttt == 'vnpay'){
                    if(isset($_SESSION['user'])){
                        $iduser = $_SESSION['user']['id'];
                    } else {
                        $iduser = 0;
                    }
                    // đăng nhập để đặt hàng            
                    if ($iduser === 0) {
                        header("Location: index.php?act=dangnhap1");
                        exit();
                    }
                    // $thanhtoan = $_POST['redirect'];
                    $name = $_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang = date('h:i:sa d-m-Y');
                    $tongdonhang=tongdonhang();
                    if (empty($err)) {
                    $idbill= insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang);   
                    foreach($_SESSION['mycart'] as $cart){
                            insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                            // delete_cart($idcart);
                            // $_SESSION['count_cart'] = count(count_cart($_SESSION['iduser']));
                        }
                        unset($_SESSION['mycart']);
                        $bill= loadone_bill($id);
                        $billct=loadall_cart($id);
                        header('location:view/cart/billcomfirm');
                        
                }
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
              
                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://localhost/Nhom07_WebBanHang_PolyXinChao/index.php?act=billcomfirm";
                $vnp_TmnCode = "CJQLSZK0"; //Mã website tại VNPAY 
                $vnp_HashSecret = "PQGKUSFGBQOLLFANZNVGCDLJYREUIXPI"; //Chuỗi bí mật
                $vnp_apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

                $startTime = date("YmdHis");
                $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

                $vnp_TxnRef = time().''; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
                $vnp_OrderType = 'billpayment';
                $vnp_Amount = $tong * 100;
                $vnp_Locale = 'vn';
                $vnp_BankCode = 'NCB';
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $vnp_ExpireDate = $expire;

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                    "vnp_ExpireDate" => $vnp_ExpireDate
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                );
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            }
                
            }else if($pttt=='momo_qr'){
                header('Content-type: text/html; charset=utf-8');

                function execPostRequest($url, $data)
                {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($data)
                        )
                    );
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    //execute post
                    $result = curl_exec($ch);
                    //close connection
                    curl_close($ch);
                    return $result;
                }


                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua mã qr MoMo";
                $amount = $tong ;
                $orderId = time() . "";
                $redirectUrl = "http://localhost/Nhom07_WebBanHang_PolyXinChao/index.php?act=billcomfirm";
                $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                $extraData = "";

                $requestId = time() . "";
                $requestType = "captureWallet";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there

                header('Location: ' . $jsonResult['payUrl']);

            }else if($pttt=='momo_atm'){
                $tong = $_POST['tong'];
                $pttt = $_POST['pttt'];
                if($pttt == 'momo_atm'){
                    if(isset($_SESSION['user'])){
                        $iduser = $_SESSION['user']['id'];
                    } else {
                        $iduser = 0;
                    }
                    // đăng nhập để đặt hàng            
                    if ($iduser === 0) {
                        header("Location: index.php?act=dangnhap1");
                        exit();
                    }
                    // $thanhtoan = $_POST['redirect'];
                    $name = $_POST['name'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $pttt=$_POST['pttt'];
                    $ngaydathang = date('h:i:sa d-m-Y');
                    $tongdonhang=tongdonhang();
                    if (empty($err)) {
                    $idbill= insert_bill($iduser,$name,$address,$tel,$email,$pttt,$ngaydathang,$tongdonhang);   
                    foreach($_SESSION['mycart'] as $cart){
                            insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
                            // delete_cart($idcart);
                            // $_SESSION['count_cart'] = count(count_cart($_SESSION['iduser']));
                        }
                        unset($_SESSION['mycart']);
                        $bill= loadone_bill($id);
                        $billct=loadall_cart($id);
                        header('location:view/cart/billcomfirm');
                        
                }
                header('Content-type: text/html; charset=utf-8');

                function execPostRequest($url, $data)
                {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($data)
                        )
                    );
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    //execute post
                    $result = curl_exec($ch);
                    //close connection
                    curl_close($ch);
                    return $result;
                }
        
        
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = $tong;
                $orderId = time() . "";
                $redirectUrl = "http://localhost/Nhom07_WebBanHang_PolyXinChao/index.php?act=billcomfirm";
                $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                $extraData = "";
        
                $requestId = time() . "";
                $requestType = "payWithATM";
                // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json
        
                //Just a example, please check more in there
                header('Location: ' . $jsonResult['payUrl']);
            }
        }
            }
            include "view/checkout.php";
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
