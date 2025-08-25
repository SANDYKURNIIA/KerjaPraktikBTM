<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Login</title>


	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon2.png">
	<link rel="icon" href="<?php echo base_url(); ?>assets/favicon2.png" type="image/x-icon">

	<!-- vector map CSS -->
	<link href="<?php echo base_url(); ?>assets/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"
		type="text/css" />

	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css"
		rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">
		function preventBack() {
			window.history.forward();
		}
		setTimeout("preventBack()", 0);
		window.onunload = function () {
			null
		};

	</script>


</head>
