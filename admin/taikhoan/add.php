<div class="container py-4">
    <a href="index.php?act=listtk"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm tài khoản mới</h3>
    <hr>
    <form method="post" action="index.php?act=addtk" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã tài khoản</label>
            <input type="text" placeholder="Nhập Tên tài khoản" class="form-control" name="id"/>
        </div>
        <div class="form-group">
            <label for="">Tên tài khoản</label>
            <input type="text" placeholder="Nhập Tên tài khoản" class="form-control" name="user" />
            <span style="color: red"><?php echo !empty($errors['user'])?$errors['user']:false ?></span>
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label></label>
            <input type="password" placeholder="Nhập Tên tài khoản" class="form-control" name="pass" />
            <span style="color: red"><?php echo !empty($errors['pass'])?$errors['pass']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">email tài khoản</label>
            <input type="text" class="form-control" name="email"/>
            <span style="color: red"><?php echo !empty($errors['email'])?$errors['email']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Địa chỉ user</label>
            <input type="text" placeholder="Nhập Tên tài khoản" class="form-control" name="address" />
            <span style="color: red"><?php echo !empty($errors['address'])?$errors['address']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">SĐT</label>
            <input type="text" placeholder="Nhập Tên tài khoản" class="form-control" name="tel" />
            <span style="color: red"><?php echo !empty($errors['tel'])?$errors['tel']:false ?></span> 
        </div>
       
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>