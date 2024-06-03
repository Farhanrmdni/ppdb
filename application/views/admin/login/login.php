<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_user')->row_array();
?>
<!-- Simple login form -->
<form action="" method="post">
	<div class="panel panel-body login-form">
		<div class="text-center">
			<img src="img/logo.png" alt="Logo" width="80">
			<h5 class="content-group">LOGIN ADMIN PPDB Online<small class="display-block"><b><?php echo $user['nama_lengkap']; ?></b></small></h5>
			<?php
			echo $this->session->flashdata('msg');
			?>
		</div>
		<hr>
		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
			<div class="form-control-feedback">
				<i class="icon-user text-muted"></i>
			</div>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
			<div class="form-control-feedback">
				<i class="icon-lock2 text-muted"></i>
			</div>
		</div>
		<hr>
		<div class="col-md-12">
			<div class="form-group" style="text-align: center;">
				<button type="submit" name="btnlogin" class="btn btn-danger"><a href="" style="color: white;"><i class="icon-home position-right"></i> <b>HOME</b></a></button>
				<button type="submit" name="btnlogin" class="btn btn-success"><i class="glyphicon glyphicon-log-in position-right"></i> <b> LOGIN</b></button>
			</div>
		</div>
	</div>
</form>
<!-- /simple login form -->