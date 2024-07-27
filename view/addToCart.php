<?php 
session_start();

if (!isset($_SESSION['cart']) && !isset($_SESSION['taikhoan'])) {
    $_SESSION['cart'] = array(); // Khởi tạo giỏ hàng nếu chưa tồn tại
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Lấy thông tin từ ajax đẩy lên
    $productID     = $_POST['id'];
    $productName   = $_POST['name'];
    $productPrice  = $_POST['price'];

    // Kiểm tra sản phảm đã có trong giỏ hàng chưa
    $index = array_search($productID, array_column($_SESSION['cart'], 'id'));
    // array_column() trích xuất 1 cột từ mảng giopr hàng và trả về 1 mảng chứa giá trị cột id 

    if ($index !== false) {
        $_SESSION['cart'][$index]['soluong'] += 1;
    } else {
        // nếu sản phảm chưa tồn tại thì thêm mới vào giỏ hàng
        $product = [
            'id'      => $productID,
            'name'    => $productName,
            'price'   => $productPrice,
            'soluong' => 1
        ];
        $_SESSION['cart'][] = $product;
    }
    // Trả về số lượng sản phẩm của giỏ hàng
    echo count($_SESSION['cart']);
} 
else{
    echo "Yêu cầu không hợp lệ!";
}
?>
