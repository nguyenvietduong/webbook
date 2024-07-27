<?php
// Câu lệnh thống kê
function load_thongke_sanpham_danhmuc()
{
    $sql = "SELECT dm.category_id, dm.category_name,
    COUNT(*) 'soluong', MIN(price) 'gia_min',
    MAX(price) 'gia_max', AVG(price) 'gia_avg'
    FROM  category dm JOIN product sp on dm.category_id = sp.category_id 
    GROUP BY dm.category_id, dm.category_name
    ORDER BY soluong DESC";
    return pdo_query($sql);
}

function load_thongke_danhthu(){
    $sql = "SELECT 
    COUNT(donhang.tinhtrang) AS so_luong_ban, 
    MONTH(donhang.ngaydat) AS month_of_year, 
    SUM(donhang.price) AS tong_gia_tien
    FROM `donhang`
    WHERE donhang.tinhtrang = 4
    GROUP BY month_of_year
    ORDER BY month_of_year";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function load_thongke_sanpham_donhang(){
    $sql = "SELECT 
    COUNT(donhang.donhang_id) AS so_luong_ban, 
    MONTH(donhang.ngaydat) AS month_of_year
    FROM `donhang`
    WHERE donhang.tinhtrang = 4
    GROUP BY month_of_year
    ORDER BY month_of_year;";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function load_thongke_sanpham_donhang_ngay(){
    $sql = "SELECT 
        COUNT(donhang.donhang_id) AS so_luong_ban, 
        DAY(donhang.ngaydat) AS day_of_month
    FROM `donhang`
    WHERE donhang.tinhtrang = 4
    GROUP BY day_of_month
    ORDER BY day_of_month;";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function load_thongke_sanpham_donhang_tuan(){
    $sql = "SELECT 
        COUNT(donhang.donhang_id) AS so_luong_ban, 
        WEEK(donhang.ngaydat) AS week_of_year
    FROM `donhang`
    WHERE donhang.tinhtrang = 4
    GROUP BY week_of_year
    ORDER BY week_of_year;";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function load_thongke_sanpham_banchay(){
    $sql = "WITH RankedProducts AS (
        SELECT 
            product.name, 
            product.name_tap,
            chtiet_donhang.id_pro,
            COUNT(chtiet_donhang.id_pro) AS sp_banchay, 
            DAYOFWEEK(donhang.ngaydat) AS day_of_week,
            ROW_NUMBER() OVER (PARTITION BY DAYOFWEEK(donhang.ngaydat) ORDER BY COUNT(chtiet_donhang.id_pro) DESC) AS ranking
        FROM `donhang`
        INNER JOIN chtiet_donhang ON chtiet_donhang.id_donhang = donhang.donhang_id
        INNER JOIN product ON product.id = chtiet_donhang.id_pro
        WHERE donhang.tinhtrang = 4
        GROUP BY product.name, product.name_tap, day_of_week, chtiet_donhang.id_pro
    )
    SELECT name, name_tap, id_pro, sp_banchay, day_of_week
    FROM RankedProducts
    WHERE ranking = 1
    ORDER BY day_of_week;";

    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

function load_thongke_binhluan_sanpham(){
    $sql = "SELECT product.id, product.name, product.name_tap, COUNT(comment.comment_id) AS soluong
    FROM product
    LEFT JOIN comment ON product.id = comment.product_id
    GROUP BY product.id, product.name, product.name_tap
    HAVING soluong > 0
    ORDER BY soluong DESC";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}