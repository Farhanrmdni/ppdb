<?php
date_default_timezone_set('Asia/Jakarta');
$cek    = $user;
$nama   = $cek->nama_lengkap;
$email  = '';
$level  = 'Calon Siswa';
$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo base_url(); ?>" />
	<title><?php echo $judul_web; ?> | PPDB Online</title>
	<link rel="icon" type="image/png" href="img/faviconn.png">
	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
	<link href="assets/panel/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="assets/panel/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<?php
	if ($sub_menu == "" or $sub_menu == "biodata") { ?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/panel/js/plugins/visualization/d3/d3.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/visualization/d3/d3_tooltip.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/styling/switchery.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/styling/uniform.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/pickers/daterangepicker.js"></script>
		<script type="text/javascript" src="assets/panel/js/core/app.js"></script>
		<!-- <script type="text/javascript" src="assets/panel/js/pages/dashboard.js"></script> -->
		<!-- /theme JS files -->
	<?php
	} ?>
	<script src="assets/panel/js/select2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/panel/css/sweetalert.css">
	<script type="text/javascript" src="assets/panel/js/sweetalert.min.js"></script>
</head>

<body class="navbar-bottom <?php if ($menu == 'panel_siswa' and $sub_menu == 'biodata') {
								echo 'sidebar-xs';
							} ?>">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="panel_siswa/">PPDB <label class="label label-success">Online</label> </a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="img/faviconn.png" alt="foto">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="panel_siswa/biodata"><i class="icon-user"></i> Biodata</a></li>
						<li class="divider"></li>
						<li><a href="panel_siswa/logout"><i class="icon-switch2"></i> Keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class=" sidebar-content">
					<!-- Main navigation -->
					<div class="panel panel-success" style="margin-bottom: 0;">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="glyphicon glyphicon-list"></i>
							</h3>
						</div>
					</div>
					<div class="sidebar-category sidebar-category-visible" style="background-color: white;">
						<div class="category-title h6">
							<span><b>MENU DASHBOARD</b></span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>
						<div class="category-content sidebar-user">
							<div class="media">
								<a href="panel_siswa/biodata" class="media-left"><img src="img/faviconn.png" class="img-flat img-sm" alt="foto"></a>
								<div class="media-body">
									<div class="text-size-mini text-muted">
										<i class="icon-user text-size-small"></i> &nbsp;<b><?php echo $level; ?></b>
									</div>
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
								</div>
							</div>
						</div>
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span><b>Utama</b></span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($menu == 'panel_siswa' and $sub_menu == '') {
												echo 'active';
											} ?>"><a href="panel_siswa"><i class="icon-home4"></i> <span><b>HOME</b></span></a></li>
								<li class="<?php if ($menu == 'panel_siswa' and $sub_menu == 'pengumuman') {
												echo 'active';
											} ?>"><a href="panel_siswa/pengumuman"><i class="glyphicon glyphicon-bullhorn"></i> <span><b>PENGUMUMAN</b></span></a></li>
								<li class="<?php if ($menu == 'panel_siswa' and $sub_menu == 'biodata') {
												echo 'active';
											} ?>"><a href="panel_siswa/biodata"><i class="icon-file-check2"></i> <span><b>BIODATA</b></span></a></li>

								<li><a href="panel_siswa/cetak" target="_blank"><i class="icon-printer2"></i> <span><b>PRINT PENDAFTARAN</b></span></a></li>
								<!--<li><a href="panel_siswa/rekap_nilai" target="_blank"><i class="icon-printer4"></i> <span>Rekap Nilai</span></a></li>-->

								<!-- /Main -->

								<!-- Data Lainnya -->
								<li class="navigation-header"><span><b>Lainnya</b></span> <i class="icon-menu" title="Data visualization"></i></li>
								<!--<li><a href="files/Panduan_PPDB_Online_SMAN1_Belitang.pdf"><i class="icon-file-download2"></i> <span>Download Panduan</span></a></li>-->
								<li><a href="panel_siswa/logout"><i class="icon-switch2"></i> <span><b>KELUAR</b></span></a></li>
								<!-- /Data Lainnya -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>

			<!-- /main sidebar -->