<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đóng thuế</title>
</head>
<body>
    <div class="container">
        <h1>Đóng thuế </h1>
        <p>Thu nhập hàng tháng: <?php echo $data['tongThuNhap']; ?> VND</p>
        <p>Số người phụ thuộc: <?php echo $data['soNguoiPhuThuoc']; ?></p>
        <p>Thuế của tháng này là: <?php echo $data['thue']?></p>

        
    </div>
</body>
</html>
