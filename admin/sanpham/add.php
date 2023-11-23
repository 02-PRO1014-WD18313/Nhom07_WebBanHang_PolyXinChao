<div class="container py-4">
    <a href="index.php?act=listsp"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm sản phẩm mới</h3>
    <hr>
    <form method="post" action="index.php?act=addsp" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="masp"/>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="tensp" required />
        </div>
        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="giasp" required />
        </div>
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="anhsp" required />
        </div>
        <div class="form-group">
            <label for="">Mô tả sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="mmota" required />
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <select name="iddm" id="">
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '
                        <option>---Chọn theo loại---</option>
                        <option value="'.$id.'">'.$name.'</option>';
                    }
                ?>
            </select>
        </div>
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>