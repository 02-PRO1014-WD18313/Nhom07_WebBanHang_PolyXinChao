<table class="table">
  <thead>
    <tr>
      <th scope="col">Ảnh</th>
      <th scope="col">Tên</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tổng</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($listdh as $listdh) {
            extract($listdh);
            if ($trangthai == 0) {
                $trangthai = '<span style="background-color: #e74a3b;color: white; border-radius: 8px;padding: 0 5px">Chưa xác nhận</span>';
            } else if ($trangthai == 1) {
                $trangthai = '<span style="background-color: #f6c23e;color: white; border-radius: 8px;padding: 0 5px">Đang giao hàng</span>';
            } else if ($trangthai == 2) {
                $trangthai = '<span style="background-color: #4e73df; color: white; border-radius: 8px;padding: 0 5px">Đã xác nhận</span>';
            } else {
                $trangthai = '<span style="background-color: #e74a3b;color: white; border-radius: 8px;padding: 0 5px">Đã giao hàng</span>';
            }
        ?>
        <tr>
            <td><img width="70" src="upload/<?= $img ?>" alt="">
            </td>
            <td> <?= $name ?>
            </td>
            <td> ₫<?= number_format($price, 0, ',', '.') ?>
            </td>
            <td> x<?= $soluong ?>
            </td>
            <td> <?= $trangthai ?>
            </td>
            <td> ₫<?= number_format($soluong * $price * 1.5, 0, ',', '.') ?>
            </td>
        </tr>
    <?php }?>
  </tbody>
</table>