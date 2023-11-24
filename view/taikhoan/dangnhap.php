
<!-- form login -->

<div class="form-container sign-up-container" >
        <div class="row mt-5 main-web">
            <div class="col-md-4 offset-md-4">
                <h4 class="text-center">Nhập Thông Tin Đăng Nhập</h4>
                <form action="" method="post" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; height: 400px;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" style="color: #000;">Tên đăng nhập</label>
                    <input name="user" type="text" class="form-control" id="exampleInputEmail1"/>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label" style="color: #000;">Mật khẩu</label>
                    <input name="pass" type="password" class="form-control" id="exampleInputPassword1" />
                </div>
                <div class="mb-3">
                    <a href="?act=quenmk">Quên mật khẩu?</a>
                </div>
                <div class="mb-3">
                    <span>Chưa có tài khoản? </span>
                    <a href="?act=dangky1">Đăng ký!</a>
                </div>
                <input type="submit" onclick="return vali()" value="Đăng Nhập" name="dangnhap1" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">
                </form>
                <?php
                    
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                ?>
            </div>
        </div>
</div>
<script>
  function vali(){
    var exampleInputEmail1 = document.getElementById('exampleInputEmail1');
    if(exampleInputEmail1.value==""){
        alert('Yêu cầu nhập dữ tên đăng nhập');
        exampleInputEmail1.focus();
        return false;
    }
    var exampleInputPassword1 = document.getElementById('exampleInputPassword1');
    if(exampleInputPassword1.value==""){
        alert('Yêu cầu nhập mật khẩu');
        exampleInputPassword1.focus();
        return false;
    }
    return true;
  }
</script>
