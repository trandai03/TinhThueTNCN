	
    <p class="action-buttons">
    <!-- <a class="button" href="<?php echo $base_url ?>/index.php/product/add">Thêm sản phẩm mới</a> -->
    </p>
    <?php
    if(empty($data)){
        echo "Không tồn tại sản phẩm nào";
        exit();
    }?>
    <p class="action-buttons">
        <a class="button" href="<?php echo $base_url ?>/index.php/tax/export">Xuất báo cáo</a>
    </p>
    <div class ="search-form">
    <form  action="">
        <input name="q" type="text" placeholder="Nhập từ khóa tìm kiếm">
        <input type="submit" value="Tìm kiếm">
    </form>
    </div>

    <table width="800px" border=1 cellspacing="0" align="center">
    <tr>
    <th>Tháng</th>
    <th>Tổng thu nhập</th>
    <th>Số người phụ thuộc</th>
    <th>Thuế phải trả</th>
    <th>Trạng thái</th>
    </tr>
        <?php
        foreach($data as $tax){
            echo "<tr>";
            echo "<td>{$tax['thang']}</td>";
            echo "<td>{$tax['tongThuNhap']}</td>";
            echo "<td>{$tax['soNguoiPhuThuoc']}</td>";
            echo "<td>{$tax['thue']}</td>";

            if($tax['status']=="NO"){
                echo "<td>Chưa đóng</td>";
            }else{
                echo "<td>Đã đóng</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <!-- <script>
    function deleteProduct(id){
        if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")){
            window.location= "<?php 
                // echo $base_url
                ?>/index.php/product/delete/" + id;
        }
    }
    </script> -->
