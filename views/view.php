<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo $base_url ?>/style.css" type="text/css">
</head>

<body>
	<div class="wrapper">
		<?php  if(!is_object($data) && isset($data['message'])){
				$message = $data['message'];
				unset($data['message']);
				}
				?>
		<p class="message"><?php echo $message??"" ?></p>
		
		<h1><?php echo $title??"" ?></h1>
		<ul class="menu">
			<?php 
				if(isset($_SESSION['user_id'])){
			?>
			<li><a href="<?php echo $base_url."/index.php/tax"?>">Trang chủ</a></li>
			<li><a  href="<?php echo $base_url ?>/index.php/tax/calc">Tính thuế</a></li>
			<li><a href="<?php echo $base_url?>/index.php/tax/khaibao">Khai báo thuế </a></li>
			<li><a href="<?php echo $base_url?>/index.php/tax/logout">Đăng xuất</a></li>
			<?php
				} else{
			?>
			<li><a href="<?php echo $base_url?>/index.php/tax/login">Đăng nhập</a></li>
			<?php
				}
			?>
			
		</ul>
		<main>
			<?php include($view); ?>
		</main>
		
	</div>
	
</body>
</html>