<div class="container py-4">
    <a href="index.php?act=listdm"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm danh mục mới</h3>
    <hr>
    <form method="post" action="index.php?act=adddm">
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" placeholder="Nhập tên danh mục" class="form-control" name="tenloai" required />
        </div>
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>
