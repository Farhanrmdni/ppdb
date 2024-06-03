<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>
</div>
</div>
<!-- /main content -->
</div>
<!-- /page content -->
</div>
<!-- /page container -->
<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer" style="background-color:#275555ff;">
  <ul class="nav navbar-nav visible-xs-block">
    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
  </ul>
  <div class="navbar-collapse collapse" id="footer">
    <div class="navbar-text" style="color: ivory;">
      <label class="label label-danger" style="margin-bottom: -10px;"><?php echo $id['nama_lengkap']; ?></label> Copyright &copy; <?php echo date('Y'); ?>
    </div>
  </div>
</div>
<!-- /footer -->
<script type="text/javascript">
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>
</body>

</html>