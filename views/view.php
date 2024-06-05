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
			<li><a href="<?php echo $base_url."/index.php/tax"?>">Home</a></li>
            <li><a  href="<?php echo $base_url ?>/index.php/tax/calc">Tính thuế</a></li>
			<li><a href="<?php echo $base_url?>/index.php/tax/login">Đăng nhập</a></li>
		</ul>
		<?php 
		?>
		<main>
			<?php include($view); ?>
		</main>
		
	</div>
	
</body>
</html>