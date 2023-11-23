<div class="row mt-5 main-web">
  <div class="col-md-4 offset-md-4">
    <h2 class="text-center" style="color: blue; ">Nhập thông tin đăng ký</h2>
    <form action="index.php?act=dangky1" method="post" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px;">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="vui lòng nhập email" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Tên đăng nhập</label>
        <input name="user" type="text" class="form-control" id="exampleInputEmail1" placeholder="vui lòng nhập Tên đăng nhập" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Số điện thoại</label>
        <input name="tel" type="text" class="form-control" id="exampleInputEmail1" placeholder="vui lòng nhập Số điện thoại" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="color: #000;">Địa chỉ</label>
        <input name="address" type="text" class="form-control" id="exampleInputEmail1" placeholder="vui lòng nhập Địa chỉ" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" required />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label" style="color: #000;">Mật khẩu</label>
        <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="vui lòng nhập Mật khẩu" style="width: 100%; padding: 0.375rem 0.75rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem;" required/>
      </div>
      <div class="mb-3">
        <span style="color: #000;">Đã có tài khoản? </span>
        <a href="?act=dangnhap1" style="color: blue;">Đăng nhập!</a>
      </div>
      
      <input type="submit" value="Đăng ký" name="dangky1" style="background-color: #4caf50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">
    </form>
    <h2 class="thongbao" style="text-align: center;">
    <?php
            if (isset($thongbao) && ($thongbao != "")){
             echo $thongbao;
            }
    ?>
    </h2>
  </div>
</div>
