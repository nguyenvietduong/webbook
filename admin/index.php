<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/khachhang.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/donhang.php";
include "../model/tacgia.php";

include "view/header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {


            // Trang chủ
        case 'trangchu':
            if (isset($_COOKIE['no_quyen_truycap'])) {
                echo "<script>alert('Bạn không có quyền truy cập!!')</script>";
            }
            include "view/trangchu/list.php";
            break;


            // Danh mục
        case 'danhmuc':
            $listdanhmuc = product_category();
            include "view/danhmuc/list.php";
            break;
    
        case 'xoadm':
            if (isset($_GET['category_id'])) {
                delete_danhmuc($_GET['category_id']);
            }
            $listdanhmuc = product_category();
            include "view/danhmuc/list.php";
        break;
    
                // Danh mục
        case 'adddanhmuc':
            $listdanhmuc = product_category();
            if (isset($_POST['themmoidm']) && $_POST['themmoidm']) {
                if (empty($_POST['category_name'])) {
                    $error['chuanhapdanhmuc'] = 'chuanhap';
                } else {
                    $adddanhmuc = $_POST['category_name'];
                    insert_add_danhmuc($adddanhmuc);
                    header("Location: index.php?act=danhmuc");
                }
            } else {
                $category_name = "";
            }
            include "view/danhmuc/add.php";
            break;
            // =
            // =
            // =
            // =
            // =

            // Sản phẩm
        case 'sanpham':
            if (isset($_POST['clickok']) && $_POST['clickok']) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }

            $listdanhmuc = product_category();
            $listsanpham = loadall_sanpham_admin($keyw, $iddm);
            include "view/sanpham/list.php";
            break;

            // Sản phẩm
        case 'addsp':
            $listdanhmuc = product_category();
            $listtacgia  = loadall_tacgia_admin();
            // Thêm sản phẩm
            if (isset($_POST['themmoisp']) && $_POST['themmoisp']) {
                $name      = $_POST['name_sp'];
                $name_tap  = $_POST['name_tap'];
                $soluong   = $_POST['soluong'];
                $page      = $_POST['page'];
                $format    = $_POST['format'];
                $weight    = $_POST['weight'];
                $price     = $_POST['price'];
                $discount  = $_POST['discount'];
                $author    = $_POST['author'];
                $mieuta    = $_POST['mieuta'];
                $iddm      = $_POST['iddm'];

                if (isset($_FILES['image_sp']) && $_FILES['image_sp']) {
                    // Tạo tên file
                    $target_dir = "../upload/";
                    // Tạo tên ảnh
                    $name_img = $_FILES['image_sp']['name'];
                    // Tạo đường link
                    $target_file = $target_dir . $name_img;
                    // Nhét ảnh vaofg file
                    move_uploaded_file($_FILES['image_sp']['tmp_name'], $target_file);
                }

                if (!empty($name) && !empty($name_tap) && !empty($soluong) && !empty($page) && !empty($format) && !empty($weight) && !empty($price) && !empty($author) && !empty($mieuta) && !empty($iddm)) {

                    if (!empty($discount)) {
                        $discount = 0;
                    }
                    insert_sanpham_admin($name, $name_tap, $soluong, $name_img, $mieuta, $author, $page, $format, $weight, $price, $discount, $iddm);
                    $themthanhcong = "thành công";
                    echo "<script>alert('Thêm sản phẩm thành công')</script>";
                    
                } else{
                    echo "<script>alert('Phải nhập đầy đủ!!')</script>";
                }
                
            }
            include "view/sanpham/add.php";
            break;

            case 'bieudosp':
            $listsanpham = loadall_sanpham();
            include "view/sanpham/bieudo.php";
            break;

            // Sửa sản phẩm
        case 'editsp':
            $listtacgia  = loadall_tacgia_admin();
            $listdanhmuc = product_category();
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sanpham = loadone_sanpham_admin($_GET['idsp']);
                if (isset($_POST['suasp']) && $_POST['suasp']) {
                    $name           = $_POST['name_sp'];
                    $name_tap       = $_POST['name_tap'];
                    $soluong        = $_POST['soluong'];
                    $mota           = $_POST['mota'];
                    $page           = $_POST['page'];
                    $format         = $_POST['format'];
                    $weight         = $_POST['weight'];
                    $price          = $_POST['price'];
                    $discount       = $_POST['discount'];

                    $id             = $_GET['idsp'];
                    if (isset($_FILES['image_sp']) && $_FILES['image_sp']) {
                        // Tạo tên file
                        $target_dir = "../upload/";
                        // Tạo tên ảnh
                        $name_img = $_FILES['image_sp']['name'];
                        // Tạo đường link
                        $target_file = $target_dir . $name_img;
                        // Nhét ảnh vaofg file
                        move_uploaded_file($_FILES['image_sp']['tmp_name'], $target_file);
                    }                
                    update_admin($id, $name, $name_tap, $soluong, $name_img, $mota, $page, $format, $weight, $price, $discount);
                    header("Location: index.php?act=sanpham");
                }
            }
            include "view/sanpham/update.php";
            break;

        case 'hard_delete':
            // Xóa sản phẩm
            if (isset($_GET['id'])) {
                hard_delete($_GET['id']);

                header("location: index.php?act=sanpham");
            }
            include "sanpham/list.php";
            break;

        case 'soft_delete':
            if (isset($_GET['id'])) {
                soft_delete($_GET['id']);

                header("location: index.php?act=sanpham");
            }
            include "sanpham/list.php";
            break;

            // ----------------------Hết Sản phẩm---------------------------

            // ------------------------Danh mục----------------------------
        case "loaihang":
            $list_danhmuc = product_category();
            include "danhmuc/list.php";
            break;

        case 'addlh':
            if (isset($_POST['themmoidm']) && $_POST['themmoidm']) {
                if (empty($_POST['tendanhmuc'])) {
                    $error['chuanhapdanhmuc'] = 'chuanhap';
                } else {
                    $tendanhmuac = $_POST['tendanhmuc'];
                    insert_danhmuc($tendanhmuac);
                    header("Location: index.php?act=loaihang");
                }
            }
            include "danhmuc/add.php";
            break;

            //======================== Khách hàng==========================
            case "listkh":
                $listkhachhang = loadall_khachhang();

                if (isset($_POST['search_khachhang']) && $_POST['search_khachhang']){
                    $idkhachhang = $_POST['idkhachhang'];
                    $listkhachhang = loadall_khachhang($idkhachhang);
                }

                include "view/khachhang/list.php";
                break;
    
            case "addkh":
                $listrole = loadall_role();
                if (isset($_POST['addkh']) && ($_POST['addkh'] != "")) {   
                    $username            = $_POST['username'];
                    $password            = $_POST['password'];
                    $email               = $_POST['email'];
                    $phone               = $_POST['phone'];
                    $adress              = $_POST['adress'];
                    $role_id             = $_POST['role_id'];

                    // Kiểm tra xem đã điền đầy đủ thông tin hay chưa
                    if(empty($username) && empty($email) && empty($phone) && empty($adress) && empty($role_id) && empty($password)){
                        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
                    } else{
                        insert_khac_hang($username, $password, $email, $phone, $adress, $role_id);
                        header("Location: index.php?act=listkh");
                    }
                }
            
                include "view/khachhang/add.php";
                break;
    
            case 'suakh':
                $listrole = loadall_role();
                if (isset($_GET['idkh']) && $_GET['idkh'] > 0) {
                    $khachhang = loadone_khachhang($_GET['idkh']);
                }
                if (isset($_POST['suakh']) && $_POST['suakh']) {
                    $user           =   $_POST['username'];
                    $email          =   $_POST['email'];
                    $id             =   $_GET['idkh'];
                    $pass           =   $_POST['password'];
                    $address        =   $_POST['adress'];
                    $tel            =   $_POST['phone'];
                    $role_id        =   $_POST['role_id'];

                    // Kiểm tra xem đã điền đầy đủ thông tin hay chưa
                    if(empty($user) && empty($email) && empty($id) && empty($tel) && empty($address) && empty($pass)){
                        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
                    } else{
                        update_kh($id, $user, $pass, $email, $tel, $address, $role_id);
                        header("Location: index.php?act=listkh");
                    }

                }
                include "view/khachhang/update.php";
                break;
    
            case 'xoakh':
                if (isset($_GET['user_id'])) {
                    delete_khach_hang($_GET['user_id']);
                }
                $listkhachhang = loadall_khachhang();
                include "view/khachhang/list.php";
                break;

            // ----------------------Hết Khách hàng---------------------------

// =
// =
// =
// =
// =

            // ----------------------Bình luận--------------------------------
        case "binhluan":
            $listbinhluan = binhluan_sanpham();

            if (isset($_POST['search_binhluan']) && $_POST['search_binhluan']){
                $idbinhluan = $_POST['idbinhluan'];
                $listbinhluan = binhluan_sanpham($idbinhluan);
            }
            include "view/binhluan/list.php";
            break;


            
        case "bieudobl":
            $thongkebinhluan = load_thongke_binhluan_sanpham();
            include "view/binhluan/bieudo.php";
            break;


            case 'delete_binhluan':
                if (isset($_GET['comment_id'])) {
                    delete_binhluan($_GET['comment_id']);
                }
            
           
            $listbinhluan = binhluan_sanpham();
            include "view/binhluan/list.php";
            break;

            // ----------------------Đơn hàng--------------------------------
        case "donhang":
            if (isset($_SESSION['taikhoan']) && $_SESSION['taikhoan']['role_id'] == 4) {
                $listdonhang = loadall_donhang_admin();

                if (isset($_POST['xacnhandh'])) {
                    $id = $_POST['xacnhandh'];
                    update_trangthai_donhang_2($id);
                    header("Location: index.php?act=donhang");
                }

                if (isset($_POST['xacnhan_huy'])) {
                    $id = $_POST['xacnhan_huy'];
                    update_trangthai_donhang_5($id);
                    header("Location: index.php?act=donhang");
                }

                if (isset($_POST['xacnhan'])) {
                    $id = $_POST['xacnhan'];
                    update_trangthai_donhang_4($id);
                    header("Location: index.php?act=donhang");
                }

                if (isset($_POST['search_dh']) && $_POST['search_dh']){
                    $time_start = date_create($_POST['time_start']);
                    $time_end   = date_create($_POST['time_end']);

                    $time_start =  date_format($time_start, "Y/m/d H:i:s");
                    $time_end   =  date_format($time_end  , "Y/m/d H:i:s");

                    if(!empty($time_start) && !empty($time_end)){
                        $listdonhang = loadall_donhang_admin($time_start, $time_end);
                    } else{
                        echo "<script>alert('Vui lòng chọn ngày tháng cần tìm kiếm')</script>";
                    }

                }

                if (isset($_POST['search_donhang']) && $_POST['search_donhang']){
                    $iddonhang = $_POST['iddonhang'];
                    $listdonhang = loadall_donhang_search($iddonhang);
                }

                if (isset($_POST['search_dh_all']) && $_POST['search_dh_all']){
                    $listdonhang = loadall_donhang_admin();
                }
            }
            else{
                setcookie('no_quyen_truycap', 'yes', time() + 3);
                header("Location: index.php?act=trangchu");
            }

                
                include "view/donhang/list.php";
                break;

        case "thongke_dh":
            // $ds_thongke_dh = load_thongke_sanpham_donhang();

            if (isset($_GET['type']) && $_GET['type'] == 'month') {
                $ds_thongke_dh = load_thongke_sanpham_donhang();
            } 
            else if(isset($_GET['type']) && $_GET['type'] == 'week'){
                $thongke_dh_tuan = load_thongke_sanpham_donhang_tuan();
            }
            else if(isset($_GET['type']) && $_GET['type'] == 'day'){
                $thongke_dh_ngay = load_thongke_sanpham_donhang_ngay();
            }
            else if(!isset($_GET['type']) || isset($_GET['type']) && $_GET['type'] != 'week' && $_GET['type'] != 'day'){
                $ds_thongke_dh = load_thongke_sanpham_donhang();
            }



            include "view/donhang/thongke.php";
            break;

        case 'thongke_sp_banchay':
            $thongke_sp_banchay = load_thongke_sanpham_banchay();
            include "view/donhang/thongke_sp_banchay.php";
            break;

        case 'thongke_kh_vip':
            $thongke_kh_vip = loadallthongke_kh_vip();
            include "view/donhang/thongke_kh_vip.php";
            break;

        case 'chitiet_dh':
            $id              = $_GET['iddh'];
            $list_chitiet_dh = loadall_donhang_iddh($id);

            include "view/donhang/chitiet_dh.php";
            break;

            // ----------------------Thống kê--------------------------------

        case "thongke":
            $ds_thongke_danhthu = load_thongke_danhthu();
            // echo "<pre>";
            // print_r($ds_thongke_danhthu);
            // die;
            $ds_thongke = load_thongke_sanpham_danhmuc();
            include "view/thongke/list.php";
            break;

        case "bdthongke":
            $ds_thongke = load_thongke_sanpham_danhmuc();
            include "view/thongke/bieudo.php";
            break;
    }
} else {
    include "view/sanpham/list.php";
}