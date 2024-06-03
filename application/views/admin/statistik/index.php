<?php
  $cek    = $user;
  $id_user = $cek->id_user;
  $nama    = $cek->nama_lengkap;
  $level   = $cek->level;

  $tgl = date('m-Y');
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>REKAPITULASI PPDB <?php echo $id['nama_lengkap']; ?> TAHUN PELAJARAN <?php echo $id['th_pelajaran']; ?> </center>
          </h3>
        </div>
      </div>
      <!-- /basic datatable -->

      <div class="row">
        <div class="col-lg-12">

          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-primary-600">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $thn_ini = date('Y');
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get('tbl_siswa')->num_rows(),0,",","."); ?>
                  </h3>
                  Calon Siswa yang mendaftar Tahun <?php echo $thn_ini; ?>
                </div>
              </div>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-green-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get_where('tbl_siswa', "status_pendaftaran='lulus'")->num_rows(),0,",",".");  ?>
                  </h3>
                  Calon Siswa yang Lulus PPDB Tahun <?php echo $thn_ini; ?>
                </div>
              </div>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <div class="panel bg-danger">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h3 class="no-margin">
                    <?php
                    $this->db->like('tgl_siswa', $thn_ini, 'after');
                    echo number_format($this->db->get_where('tbl_siswa', "status_pendaftaran='tidak lulus'")->num_rows(),0,",",".");  ?>
                  </h3>
                  Calon Siswa yang Tidak Lulus PPDB Tahun <?php echo $thn_ini; ?>
                </div>
              </div>
              <!-- /current server load -->
            </div>

          </div>
          <!-- /quick stats boxes -->


        </div>

      </div>

      

    </div>
    <!-- /dashboard content -->

    
