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
        body{
            margin:0;
            color:#6a6f8c;
            background:#c8c8c8;
            font:600 16px/18px 'Open Sans',sans-serif;
        }
            *,:after,:before{box-sizing:border-box}
            .clearfix:after,.clearfix:before{content:'';display:table}
            .clearfix:after{clear:both;display:block}
            a{color:inherit;text-decoration:none}

            .login-wrap{
                width:100%;
                margin:auto;
                max-width:525px;
                min-height:670px;
                position:relative;
                background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
                box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
            }
            .login-html{
                width:100%;
                height:100%;
                position:absolute;
                padding:90px 70px 50px 70px;
                background:rgba(40,57,101,.9);
            }
            .login-html .sign-in-htm,
            .login-html .sign-up-htm{
                top:0;
                left:0;
                right:0;
                bottom:0;
                position:absolute;
                transform:rotateY(180deg);
                backface-visibility:hidden;
                transition:all .4s linear;
            }
            .login-html .sign-in,
            .login-html .sign-up,
            .login-form .group .check{
                display:none;
            }
            .login-html .tab,
            .login-form .group .label,
            .login-form .group .button{
                text-transform:uppercase;
            }
            .login-html .tab{
                font-size:22px;
                margin-right:15px;
                padding-bottom:5px;
                margin:0 15px 10px 0;
                display:inline-block;
                border-bottom:2px solid transparent;
            }
            .login-html .sign-in:checked + .tab,
            .login-html .sign-up:checked + .tab{
                color:#fff;
                border-color:#1161ee;
            }
            .login-form{
                min-height:345px;
                position:relative;
                perspective:1000px;
                transform-style:preserve-3d;
            }
            .login-form .group{
                margin-bottom:15px;
            }
            .login-form .group .label,
            .login-form .group .input,
            .login-form .group .button{
                width:100%;
                color:#fff;
                display:block;
            }
            .login-form .group .input,
            .login-form .group .button{
                border:none;
                padding:15px 20px;
                border-radius:25px;
                background:rgba(255,255,255,.1);
            }
            .login-form .group input[data-type="password"]{
                text-security:circle;
                -webkit-text-security:circle;
            }
            .login-form .group .label{
                color:#aaa;
                font-size:12px;
            }
            .login-form .group .button{
                background:#1161ee;
            }
            .login-form .group label .icon{
                width:15px;
                height:15px;
                border-radius:2px;
                position:relative;
                display:inline-block;
                background:rgba(255,255,255,.1);
            }
            .login-form .group label .icon:before,
            .login-form .group label .icon:after{
                content:'';
                width:10px;
                height:2px;
                background:#fff;
                position:absolute;
                transition:all .2s ease-in-out 0s;
            }
            .login-form .group label .icon:before{
                left:3px;
                width:5px;
                bottom:6px;
                transform:scale(0) rotate(0);
            }
            .login-form .group label .icon:after{
                top:6px;
                right:0;
                transform:scale(0) rotate(0);
            }
            .login-form .group .check:checked + label{
                color:#fff;
            }
            .login-form .group .check:checked + label .icon{
                background:#1161ee;
            }
            .login-form .group .check:checked + label .icon:before{
                transform:scale(1) rotate(45deg);
            }
            .login-form .group .check:checked + label .icon:after{
                transform:scale(1) rotate(-45deg);
            }
            .login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
                transform:rotate(0);
            }
            .login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
                transform:rotate(0);
            }

            .hr{
                height:0px;
                margin:60px 0 50px 0;
                background:rgba(255,255,255,.2);
            }
            .foot-lnk{
                text-align:center;
            }
    </style>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng Nhập</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng ký</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="<?php echo $base_url."/index.php/tax/signin"?>" method="post">
                        <div class="group">
                            <label for="login_username" class="label">Tài khoản</label>
                            <input id="login_username" name="login_username" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="login_password" class="label">Mật Khẩu</label>
                            <input id="login_password" name="login_password" type="password" class="input" data-type="password">
                        </div>
                        <!-- <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Ghi nhớ đăng nhập</label>
                        </div> -->
                        <div class="group">
                            <input type="submit" name="login" class="button" value="Đăng nhập">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <!-- <a href="#">Quên mật khẩu ?</a> -->
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form action="<?php echo $base_url."/index.php/tax/signup"?>" method="post">
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
