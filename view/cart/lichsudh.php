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
            if ($bill_status == 0) {
                $bill_status = '<span style="background-color: #e74a3b;color: white; border-radius: 8px;padding: 0 5px">Chưa xác nhận</span>';
            } else if ($bill_status == 1) {
                $bill_status = '<span style="background-color: #0099FF;color: white; border-radius: 8px;padding: 0 5px">Đã xác nhận</span>';
            } else if ($bill_status == 2) {
                $bill_status = '<span style="background-color: #4e73df; color: white; border-radius: 8px;padding: 0 5px">Đang giao hàng</span>';
            } else {
                $bill_status = '<span style="background-color: #3399CC;color: white; border-radius: 8px;padding: 0 5px">Giao hàng thành công</span>';
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
            <td> <?= $bill_status ?>
            </td>
            <td> ₫<?= number_format($soluong * $price * 1.5, 0, ',', '.') ?>
            </td>
        </tr>
    <?php }?>
  </tbody>
</table>