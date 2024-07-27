
<?php
    if (is_array($khachhang)) {
        extract($khachhang);
    }
?>

<div class="add_khachhang">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;margin: 20px;">SỬA KHÁCH HÀNG</h2>
    </div>
    <div class="row2form_content ">
        <form action="" method="POST" enctype="multipart/form-data">
            <hr>
            <br>
            <div class="add_sp">
                <div class="thongtin_sanpham">
                    <label> Tên khách hàng </label> <br>
                    <input type="text" name="username" value="<?php echo $username;?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Password </label> <br>
                    <input type="text" name="password" value="<?php echo md5($email);?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Email </label> <br>
                    <input type="text" name="email" value="<?php echo $email;?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> SĐT </label> <br>
                    <input type="number" name="phone" value="<?php echo $phone;?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Địa chỉ </label> <br>
                    <input type="text" name="adress" value="<?php echo $adress;?>">
                </div>
                <div class="thongtin_sanpham">
                    <label> Role </label> <br>
                    <select name="role_id" id="">
                        <?php foreach ($listrole as $danhmuc) {
                            extract($danhmuc);
                            if($id == $role_id){?>
                                <option value="<?php echo $id?>" selected><?php echo $name; ?></option>
                            <?php }
                            else {?>
                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="nut_chucnang">
                <input class="mr20" type="submit" value="Chỉnh sửa" name="suakh">
                <a href="index.php?act=listkh"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>