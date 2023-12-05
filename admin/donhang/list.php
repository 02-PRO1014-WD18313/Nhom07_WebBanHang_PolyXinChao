<section class="home_boxcenter">
    <div class="container py-4">
            <h3 style="color: blue">Danh sách đơn hàng</h3>
            <hr>
        <form action="index.php?act=listbill" method="POST">
            <div class="row">
                <div class="col-10">
                    <input type="text" name="kyw" placeholder="Nhập mã đơn hàng bạn muốn tìm kiếm..." class="form-control">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;text-align:center">
                        <th scope="col" width="6%">Mã đh</th>
                        <th scope="col"  width="15%">Thông tin khách hàng</th>
                        <th scope="col" width="3%">SL</th>
                        <th scope="col" width="7%">Tổng giá trị</th>
                        <th scope="col" width="10%">Ngày đặt</th>
                        <th scope="col"width="10%">Tình trạng</th>
                        <th scope="col" width="6%">Xác nhận</th>
                        <th scope="col" width="3%">Xóa</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php  
                      foreach ($listbill as $bill) {
                        extract($bill);
                        $xoadh = "index.php?act=xoadh&id=" . $id;
                        $suadh = "index.php?act=suadh&id=" . $id;
                        $kh=$bill['bill_name'].'
                        <br> '.$bill["bill_email"].'
                        <br> '.$bill["bill_address"].'
                        <br> '.$bill["bill_tel"];
                        $ttdh= get_ttdh($bill["bill_status"]);
                        $countsp=loadall_cart_count($bill["id"]);
                        
                        echo '<tr>
                        <td>DAM-'.$bill['id'].'</td>
                        <td>' .$kh. '</td>
                        <td>'.$countsp.'</td>
                        <td><strong>'.$bill["total"].'</strong>đ</td>
                        <td>' .$bill["ngaydathang"]. '</td>
                        <td>'.$ttdh.'</td>
                        <td> <a href="' . $suadh . '" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>    
                        <td><a href="'.$xoadh.'" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        
                    </tr>';
                    }
                    ?>
                </tbody>

            </table>
        </form>
            
    </div>
</section>
