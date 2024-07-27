<div class="donhang">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">DANH SÁCH ĐƠN HÀNG</h2>
  </div>
  <div class="row3form_content">
    <form action="index.php?act=donhang" method="post">
      <div class="row3mb10formds_donhang">
        <table border="1">
        <tr>
                <th>Ảnh</th>
                <th>Name</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>

            <?php 
                foreach ($list_chitiet_dh as $key => $value) {?>
                    <tr>
                        <td><img src="../upload/<?php echo $value['image']?>" alt="" width="70px" height="100px"></td>
                        <td><?php echo $value['name']. " - " . $value['name_tap'] ?></td>
                        <td><?php echo $value['price'] ?>đ</td>
                        <td><?php echo $value['soluong'] ?></td>
                    </tr>
            <?php }?>
            <tr>
                <td colspan="3" align="center">Tổng tiền</td>
                <td colspan="1" align="center"><?php echo $list_chitiet_dh[0]['price_tong'] ?>đ</td>
            </tr>

        </table>
      </div>
    </form>
  </div>
</div>
</div>