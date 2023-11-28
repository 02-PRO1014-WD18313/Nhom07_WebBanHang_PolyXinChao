
    <!-- Checkout Start -->
    <form action="" method="post">

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">ĐỊA CHỈ THANH TOÁN</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <?php
                            if(isset($_SESSION['user'])){
                                $name=$_SESSION['user']['user'];
                                $address=$_SESSION['user']['address'];
                                $email=$_SESSION['user']['email'];
                                $tel=$_SESSION['user']['tel'];
                            }else{
                                $name="";
                                $address="";
                                $email="";
                                $tel="";
                            }
                        ?>
                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input class="form-control" type="text" placeholder="John" name="name" value="<?=$name?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="John" name="address" value="<?=$address?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" placeholder="example@email.com" name="email" value="<?=$email?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số di động</label>
                            <input class="form-control" type="text" placeholder="+84" name="tel" value="<?=$tel?>">
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="momo_atm" value="momo_atm">
                                <label class="custom-control-label" for="momo_atm">Thanh Toán Qua ATM MoMo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="momo_qr" value="momo_qr">
                                <label class="custom-control-label" for="momo_qr">Thanh Toán Qua Mã QR MoMo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="vnpay" value="vnpay">
                                <label class="custom-control-label" for="vnpay">Thanh Toán Qua VPPay</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="pttt" id="banktransfer" value="1">
                                <label class="custom-control-label" for="banktransfer">Thanh Toán Khi Nhận Hàng</label>
                            </div>
                        </div>
                        <?php
                            if (isset($_SESSION['user'])) {
                                $iduser = $_SESSION['user']['id'];
                                $buttonLabel = "Đặt hàng";
                                $buttonClass = "btn btn-block btn-primary font-weight-bold py-3";
                            } else {
                                $iduser = 0;
                                $buttonLabel = "Đăng nhập để đặt hàng";
                                $buttonClass = "btn btn-block btn-secondary font-weight-bold py-3 disabled";
                            }
                        ?>

                            <button type="submit" value="Đặt hàng" name="dathang" class="<?php echo $buttonClass; ?>"><?php echo $buttonLabel; ?></button>


                        <button value="dh" type="submit" name="redirect" class="btn btn-block btn-primary font-weight-bold py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Đơn hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <!-- <h6 class="mb-3">Sản phẩm</h6> -->
                        <div class="d-flex justify-content-between" >
                            <p>Tên sản phẩm</p>
                            <p>Số lượng</p>
                            <p>Giá</p>
                        </div>
                        <?php
                            $tong = 0;
                            foreach ($_SESSION['mycart'] as $i => $cart) {
                                $hinh = $img_path . $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                echo '<div class="d-flex justify-content-between">
                                <p>'.$cart[1].'</p>
                                <p>X'.$cart[4].'</p>
                                <p>'.number_format($cart[3], 0, ".", ".").' VNĐ</p>
                                </div>';
                                }
                            $ship = 15000;
                            $tongcong=$tong+$ship;
                               echo'</div>
                               <div class="border-bottom pt-3 pb-2">
                                   <div class="d-flex justify-content-between mb-3">
                                       <h6>Tổng</h6>
                                       <h6>'.number_format($tong, 0, ".", ".").' VNĐ</h6>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <h6 class="font-weight-medium">Ship</h6>
                                       <h6 class="font-weight-medium">'.number_format($ship, 0, ".", ".").' VNĐ</h6>
                                   </div>
                               </div>
                               <div class="pt-2">
                                   <div class="d-flex justify-content-between mt-2">
                                       <h5>Số Tiền Cần Thanh toán</h5>
                                       <h5>'.number_format($tongcong, 0, ".", ".").' VNĐ</h5>
                                   </div>
                               </div>';
                        ?>
                                            
                </div>
            </div>
        </div>
    </div>
                            <input type="hidden" name="tong" value="<?php echo !empty($tongcong)?$tongcong:false ?>">
    </form>
    <!-- Checkout End -->
</body>

</html>