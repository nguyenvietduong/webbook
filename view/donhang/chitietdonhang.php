<form class="donhang" action="" method="post">
    <table border="1">
        <tr>
            <th>Ảnh</th>
            <th>Name</th>
            <th>Giá</th>
            <th>Số lượng</th>
        </tr>

        <?php 
            foreach ($listdonhang as $key => $value) {?>
                <tr>
                    <td><img src="upload/<?php echo $value['image']?>" alt="" width="70px" height="100px"></td>
                    <td><?php echo $value['name']. " - " . $value['name_tap'] ?></td>
                    <td><?php echo $value['price'] ?>đ</td>
                    <td><?php echo $value['soluong'] ?></td>
                </tr>
        <?php }?>
        <tr>
            <td colspan="3" align="center">Tổng tiền</td>
            <td colspan="1" align="center"><?php echo $listdonhang[0]['price_tong'] ?>đ</td>
        </tr>
    </table>
</form>
