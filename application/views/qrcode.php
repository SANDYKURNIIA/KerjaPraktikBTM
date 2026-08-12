<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Generate QRcode in codeigniter with demo By TangleSkills</title>
</head>
<body>
<div align="center">
	<form action="" method="post">
	<span>Enter your raw text to generate QRCode</span><br><br>
	<input type="text" name="qr_text" required="required" placeholder="">
	<input type="hidden" name="action" value="generate_qrcode"><input type="submit" name="" value="Generate">
	</form>
	<?php
	if($img_url)
	{
	?>
		<br><br>Your QRcode Image here. Scan this to get result<br>
		<img src="<?php echo base_url('assets/images/'.$img_url); ?>" alt="QRCode Image">
	<?php
	}
	?>
</div>
</body>
=======
<!DOCTYPE html>
<html>
<head>
	<title>Generate QRcode in codeigniter with demo By TangleSkills</title>
</head>
<body>
<div align="center">
	<form action="" method="post">
	<span>Enter your raw text to generate QRCode</span><br><br>
	<input type="text" name="qr_text" required="required" placeholder="">
	<input type="hidden" name="action" value="generate_qrcode"><input type="submit" name="" value="Generate">
	</form>
	<?php
	if($img_url)
	{
	?>
		<br><br>Your QRcode Image here. Scan this to get result<br>
		<img src="<?php echo base_url('assets/images/'.$img_url); ?>" alt="QRCode Image">
	<?php
	}
	?>
</div>
</body>
>>>>>>> 6f5424233f04375feed0c12782e2d1ba4c144719
</html>