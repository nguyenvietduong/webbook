<?php 
session_start();

if (isset($_SESSION['taikhoan']) && !isset($_SESSION['list_bl'])) {
    $_SESSION['list_bl'] = array(); // Khởi tạo giỏ hàng nếu chưa tồn tại
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Lấy thông tin từ ajax đẩy lên
    $productID     = $_POST['idpro'];
    $id_user       = $_POST['user_id'];
    $noidung_bl    = $_POST['content']; 

    $binhluan = [
        'id'         => $productID,
        'id_user'    => $id_user,
        'noidung_bl' => $noidung_bl,
    ];

    if(is_array($binhluan)){
        unset($_SESSION['list_bl']);
        $_SESSION['list_bl'] = $binhluan;
    }

    return $_SESSION['list_bl'];
}
else{
    echo "Yêu cầu không hợp lệ!";
}
?>
