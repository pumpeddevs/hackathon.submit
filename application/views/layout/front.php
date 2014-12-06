<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/meyers-reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/commons.css" />
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
<?php echo $this->load->view($view,$param); ?>
</body>
</html>