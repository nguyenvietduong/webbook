<form class="donhang" style="display: flex;gap: 15px;padding: 30px 0;" method="post" action="">
        <input name="day" type="submit" value="Đơn hôm nay" style="height: 35px;width: 100px;background-color: red;">
        <input name="all" type="submit" value="Tất cả" style="height: 35px;width: 100px;background-color: red;">
</form>
<form class="donhang" action="" method="post" style="padding-top: 0;">
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Xem chi tiết</th>
            <th>Chức năng</th>
        </tr>
        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><?php echo $value['donhang_id'] ?></td>
                    <td><?php echo $value['name_tt'] ?></td>
                    <td><?php echo $value['ngaydat']?></td>
                    <td><?php echo $value['price']; ?></td>
                    
                    <td><a href="index.php?act=chitietdonhang&iddh=<?php echo $value['donhang_id']; ?>">Xem</a></td>
                    <td>
                        <?php 
                            if ($value['name_tt'] == 'Chờ xác nhận' && $value['name_tt'] != 'Chờ lấy hàng' && $value['name_tt'] != 'Đã hủy') {?>
                                <button name="cancel_dh" type="submit" value="<?php echo $value['donhang_id']; ?>" style="background-color: blueviolet;height: 35px;width: 150px;border: 0;">Hủy đơn hàng</button>
                        <?php } 
                            else if ($value['name_tt'] == 'Chờ lấy hàng' && $value['name_tt'] != 'Chờ xác nhận' && $value['name_tt'] != 'Đã hủy') {?>
                                <input name=""   type="submit" value="Đang lấy hàng" required>
                        <?php } 
                            else if ($value['name_tt'] == 'Đang vận chuyển') {?>
                                <input name=""   type="submit" value="Đang vận chuyển đến bạn" required>
                        <?php } 
                            else if ($value['name_tt'] == 'Đã nhận đơn hàng') {?>
                                <input name=""   type="submit" value="Đã nhận hàng" style="background-color: aquamarine;" required>
                        <?php } 
                            else if ($value['name_tt'] == 'Đã hủy đơn') {?>
                                <input style="background-color: coral;" name="" type="submit" value="Đã hủy" style="background-color: aqua;" required>
                        <?php }?>  
                    </td>
                </tr>
        <?php }?>
    </table>
</form>
