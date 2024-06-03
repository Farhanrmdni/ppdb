<?php
$cek    = $user;
$id_user = $cek->id_siswa;
$nama    = $cek->nama_lengkap;

$tgl = date('m-Y');
?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_user')->row_array();
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <?php if ($cek->status_pendaftaran == 'lulus') { ?>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="glyphicon glyphicon-send"></i> INFO PENGUMUMAN
            </h3>
          </div>
          <div class="panel-body">
            <h3>
              <center>
                Selamat <b><?php echo $nama; ?></b> <span class="label label-success" style="font-size:20px;">Lulus</span> Seleksi Sebagai Calon Peserta Didik Baru <b><?php echo $user['nama_lengkap']; ?></b>, Silahkan Cetak Surat Pengumuman Sebagai Bukti Lulus Seleksi.
                <hr>
                <a href="panel_siswa/cetak_lulus" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Lulus</a>
              </center>
            </h3>
          </div>
        </div>
      <?php } elseif ($cek->status_pendaftaran == 'tidak lulus') { ?>
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="glyphicon glyphicon-send"></i> INFO PENGUMUMAN
            </h3>
          </div>
          <div class="panel-body" style="color:red">
            <h3>
              <center>
                Mohon Maaf <b><?php echo $nama; ?></b>
                <span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> <br>
                Sebagai Calon Peserta Didik Baru <b><?php echo $user['nama_lengkap']; ?></b>.
              </center>
              <br>
            </h3>
          </div>
        </div>
      <?php } else { ?>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title"><b>
                <i class="glyphicon glyphicon-send"></i> INFO PENGUMUMAN</b>
            </h3>
          </div>
          <div class="panel-body">
            <h3>
              <left>Belum ada pengumuman dari Panitia PPDB Online <?php echo $user['nama_lengkap']; ?></left>
            </h3>
          </div>
        </div>
      <?php } ?>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->