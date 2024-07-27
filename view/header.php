<?php
    if (isset($_SESSION['taikhoan']) && $_SESSION['taikhoan']) {
        extract($_SESSION['taikhoan']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="css/css_user.css">
    <title>Dự án 1</title>
</head>
<style>

</style>
<script src="https://uhchat.net/code.php?f=8bc94d"></script>
<body>

    <div class="container">
        <div class="banner_top">
            <img src="./img/banner/banner_top/sieu-sale-thang-10.jpg" alt="">
        </div>
        <div class="nav_tarbar">
            <div class="nav_tarbar_left">
                <h5>Hotline liên hệ hỗ trợ :</h5>

                <div class="contact">
                    <i class="fas fa-phone"></i> 
                    <h5>0385.906.406</h5>
                </div>

                <div class="contact">
                    <i class="fas fa-phone"></i> 
                    <h5>0886.635.676</h5>
                </div>
            </div>



            <div class="nav_tarbar_right">

            <?php
                if (isset($_SESSION['taikhoan'])) {
                    if ($_SESSION['taikhoan']['role_id'] != 1) {?>
                        <div class="promotion">
                        <i class="fas fa-user-shield"></i>
                        <a href="./admin/index.php?act=trangchu">ADMIN</a>
                    </div>

                    
                <?php }else if($_SESSION['taikhoan']['role_id'] == 1){?>
                    <div class="order">
                        <i class="fas fa-shopping-cart"></i>
                        <a href="index.php?act=donhang">Đơn Hàng</a>
                    </div>
                <?php }}?>



                <!-- Tài khoản -->
                
                <?php
                    if (isset($username)) {?>
                    <!-- nếu tồn tại đăng nhập thì hiển thị ra  -->
                    <div class="account">
                        <i class="fas fa-user"></i>
                        <a href="index.php?act=thongtintk"><?php echo $username; ?></a>
                    </div>

                    <div class="account" onclick="return confirm('Bạn muốn đăng xuất?')">
                        <i class="fas fa-sign-out-alt"></i>
                        <a name="dangxuat" href="index.php?act=dangxuat">Đăng Xuất</a>
                    </div>
                <?php }
                // Ngược lại nếu không tồn tại đăng nhập thì hiển thị cái này
                 else{?>
                    <div class="account">
                        <i class="fas fa-sign-in-alt"></i>
                        <a href="index.php?act=dangnhap">Đăng Nhập</a>
                    </div>

                    <div class="account">
                        <i class="fas fa-user-plus"></i>
                        <a href="index.php?act=dangky">Đăng Ký</a>
                    </div>
                <?php }?>

            </div>
        </div>

        <header>
            <div class="logo">
                <a href="index.php?act=trangchu" class="img_logo">
                    <img src="./img/logo/logo.png" alt="">
                </a>
            </div>

            <div class="search">
                <h5 style="font-size: 20px;">Chào mừng bạn đến với StarShops</h5>
            </div>

            <?php
                if (isset($_SESSION['taikhoan'])) {?>
                    <div class="cart">
                        <a href="index.php?act=giohang"><i class="fas fa-shopping-cart" style="font-size: 20px;"></i></a>
                        <h5>Giỏ Hàng<span id="soluong_giohang">(<?php echo isset($_SESSION['so_sanpham_giohang']) ? $_SESSION['so_sanpham_giohang'] : 0 ?>)</span></h5>
                    </div>
                <?php }
                else{?>
                    <div class="cart">
                        <a href="index.php?act=giohang"><i class="fas fa-shopping-cart" style="font-size: 20px;"></i></a>
                        <h5>Giỏ Hàng <span id="soluong_giohang">(<?php echo !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</span></h5>
                    </div>
                <?php }
            ?>
        </header>
    </div>

</body>

</html>