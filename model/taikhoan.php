<?php
// session_start();

//dang ky
function insert_taikhoan($email, $username, $password, $phone, $adress)
{
    $sql = "INSERT INTO `user` ( `email`, `username`, `password`, `phone`, `adress`, `role_id`) VALUES ( '$email', '$username','$password', '$phone', '$adress', 1); ";
    pdo_execute($sql);
}

// Hàm kiểm tra sự tồn tại của email trong cơ sở dữ liệu
function load_user_email($email)
{
    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function load_user_id_user($user_id)
{
    $sql = "SELECT * FROM `user` WHERE user_id = '$user_id'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

// Hàm kiểm tra sự tồn tại của email trong cơ sở dữ liệu
function load_user_phone($phone)
{
    $sql = "SELECT * FROM `user` WHERE phone='$phone'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function loadall_taikhoan($keyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM user WHERE 1";
    // where 1 tức là nó đúng
    if ($keyw != "") {
        $sql .= " and name like '%" . $keyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listkhachhang = pdo_query($sql);
    return  $listkhachhang;
}

function update_taikhoan($name, $email, $adress, $phone, $id)
{
        $sql = "UPDATE `user` SET `username` = '{$name}', `email` = '{$email}', `phone` = '{$phone}', `adress` = '{$adress}' WHERE `user`.`user_id` = '$id' ";
        pdo_execute($sql);
}


function update_mk($pass, $id)
{
        $sql = "UPDATE `user` SET `password` = '{$pass}', `ma_xacminh` = Null WHERE `user`.`user_id` = '$id' ";
        pdo_execute($sql);
}

function dangnhap($email, $password)
{
    $sql = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function taikhoan($email, $phone)
{
    $sql = "SELECT * FROM `user` WHERE email='$email' and phone='$phone'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function quenmk($email, $phone)
{
    $sql = "SELECT * FROM `user` WHERE email='$email' and phone='$phone'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function dangxuat()
{
    if (isset($_SESSION['taikhoan'])) {
        unset($_SESSION['taikhoan']);
        session_destroy();
    }
}

function sendMail($email)
{
    $randomNumber_maxacnhan = random_int(10000, 99999);

    $sql = "UPDATE `user` SET `ma_xacminh` = '{$randomNumber_maxacnhan}' WHERE `user`.`email` = '$email'";
    pdo_execute($sql);


    $sql = "SELECT * FROM `user` WHERE email = '$email'";
    $taikhoan = pdo_query_one($sql);

    if(isset($taikhoan['ma_xacminh']) && !empty($taikhoan['ma_xacminh'])){
        if ($taikhoan != false) {
            sendMailPass($email, $taikhoan['user'], $taikhoan['ma_xacminh']);
    
            return "gui email thanh cong";
        } else {
            return "Email bạn nhập ko có trong hệ thống";
        }
    }
}

function sendMailPass($email, $username, $ma_xacminh)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        // $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        // $mail->Username   = '621bbb55e605ff';                     //SMTP username
        // $mail->Password   = 'e1109c804298a2';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        // $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();     
        // $mail->CharSet()                                       //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'starshopbook@gmail.com';                     //SMTP username
        $mail->Password   = 'xymb lmwr hzyh bjzq';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;  

        //Recipients
        $mail->setFrom('starshop@gmail.com', 'StarShop');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = '<div style="text-align: center;padding: 60px 0 0 0;">
            <h1 style="font-size: 20px;color: black;">Ma Xac Thuc</h1> <br>
            <h2 style="font-size: 15px;">Ma xac thuc doi mat khau: <a style="color: red;font-size: 20px;"> ' . $ma_xacminh . '</a> </h2>
            <br> 
            <h2 style="font-size: 18px;">Vui long khong cung cap ma nay cho bat ky ai!!</h2> 
            <br> 
            <p style="color: pink;font-size: 17px;">Neu ban khong phai la nguoi gui yeu cau nay, hay doi mat khau tai khoan ngay lap tuc de tranh viec bi truy cap trai phep !!</p>
        </div>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//     function updatesp($id, $iddm, $tensanpham, $price, $mota, $img)
// {
//     // Kiểm tra xem người dùng đã chọn hình ảnh mới hay không
//     if ($_FILES['img']['name'] != "") {
//         // Nếu họ đã chọn hình ảnh mới, thực hiện việc tải lên và cập nhật hình ảnh mới
//         // $new_image = uploadImage(); // Hàm uploadImage() là hàm để tải lên hình ảnh mới
//         // Thực hiện truy vấn SQL để cập nhật thông tin sản phẩm với đường dẫn hình ảnh mới
//         $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}', `img` = '{$img}' WHERE `sanpham`.`id` = '$id' ";
//         pdo_execute($sql);
//     } else {
//         // Nếu họ không chọn hình ảnh mới, sử dụng đường dẫn hình ảnh cũ để cập nhật
//         $sql = "UPDATE `sanpham` SET `name` = '{$tensanpham}', `price` = '{$price}', `iddm` = '{$iddm}', `mota` = '{$mota}' WHERE `sanpham`.`id` = '$id' ";
//         pdo_execute($sql);
//     }
// }

?>

<!-- <div style="text-align: center;background-color: darkgray;width: 100%;height: 100%;padding: 15px auto;">
        <h1 style="font-size: 20px;color: black;">Ma Xac Thuc</h1> <br>
        <h2 style="font-size: 15px;">Ma xac thuc doi mat khau: <a style="color: red"> ' . $ma_xacminh . '</a> </h2>
        <br> 
        <h2 style="font-size: 18px;">Vui long khong cung cap ma nay cho bat ky ai!!</h2> 
        <br> 
        <p style="color: pink;font-size: 17px;">Neu ban khong phai la nguoi gui yeu cau nay, hay doi mat khau tai khoan ngay lap tuc de tranh viec bi truy cap trai phep !!</p>

        <p style="color: pink;font-size: 17px;">Nếu bạn không phải là người gửi yêu cầu này, hãy đổi mật khẩu tài khoản ngay lập tức để tránh việc bị truy cập trái phép. Đọc Bảo Mật Tài Khoản để biết các mẹo về mật khẩu có tính bảo mật cao. !!</p>
    </div> -->

