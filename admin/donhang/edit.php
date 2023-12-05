<?php
if (is_array($donhang)) {
    extract($donhang);
}


?>
<div class="container py-4">
    <div class="row2">
        <h3 style="color: blue">Xác nhận đơn hàng <?=$donhang['bill_name']?></h3>
        <hr>
        <form action="index.php?act=updatedh" method="POST">
            <div class="form-group">
                <select name="bill_status" id="">
                    <option value="">Chưa xác nhận</option>
                    <option value="1">Đã xác nhận</option>
                    <option value="2">Đang giao hàng</option>
                    <option value="3">Giao hàng thành công</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$id?>">
                <!-- <input type="submit" name="updatedh" value="ok"> -->
                <button class="btn btn-success" name="updatedh" type="submit" value="1">Cập nhật</button>
                <hr>
                <a href="index.php?act=listdh"><button class="btn btn-primary">Danh sách</button></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>

</div>