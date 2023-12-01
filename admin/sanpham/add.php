<div class="container py-4">
    <a href="index.php?act=listsp"><button class="btn btn-warning">Quay lại</button></a>
    <hr>
    <h3 style="color: blue">Thêm sản phẩm mới</h3>
    <hr>
    <form method="post" action="index.php?act=addsp" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã sản phẩm</label>
            <input type="text" placeholder="Nhập mã sản phẩm" class="form-control" name="masp"/>
        </div>
        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" placeholder="Nhập Tên sản phẩm" class="form-control" name="tensp" />
            <span style="color: red"><?php echo !empty($errors['tensp'])?$errors['tensp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="text" placeholder="Nhập giá sản phẩm" class="form-control" name="giasp" />
            <span style="color: red"><?php echo !empty($errors['giasp'])?$errors['giasp']:false ?></span> 
        </div>
        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="anhsp" required/>
        </div>
        <div class="form-group">
            <label for="">Mô tả sản phẩm</label>
            <input type="text" placeholder="Nhập mô tả sản phẩm" class="form-control" name="mmota" />
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
        <hr>
                    
        <button class="btn btn-success" name="themmoi" type="submit" value="1" >Them moi</button>
    </div>
        <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
        ?>
    </form>
</div>