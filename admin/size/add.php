<div class="container py-4">
    <a href="index.php?act=listsz"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm size mới</h3>
    <hr>
    <form method="post" action="index.php?act=addsz">
        <div class="form-group">
            <label for="">Tên size</label>
            <input type="text" placeholder="Nhập size" class="form-control" name="tensize" />
            <span style="color: red"><?php echo !empty($errors['tensize'])?$errors['tensize']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Giá size</label>
            <input type="text" placeholder="Nhập giá" class="form-control" name="price" />
            <span style="color: red"><?php echo !empty($errors['price'])?$errors['price']:false ?></span> 
        </div>
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>