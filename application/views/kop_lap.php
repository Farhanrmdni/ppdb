<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>

<table border="0" width="100%">
  <tr>
    <td align="left">
      <img src="img/faviconn.png" alt="logo" width="100">
    </td>
    <td align="left">
      <b style="font-size:25px;">PANITIA PENERIAMAAN PESERTA DIDIK BARU (PPDB)</b> <br>
      <b style="font-size:25px;"><?php echo $id['nama_lengkap']; ?></b> <br>
      <b style="font-size:25px;">TAHUN PELAJARAN <?php echo $id['th_pelajaran']; ?></b><br>
      <b align="left" style="font-size:15px;">
        Kantor : <?php echo $id['alamat']; ?> <img src="img/telp.jpg" alt="telp." style="margin-bottom:-5px;margin-right:-5px;"> <?php echo $id['telp']; ?>
        <br>
        Website : <?php echo $id['website']; ?> - E-mail : <?php echo $id['email']; ?></b>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
      <hr size="2" color="black" style="margin:0px;">
    </td>
  </tr>
</table>
<br>