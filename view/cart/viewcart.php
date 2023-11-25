    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Size-topping</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                <?php
                $tong = 0;
                foreach ($_SESSION['mycart'] as $i => $cart) {
                    $hinh = $img_path . $cart[2];
                    $ttien = $cart[3] * $cart[4];

                    $tong += $ttien;
                    $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>';
                
                    echo '<tr>
                            <td class="align-middle" style="vertical-align: middle;"><img src="' . $hinh . '" alt="" style="width: 50px;">' . $cart[1] . '</td>
                            <td class="align-middle" style="vertical-align: middle;">...</td>
                            <td class="align-middle" style="vertical-align: middle;">' . $cart[3] . '</td>
                            <td  class="align-middle" style="vertical-align: middle;">'.$cart[4].'</td>
                            <td class="align-middle" style="vertical-align: middle;">' . $ttien . '</td>
                            <td class="align-middle" style="vertical-align: middle;">' . $xoasp . '</td>
                          </tr>';
                }
                                
                $ship = 15000;
                $tongcong=$tong+$ship;
                    echo'</tbody>
                    </table>
                        </div>
                        <!-- boxright star -->
                        <div class="col-lg-4">
                            <form class="mb-30" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="mã giảm giá">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">Áp dụng</button>
                                    </div>
                                </div>
                            </form>
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng chi đơn hàng</span></h5>
                            <div class="bg-light p-30 mb-5">
                                <div class="border-bottom pb-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6>Tổng phụ</h6>
                                        <h6>' . number_format($tong, 0, ".", ".") . ' VNĐ</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">phí vận chuyển</h6>
                                        <h6 class="font-weight-medium">' . number_format($ship, 0, ".", "."). ' VNĐ</h6>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Tổng cộng</h5>
                                        <h5>' . number_format($tongcong, 0, ".", ".") . ' VNĐ</h5>
                                    </div>
                                    <a href="index.php?act=checkout"> <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiến hành đặt hàng</button></a>
                
                                </div>
                            </div>
                        </div>';
                ?>

            
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
</body>

</html>