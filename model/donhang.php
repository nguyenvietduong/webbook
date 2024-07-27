<?php 

// ====================User
function loadall_donhang($id){
    $sql = "SELECT product.image, product.name, product.name_tap, chtiet_donhang.price, chtiet_donhang.soluong, donhang.price AS price_tong
    FROM `chtiet_donhang`
    INNER JOIN product ON product.id = chtiet_donhang.id_pro
    INNER JOIN donhang ON donhang.donhang_id = chtiet_donhang.id_donhang
    WHERE chtiet_donhang.id_donhang = $id"; 
    $listdonhang = pdo_query($sql);
    return  $listdonhang;
}

function loadall_dh($id, $ngaydat = 0){
    $sql = "SELECT donhang.donhang_id, donhang.ngaydat, donhang.ghichu_dh, donhang.price, tinhtrang.name_tt
    FROM `donhang`
    INNER JOIN user ON user.user_id = donhang.id_user
    INNER JOIN tinhtrang ON tinhtrang.tinhtrang_id = donhang.tinhtrang
    WHERE user.user_id = $id";
    
    if ($ngaydat > 0) {
        $sql .= " AND DATE(donhang.ngaydat) = CURDATE()";
    }
    
    $sql .= " ORDER BY donhang.donhang_id DESC";

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function delete_donhang($id){
    $sql = "DELETE FROM `chtiet_donhang` WHERE `chtiet_donhang`.`id_donhang` = '$id'";
    pdo_execute($sql);
}

function delete_chtiet_donhang($id){
    $sql = "DELETE FROM `donhang`        WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_price_donhang($id){
    $sql = "UPDATE `donhang` SET `donhang`.`price` = 0 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_trangthai_donhang($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 4 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_cancel_donhang($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 5 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function chitiet_donhang($id_pro, $price, $soluong, $id_donhang)
{
    $sql = "INSERT INTO `chtiet_donhang` (`id_pro`, `price`, `soluong`, `id_donhang`) VALUES ('$id_pro', '$price', '$soluong', '$id_donhang')";
    pdo_execute($sql);
}

function loadall_id_pro($id){
    $sql = "SELECT product.id, product.price, product.discount, chitiet_giohang.soluong
    FROM `giohang`
    INNER JOIN chitiet_giohang ON chitiet_giohang.id_cart = giohang.giohang_id
    INNER JOIN product ON product.id = chitiet_giohang.id_pro
    WHERE giohang.giohang_id = $id";
    $listdiachi = pdo_query($sql);
    return  $listdiachi;
}


// ====================ADMIN
function loadall_donhang_admin($time_start = "", $time_end = ""){
    $sql = "SELECT donhang.donhang_id, donhang.price, donhang.ngaydat, donhang.ghichu_dh, tinhtrang.name_tt, user.username, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe
    FROM `donhang`
    INNER JOIN user ON user.user_id = donhang.id_user
    INNER JOIN tinhtrang ON tinhtrang.tinhtrang_id = donhang.tinhtrang
    INNER JOIN diachi ON diachi.diachi_id = donhang.diachi
    WHERE donhang.tinhtrang IN (1,2,3)";

    if ($time_start != "" && $time_end != "") {
        $sql .= " AND donhang.ngaydat BETWEEN '" . $time_start . "' AND '" . $time_end . "'";
    }

    $sql .= " ORDER BY donhang.donhang_id DESC";

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_donhang_search($keyw = ""){
    $sql = "SELECT donhang.donhang_id, donhang.price, donhang.ngaydat, donhang.ghichu_dh, tinhtrang.name_tt, user.username, diachi.sdt_nhandonhang, diachi.quocgia, diachi.thanhpho, diachi.quanhuyen, diachi.nhacuthe
    FROM `donhang`
    INNER JOIN user ON user.user_id = donhang.id_user
    INNER JOIN tinhtrang ON tinhtrang.tinhtrang_id = donhang.tinhtrang
    INNER JOIN diachi ON diachi.diachi_id = donhang.diachi";

    if ($keyw != "") {
        if ($keyw != "") {
            $sql .= " AND (
                (donhang_id LIKE '%" . $keyw . "%' OR name_tt LIKE '%" . $keyw . "%' OR username LIKE '%" . $keyw . "%')
            )";            
        }        
    }

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_donhang_iddh($id){
    $sql = "SELECT product.image, product.name, product.name_tap, chtiet_donhang.price, chtiet_donhang.soluong, donhang.price AS price_tong
    FROM `chtiet_donhang`
    INNER JOIN product ON product.id = chtiet_donhang.id_pro
    INNER JOIN donhang ON donhang.donhang_id = chtiet_donhang.id_donhang
    WHERE chtiet_donhang.id_donhang = $id"; 
    $listdonhang = pdo_query($sql);
    return  $listdonhang;
}

function loadallthongke_kh_vip(){
    $sql = "SELECT user.user_id AS khachhang_id, user.username, 
    COUNT(donhang.donhang_id) AS total_purchased
    FROM donhang
    INNER JOIN diachi    ON diachi.diachi_id = donhang.donhang_id
    INNER JOIN user      ON user.user_id     = diachi.user_id
    GROUP BY user.user_id, user.username
    ORDER BY total_purchased DESC
    LIMIT 5"; 
    $listdonhang = pdo_query($sql);
    return  $listdonhang;
}


function update_trangthai_donhang_2($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 2 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_trangthai_donhang_4($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 4 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}

function update_trangthai_donhang_5($id){
    $sql = "UPDATE `donhang` SET `donhang`.`tinhtrang` = 5 WHERE `donhang`.`donhang_id` = '$id'";
    pdo_execute($sql);
}
