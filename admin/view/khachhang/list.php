<div class="listkh">
  <div class="row2 font_title">
    <h2 style="font-size: 20px;color: burlywood;">KHÁCH HÀNG</h2>
  </div>
  <hr>
  <br>
  <div class="row2 font_title">
    <h2 style="font-size: 20px;color: white;">TÌM KIẾM KHÁCH HÀNG</h2>
  </div>
  <div class="search_dh" style="display: flex;gap: 50px;">
    <form class="thoigian" action="index.php?act=listkh" method="post">
      <input type="text" name="idkhachhang" id="" style="margin-left: 29px;height: 30px;padding-left: 10px;" placeholder="search đơn hàng">
      <input name="search_khachhang" type="submit" value="Search" style="height: 35px;width: 100px;background-color: red;">
    </form>
  </div>
  <br>
  <br>
  <hr>
  <div class="row2 font_title">
    <h2 style="font-size: 20px;">DANH SÁCH KHÁCH HÀNG</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
      <div class="row3mb10formds_loai">
        <br>
        <table border="1">
          <tr>
            <th>MÃ KH</th>
            <th>HỌ VÀ TÊN</th>
            <th>ĐỊA CHỈ EMAIL</th>
            <th>ĐỊA CHỈ</th>
            <th>SỐ ĐIỆN THOẠI</th>
            <th>VAI TRÒ</th>
            <th>CHỨC NĂNG</th>
          </tr>
          <?php foreach ($listkhachhang as $khachhang) {
            extract($khachhang); ?>
            <tr>
              <td><?php echo $user_id; ?></td>
              <td><?php echo $username; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $adress; ?></td>
              <td><?php echo $phone; ?></td>
              <td><?php echo $role_id; ?></td>
              <td>
                <a href="index.php?act=suakh&idkh=<?php echo $user_id; ?>"><input class="mr20" type="button" value="Sửa"></a>
                <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=xoakh&user_id=<?php echo $user_id; ?>"><input type="button" value="Xóa" name="xoakh"></a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=addkh"><input class="mr20" type="button" value="Nhập thêm"></a>
      </div>
    </form>
  </div>
</div>
</div>