<div class="add_dm">
    <div class="row2 font_title">
        <h2 style="font-size: 20px;margin-left: 20px;margin-top: 50px;">SỬA DANH MỤC HÀNG HÓA</h2>
    </div>
    <div class="add_danhmuc">
        <form action="index.php?act=addlh" method="POST" enctype="multipart/form-data">
            <br>
            <hr>
            <br>
            <div class="themdanhmuc">
                <label> TÊN DANH MỤC </label> <br>
                <input type="text" name="tendanhmuc" placeholder="nhập vào tên danh mục hàng hóa">
            </div>
            <br>
            <hr>
            <br>
            <div class="add_danhmuc_chucnang">
                <input class="mr20" type="submit" value="THAY ĐỔI" name="themmoidm">
                <a href="index.php?act=danhmuc"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>