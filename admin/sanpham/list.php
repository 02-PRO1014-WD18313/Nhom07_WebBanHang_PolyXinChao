<section class="home_boxcenter">
    <div class="container py-4">
            <h3 style="color: blue">Danh sách sản phẩm</h3>
            <hr>
            <a href="index.php?act=addsp" ><button class="btn btn-success">Thêm sản phẩm mới <i class="fa fa-plus"></i></button></a>
            <hr>
        <form action="index.php?act=listsp" method="POST">
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
                <div class="hd" style="text-align: center;">
                    <input type="text" name="kyw" class="form-control">
                    <hr>
                        <select name="iddm" style="width: 150px; height: 30px;">
                            <option value="0" selected>Tất cả</option>
                            <?php
                                foreach ($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            ?>
                        </select>
                        <button class="btn btn-success" name="listok" type="submit" value="1">Chọn</button>
                </div>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;">
                        <th scope="col" width="3%">Mã sp</th>
                        <th scope="col"  width="15%">Tên sản phẩm</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Size</th>
                        <th scope="col">Topping</th>
                        <th scope="col"width="8%">Giá sp</th>
                        <th scope="col">Mô tả sản phẩm</th>
                        <th scope="col" width="10%">Lượt bán sp</th>
                        <th scope="col" >created_at</th>
                        <th scope="col" width="5%">Sửa</th>
                        <th scope="col" width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php  
                      foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        //show danh muc ra
                        $hinhpath = "../upload/" . $img;
                        if (is_file($hinhpath)) {
                            $anhsp = "<img src='" . $hinhpath . "' height='50 width='50' ''> ";
                        } else {
                            $anhsp = "no img";
                        }
                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td>' . $anhsp . '</td>
                        <td>' . $id_size . '</td>
                        <td>' . $id_tp . '</td>
                        <td>' . $price . '</td>
                        <td>' . $description . '</td>
                        <td>' . $view . '</td>
                        <td>' . $created_at . '</td>
                        <td> <a href="' . $suasp . '" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>               
                        <td><a href="'.$xoasp.'" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        
                    </tr>';
                    }
                    ?>
                </tbody>

            </table>
        </form>
            <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            
    </div>
</section>
