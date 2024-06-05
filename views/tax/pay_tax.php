<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đóng thuế</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Đóng thuế</h3>
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
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="thu-tien">
        
    </div>
</body>
</html>
