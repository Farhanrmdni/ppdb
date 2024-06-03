<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_user')->row_array();
?>
</div>
<!-- /main content -->
</div>
<!-- /page content -->
</div>
<!-- /page container -->
<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer" style="background-color: #275555ff;">
	<div class="navbar-collapse collapse" id="footer">
		<div class="navbar-text" style="color: white;">
			<b>Copyright &copy; <?php echo date('Y'); ?> | <a href="https://<?php echo $user['website']; ?>" class="navbar-link" style="color: white;"><?php echo $user['nama_lengkap']; ?></b></a>
		</div>
	</div>
</div>
<!-- /footer -->

</html>