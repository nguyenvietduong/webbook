<?php
    extract($sanpham_chitiet);
    $hinh = $img_path . $image;
?>
<div class="noidung_ctsp">
    <div class="ctsp">
        <article>
            <div class="anh_zoom">
                <img src="<?php echo $hinh; ?>" alt="">
            </div>
            <div class="anh_chitietsanpham">
                <img src="<?php echo $hinh; ?>" alt="">
            </div>
        </article>
        <aside>
            <?php
            if (isset($_SESSION['taikhoan'])) {?>   
                <form id="redirectForm" action="index.php?act=giohang" method="post">
                    <h2><?php echo $name; ?></h2>
                    <h3><?php echo $name_tap; ?></h3>
                    <h5 style="color: pink;">(<?php echo $luotthich ?> Lượt xem)</h5>
                    <hr>
                    <h3><?php
                    if ($discount != "") {
                        echo $discount . " " . 'đ';?>
                        <s><?php echo $price . 'đ';?></s>
                    <?php } else {
                        echo $price;
                    }?>
                    đ</h3>

                    <hr>
                    <div class="thongtin_ctsp">
                        <div class="thongtin">
                            <ul>
                                <li>Tác giả: <strong class="name_tacgia"><?php echo $author_name; ?></strong></li>
                                <li>Số trang: <strong><?php echo $page; ?></strong></li>
                                <li>Trọng lượng: <strong><?php echo $weight; ?> gram</strong></li>
                                <li>Bộ sách: <strong class="sach_name"><?php echo $name; ?></strong></li>
                            </ul>

                            <div class="buy_sp">
                                <span>Số lượng</span>
                                <br>
                                <input id="soluongsp" type="number" name="soluong" value="1" min="1" oninput="validateInput(this)">
                                <br>
                                <button onclick="add_cart()" class="add_giohang" name="idsp" value="<?php echo $id; ?>" type="submit">THÊM VÀO GIỎ HÀNG</button>
                                <br>                          
                            </div>
                        </div>
                    </div>
                </form>

            <?php } else {?>
                <div class="no_login">
                    <h2><?php echo $name; ?></h2>
                    <h3><?php echo $name_tap; ?></h3>
                    <h5 style="color: pink;">(<?php echo $luotthich ?> Lượt xem)</h5>
                    <hr>
                    <h3><?php
                    if ($discount != "") {
                        echo $discount . " " . 'đ';?>
                        <s><?php echo $price . 'đ';?></s>
                    <?php } else {
                        echo $price;
                    }?>
                    đ</h3>

                    <hr>
                    <div class="thongtin_ctsp">
                        <div class="thongtin">
                            <ul>
                                <li>Tác giả: <strong class="name_tacgia"><?php echo $author_name; ?></strong></li>
                                <li>Số trang: <strong><?php echo $page; ?></strong></li>
                                <li>Trọng lượng: <strong><?php echo $weight; ?> gram</strong></li>
                                <li>Bộ sách: <strong class="sach_name"><?php echo $name; ?></strong></li>
                            </ul>

                            <div class="buy_sp">
                                <span>Số lượng</span>
                                <br>
                                <input id="soluongsp" type="number" name="soluong" value="1" min="1" max="10" oninput="validateInput(this)">
                                <br>
                                <!-- // data-id để tí bắt sự kiện -->
                                <button data-id='<?php echo $id; ?>' class="add_giohang" onclick="addToCart(<?php echo $id ?>, '<?php echo $product_name = ( $name . '-' . $name_tap ) ?>', <?php echo $price; ?>)">THÊM VÀO GIỎ HÀNG</button>
                                <br>                         
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            
            <form class="thanhtoan" action="index.php?act=thanhtoan" method="post">
                <a class="muahang" style="text-decoration: none;color: white;display: flex;justify-content: center;align-items: center;" href="index.php?act=thanhtoan&idsp=<?php echo $id; ?>">MUA NGAY</a>
                <!-- <button class="muahang" name="buy_sp" value="<?php echo $id; ?>" type="submit"><a style="text-decoration: none;color: white;" href="index.php?act=thanhtoan&idsp=<?php echo $id; ?>">MUA NGAY</a></button> -->
                <!-- <button class="muahang" name="buy_sp" value="<?php echo $id; ?>" type="submit"><a style="text-decoration: none;color: white;" href="index.php?act=thanhtoan&idsp=<?php echo $id; ?>">MUA NGAY</a></button> -->
                <br>
            </form>
        </aside>
    </div>


    <div class="noidung_ctsp-mota">
        <div class="product">
            <div class="mota_sp">
                <div class="mota">
                    MÔ TẢ SẢN PHẨM
                </div>
                <p><?php echo $mieuta; ?></p>
            </div>
            <div class="binhluan">
                <div class="mota">
                        BÌNH LUẬN SẢN PHẨM
                </div>

                <div class="list_binhluan" method="post" action="index.php?act=chitietsanpham">
                    <table>
                        <tr>
                            <th class="tong2">Người Bình Luận</th>
                            <th class="tong2">Nội Dung</th>
                            <th class="tong">Ngày Bình Luận</th>
                        </tr>

                        <?php foreach($list_comment as $value): ?>
                        <tr>
                            <td class="wide-td"><?php echo $value['username']; ?></td>
                            <td class="wide-td"><?php echo $value['commentText']; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($value['thoigian'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="add_binhluan">
                        <div class="img_binhluan">
                            <img src="./img/khachhang/1.jpg" alt="">
                        </div>
                        <div action="" method="post" class="khungadd_binhluan">
                            <textarea class="viet_binhluan" name="binhluan" placeholder="Viết bình luận" id="noidung_bl"></textarea>
                            <br>
                            <button class="add_bl" name="add_bl" type="button" onclick="addBinhLuan(<?php echo $sanpham_chitiet['id']; ?>, '<?php echo isset($_SESSION['taikhoan']) ? $_SESSION['taikhoan']['username'] : "" ?>')">Đăng</button>
                            <!-- <input class="add_bl" name="add_bl" type="submit" value="Đăng"> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sameauthor">
            <div class="author">
                SÁCH CÙNG TÁC GIẢ
            </div>       

            <!-- Hiển thị 6 sản phẩm cùng tác giả -->
            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/magic_kaito_tap5/tap5.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Magic Kaito - Tập 5</h2></a>
                    <h3>25.000 đ</h3>
                </div>
            </div>

            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/magic_kaito_tap1/tap1.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Magic Kaito - Tập 1</h2></a>
                    <h3>25.000 đ</h3>
                </div>
            </div>

            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/ho_so_tuyet_mat_ai_haibara/hosotuyetmat_ai_haibara.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Hồ sơ tuyệt mật - Ai Haibara</h2></a>
                    <h3>108.000 đ</h3>
                </div>
            </div>

            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/tap4/tap4.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Thám tử lừng danh Conan - Tập 4</h2></a>
                    <h3>20.000 đ</h3>
                </div>
            </div>

            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/tap5/tap5.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Thám tử lừng danh Conan - Tập 5</h2></a>
                    <h3>20.000 đ</h3>
                </div>
            </div>

            <div class="product_author">
                <div class="img">
                    <img src="./img/book/sach_truyen/conan/tap6/tap6.jpg" alt="">
                </div>
                <div class="thongtin">
                    <a href="index.php?act=chitietsanpham"><h2>Thám tử lừng danh Conan - Tập 6</h2></a>
                    <h3>20.000 đ</h3>
                </div>
            </div>

            <div class="them_cungtg">
                <a href="index.php?act=truyen" class="them">
                    Xem thêm
                </a>
            </div>
        </div>                     
    </div>

    <div class="product_cungloai">
        <div class="sach_cungtl">
            <div class="cung_tl">
                SÁCH CÙNG THỂ LOẠI
            </div>
        </div>

        <div class="product_sachcung_tl">
            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap1/tap1.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 1</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>

            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap2/tap2.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 2</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>
            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap9/tap9.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 9</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>
            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap7/tap7.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 7</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>
            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap8/tap8.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 8</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>

            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap2/tap2.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 2</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>

            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap3/tap3.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 3</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>

            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap4/tap4.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 4</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>

            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap5/tap5.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 5</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>
            
            <div class="khungsanpham">
                <div class="khungimg">
                    <a href="index.php?act=chitietsanpham"><img src="./img/book/sach_truyen/conan/tap6/tap6.jpg" alt="" width="100%" height="100%"></a>
                </div>
                <div class="tensanpham">
                    <h5>Thám tử lừng danh Conan</h5>
                    <a href="index.php?act=chitietsanpham">Tập 6</a>
                    <!-- <h6>Giá: 20.000 đ</h6> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Use JavaScript to submit the form after 5 seconds
    function add_cart(){
        setTimeout(function(){
        window.location.href = 'index.php?act=giohang';
    }, 2000)};
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    let noidung_bl = document.getElementById('noidung_bl');

    function addBinhLuan(productID, username, user_id) {

        if(username == ""){
            alert("Vui lòng đăng nhập để có thể bình luận!!");
        } else{

            // Sử dụng hàm để lấy thông tin ngày tháng năm hiện tại
            function getCurrentDate() {
            let currentDate = new Date();

            let year = currentDate.getFullYear();
            let month = currentDate.getMonth() + 1; // Tháng bắt đầu từ 0, nên cộng thêm 1
            let day = currentDate.getDate();

            // Định dạng tháng và ngày để có dạng "01" thay vì "1"
            month = month < 10 ? '0' + month : month;
            day = day < 10 ? '0' + day : day;

            let formattedDate = day + '-' + month + '-' + year;
            return formattedDate;
            }
            let currentDate = getCurrentDate();

            let content = noidung_bl.value;
            // Sử dụng jquery để yêu cầu ajax()
            $.ajax({
                type: 'POST',
                url: "./index.php?act=binhluan",
                data: {
                    idpro: productID,
                    user_id: user_id,
                    content: content
                },
                success: function (response) {
                    // Khai báo biến noidung trước khi sử dụng
                    let noidung = '<tr>';
                    noidung += '<td class="wide-td">' + username + '</td>';
                    noidung += '<td class="wide-td">' + content + '</td>';
                    noidung += '<td>' + currentDate + '</td>';
                    noidung += '</tr>';
                    // Sử dụng append để thêm noidung vào list_binhluan
                    $('.list_binhluan table').append(noidung);
                    noidung_bl.value = '';
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    }
    let totalProduct  = document.getElementById('soluong_giohang');

    function addToCart(productID, productName, productPrice){
        // console.log(productID, productName, productName_tap, productPrice);
        // Sử dụng jquery để yêu cầu ajax()
        $.ajax({
            type: 'POST',
            url: "./view/addToCart.php",
            data: {
                id:     productID,
                name:   productName,
                price:  productPrice
            },
            success: function(response) {
                totalProduct.innerText = response;
                alert("Bạn đã thêm vào giỏ hàng thành công!");
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>
