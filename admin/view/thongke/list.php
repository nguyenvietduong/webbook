<div class="thongke">
<div class="row2 font_title">
    <h2 style="font-size: 20px;color: burlywood;">THỐNG KÊ TỔNG DANH THU THEO THÁNG</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
        <div class="row3mb10formds_thongke">
            <br>
            <table border="1">
                <tr>
                    <th>THÁNG</th>
                    <th>SỐ LƯỢNG BÁN</th>
                    <th>TỔNG TIỀN</th>
                </tr>
                <?php 
                    $tongthu = 0;
                    foreach ($ds_thongke_danhthu as $thongke) {
                    extract($thongke);
                    $tongthu += $tong_gia_tien;
                    $tongthu = $tongthu * 1000;
                    $tongthu = number_format($tongthu, 0, ",", ".");
                    ?>
                        <tr>
                            <td><?php echo $month_of_year?></td>
                            <td><?php echo $so_luong_ban; ?></td>
                            <td><?php echo $tong_gia_tien . "đ"; ?></td>
                        </tr>
                <?php }?>
                <tr>
                  <td colspan="2">TỔNG THU</td>
                  <td><?php echo $tongthu . "đ"?></td>
                </tr>
            </table>
        </div>
    </form>
  </div>
  <div class="row2 font_title">
    <h2 style="font-size: 20px;color: burlywood;">THỐNG KÊ DANH MỤC SẢN PHẨM</h2>
  </div>
  <div class="row3form_content">
    <form action="#" method="post">
        <div class="row3mb10formds_thongke">
            <br>
            <table border="1">
                <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ NHỎ NHẤT</th>
                    <th>GIÁ LỚN NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
                <?php 
                    foreach ($ds_thongke as $thongke) {
                    extract($thongke);?>
                        <tr>
                            <td><?php echo $category_id; ?></td>
                            <td><?php echo $category_name; ?></td>
                            <td><?php echo $soluong; ?></td>
                            <td><?php echo $gia_min . "đ"; ?></td>
                            <td><?php echo $gia_max . "đ"; ?></td>
                            <td><?php echo number_format($gia_avg,3) . "đ"; ?></td>
                        </tr>
                <?php }?>
            </table>
        </div>

      <div class="rowmb_sanpham">
        <a href="index.php?act=bdthongke"><input class="mr20" type="button" value="BIỂU ĐỒ DANH MỤC SẢN PHẨM"></a>
      </div>
    </form>
  </div>
</div>
</div>