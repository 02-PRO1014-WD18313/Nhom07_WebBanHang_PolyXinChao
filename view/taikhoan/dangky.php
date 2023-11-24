<div class="row mt-5 main-web">
  <div class="col-md-4 offset-md-4">
    <h2 class="text-center" style="color: blue; ">Nhập thông tin đăng ký</h2>
    <form action="index.php?act=dangky1" method="post" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px;">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Email</label>
        <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="vui lòng nhập email" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" />
        <span style="color: red"><?php echo !empty($errors['email'])?$errors['email']:false ?></span> 
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Tên đăng nhập</label>
        <input name="user" type="text" class="form-control" id="exampleInputEmail2" placeholder="vui lòng nhập Tên đăng nhập" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;"  />
        <span style="color: red"><?php echo !empty($errors['user'])?$errors['user']:false ?></span> 
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Số điện thoại</label>
        <input name="tel" type="text" class="form-control" id="exampleInputEmail3" placeholder="vui lòng nhập Số điện thoại" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;"  />
        <span style="color: red"><?php echo !empty($errors['tel'])?$errors['tel']:false ?></span> 

      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Địa chỉ</label>
        <input name="address" type="text" class="form-control" id="exampleInputEmail4" placeholder="vui lòng nhập Địa chỉ" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;"  />
        <span style="color: red"><?php echo !empty($errors['address'])?$errors['address']:false ?></span> 

      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" style="color: #000;">Mật khẩu</label>
        <input name="pass" type="password" class="form-control" id="exampleInputPassword5" placeholder="vui lòng nhập Mật khẩu" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" />
        <span style="color: red"><?php echo !empty($errors['pass'])?$errors['pass']:false ?></span>
      </div>
      <div class="mb-3">
        <span style="color: #000;">Đã có tài khoản? </span>
        <a href="?act=dangnhap1" style="color: blue;">Đăng nhập!</a>
      </div>
      
      <input type="submit" onclick="return vali()" value="Đăng ký" name="dangky1" style="background-color: #4caf50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    <?php
            if (isset($thongbao) && ($thongbao != "")){
             echo $thongbao;
            }
    ?>
  </div>
</div>
<!-- <script>
  function vali(){
    var exampleInputEmail1 = document.getElementById('exampleInputEmail1');
    if(exampleInputEmail1.value==""){
        alert('Yêu cầu nhập dữ liệu cho email');
        exampleInputEmail1.focus();
        return false;
    } 
    var exampleInputEmail2 = document.getElementById('exampleInputEmail2');
    if(exampleInputEmail2.value==""){
        alert('Yêu cầu nhập dữ liệu tên đăng nhập');
        exampleInputEmail2.focus();
        return false;
    }
    var exampleInputEmail3 = document.getElementById('exampleInputEmail3');
    if(exampleInputEmail3.value==""){
        alert('Yêu cầu nhập dữ liệu số điện thoại');
        exampleInputEmail2.focus();
        return false;
    }
    var exampleInputEmail4 = document.getElementById('exampleInputEmail4');
    if(exampleInputEmail4.value==""){
        alert('Yêu cầu nhập dữ liệu địa chỉ');
        exampleInputEmail4.focus();
        return false;
    }
    var exampleInputEmail5 = document.getElementById('exampleInputEmail5');
    if(exampleInputEmai5.value==""){
        alert('Yêu cầu nhập dữ liệu địa chỉ');
        exampleInputEmail5.focus();
        return false;
    }
    return true;
  }
</script> -->
