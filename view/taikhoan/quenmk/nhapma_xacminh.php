<?php 
    if (isset($_COOKIE['guimail'])) {
        echo "<script>alert('Đã gửi mã xác thực đến Email của bạn!')</script>";
    }
?>
<form class="noidung_quenmk" action="" method="post">
    <div class="kiemtra">
        <h4>Xác thực</h4>
        <div class="ktra">
            <div class="sdt">
                <h5>Mã xác thực*</h5>
                <input type="text" placeholder="mã xác thực" name="ma_xacminh">
                <br>
                <br>
            </div>
        </div>
        <input id="dangky" type="submit" value="Xác thực" name="xacthuc">
        <button id="dangnhap"><a href="index.php?act=dangnhap">Đăng nhập</a></button>
    </div>
</form>