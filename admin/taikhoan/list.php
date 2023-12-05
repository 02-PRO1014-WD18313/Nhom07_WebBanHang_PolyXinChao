<section class="home_boxcenter">
    <div class="container py-4">
            <h3 style="color: blue">Danh sách tài khoản người dùng</h3>
            <hr>
            <a href="index.php?act=addtk" ><button class="btn btn-success">Thêm tài khoản mới <i class="fa fa-plus"></i></button></a>
            <hr>
        <form action="index.php?act=listtk" method="POST">
        <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;text-align:center">
                        <th scope="col" width="8%">MÃ TK</th>
                        <th scope="col">Tên đăng nhập</th>
                        <th scope="col">Mật khẩu</th>
                        <th scope="col"width="8%">email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col" >điện thoại</th>
                        <th scope="col" width="10%">role</th>
                        <th scope="col" width="10%">Thăng chức</th>
                        <th scope="col" width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                    foreach($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=" . $id;
                        $xoatk="index.php?act=xoatk&id=" .$id;
                        $ttnd = get_role($taikhoan["role"]);
                        //show danh muc ra
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.'</td>
                        <td>'.$tel.'</td>
                        <td>'.$ttnd.'</td>
                        <td> <a href="' . $suatk . '" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>    
                        <td><a href="'.$xoatk.'" class="xoa"><button class="btn btn-danger" type="button" name="timkiem" value="btn"><i class="fa fa-trash"></i></button></a>
                    </tr>';
                    }
                ?>
                </tbody>

            </table>
        </form>
    </div>
</section>
