<form class="noidung_dangky" action="" method="post">
    <article>
        <h5>Họ và tên*</h5>
        <input type="text" name="username" value="<?php echo $taikhoan['username'];?>">
        <br>
        <br>

        <h5>Số điện thoại*</h5>
        <input type="text" name="phone" value="<?php echo $taikhoan['phone'];?>">
        <br>
        <br>
        <input id="dangky" type="submit" value="Cập nhật" name="capnhat_tk">
        <button id="dangnhap"><a href="index.php?act=trangchu">Trang chủ</a></button>
    </article>

    <aside>
    <h5>Email*</h5>
        <input type="text" name="email" value="<?php echo $taikhoan['email'];?>">
        <br>
        <br>
        <h5>Nơi ở*</h5>
        <input type="text" name="dia_diem" value="<?php echo $taikhoan['adress'];?>">
        <br>
        <br>
    </aside>
</form>