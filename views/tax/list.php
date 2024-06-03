	
    <p class="action-buttons">
    <!-- <a class="button" href="<?php echo $base_url ?>/index.php/product/add">Thêm sản phẩm mới</a> -->
    </p>
    <?php 

    ?>
    <a class="button btn" href="export.php">Export</a>
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
