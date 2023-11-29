<section class="home_boxcenter">
    <div class="container py-4">
        <h3 style="color: blue">Danh sách danh mục sản phẩm</h3>
        <hr>
        <a href="index.php?act=adddm" ><button class="btn btn-success">Thêm danh mục mới <i class="fa fa-plus"></i></button></a>
        <hr>
        <form action="" method="get">
                <div class="row">
                    <div class="col-4">
                        <select name="creator_id" class="form-control">
                            <option value="0">---Chọn người đăng---</option>
                            <?php if (!empty($data['users'])) :
                                foreach ($data['users'] as $key => $item) : ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?> -
                                (<?php echo $item['email'] ?>)</option>
                            <?php endforeach;
                            endif; ?>
                        </select>
                    </div>

                    <div class="col-6">
                        <input type="text" name="keyword" placeholder="Danh mục tìm kiếm..." class="form-control">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary w-100">Tìm kiếm</button>
                    </div>
                </div>
        </form>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #C6E2FF;">
                        <th scope="col" width="3%">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col" width="5%">Sửa</th>
                        <th scope="col" width="5%">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($listbinhluan as $binhluan => $value){
                            extract($binhluan);
                        
                            $xoabl="index.php?act=xoabl&id=" .$id;
                            $stt=$binhluan + 1
                            echo '<tr>
                            <th scope="row">'.$stt.'</th>
                            <td>'.$id.'</td>
                            <td>'.$noidung.'</td>
                            <td>'.$iduser.'</td>
                            <td>'.$idpro.'</td>
                            <td>'.$ngaybinhluan	.'</td>
                            <td><a href="'.$xoabl.'"><input type="button" value="XOA"></a></td>

                        </tr>';
                        }
                    ?>
                    
                </tbody>

            </table>
            <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
    </div>
</section>
<script>
    let delete_danhmuc = document.querySelectorAll('.btn-danger');
    delete_danhmuc.forEach(function(item) {
        item.addEventListener('click', function() {
            let id=item.parentElement.getAttribute('id');
            let link = "?act=deletedm&id="+id;
            let check = confirm("bạn chắc chắn muốn xóa không");
            if (check) {
                item.parentElement.setAttribute('href', link);
            }
        })
    })
</script>
