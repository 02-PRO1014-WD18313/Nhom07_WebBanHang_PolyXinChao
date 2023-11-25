<section class="home_boxcenter">
    <div class="container py-4">
            <h3 style="color: blue">Danh sách tài khoản người dùng</h3>
            <hr>
        <form action="index.php?act=listtk" method="POST">
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
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;">
                        <th scope="col" width="3%">STT</th>
                        <th scope="col" width="8%">MÃ TK</th>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col"width="8%">email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col" >điện thoại</th>
                        <th scope="col">IP</th>
                        <th scope="col" width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                    foreach($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        $xoatk="index.php?act=xoatk&id=" .$id;
                        //show danh muc ra
                        echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$role.'</td>
                        <td><a href="'.$xoatk.'" class="xoa"><button class="btn btn-danger" type="button" name="timkiem" value="btn"><i class="fa fa-trash"></i></button></a>
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
