<?php
    extract($sanpham);
?>
<div class="sua_sanpham">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;">SỬA SẢN PHẨM</h2>
    </div>
    <div class="row2form_content ">
        <form action="" method="POST" enctype="multipart/form-data">
            <hr>
            <br>
            <div class="add_sp">
                <div class="thongtin_sanpham">
                    <label>Tên sản phẩm</label> <br>
                    <input type="text" name="name_sp" value="<?php echo $name; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label>Tên tập</label> <br>
                    <input type="text" name="name_tap" value="<?php echo $name_tap; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Số lượng </label> <br>
                    <input type="text" name="soluong" value="<?php echo $soluong; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label>Hình ảnh</label> <br>
                    <input type="file" name="image_sp"> <span><?php echo $image; ?></span>
                </div>
                <div class="thongtin_sanpham">
                    <label> Số trang </label> <br>
                    <input type="number" name="page" value="<?php echo $page; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Định dạng </label> <br>
                    <input type="text" name="format" value="<?php echo $format; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Trọng lượng </label> <br>
                    <input type="number" name="weight" value="<?php echo $weight; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Giá tiền </label> <br>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Giá khuyến mãi </label> <br>
                    <input type="number" name="discount" value="<?php echo $discount; ?>">
                </div>
                <div class="thongtin_sanpham">
                    <label>Mô tả</label> <br>
                    <textarea class="mota" name="mota"><?php echo $mieuta; ?></textarea>
                </div>
            </div>
            <hr>
            <div class="nut_chucnang">
                <input class="mr20" type="submit" value="CHỈNH SỬA" name="suasp">
                <a href="index.php?act=sanpham"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>