<?php
if (is_array($tkh)) {
    extract($tkh);
}
$idUpdate = '';
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!empty($_GET['id'])){
        $idUpdate = $_GET['id']; 
    }
}
?>
<div class="container py-4">
    <div class="row2">
        <h3 style="color: blue">Thăng chức cho user thành admin</h3>
        <hr>
        <form action="index.php?act=updatetk" method="POST">   
            <div class="form-group">
                <label>Mã khách hàng</label> <br>
                <input type="text" class="form-control" name="id" value="<?=$user?>">
            </div> 
            <div class="form-group">
                <label>Tên khách hàng</label> <br>
                <input type="text" class="form-control" name="user" value="<?=$user?>">
            </div>
            <div class="form-group">
                <label>email</label> <br>
                <input type="text" class="form-control" name="email" value="<?=$email?>">
            </div>
            <div class="form-group">
                <label>Mật khẩu</label> <br>
                <input type="password" class="form-control" name="pass" value="<?=$pass?>">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label> <br>
                <input type="text" class="form-control" name="address" value="<?=$address?>">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label> <br>
                <input type="text" class="form-control" name="tel" value="<?=$tel?>">
            </div>
            <div class="form-group">
                <label>Phân quyền</label> <br>
                <input type="number" class="form-control" name="role" value="<?=$role?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo !empty($idUpdate) ? $idUpdate : false ?>">
                <a href="index.php?act=listtk"><button class="btn btn-success" name="update" type="submit" value="1">Cập nhật</button></a>
                <hr>
                <a href="index.php?act=listtk"><button class="btn btn-primary">Danh sách</button></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>

</div>