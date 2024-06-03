<style>
  #tbl_input {
    width: 50px;
    text-align: center;
  }

  #tbl_input2 {
    width: 100px;
    text-align: center;
  }

  #th_center>th {
    text-align: center;
  }
</style>

<?php
error_reporting(0);
$user = $user; ?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Biodata Siswa</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">NO. PENDAFTARAN</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->no_pendaftaran; ?></td>
                  </tr>
                  <tr>
                    <th>N.I.S.N</th>
                    <th>:</th>
                    <td><?php echo $user->nisn; ?></td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <th>:</th>
                    <td><?php echo $user->nik; ?></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>:</th>
                    <td><?php echo ucwords($user->nama_lengkap); ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <th>:</th>
                    <td><?php echo $user->jk; ?></td>
                  </tr>
                  <tr>
                    <th>Tempat, Tgl Lahir</th>
                    <th>:</th>
                    <td><?php echo "$user->tempat_lahir, " . $this->lib_data->tgl_id($user->tgl_lahir); ?></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <th>:</th>
                    <td><?php echo $user->agama; ?></td>
                  </tr>
                  <tr>
                    <th>Status dalam Keluarga</th>
                    <th>:</th>
                    <td><?php echo $user->status_keluarga; ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $user->alamat_siswa; ?> , <?php echo $user->desa; ?> <?php echo $user->kec; ?> <?php echo $user->kab; ?> <?php echo $user->kode_pos; ?></td>
                  </tr>
                  <tr>
                    <th>No. Handphone</th>
                    <th>:</th>
                    <td><?php echo $user->no_hp_siswa; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="panel panel-flat">
          <div class="panel-body">
            <center>
              <img src="img/logo.png" alt="<?php echo $user->nama_lengkap; ?>" class="" width="176">
            </center>
            <br>
            <fieldset class="content-group">
              <hr style="margin-top:0px;">
              <b>Tanggal Daftar</b> : <br>
              <?php echo $this->lib_data->tgl_id(date('d-m-Y H:i:s', strtotime($user->tgl_siswa))); ?>
              <hr>
              <b>No. Pendaftaran : </b><?php echo $user->no_pendaftaran; ?>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ayah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nama_ayah); ?></td>
                  </tr>
                  <tr>
                    <th width="20%">NIK Ayah</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nik_ayah); ?></td>
                  </tr>
                  <tr>
                    <th>Pendidikan</th>
                    <th>:</th>
                    <td><?php echo $user->pdd_ayah; ?></td>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <th>:</th>
                    <td><?php echo $user->pekerjaan_ayah; ?></td>
                  </tr>
                  <tr>
                    <th>Penghasilan</th>
                    <th>:</th>
                    <td><?php echo $user->penghasilan_ayah; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ibu</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nama_ibu); ?></td>
                  </tr>
                  <tr>
                    <th width="20%">NIK Ibu</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nik_ibu); ?></td>
                  </tr>
                  <tr>
                    <th>Pendidikan</th>
                    <th>:</th>
                    <td><?php echo $user->pdd_ibu; ?></td>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <th>:</th>
                    <td><?php echo $user->pekerjaan_ibu; ?></td>
                  </tr>
                  <tr>
                    <th>Penghasilan</th>
                    <th>:</th>
                    <td><?php echo $user->penghasilan_ibu; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Wali</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Nama Lengkap</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nama_wali); ?></td>
                  </tr>
                  <tr>
                    <th width="20%">NIK Wali</th>
                    <th width="1%">:</th>
                    <td><?php echo ucwords($user->nik_wali); ?></td>
                  </tr>
                  <tr>
                    <th>Pendidikan</th>
                    <th>:</th>
                    <td><?php echo $user->pdd_wali; ?></td>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <th>:</th>
                    <td><?php echo $user->pekerjaan_wali; ?></td>
                  </tr>
                  <tr>
                    <th>Penghasilan</th>
                    <th>:</th>
                    <td><?php echo $user->penghasilan_wali; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-library2"></i> Data Sekolah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="30%">Nama Sekolah</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->nama_sekolah; ?></td>
                  </tr>
                  <tr>
                    <th width="30%">NPSN Sekolah</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->npsn_sekolah; ?></td>
                  </tr>
                  <tr>
                    <th>Status Sekolah</th>
                    <th>:</th>
                    <td><?php echo $user->status_sekolah; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-profile"></i> Informasi Kepemilikan Kartu</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="30%">No. KKS</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->no_kks; ?></td>
                  </tr>
                  <tr>
                    <th width="30%">No. PKH</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->no_pkh; ?></td>
                  </tr>
                  <tr>
                    <th width="30%">No. KIP</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->no_kip; ?></td>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->