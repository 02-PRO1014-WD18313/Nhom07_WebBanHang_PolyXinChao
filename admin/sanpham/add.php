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
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="tensp" />
            <span style="color: red"><?php echo !empty($errors['tensp'])?$errors['tensp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="giasp" />
            <span style="color: red"><?php echo !empty($errors['giasp'])?$errors['giasp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="anhsp"/>
            <span style="color: red"><?php echo !empty($errors['anhsp'])?$errors['anhsp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Mô tả sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="mmota" />
            <span style="color: red"><?php echo !empty($errors['mmota'])?$errors['mmota']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Danh mục</label>
            <select name="iddm" id=""><option>---Chọn theo loại---</option>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '
                        
                        <option value="'.$id.'">'.$name.'</option>';
                    }
                ?>
                <span style="color: red"><?php echo !empty($errors['iddm'])?$errors['iddm']:false ?></span> 
            </select>        
        </div>
        <div class="form-group">
            <label for="">Size</label>
            <select name="id_size" id=""> <option>---Chọn theo loại---</option>
                <?php
                    foreach($listsize as $size){
                        extract($size);
                        echo '
                       
                        <option value="'.$id.'">'.$name.'</option>';
                    }
                ?>
                <span style="color: red"><?php echo !empty($errors['id_size'])?$errors['id_size']:false ?></span> 
            </select>        
        </div>
        <div class="form-group">
            <label for="">Topping</label>
            <select name="id_tp" id=""><option>---Chọn theo loại---</option>
                <?php
                    foreach($listtopping as $topping){
                        extract($topping);
                        echo '
                        
                        <option value="'.$id.'">'.$name.'</option>';
                    }
                ?>
                <span style="color: red"><?php echo !empty($errors['id_tp'])?$errors['id_tp']:false ?></span> 
            </select>        
        </div>
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>