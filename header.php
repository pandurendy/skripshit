<?php include "koneksi.php"; 

	if (!isset($_SESSION)) {
		session_start();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Aplikasi Monitoring">
	<meta name="author" content="Rendy Pandu Parata">

	<title>Monitoring Progres Pekerjaan Divisi Teknisi</title>
	
	<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<!-- Add custom CSS here -->
	<link href="assets/bootstrap/css/sb-admin.css" rel="stylesheet">
	<link href="assets/progress.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.min.css"  rel="stylesheet" >
	
	<link href="assets/datepicker/datepicker3.css"  rel="stylesheet" >
	<!-- Page Specific CSS -->
	<link href="assets/morris/morris.css" rel="stylesheet" >
	
	
	<script src="assets/jquery/jquery-1.10.2.js"></script>
	<script src="assets/datepicker/bootstrap-datepicker3.js"></script>
	
</head>
<body>
	<?php $url_active =   basename($_SERVER["SCRIPT_FILENAME"], '.php') ; ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">PT.BANGUN ANUGRAH HANJAYA</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<?php  if($_SESSION['level'] == 'admin') { ?>
					<li class="<?php echo ($url_active =='customer' or $url_active =='customer_iud')  ? 'active':'' ;?>"><a  href="customer.php"><i class="fa fa-edit"></i>Data Customer </a></li>
					<li class="<?php echo ($url_active =='sales' or $url_active =='sales_iud')  ? 'active':'' ;?>"><a  href="sales.php"><i class="fa fa-edit"></i>Data Salesman </a></li>
					<li class="<?php echo ($url_active =='teknisi' or $url_active =='teknisi_iud')  ? 'active':'' ;?>"><a  href="teknisi.php"><i class="fa fa-edit"></i>Data Teknisi </a></li>
					<li class="<?php echo ($url_active =='order' or $url_active =='order_iud')  ? 'active':'' ;?>"><a  href="order.php"><i class="fa fa-edit"></i>Data Order </a></li>
					<li class="<?php echo ($url_active =='order_pekerjaan' or $url_active =='order_pekerjaan_iud')  ? 'active':'' ;?>"><a  href="order_pekerjaan.php"><i class="fa fa-edit"></i>Data Pekerjaan </a></li>
					<?php } ?>
					<li class="<?php echo ($url_active =='marking' or $url_active =='marking_iud')  ? 'active':'' ;?>"><a href="marking.php"><i class="fa fa-dashboard"></i>Data Progres Marking </a></li>
					<li class="<?php echo ($url_active =='pekerjaan_teknisi' or $url_active =='pekerjaan_teknisi_iud')  ? 'active':'' ;?>"><a href="pekerjaan_teknisi.php"><i class="fa fa-dashboard"></i>Data Progres Pekerjaan </a></li>
					<li><a href="logoutaction.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Logout</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right navbar-user">
					<li class="dropd" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Logout</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right navbar-user">
					<li class="dropdown user-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
						
						<?php 
							echo $_SESSION['username'];
						?>
						
						</li>
				</ul>
			</div>
	</nav>
	<div id="page-wrapper">

		<div class="row">
			<div class="col-lg-12">
				<div class="logo span3">
					<a class="brand" href="#"><img src="img/logo8.jpg" alt="Logo" height=80></a> 
				</div>
				<br />
			</div><!-- /.row -->
			<div class="col-lg-12">
