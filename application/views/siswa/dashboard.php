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
      <!-- /basic datatable -->
      <div class="row">
        <div class="col-lg-12">
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
          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-4">
              <!-- Current server load -->
              <center>
                <a href="panel_siswa/biodata">
                  <div class="panel bg-green">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-file-check2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>BIODATA</b>
                    </div>
                  </div>
                </a>
              </center>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <center>
                <a href="panel_siswa/cetak" target="_blank">
                  <div class="panel bg-teal-400">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-printer2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>PRINT PENDAFTARAN</b>
                    </div>
                  </div>
                </a>
              </center>
              <!-- /current server load -->
            </div>

            <!-- <div class="col-lg-3">
              <center>
                <a href="panel_siswa/rekap_nilai" target="_blank">
                  <div class="panel bg-blue-400">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-printer4" style="font-size:100px;"></i>
                      </h1>
                      <br><b>PRINT NILAI RAPOT</b>
                    </div>
                  </div>
                </a>
              </center>
            </div> -->

            <div class="col-lg-4">
              <center>
                <a href="files/syarat.jpg">
                  <div class="panel bg-orange-400">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-file-download2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>UNDUH PANDUAN</b>
                    </div>
                  </div>
                </a>
              </center>
            </div>
          </div>
          <!-- /quick stats boxes -->
        </div>
      </div>
    </div>
    <!-- /dashboard content -->