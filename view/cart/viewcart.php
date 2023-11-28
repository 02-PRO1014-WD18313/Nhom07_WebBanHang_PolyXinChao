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
                $stt = 0;
                foreach ($_SESSION['mycart'] as $i => $cart) {
                    $hinh = $img_path . $cart[2];
                    $ttien = $cart[3] * $cart[4];

                    $tong += $ttien;
                    $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>';


                ?>
                    <tr>
                            <td class="align-middle" style="vertical-align: middle;"><img src="<?php echo $hinh ?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle tensanpham" style="vertical-align: middle;"><?php echo $cart[1] ?></td>
                            <td id="product-price" class="product-price"><input type="text" name="product-price" id="" value="<?php echo $cart[3] ?>" readonly disabled style="border: none;width: 60px; margin-top: 13px;  background-color: white;"></td>
                            <td class="product-quantity"><div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button onclick="tru(<?php echo $cart[4] ?>,<?php echo $cart[3] ?>,<?php echo $stt ?>)" class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"  class="form-control form-control-sm bg-secondary border-0 text-center quanlity" value="<?php echo $cart[4] ?>">
                                    <div class="input-group-btn">
                                        <button onclick="cong(<?php echo $cart[4] ?>,<?php echo $cart[3] ?>,<?php echo $stt ?>)" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div></td>
                            <td class="total-money"><?php echo $ttien ?></td>
                            <td class="align-middle" style="vertical-align: middle;"><?php echo $xoasp ?></td>
                          </tr>';
                
                <?php
                $stt++;
                }
                ?>
                <?php
                   
                   
                $ship = 15000;
                $tongcong=$tong+$ship;
                ?>
                </tbody>
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
                                        <h6 id="tongphu"><?php echo $tong ?></h6> <span> VND</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">phí vận chuyển</h6>
                                        <h6 class="font-weight-medium" id="vanchuyen"><?php echo $ship ?></h6><span> VND</span>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Tổng cộng</h5>
                                        <h5 id="tongcong"><?php echo $tongcong ?></h5><span> VND</span>
                                    </div>
                                    <form id="myForm" action="index?act=checkout" method="get"> 
                                    
                    <input type="hidden" id="tensanphamsubmit" name="tensanpham[]">
                    <input type="hidden" id="tongphusubmit" name="tongphu">
                <input type="hidden" id="phivanchuyensubmit" name="phivanchuyen">
                <input type="hidden" id="soluongsubmit" name="soluong">
                <input type="hidden" id="tongtiensubmit" name="tongtien">
                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" id="payment-button">Tiến hành đặt hàng</button>
                                     </form> 
                                    
                
                                </div>
                            </div>
                        </div>
                    <?php
                ?>

            
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
        
        var tensanpham = document.getElementsByClassName('tensanpham');
        var total_money = document.getElementsByClassName('total-money');   
        var quanlitys = document.getElementsByClassName('quanlity');
        var quanlitys = document.getElementsByClassName('quanlity');
        var tongphu = document.getElementById('tongphu');
        var tongcong = document.getElementById('tongcong');
        var vanchuyen = document.getElementById('vanchuyen');


       
        var tensanphams = [];

  // Duyệt qua mảng các phần tử
  for (var i = 0; i < inputElements.length; i++) {
    // Lấy giá trị từ mỗi trường input và thêm vào mảng
    tensanphams.push(tensanpham[i].innerText);
  }

        function tru(soluong,gia,stt) {
            var quanlity = parseInt(quanlitys[stt].value);
            var tong = parseInt(tongphu.innerText);
            console.log(quanlity);
            var soluong = quanlity - 1;
            console.log(soluong);
            var money = parseInt(total_money[stt].innerText);
            total_money[stt].innerText =  soluong * gia;
            quanlitys[stt].value =soluong; 
            tongphu.innerText = tong - gia;
            var tongtien = parseInt(tongcong.innerText);
            tongcong.innerText = tongtien - gia;
            // var quanlity = parseInt(total_money[stt].innerText) ;
            // console.log(quanlity);


            
        }

    function cong(soluong,gia,stt) {
            var quanlity = parseInt(quanlitys[stt].value);
            var tong = parseInt(tongphu.innerText);
            console.log(quanlity);
            var soluong = quanlity + 1;
            console.log(soluong);
            var money = parseInt(total_money[stt].innerText);
            total_money[stt].innerText =  soluong * gia;
            quanlitys[stt].value =soluong; 
            tongphu.innerText = tong + gia;
            var tongtien = parseInt(tongcong.innerText);
            tongcong.innerText = tongtien + gia;
            // var quanlity = parseInt(total_money[stt].innerText) ;
            // console.log(quanlity);


            
        }
        const paymentButton = document.getElementById('payment-button');


paymentButton.addEventListener('click', function() {
  
        document.getElementById('tensanphamsubmit').value = tensanphams;
        document.getElementById('tongphusubmit').value = tongphu.innerText;
        document.getElementById('phivanchuyensubmit').value = vanchuyen.innerText;
        // document.getElementById('soluongsubmit').value = selectedSeats;
        document.getElementById('tongtiensubmit').value = tongcong;
        document.getElementById('myForm').submit();

    
});
</script>

</body>

</html>