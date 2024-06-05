
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="<?php echo $base_url ?>/style.css" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>
        <main>

            <p class="action-buttons">
                <a class="button" href="<?php echo $base_url ?>/index.php/tax/export">Xuất báo cáo</a>
                <?php 
                    if(isset($_SESSION['user_id'])){
                ?>
                <a class="button" href="<?php echo $base_url?>/index.php/tax/logout">Đăng xuất</a>
                <?php
                    }
                ?>
            </p>
            <?php
            if(empty($data) && isset($_SESSION['user_id']) == false){
                echo "Không tồn tại thông tin thuế nào";
                exit();
            }?>
            
            <div class ="search-form">
                <form  action="">
                    <input name="q" type="text" placeholder="Nhập từ khóa tìm kiếm">
                    <input type="submit" value="Tìm kiếm">
                </form>
            </div>

            <table width="800px" border=1 cellspacing="0" align="center" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Tháng</th>
                        <th>Tổng thu nhập</th>
                        <th>Số người phụ thuộc</th>
                        <th>Thuế phải trả</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // print_r($data);
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
                </tbody>
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
        </main>
    </body>
    </html>