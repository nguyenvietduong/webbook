<div class="donhang">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;color: burlywood;">ĐƠN HÀNG</h2>
  </div>
  <hr>
  <div class="row2 font_title">
    <h2 style="font-size: 20px;color: white;">TÌM KIẾM ĐƠN HÀNG</h2>
  </div>
  <div class="search_dh" style="display: flex;gap: 50px;">
    <form class="thoigian" action="index.php?act=donhang" method="post">
      Từ    <input type="datetime-local" name="time_start" id="" style="margin-left: 29px;height: 30px;">
      <br>
      <br>
      Đến   <input type="datetime-local" name="time_end" id="" style="margin-left: 20px;height: 30px;">
      <br>
      <br>
      <input name="search_dh" type="submit" value="Tìm kiếm" style="height: 35px;width: 100px;background-color: red;">
      <input name="search_dh_all" type="submit" value="Tất cả" style="height: 35px;width: 100px;background-color: red;">
    </form>

    <form class="thoigian" action="index.php?act=donhang" method="post">
      <input type="text" name="iddonhang" id="" style="margin-left: 29px;height: 30px;padding-left: 10px;" placeholder="search đơn hàng">
      <input name="search_donhang" type="submit" value="Search" style="height: 35px;width: 100px;background-color: red;">
    </form>
  </div>
  <br>
  <div class="row3form_content">
    <form action="index.php?act=donhang" method="post">
      <hr>
      <div class="row2 font_title">
        <h2 style="font-size: 20px;">THỐNG KÊ ĐƠN HÀNG</h2>
      </div>
      <div class="rowmb_sanpha">
        <a href="index.php?act=thongke_dh">                   <input class="mr20" type="button" value="THỐNG KÊ ĐƠN HÀNG ĐÃ BÁN"></a>
        <a href="index.php?act=thongke_sp_banchay">           <input class="mr20" type="button" value="THỐNG KÊ SẢM PHẨM BÁN CHẠY"></a>
        <a href="index.php?act=thongke_kh_vip">               <input class="mr20" type="button" value="THỐNG KÊ KHÁCH HÀNG VIP"></a>
      </div>
      <br>
      <hr>
      <div class="row2 font_title">
        <h2 style="font-size: 20px;">DANH SÁCH ĐƠN HÀNG</h2>
      </div>
      <div class="row3mb10formds_donhang">
        <table border="1">
          <tr style="height: 40px;">
              <th>Mã đơn hàng</th>
              <th>Tên người nhận</th>
              <th>Địa chỉ giao hàng</th>
              <th>SĐT nhận hàng</th>
              <th>Trạng thái</th>
              <th>Ngày đặt</th>
              <th>ĐH</th>
              <th>Chức năng</th>
          </tr>

        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><?php echo $value['donhang_id'] ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['nhacuthe'] . ' ' . $value['quanhuyen'] . ' ' . $value['thanhpho'] . ' ' . $value['quocgia']?></td>
                    <td><?php echo $value['sdt_nhandonhang'] ?></td>
                    <td><?php echo $value['name_tt'] ?></td>
                    <td><?php echo $value['ngaydat'] ?></td>
                    <td><a href="index.php?act=chitiet_dh&iddh=<?php echo $value['donhang_id'];?>">View</a></td>
                    <td>
                        <?php 
                            if ($value['name_tt'] == 'Chờ xác nhận' && $value['name_tt'] != 'Chờ lấy hàng' && $value['name_tt'] != 'Đã hủy') {?>
                              <?php 
                                if($value['price'] == "0.000"){?>
                                  <button name="xacnhandh"   type="submit" value="<?php echo $value['donhang_id'] ?>" style="height: 30px;min-width: 120px;background-color: blueviolet;border: 0;">Đã chuyển tiền</button>
                                  <button name="xacnhan_huy" type="submit" value="<?php echo $value['donhang_id'] ?>" style="height: 30px;min-width: 120px;background-color: chocolate;border: 0;margin-top: 8px;">Hủy</button>
                                  <?php } else{?>
                                <button name="xacnhandh"   type="submit" value="<?php echo $value['donhang_id'] ?>" style="height: 30px;min-width: 120px;background-color: cadetblue;border: 0;">Xác Nhận</button>
                                <button name="xacnhan_huy" type="submit" value="<?php echo $value['donhang_id'] ?>" style="height: 30px;min-width: 120px;background-color: chocolate;border: 0;margin-top: 8px;">Hủy</button>
                              <?php }?>
                        <?php }
                            else if ($value['name_tt'] == 'Đang vận chuyển') {?>
                              <button name="xacnhan"   type="submit" value="<?php echo $value['donhang_id'] ?>" style="height: 30px;min-width: 120px;background-color: darkgreen;border: 0;margin-top: 8px;">Đã nhận hàng</button>
                        <?php } 
                            else if ($value['name_tt'] == 'Chờ lấy hàng' && $value['name_tt'] != 'Chờ xác nhận' && $value['name_tt'] != 'Đã hủy') {?>
                                <input style="background-color: darkgreen;" type="submit" value="Đã xác nhận" readonly>
                        <?php } 
                            else if ($value['name_tt'] == 'Đã hủy đơn') {?>
                                <input style="background-color: cadetblue;" type="submit" value="Đã hủy" readonly>
                        <?php }?>  
                    </td>
                </tr>
          <?php } ?>
        </table>
      </div>

    </form>
  </div>
</div>
</div>