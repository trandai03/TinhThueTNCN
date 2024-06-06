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
        <h3>Thông tin khách hàng</h3>
        <?php
        $id = $_SESSION['user_id'];
        $userModel = new User();
        $user = $userModel->getUserById($id);
        // print_r($user);
        ?>
        <p>Họ và tên : <?php echo $user['fullname'] ?> </p> 
        <p>Căn cước công dân : <?php echo $user['cccd'] ?> </p> 
        <p>Số điện thoại : <?php echo $user['phone'] ?> </p> 
        <p>Email: <?php echo $user['email'] ?> </p> 
        <p>Mã số thuế: <?php echo $user['tax_code']?></p>
        <p>Địa chỉ : <?php echo $user['dia_chi']?></p>

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
                echo "<td><a class='button' onclick='dongTien({$tax["thang"]})'>Đóng tiền</a></td>";
            }else{
                echo "<td>Đã đóng</td>";
            }
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>

    <script>
	 	function dongTien(thang){
	 		if(confirm("Bạn có chắc chắn muốn đóng tiền thuế tháng này không?")){
	 			window.location= "<?php echo $base_url?>/index.php/tax/payTax/" + thang;
	 		}
	 	}
	 </script>
</body>
</html>
<!-- href='$base_url/index.php/tax/payTax/{$tax["thang"]}' -->