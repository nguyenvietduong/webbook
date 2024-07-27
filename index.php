<?php
session_start();
include "model/pdo.php";
require "model/taikhoan.php";
require "model/sanpham.php";
require "model/danhmuc.php";
require "model/binhluan.php";
require "model/tacgia.php";
require "model/giohang.php";
require "model/donhang.php";
require "model/thongtin_donhang.php";
require "model/thanhtoan.php";
require "model/magiamgia.php";

require "view/header.php";
require "view/validate/validate.php";
require "global.php";

// Điều kiện kiểm tra act
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];

    if ($act != "trangchu") {
        $dieuhuong = [
            "dangnhap"                  => "Đăng nhập",
            "dangky"                    => "Đăng ký",
            "ktra"                      => "Quên mật khẩu",
            "xacminh_tk"                => "Nhập mã xác thực",
            "sanpham"                   => "Sản phẩm",
            "chitietsanpham"            => "Chi tiết sản phẩm",
            "giohang"                   => "Giỏ hàng",
            "tintuc"                    => "Tin tức",
            "nhapthongtin_donhang"      => "Điền thông tin",
            "view_diachi"               => "Điền thông tin",
            "thanhtoan"                 => "Thanh toán và Hoàn tất",
            "thongbaodathang"           => "Đặt hàng thành công",
            "donhang"                   => "Quản lý đơn hàng",
            "thongtintk"                => "Cập nhật thông tin tài khoản",
            "vnpay"                     => "Thah toán VNPAY",
        ];
        
        if (isset($dieuhuong[$act])) {
            $_SESSION['dieuhuong'] = $dieuhuong[$act];
        }
        include 'view/thanhdieuhuong.php';
    }
} 
else {
    // Nếu không có 'act' được xác định, đây là trang chủ
    $act = 'trangchu';
    unset($_SESSION['dieuhuong']);
}

    switch ($act) {
        case "trangchu": 
            include 'view/shoping_box.php';
            require 'view/nav.php';
            include 'view/banner/banner_trangchu.php';

            if (isset($_SESSION['already_logged_in'])) {
                echo "<script>alert('Bạn đã đăng nhập rồi')</script>";
            }
            else{
                // echo $so_sanpham_giohang;
                $list_sp_giamgia               = loadall_sanpham_giam_gia_theo_sl(4);
                $list_sp_top10_manga           = loadall_sanpham_top10_luothich_from_product_category();
                $_SESSION['listcategory']      = category();
            }

            include "view/trangchu.php";
            break;

        case "dangnhap":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['login']) && $_POST['login']) {
                $email                      = $_POST['email'];
                $pass                       = $_POST['password'];

                // Kiểm tra xem Người dùng có để trống ô không
                if (empty($email)) {
                    $error['email_drum'] = "*Vui lòng không để trống Email";
                }

                if (empty($pass)) {
                    $error['pass_drum'] = "*Vui lòng không để trống PassWord";
                }

                //Nếu Không cos lỗi thì cho đăng nhập
                if (!isset($error)) {
                    $taikhoan       = dangnhap($email, $pass);
                    if (is_array($taikhoan)) {
                        $_SESSION['taikhoan'] = $taikhoan;
                        $thong_bao      = "Dang nhap thanh cong";
                        // Chuyen huong trang chu hoac admin
                        if (in_array($taikhoan['role_id'], [2, 3, 4])) {
                            header("Location: admin/index.php?act=trangchu");
                        }
                        else {
                            header("Location: index.php?act=trangchu");
                        }
                    }else {
                        $error['login_lost'] = "*Thông tin đăng nhập sai!";
                    }
                }
            }
            include "view/taikhoan/login/login.php";
            break;

        case 'thongtintk':
            $taikhoan = $_SESSION['taikhoan'];
            if(isset($_POST['capnhat_tk']) && $_POST['capnhat_tk']){
                $name   = $_POST['username'];
                $phone  = $_POST['phone'];
                $email  = $_POST['email'];
                $adress = $_POST['dia_diem'];

                // Kiểm tra xem đã điền đầy đủ thông tin hay chưa
                if(empty($name) && empty($email) && empty($phone) && empty($adress)){
                    echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
                } else{
                    $id  = $_SESSION['taikhoan']['user_id'];
                    update_taikhoan($name, $email, $adress, $phone, $id);
                    echo "<script>alert('Cập nhật thành công')</script>";
                    $taikhoan       = taikhoan($email, $phone);
                }
            }

            include "view/taikhoan/thongtintaikhoan/thongtin.php";
            break;

        case "dangky":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in']   = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['dang_ky']) && $_POST['dang_ky']) {
                    $email_dk                    =  $_POST['email'];
                    $password_dk                 =  $_POST['password'];
                    $password_again_dk           =  $_POST['password_again'];
                    $username_dk                 =  $_POST['username'];
                    $phone_dk                    =  $_POST['phone'];
                    $adress_dk                   =  $_POST['dia_diem'];

                    //Lấy dữ liệu từ database về để kiểm tra xem Email, SĐT đã tông tại chưa
                    $list_user_email             = load_user_email($email_dk);
                    $list_user_phone             = load_user_phone($phone_dk);

                    // Validate Email
                    $validateemail               = validateEmail($email_dk, $list_user_email);
                    extract($validateemail);

                    // Validate Phone
                    $validatephone               = validatePhone($phone_dk, $list_user_phone);
                    extract($validatephone);

                    // Validate Password
                    $validatepass                = validatePass($password_dk);
                    extract($validatepass);

                    // Validate PassWord_again
                    $validatepass_again          = validateRepass($password_again_dk);
                    extract($validatepass_again);

                    $validate_passtrung          = validate_pass_trung($password_dk, $password_again_dk);
                    extract($validate_passtrung);

                    // Validate UserName
                    $validate_name               = validateName($username_dk);
                    extract($validate_name);

                    // Validate Adress
                    $validateadress              = validateAddress($adress_dk);
                    extract($validateadress);
                    //End Validate

                    // Kiểm tra xem có lỗi không
                    if (count($validateemail) == 0 && count($validatephone) == 0 && count($validatepass) == 0 && count($validatepass_again) == 0 && count($validate_passtrung) == 0 && count($validate_name) == 0 && count($validateadress) == 0) {
                        // Nếu không có lỗi ở cả hai kiểm tra, thì cho phép đăng ký tài khoản
                        insert_taikhoan($email_dk, $username_dk, $password_dk, $phone_dk, $adress_dk);
                        echo "<script>alert('Đăng ký thành công')</script>";
                        $_SESSION['dangky_tk_yes'] = "Đăng ký thành công!";
                        header("refresh: 1; url=index.php?act=dangnhap");
                    }             
                }
            include "view/taikhoan/dangky/dangky.php";
            break;

        case "dangxuat":
            dangxuat();
            unset($_SESSION['so_sanpham_giohang']);
            echo '<meta http-equiv="refresh" content="0;url=index.php?act=trangchu">';
            // header("Location: index.php?act=trangchu");
        break;

        case "ktra":
            $error = array();

            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['kiemtra']) && $_POST['kiemtra']) {
                $phone_forgot                  = $_POST['phone'];
                $email_forgot                  = $_POST['email'];

                if (empty($phone_forgot)) {
                    $error['phone']            = "*Vui lòng không để trống SĐT!";
                }

                if (empty($email_forgot)) {
                    $error['email']            = "*Vui lòng không để trống Email!";
                }

                if (isset($error)) {
                    $list_forgot               = quenmk($email_forgot, $phone_forgot);
                    if (is_array($list_forgot)) {
                        extract($list_forgot);
                        sendMail($email_forgot);
                        setcookie('guimail', "Đã gửi mã xác thực đến Email!", time() + 5);
                        header("Location: index.php?act=xacminh_tk&id=$user_id");
                    } else{
                        echo "<script>alert('Không tồn tại trong hệ thống!!')</script>";
                    }
                }
            }
            include "view/taikhoan/quenmk/kiemtra.php";
            break;

        case 'xacminh_tk':
            $user_id  = $_GET['id'];
            $user     = load_user_id_user($user_id);
            extract($user);

            if(isset($_POST['xacthuc']) && $_POST['xacthuc']){
                $ma_xm = $_POST['ma_xacminh'];
                if(isset($ma_xm) && $ma_xm == $ma_xacminh){
                    echo "<script>alert('Mã xác nhận chính xác')</script>";
                    header("refresh: 0, url='index.php?act=quen_mk&id=$user_id");
                } else if(!empty($ma_xm) && $ma_xm !== $ma_xacminh){
                    echo "<script>alert('Mã xác minh sai, vui lòng nhập đúng!')</script>";
                } else{
                    echo "<script>alert('Vui long không để trống mã xác minh!')</script>";
                }
            }

            if($_GET['act'] != "xacminh_tk"){
                unset($_SESSION['user_quen_mk']);
            }

            include "view/taikhoan/quenmk/nhapma_xacminh.php";
            break;

        case "quen_mk":
            if (isset($_SESSION['taikhoan'])) {
                $_SESSION['already_logged_in'] = "yes";
                header("Location: index.php?act=trangchu");
            }
            else if (isset($_POST['doimatkhau']) && $_POST['doimatkhau']) {
                $pass_forgot                    = $_POST['pass'];
                $pass_again_forgot              = $_POST['pass_again'];
                $id                             = $_GET['id'];

                $validatepass = validatePass($pass_forgot);
                extract($validatepass);

                $validatepass_again = validateRepass($pass_again_forgot);
                extract($validatepass_again);

                $validatepass_trung = validate_pass_trung($pass_forgot, $pass_again_forgot);
                extract($validatepass_trung);

                if (count($validatepass) == 0 && count($validatepass_again) == 0 && count($validatepass_trung) == 0) {
                    // Nếu không có lỗi ở cả hai kiểm tra, thì cho phép đăng ký tài khoản
                    update_mk($pass_forgot, $id);
                    setcookie('doimk_yes', "Đổi mật khẩu thành công!", time() + 5);
                    header("Location: index.php?act=dangnhap");
                }
            }
            include "view/taikhoan/quenmk/quenmk.php";
            break;

        case "sanpham":
            $listdanhmuc                              = product_category();

            $loadall_sanpham_top20_luothich           = loadall_sanpham_top20_luothich();
            $loadall_sanpham_top5_luothich            = loadall_sanpham_top5_luothich();
            $loadall_author                           = loadall_tacgia();  
            // nếu tồn tại name = iddm thì =>

            if (isset($_GET['idprent'])) {
                $idprent                          = $_GET['idprent'];
                $loadall_sanpham_product_category = loadall_sanpham_product_category($idprent);
            }

            if (isset($_GET['idauthor'])) {
                $idauthor                         = $_GET['idauthor'];
                $loadall_sanpham_author           = product_author($idauthor);
            }

            if (isset($_POST['timsanpham'])) {
                $name_sp_search    = $_POST['name_sp_search'];
                $loadallsp_timkiem = loadall_sanpham($name_sp_search,);
            }
            
            include "view/sanpham.php";
            break;

        case "chitietsanpham":
            if (isset($_POST['idsp']) && $_POST['idsp']) {
                $idsp                             = $_POST['idsp'];
                update_product_dluotxem ($idsp);
            }else{
                $idsp = $_SESSION['id'];
            }
            // Lưu lại id load lại khi bình luận xong
            $_SESSION['id']                       = $idsp;
            $sanpham_chitiet                      = loadone_sanpham( $_SESSION['id']);
            $list_comment                         = loadall_binhluan( $_SESSION['id']);

            // if(isset($_SESSION['list_bl']) && is_array($_SESSION['list_bl']) && !empty($_SESSION['list_bl']) && isset($_SESSION['taikhoan'])){
            //     $list_bl       = $_SESSION['list_bl'];
            //     $product_id    = $list_bl['id'];
            //     $commentText   = $list_bl['noidung_bl'];
            //     $user_id                      = $_SESSION['taikhoan']['user_id'];
            //     insert_binhluan($user_id, $product_id, $commentText);
            //     unset($_SESSION['list_bl']);
            // }

            // Thêm sản phẩm vào giỏ hàng
            if (isset($_SESSION['taikhoan']) && isset($_POST['add_gh']) && $_POST['add_gh']) {
                header("Location: index.php?act=giohang");
            }

            if(isset($_POST['buy_sp'])){
                header("Location: index.php?act=thanhtoan");
            }
            include "view/chitietsanpham.php";
            break;

        case "binhluan":
            if (isset($_SESSION['list_bl']) && is_array($_SESSION['list_bl']) && !empty($_SESSION['list_bl']) && isset($_SESSION['taikhoan'])) {
                $list_bl = $_SESSION['list_bl'];
                $product_id = $list_bl['id'];
                $commentText = $list_bl['noidung_bl'];
                $user_id = $_SESSION['taikhoan']['user_id'];
                insert_binhluan($user_id, $product_id, $commentText);
                unset($_SESSION['list_bl']);

                header("Location: index.php?act=chitietsanpham");
    
            }

            include "view/addToBinhLuan.php";
            break;

        case 'giohang':
            if (isset($_SESSION['taikhoan'])) {
                $iduser       = $_SESSION['taikhoan']['user_id'];

                // Nếu không tồn tại giỏ hàng cho người dùng, thì tạo mới
                // Dữ liệu giỏ hàng theo iduser
                
                $listgh = loadone_giohang($iduser);


                if (!is_array($listgh)) {
                    $id_cart = insert_giohang($iduser);
                } 
                else {
                    $id_cart = $listgh['giohang_id'];
                }

                // Lấy thông tin sản phẩm từ form hoặc từ bất kỳ nguồn dữ liệu nào đó
                if (isset($_POST['idsp']) && $_POST['idsp']) {
                    $id_pro        = $_POST['idsp'];
                    $soluong       = $_POST['soluong'];
                    
                    // Kiểm tra xem $idsp có tồn tại trong giỏ hàng không
                    $soluong_ctdh  = loadone_chitiet_gh($id_pro);
                    // Thêm vào giỏ hàng
                    $thogntinsp_id = loadall_giohang_sp($id_cart, $id_pro);   
                    
                    if (is_array($thogntinsp_id) && isset($thogntinsp_id['giohang_id']) && isset($thogntinsp_id['soluong'])) {
                        // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                        $soluong = $soluong + $thogntinsp_id['soluong'];
                        update($soluong, $id_pro);
                    } else {
                        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
                        $sanpham_info = loadone_sanpham($id_pro); // Lấy thông tin sản phẩm để lấy giá
                        // echo "<pre>";
                        // print_r($sanpham_info);
                        // die;
                        if($sanpham_info['discount'] != ""){
                            $price = $sanpham_info['discount']; // Giả sử giá sản phẩm lấy được từ thông tin sản phẩm
                        } else{
                            $price = $sanpham_info['price']; // Giả sử giá sản phẩm lấy được từ thông tin sản phẩm
                        }

                        echo 
                        // Trong trường hợp này, bạn cần có thông tin giỏ hàng, chẳng hạn như id_cart
                        // Bạn có thể thực hiện load giỏ hàng từ csdl hoặc tạo mới nếu không tồn tại
                        // $id_cart = // Lấy thông tin giỏ hàng
                        insert_chitietgiohang($id_cart, $id_pro, $price, $soluong);
                    }  
                }
                
                $iduser  = $_SESSION['taikhoan']['user_id'];
                // Hiển thị thông tin giỏ hàng
                $thongtingiohang = loadall_giohang($iduser);
                        // echo "<pre>";
                        // print_r($thongtingiohang);
                        // die;
                if (isset($_POST['xoa_sp_gh']) && $_POST['xoa_sp_gh']) {
                    $idgh = $_SESSION['idgh'];
                    delete_sp_gh($idgh);
                }
            } 
            // không tồn tại đăng nhập
            else if (!isset($_SESSION['taikhoan']) && isset($_SESSION['cart'])){
                $cart_no_login = $_SESSION['cart'];

                // Tạo mảng chứa ID sản phẩm trong giỏ hàng
                $productID     = array_column($cart_no_login, 'id');

                // Chuyển đổi mảng id thành 1 chuỗi để thực truy vấn
                $list_id       = implode(',', $productID);

                // Lấy sản phẩm trong bảng sản phẩm theo id
                $list_cart     = loadall_idgh_no_login($list_id);
                // echo "<pre>";
                // print_r($list_cart);
                // die;
            }

            if(isset($_POST['add_gh'])){
                echo "<script>alert('Thêm giỏ hàng thành công!')</script>";
            }

            if (isset($_POST['thanhtoan_gh'])) {
                $tonggia_gh = $_POST['tonggia_gh'];
                $soluong    = $_POST['soluonggiohang'];
                header("Location: index.php?act=thanhtoan");
            }
            include "view/giohang.php";
            break;       



        case 'thanhtoan':
            // Lấy thông tin kiểu thanh toán
            $list_kieuthanhtoan = loadall_kieu_thanhtoan();
            // Xử lý thanh toán giỏ hàng
            if (isset($_POST['thanhtoan_gh']) && $_POST['thanhtoan_gh']) {
                $idgiohang = $_POST['thanhtoan_gh'];
                $thongtingiohang = loadall_giohang_idgh($idgiohang);
            } else if(isset($_GET['idgh']) && $_GET['idgh']){
                $idgiohang = $_GET['idgh'];
                $thongtingiohang = loadall_giohang_idgh($idgiohang);
            }

            // Xử lý mua sản phẩm
            if (isset($_POST['buy_sp']) && $_POST['buy_sp']){
                $thongtinsp_id = $_POST['buy_sp'];
                $listsanpham = loadone_sanpham($thongtinsp_id);
            } else if(isset($_GET['idsp']) && $_GET['idsp']){
                $thongtinsp_id = $_GET['idsp'];
                $listsanpham = loadone_sanpham($thongtinsp_id);
            }

            // lấy dữ liệu người dùng
            if(isset($_SESSION['taikhoan']) && $_SESSION['taikhoan']){
                $id_user               = $_SESSION['taikhoan']['user_id'];
                // Lấy thông tin giỏ hàng thông qua $id_user
                $giohang_thanhtoan  = loadone_sp_thanhtoan($id_user);

                if (isset($_POST['buy_now']) && $_POST['buy_now']) {
                    $ghichu_dh      = $_POST['ghichu']; 
                    $sdt            = $_POST['phone_nh'];
                    $quocgia        = $_POST['quocgia_nh'];
                    $thanhpho       = $_POST['thanhpho_nh'];
                    $quanhuyen      = $_POST['quanhuyen_nh'];
                    $diachucuthe    = $_POST['diachicuthe_nh'];
                    $user_id        = $_SESSION['taikhoan']['user_id'];

                    if (!empty($sdt) && !empty($quocgia) && !empty($thanhpho) && !empty($quanhuyen) && !empty($diachucuthe) && !empty($user_id)) {
                        insert_diachi_giaohang($sdt, $quocgia, $thanhpho, $quanhuyen, $diachucuthe, $user_id);
                        $diachigiaohang = loadone_diachi_sdt_nhanhang($sdt);
                        $diachi = $diachigiaohang['diachi_id'];

                        $price_tra      = $_POST['gia_end'];
                        // Loại bỏ ký tự '.' và 'đ' từ giá trị
                        $price_tra = str_replace('.000', '', $price_tra); // loại bỏ dấu phẩy ngăn cách phần nghìn
                        $price_tra = str_replace(' đ', '', $price_tra);
                        // Chuyển đổi giá trị sang kiểu số
                        $price     = intval($price_tra);
                        $_SESSION['price'] = $price;
                        // Kiểm tra giá trị mới

                        if (isset($_POST['thanhtoan'])) {
                            $kieu_thanhtoan = $_POST['thanhtoan'];

                            // Nếu mà kiểu thanh toán là thanh toán khi nhận hàng
                            if($kieu_thanhtoan == 1){
                                // Thêm đơn hàng
                                if(isset($_GET['idsp']) && $_GET['idsp']){
                                    donhang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $user_id);
                                    $listdh_id_diachi = loadone_id_diachi();
                                } 
                                else if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $giohang_thanhtoan  = loadone_sp_thanhtoan($user_id);
                                    $id_gh = $giohang_thanhtoan[0]['giohang_id'];
                                    $listdh_id_diachi = loadone_id_diachi();
                                    
                                    if (!empty($diachi)) {
                                        donhang_giohang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $id_gh, $user_id);
                                    }
                                }

                                // Thêm chi tiết đơn hàng
                                if (isset($_GET['idsp'])) {
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $price       = $_POST['gia_end'];
                                    $id_pro      = $_GET['idsp'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    chitiet_donhang($id_pro, $price, 1, $id_donhang);
                                    echo '<script>window.location.href = "index.php?act=thongbaodathang";</script>';
                                    // header("Location: index.php?act=thongbaodathang");  
                                } 
                            
                                if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $listdh_id_diachi = loadone_id_diachi();
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    $id          = $_GET['idgh'];
                                
                                    $listsp = loadall_id_pro($id);

                                    $inputArray = array();
                                    foreach ($listsp as $key => $value) {
                                        $inputArray[] = array('id'      => $value[0], 0 => $value[0],
                                                            'price'   => $value[1], 1 => $value[1],
                                                            'discount'=> $value[2], 2 => $value[2],
                                                            'soluong' => $value[3], 3 => $value[3],
                                    );
                                    }
                                    // Hiển thị mảng mới
                                    // Duyệt qua mảng và thực hiện insert
                                    foreach ($inputArray as $item) {
                                        $id_pro    = $item[0];
                                        $price     = $item[1];
                                        $discount  = $item[2];
                                        $soluong   = $item[3];

                                        if($discount != ""){
                                            $price = $discount;
                                        }
                                
                                        // Thực hiện insert
                                        chitiet_donhang($id_pro, $price, $soluong, $id_donhang);
                                    }
                                
                                    echo '<script>window.location.href = "index.php?act=thongbaodathang";</script>';
                                    exit();                     
                                }
                            }
                            // Nếu kiểu thanh toán là online
                            else if($kieu_thanhtoan == 2){
                                // Thêm đơn hàng
                                if(isset($_GET['idsp']) && $_GET['idsp']){
                                    donhang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $user_id);
                                    $listdh_id_diachi = loadone_id_diachi();
                                } 
                                else if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $giohang_thanhtoan  = loadone_sp_thanhtoan($user_id);
                                    $id_gh = $giohang_thanhtoan[0]['giohang_id'];
                                    $listdh_id_diachi = loadone_id_diachi();

                                    if (!empty($diachi)) {
                                        donhang_giohang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $id_gh, $user_id);
                                    }
                                }   
                                // Thêm chi tiết đơn hàng
                                if (isset($_GET['idsp'])) {
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $price       = $_POST['gia_end'];
                                    $id_pro      = $_GET['idsp'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    chitiet_donhang($id_pro, $price, 1, $id_donhang);
                                    echo '<script>window.location.href = "index.php?act=vnpay";</script>';
                                    // header("Location: index.php?act=thongbaodathang");  
                                } 
                            
                                if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $listdh_id_diachi = loadone_id_diachi();
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    $id          = $_GET['idgh'];
                                
                                    $listsp = loadall_id_pro($id);  
                                    $inputArray = array();
                                    foreach ($listsp as $key => $value) {
                                        $inputArray[] = array('id'      => $value[0], 0 => $value[0],
                                                            'price'   => $value[1], 1 => $value[1],
                                                            'discount'=> $value[2], 2 => $value[2],
                                                            'soluong' => $value[3], 3 => $value[3],
                                        );
                                    }
                                    // Hiển thị mảng mới
                                    // Duyệt qua mảng và thực hiện insert
                                    foreach ($inputArray as $item) {
                                        $id_pro    = $item[0];
                                        $price     = $item[1];
                                        $discount  = $item[2];
                                        $soluong   = $item[3];  
                                        if($discount != ""){
                                            $price = $discount;
                                        }
                                    
                                        // Thực hiện insert
                                        chitiet_donhang($id_pro, $price, $soluong, $id_donhang);
                                    }
                                
                                    echo '<script>window.location.href = "index.php?act=vnpay";</script>';
                                    exit();                     
                                }
                            }
                            else if($kieu_thanhtoan == 3){
                                // Thêm đơn hàng
                                if(isset($_GET['idsp']) && $_GET['idsp']){
                                    donhang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $user_id);
                                    $listdh_id_diachi = loadone_id_diachi();
                                } 
                                else if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $giohang_thanhtoan  = loadone_sp_thanhtoan($user_id);
                                    $id_gh = $giohang_thanhtoan[0]['giohang_id'];
                                    $listdh_id_diachi = loadone_id_diachi();

                                    if (!empty($diachi)) {
                                        donhang_giohang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $id_gh, $user_id);
                                    }
                                }   
                                // Thêm chi tiết đơn hàng
                                if (isset($_GET['idsp'])) {
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $price       = $_POST['gia_end'];
                                    $id_pro      = $_GET['idsp'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    chitiet_donhang($id_pro, $price, 1, $id_donhang);
                                    echo '<script>window.location.href = "index.php?act=momo";</script>';
                                    // header("Location: index.php?act=thongbaodathang");  
                                } 
                            
                                if(isset($_GET['idgh']) && $_GET['idgh']){
                                    $listdh_id_diachi = loadone_id_diachi();
                                    $id_donhang  =  $listdh_id_diachi['donhang_id'];
                                    $_SESSION['iddh'] = $id_donhang;
                                    $id          = $_GET['idgh'];
                                
                                    $listsp = loadall_id_pro($id);  
                                    $inputArray = array();
                                    foreach ($listsp as $key => $value) {
                                        $inputArray[] = array('id'      => $value[0], 0 => $value[0],
                                                            'price'   => $value[1], 1 => $value[1],
                                                            'discount'=> $value[2], 2 => $value[2],
                                                            'soluong' => $value[3], 3 => $value[3],
                                        );
                                    }
                                    // Hiển thị mảng mới
                                    // Duyệt qua mảng và thực hiện insert
                                    foreach ($inputArray as $item) {
                                        $id_pro    = $item[0];
                                        $price     = $item[1];
                                        $discount  = $item[2];
                                        $soluong   = $item[3];  
                                        if($discount != ""){
                                            $price = $discount;
                                        }
                                    
                                        // Thực hiện insert
                                        chitiet_donhang($id_pro, $price, $soluong, $id_donhang);
                                    }
                                
                                    echo '<script>window.location.href = "index.php?act=momo";</script>';
                                    exit();                     
                                }
                            }
                        }   
                    } else{
                        echo "<script>alert('Thông tin nhận hàng ko để trống!!')</script>";
                    }              
                }          
            } 
            // Chauw đăng nhập = > mua hàng
            else if (!isset($_SESSION['taikhoan'])){
                if (isset($_POST['buy_now']) && $_POST['buy_now']) {
                    $ghichu_dh      = $_POST['ghichu']; 
                    $sdt            = $_POST['phone_nh'];
                    $quocgia        = $_POST['quocgia_nh'];
                    $thanhpho       = $_POST['thanhpho_nh'];
                    $quanhuyen      = $_POST['quanhuyen_nh'];
                    $diachucuthe    = $_POST['diachicuthe_nh'];
                    
                    $name_nh        = $_POST['name_nh'];
                    $email_nh       = $_POST['email_nh'];
                    $pass_nh        = $_POST['pass_nh'];
                    if (!empty($name_nh) && !empty($sdt) && !empty($quocgia) && !empty($thanhpho) && !empty($quanhuyen) && !empty($diachucuthe) && !empty($email_nh) && !empty($pass_nh)) {
                        insert_taikhoan($email_nh, $name_nh, $pass_nh, $sdt, $diachucuthe);
                        $taikhoan   = load_user_email($email_nh);
                        $is_user     = $taikhoan['user_id'];

                        if (isset($is_user)) {
                            insert_diachi_giaohang($sdt, $quocgia, $thanhpho, $quanhuyen, $diachucuthe, $is_user);
                        }
                    
                        $diachigiaohang = loadone_diachi_sdt_nhanhang($sdt);
                        $diachi         = $diachigiaohang['diachi_id'];
                    } else{
                        echo "<script>alert('Thông tin nhận hàng ko để trống!!')</script>";
                    }

                    $price_tra      = $_POST['gia_end'];
                    // Loại bỏ ký tự '.' và 'đ' từ giá trị
                    $price_tra = str_replace('.000', '', $price_tra); // loại bỏ dấu phẩy ngăn cách phần nghìn
                    $price_tra = str_replace(' đ', '', $price_tra);
                    // Chuyển đổi giá trị sang kiểu số
                    $price = intval($price_tra);
                    // Kiểm tra giá trị mới

                    if (isset($_POST['thanhtoan'])) {
                        $kieu_thanhtoan = $_POST['thanhtoan'];
                    }

                    // Thêm đơn hàng
                    if(isset($_GET['idsp']) && $_GET['idsp']){
                        donhang($diachi, $ghichu_dh, $kieu_thanhtoan, $price, 1, $is_user);
                        $listdh_id_diachi = loadone_id_diachi();
                    }

                    
                    // // Thêm chi tiết đơn hàng
                    if (isset($_GET['idsp'])) {
                        $id_donhang  =  $listdh_id_diachi['donhang_id'];
                        $price       = $_POST['gia_end'];
                        $id_pro      = $_GET['idsp'];
                        chitiet_donhang($id_pro, $price, 1, $id_donhang);
                        header("Location: index.php?act=thongbaodathang");  
                    } 
                } 
            }
            include "view/donhang/thanhtoandh.php";
            break;

        case 'thongbaodathang':
            if(isset($_GET['vnp_BankCode'])){
                if(isset($_GET['vnp_BankCode']) && $_GET['vnp_BankCode'] == 'NCB'){
                    $thanh_toan_online = $_GET['vnp_Amount'];
                    unset($_SESSION['price']);
                    $iddh = $_SESSION['iddh'];
                    update_price_donhang($iddh);
    
    
                } else if($_GET['vnp_BankCode'] == 'VNPAY'){
                    $iddh = $_SESSION['iddh'];
                    delete_donhang($iddh);
    
                    sleep(5);
                    
                    delete_chtiet_donhang($iddh);
                    echo '<script>window.location.href = "index.php?act=trangchu";</script>';
                }
            }

            if(isset($_GET['message'])){
                if($_GET['message'] == 'Successful.'){
                    unset($_SESSION['price']);
                    $iddh = $_SESSION['iddh'];
                    update_price_donhang($iddh);
    
                } else{
                    $iddh = $_SESSION['iddh'];
                    delete_donhang($iddh);
    
                    sleep(5);
                    
                    delete_chtiet_donhang($iddh);

                    echo '<script>window.location.href = "index.php?act=trangchu";</script>';
                }
            }
            include "view/donhang/dathangthanhcong.php";
            break;

        case 'vnpay':
            include "view/thanhtoan/vnpay.php";
            break;

        case 'momo':
            include "view/thanhtoan/momo.php";
            break;

        case 'donhang':
            $iduser      = $_SESSION['taikhoan']['user_id'];
            $listdonhang = loadall_dh($iduser);

            if(isset($_POST['day'])){
                $listdonhang = loadall_dh($iduser, 1);
            } else if(isset($_POST['all'])){
                $listdonhang = loadall_dh($iduser);
            }
            
            if (isset($_POST['trangthai_dh'])) {
                $id_confirm = $_POST['id_donhang'];
                update_trangthai_donhang($id_confirm);
                header("Location: index.php?act=donhang");
            }

            if (isset($_POST['cancel_dh'])) {
                $id_cancel = $_POST['cancel_dh'];
                update_cancel_donhang($id_cancel);
                echo '<meta http-equiv="refresh" content="0;url=index.php?act=donhang">';
                // header("Location: index.php?act=donhang");
            }
            include "view/donhang/donhang.php";
            break;

        case 'chitietdonhang':
            $iddh = $_GET['iddh'];
            $listdonhang           = loadall_donhang($iddh);
            include "view/donhang/chitietdonhang.php";
            break;

        case 'tintuc':
            include 'view/banner/banner_tintuc.php';
            include "view/tintuc.php";
            break;
    }
    if(isset($_SESSION['taikhoan'])){
        $id_user                           = $_SESSION['taikhoan']['user_id'];
        $_SESSION['so_sanpham_giohang']    = so_sanpham_giohang($id_user)['soluong'];
    }

    if (isset($_SESSION['list_bl']) && is_array($_SESSION['list_bl']) && !empty($_SESSION['list_bl']) && isset($_SESSION['taikhoan'])) {
        $list_bl = $_SESSION['list_bl'];
        $product_id = $list_bl['id'];
        $commentText = $list_bl['noidung_bl'];
        $user_id = $_SESSION['taikhoan']['user_id'];
        insert_binhluan($user_id, $product_id, $commentText);
        unset($_SESSION['list_bl']);

        header("Location: index.php?act=chitietsanpham");

    }

        if($_GET['act'] != "momo"){
            unset($_SESSION['id_dh']);
        }
    
    require 'view/footer.php';