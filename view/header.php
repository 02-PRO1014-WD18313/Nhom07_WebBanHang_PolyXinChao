<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="view/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="/preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/lib/animate/animate.min.css" rel="stylesheet">
    <link href="view/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->

        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
            
                <a href="" class="text-decoration-none">
                   
                    <span class="h1 text-uppercase text-primary bg-dark px-2">POLY</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">XINCHAO</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="index.php?act=timkiem" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary" style="height: 39px; border: none;">
                                <a href="" class="xoa"><button class="btn btn-warning" type="submit" name="timkiem" value="btn"><i class="fa fa-search"></i></button></a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
            <?php
                if (isset($_SESSION['user']) && ($_SESSION['user'] != "")) {
                    $username = $_SESSION['user']['user'];
                    echo '<h5 type="button" style="font-size: 20px;
                    font-weight: 700;"class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="nav-icon fa fa-user"></i> ' . $username . '</h5>';
                    echo'<div class="dropdown-menu dropdown-menu-right">';
                    if ($_SESSION['user']['role'] == 1){
                        echo ' <a href="admin/index.php" class="dropdown-item" type="button">Quản trị</a>';
                        
                    }
                    echo ' <a href="index.php?" class="dropdown-item" type="button">Lịch sử đặt hàng</a>
                            <a href="index.php?act=thoat" class="dropdown-item" type="button">Đăng xuất</a>
                            </div>';
                        
                } else {
                ?>
                    <form action="?act=dangnhap1" method="post">
                        <button class="btn btn-success" type="submit">Đăng nhập</button>
                    </form>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <ul>
                        
                            <?php
                                foreach($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm="index.php?act=sanpham&iddm=".$id;
                                    echo '<li style="list-style: none; margin-top: 15px;"><a style="font-size: 20px;" href="'.$linkdm.'">'.$name.'</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">POLY</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">XINCHAO</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="index.php?act=sanphamtu10_30" class="dropdown-item">Sản phẩm từ 10-30</a>
                                    <a href="index.php?act=sanphamtu30_50" class="dropdown-item">Sản phẩm từ 30-50</a>
                                    <a href="index.php?act=sanphamtu50_90" class="dropdown-item">Sản phẩm từ 50-90</a>
                                </div>
                            </div>



                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang</a>
                            </div>
                            <a href="index.php?act=contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="index.php?act=addtocart" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                <?php
                                    $uniqueProductIDs = array();
                                    $totalQuantity = 0;
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        $productID = $cart[0]; 
                                        if (!in_array($productID, $uniqueProductIDs)) {
                                            $uniqueProductIDs[] = $productID;
                                            $totalQuantity += 1; 
                                        }
                                    }
                                    echo $totalQuantity;
                                ?>
                            </span>
                        </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>


    