<<!DOCTYPE html>
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
    <h3>Thông tin khách hàng</h3>
    <?php
    $id = $_SESSION['user_id'];
    $userModel = new User();
    $user = $userModel->getUserById($id);
    print_r($user);
    ?>
    ?>
    <p>Họ và tên : <?php echo $user['fullname'] ?> </p> <br>
    <p>Căn cước công dân : <?php echo $user['cccd'] ?> </p> <br>
    <p>Số điện thoại : <?php echo $user['phone'] ?> </p> <br>
    <p>Email: <?php echo $user['email'] ?> </p> <br>
    <h3>Thông tin thanh toán</h3>
    <?php
    print_r($data);
    $thue = $data;
    echo "<p>Tháng : . $thue->thang . </p>";
    echo "<p>Thuế phải trả : . $thue->thue . </p>";

    ?>
    <label for="cars">Chọn ngân hàng:</label>
    <select name="bank" id="bank">
        <option value="BIDV">BIDV</option>
        <option value="VietcomBank">VietcomBank</option>
        <option value="MBBank">MBBank</option>
        <option value="VietinBank">VietinBank</option>
    </select>
    <input name="stk" placeholder="Số tài khoản" value=""><br>
    <input type="submit" value="Thực hiện thanh toán ">
</div>


</body>
</html>
>