<?php
// =================Trang chủ===================
// Lấy dữ liệu sản phẩm giảm giá theo $sl
function loadall_sanpham_giam_gia_theo_sl($sl){
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.author, product.page, product.format, product.weight, product.price, product.discount, product.luotthich
    FROM product
    WHERE product.discount IS NOT NULl
    ORDER BY product.luotthich DESC
    LIMIT 0, $sl";

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// Lấy dữ liệu sản phẩm top 10 lượt thích
function loadall_sanpham_top10_luothich_from_product_category()
{
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.author, product.page, product.format, product.weight, product.price, product.discount, product.luotthich
    FROM product
    ORDER BY product.luotthich DESC
    LIMIT 0, 10";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
// =================End Trang chủ===================


// =================Sản phẩm===================
// Lấy tất cả dữ liệu của 1 mục trong category
function loadall_sanpham_top20_luothich()
{
    $sql = "SELECT * FROM `product`
    ORDER BY luotthich DESC LIMIT 0,20";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_sanpham_top5_luothich()
{
    $sql = "SELECT * FROM `product`
    ORDER BY luotthich DESC LIMIT 0,5";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// lấy tát cả dữ liệu 1 mục trong product_category
function loadall_sanpham_product_category($id)
{
    $sql = "SELECT * FROM `product`
    WHERE product.category_id = '$id'
    LIMIT 0,20"; 
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function update_product_dluotxem ($idsp){
    $sql = "UPDATE product SET luotthich = luotthich + 1 WHERE id = $idsp;";
    pdo_execute($sql);
}
// =================End Sản phẩm===================



/// Update cột product_discount có dữ liệu 0.000 thành rỗng
function update_product_discount_trong (){
    $sql = "UPDATE product SET `product`.`discount` = NULL WHERE `product`.`discount` = '0.000'";

    pdo_execute($sql);
}

// lấy dữ liệu sanpham_top10_luothich_from_category
function loadall_sanpham_top10_luothich_from_category($id)
{
    $sql = "SELECT product.id, product.name, product.image, product.price, category.name FROM `product` , `category` WHERE category.id = '$id' ORDER BY luotthich DESC LIMIT 0,10";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function loadall_sanpham($keyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM `product` WHERE trangthai = 0";
    if ($keyw != "") {
        if ($keyw != "") {
            $sql .= " AND (
                (name LIKE '%" . $keyw . "%' OR name_tap LIKE '%" . $keyw . "%' OR price LIKE '%" . $keyw . "%') OR
                (name LIKE '%" . $keyw . "%' AND name_tap LIKE '%" . $keyw . "%' AND price LIKE '%" . $keyw . "%')
            )";            
        }        
    }
    if ($iddm > 0) {
        $sql .= " and name ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// Lấy toàn bộn
function loadall_idgh_no_login($idsp){
    $sql = "SELECT * FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id IN ($idsp)";
    $listgiohang = pdo_query($sql);
    return  $listgiohang;
}

// Lấy dữ liệu 1 sản phẩm 
function loadone_sanpham($id)
{
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.page, product.format, product.weight, product.price, product.discount, product.luotthich, author.author_name
    FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

// Lấy dữ liệu 1 sản phẩm 
function loadone_sanpham_price($id)
{
    $sql = "SELECT product.price
    FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}

function insert_sanpham($tensanpham, $price, $img, $mota, $iddm)
{
    $sql = "INSERT INTO `sanpham` (`name`, `price`, `img`, `mota`, `iddm`) VALUES ('$tensanpham', '$price', '$img', '$mota', '$iddm')";
    pdo_execute($sql);
}

function update_admin($id, $name, $name_tap, $soluong, $image, $mieuta, $page, $format, $weight, $price, $discount){
    $sql        = "UPDATE `product` SET 
    `name`      = '{$name}', 
    `name_tap`  = '{$name_tap}', 
    `soluong`   = '{$soluong}', 
    `image`     = '{$image}', 
    `mieuta`    = '{$mieuta}', 
    `page`      = '{$page}', 
    `format`    = '{$format}', 
    `weight`    = '{$weight}', 
    `price`     = '{$price}', 
    `discount`  = '{$discount}' 
    WHERE `product`.`id` = '$id'";
    pdo_execute($sql);
}

// Câu truy vấn xóa cứng
function hard_delete($id)
{
    $sql = "DELETE FROM `product` WHERE `product`.`id` = $id;";
    pdo_execute($sql);
}

// Câu truy vấn xóa mềm
function soft_delete($id)
{
    $sql = "UPDATE `product` SET `trangthai` = 1 WHERE `product`.`id` = '$id';";
    pdo_execute($sql);
}

//=================Admin
function loadall_sanpham_admin($keyw = "", $iddm)
{
    $sql = "SELECT *
    FROM `product` 
    INNER JOIN category ON category.category_id = product.category_id
    INNER JOIN author ON author.author_id = product.author";
    if ($keyw != "") {
        if ($keyw != "") {
            $sql .= " AND (
                (name LIKE '%" . $keyw . "%' OR name_tap LIKE '%" . $keyw . "%' OR price LIKE '%" . $keyw . "%') OR
                (name LIKE '%" . $keyw . "%' AND name_tap LIKE '%" . $keyw . "%' AND price LIKE '%" . $keyw . "%')
            )";            
        }        
    }
    if ($iddm > 0) {
        $sql .= " WHERE product.category_id ='" . $iddm . "'";
    }
    $sql .= " ORDER BY ID DESC";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function insert_sanpham_admin($name, $name_tap, $soluong, $image, $mieuta, $author, $page, $format, $weight, $price, $discount, $iddm)
{
    $sql = "INSERT INTO `product` (`name`, `name_tap`, `soluong`, `image`, `mieuta`, `author`, `page`, `format`, `weight`, `price`, `discount`, `luotthich`, `trangthai`, `category_id`) VALUES ('$name', '$name_tap', '$soluong', '$image', '$mieuta', '$author', '$page', '$format', '$weight', '$price', '$discount', 0, 0, '$iddm')";
    pdo_execute($sql);
}


function loadone_sanpham_admin($id)
{
    $sql = "SELECT product.id, product.name, product.name_tap, product.soluong, product.image, product.mieuta, product.page, product.format, product.weight, product.price, product.discount, product.luotthich, author.author_name
    FROM product
    INNER JOIN author ON product.author = author.author_id
    WHERE product.id = $id";
    $result = pdo_query_one($sql);
    return $result;
}