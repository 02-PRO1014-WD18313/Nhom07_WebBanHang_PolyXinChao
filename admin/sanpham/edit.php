<?php
if (is_array($sanpham)) {
    $sanpham['fullname'] = $sanpham['name'];
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $anhsp = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $anhsp = "no img";
}

$idUpdate = '';
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!empty($_GET['id'])){
        $idUpdate = $_GET['id']; 
    }
}
?>
<div class="container py-4">
    <div class="row2">
        <h3 style="color: blue">Sửa sản phẩm tại cửa hàng</h3>
        <hr>
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <select name="iddm" style="text-align: center;" class="form-group">
                    <label for="Danh mục"></label>
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        if($iddm==$id) $s="selected"; else $s="";
                        echo '<option value="'.$id.'" '.$s.'>'.$name.'</option>';
                        }
                    ?>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label>Tên sản phẩm</label> <br>
                <input type="text" class="form-control" name="tensp" value="<?=$fullname?>">
            </div>
            <div class="form-group">
                <label>Giá sản phẩm</label> <br>
                <input type="text" class="form-control" name="giasp" value="<?=$price?>">
            </div>
            <div class="form-group">
                <label>Ảnh sản phẩm</label> <br>
                <input type="file" class="form-control" name="anhsp" value="<?=$img?>">
            </div>
            <div class="form-group">
                <label>Mô tả sản phẩm</label> <br>
                <input type="text" class="form-control" name="mmota" value="<?=$description?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo !empty($idUpdate) ? $idUpdate : false ?>">
                <a href="index.php?act=listsp"><button class="btn btn-success" name="update" type="submit" value="1">Cập nhật</button></a>
                <hr>
                <a href="index.php?act=listsp"><button class="btn btn-primary">Danh sách</button></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>

</div>