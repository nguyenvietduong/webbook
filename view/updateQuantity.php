<?php 
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Lấy thông tin từ ajax đẩy lên
    $productID     = $_POST['id'];
    $newQuantity   = $_POST['quantity'];

    // kiểm tra giỏ hàng cios tồn tại hay không
    if(empty($_SESSION['cart'])){
        // Kiểm tra sản phảm đã có trong giỏ hàng chưa
        $index = array_search($productID, array_column($_SESSION['cart'], 'id'));

        // Nếu có sản phẩm thì cập nhật lại số lượng
        if($index != false){
            $_SESSION['cart'][$index]['soluong'] = $newQuantity;

        } else{
            echo "Không tồn tại trong giỏ hàng";
        }
    }
} 
else{
    echo "Yêu cầu không hợp lệ!";
}
?>
