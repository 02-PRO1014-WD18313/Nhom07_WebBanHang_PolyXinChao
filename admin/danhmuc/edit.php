<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="container py-4">
    <div class="row2">
    <h3 style="color: blue">Sửa danh mục</h3>
    <hr>
            <form action="index.php?act=updatedm" method="POST">
            <div class="form-group">
                    <label>Tên loại</label> <br>
                    <input type="text" class="form-control" name="tenloai" placeholder="nhập vào tên..." value="<?php if(isset($name)&&($name!="")) echo $name;?>">
            </div>
            <div class="form-group">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                    <input class="mr20" type="submit" name="updatedm" value="UPDATE">
                    <hr>
                    <a href="index.php?act=listdm" ><button class="btn btn-primary">Danh sách</button></a>
            </div>
            <?php
            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
            ?>
            </form>
    </div>

</div>