<section class="home_boxcenter">
    <div class="container py-4">
            <h3 style="color: blue">Danh sách thống kê</h3>
            <hr>
        <form action="#" method="POST">
            <div class="row">
                <div class="col-4">
                    <select name="creator_id" class="form-control">
                        <option value="0">---Chọn người đăng---</option>
                        <?php if (!empty($data['users'])) :
                            foreach ($data['users'] as $key => $item) : ?>
                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?> -
                            (<?php echo $item['email'] ?>)</option>
                        <?php endforeach;
                        endif; ?>
                    </select>
                </div>

                <div class="col-6">
                    <input type="text" name="keyword" placeholder="Danh mục tìm kiếm..." class="form-control">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </div>
            <hr>
            <a href="index.php?act=bieudo"><button type="button" value="Xem biểu đồ" class="btn btn-success">Xem biểu đồ</button></a>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;">
                        <th scope="col" width="3%">Mã</th>
                        <th scope="col"  width="15%">Tên danh mục</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá cao nhất</th>
                        <th scope="col">Giá thấp nhất</th>
                        <th scope="col">Giá trung bình</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php  
                      foreach ($listthongke as $thongke) {
                        extract($thongke);
                        echo '<tr>
                        <td>'.$madm.'</td>
                        <td>' . $tendm . '</td>
                        <td>' . $countsp . '</td>
                        <td>' . $maxprice . '</td>
                        <td>' . $minprice . '</td>
                        <td>' . $avgprice . '</td>
                    </tr>';
                    }
                    ?>
                </tbody>

            </table>
                
        </form>
           
            
    </div>
</section>