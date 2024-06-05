<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?php echo $base_url ?>/style.css" type="text/css">
</head>
<body>
    <style>
        
    </style>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng Nhập</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng ký</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="process.php" method="post">
                        <div class="group">
                            <label for="login_username" class="label">Tài khoản</label>
                            <input id="login_username" name="login_username" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="login_password" class="label">Mật Khẩu</label>
                            <input id="login_password" name="login_password" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Ghi nhớ đăng nhập</label>
                        </div>
                        <div class="group">
                            <input type="submit" name="login" class="button" value="Đăng nhập">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#">Quên mật khẩu ?</a>
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form action="process.php" method="post">
                        <div class="group">
                            <label for="reg_username" class="label">Username</label>
                            <input id="reg_username" name="reg_username" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="reg_fullname" class="label">Họ Và Tên</label>
                            <input id="reg_fullname" name="reg_fullname" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="reg_password" class="label">Password</label>
                            <input id="reg_password" name="reg_password" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="reg_phone" class="label">Số Điện Thoại</label>
                            <input id="reg_phone" name="reg_phone" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="reg_address" class="label">Địa chỉ</label>
                            <input id="reg_address" name="reg_address" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="reg_email" class="label">Email</label>
                            <input id="reg_email" name="reg_email" type="text" class="input">
                        </div>
                        <div class="group">
                            <input type="submit" name="register" class="button" value="Đăng Ký">
                        </div>
                        <div class="hr"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
