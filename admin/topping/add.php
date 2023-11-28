<div class="container py-4">
    <a href="index.php?act=listtp"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm topping mới</h3>
    <hr>
    <form method="post" action="index.php?act=addtp">
        <div class="form-group">
            <label for="">Tên topping</label>
            <input type="text" placeholder="Nhập topping" class="form-control" name="tentp" />
            <span style="color: red"><?php echo !empty($errors['tentp'])?$errors['tentp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Giá topping</label>
            <input type="text" placeholder="Nhập giá" class="form-control" name="price" />
            <span style="color: red"><?php echo !empty($errors['price'])?$errors['price']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Số lượng topping</label>
            <input type="text" placeholder="Nhập giá" class="form-control" name="total" />
            <span style="color: red"><?php echo !empty($errors['price'])?$errors['total']:false ?></span> 
        </div>
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>