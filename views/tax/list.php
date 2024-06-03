	
    <p class="action-buttons">
    <!-- <a class="button" href="<?php echo $base_url ?>/index.php/product/add">Thêm sản phẩm mới</a> -->
    </p>
    <?php 
    if(empty($data)){
    echo "Không tồn tại sản phẩm nào";
    exit();
    }?>
    <div class ="search-form">
    <form  action="">
        <input name="q" type="text" placeholder="Nhập từ khóa tìm kiếm">
        <input type="submit" value="Tìm kiếm">
    </form>
    </div>

    <table width="800px" border=1 cellspacing="0" align="center">
    <tr>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
    </tr>

    <?php
    // foreach($data as $product){
    // echo "<tr>";
    // echo "<td><a href='$base_url/index.php/product/view/{$product["id"]}'>{$product['name']}</a></td>";
    // echo "<td><img src = '$base_url/upload/{$product['image']} '></td>";
    // echo "<td>{$product['price']}</td>";
    // echo "<td>".(($product['active'])? "hiển thị":"ẩn")."</td>";
    // echo "<td><a class='button' href='$base_url/index.php/product/edit/{$product["id"]}'>Sửa</a> <a class='button' onclick='deleteProduct({$product["id"]})'>Xóa</a></td>";
    // echo "</tr>";
    // }
    echo "OK";
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
