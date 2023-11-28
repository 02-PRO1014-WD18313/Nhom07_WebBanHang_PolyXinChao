<?php
if (is_array($sz)) {
    extract($sz);
}
?>
<div class="container py-4">
    <div class="row2">
        <h3 style="color: blue">Sửa size</h3>
        <hr>
        <form action="index.php?act=updatesz" method="POST">
            <div class="form-group">
                <label>Tên loại</label> <br>
                <input type="text" class="form-control" name="tensize"  value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
            </div>
            <div class="form-group">
                <label>Giá</label> <br>
                <input type="text" class="form-control" name="price"  value="<?php if (isset($price) && ($price != "")) echo $price; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                <button class="btn btn-success" name="update" type="submit" value="1" >Cập nhật</button>
                <hr>
                <a href="index.php?act=listsz"><button class="btn btn-primary">Danh sách</button></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>

</div>