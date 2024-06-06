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
    <h4>Thông tin khách hàng</h4>
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
        <p>Căn cước công dân: <?php echo $user['cccd']?></p>
        <p>Địa chỉ : <?php echo $user['dia_chi']?></p> 
    <h3>Thông tin thanh toán</h3>
    <?php
    // print_r($data);
    foreach($data as $thue)
    ?>

    <p>Tháng : <?php echo $thue['thang']?></p>
    <p>Thuế : <?php echo $thue['thue'] . " VND"?></p>
    <p>Mã số thuế: <?php echo $user['tax_code']?></p>

    <form action="<?php echo $base_url."/index.php/tax/payment"?>" method="post">
        <input type="hidden" name="thang" value="<?php echo $thue['thang']?>">
        <label for="banks">Chọn ngân hàng:</label>
        <select name="bank" id="bank">
            <option value="BIDV">BIDV</option>
            <option value="VietcomBank">VietcomBank</option>
            <option value="MBBank">MBBank</option>
            <option value="VietinBank">VietinBank</option>
        </select>
        <input name="stk" placeholder="Số tài khoản" value=""><br>
        <input type="submit" value="Thanh toán">
    </form>
</div>
</body>
</html>


