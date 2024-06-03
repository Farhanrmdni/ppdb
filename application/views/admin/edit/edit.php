<?php
$user = $user;
$level = $user->level; ?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel panel-flat">
          <div class="panel-body">
            <center>
              <img src="img/logo.png" alt="<?php echo $user->nama_lengkap; ?>" class="img-circle" width="100">
            </center>
            <br>

            </form>
          </div>
        </div>

        <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Ubah Profile</legend>
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-lg-3">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Sekolah</label>
                  <div class="col-lg-9">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap; ?>" placeholder="Nama Sekolah" maxlength="100" required>
                  </div>
                </div>
                <div class="form-group">

                  <div class="form-group">
                    <label class="control-label col-lg-3">Alamat</label>
                    <div class="col-lg-9">
                      <input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat; ?>" placeholder="Alamat" maxlength="100" required>
                    </div>
                  </div>
                  <div class="form-group">

                    <div class="form-group">
                      <label class="control-label col-lg-3">Nomor Telp</label>
                      <div class="col-lg-9">
                        <input type="text" name="telp" class="form-control" value="<?php echo $user->telp; ?>" placeholder="Nomor Telp" maxlength="100" required>
                      </div>
                    </div>
                    <div class="form-group">

                      <div class="form-group">
                        <label class="control-label col-lg-3">Email</label>
                        <div class="col-lg-9">
                          <input type="text" name="email" class="form-control" value="<?php echo $user->email; ?>" placeholder="Email" maxlength="100" required>
                        </div>
                      </div>
                      <div class="form-group">

                        <div class="form-group">
                          <label class="control-label col-lg-3">Website</label>
                          <div class="col-lg-9">
                            <input type="text" name="website" class="form-control" value="<?php echo $user->website; ?>" placeholder="Website" maxlength="100" required>
                          </div>
                        </div>
                        <div class="form-group">

                          <div class="form-group">
                            <label class="control-label col-lg-3">Kabupaten</label>
                            <div class="col-lg-9">
                              <input type="text" name="kab_sekolah" class="form-control" value="<?php echo $user->kab_sekolah; ?>" placeholder="Kabupaten" maxlength="100" required>
                            </div>
                          </div>
                          <div class="form-group">

                            <div class="form-group">
                              <label class="control-label col-lg-3">Ketua Panitia</label>
                              <div class="col-lg-9">
                                <input type="text" name="ketua_panitia" class="form-control" value="<?php echo $user->ketua_panitia; ?>" placeholder="Ketua Panitia" maxlength="100" required>
                              </div>
                            </div>
                            <div class="form-group">

                              <div class="form-group">
                                <label class="control-label col-lg-3">NIP Ketua Panitia</label>
                                <div class="col-lg-9">
                                  <input type="text" name="nip_ketua" class="form-control" value="<?php echo $user->nip_ketua; ?>" placeholder="NIP Ketua Panitia" maxlength="100" required>
                                </div>
                              </div>
                              <div class="form-group">

                                <div class="form-group">
                                  <label class="control-label col-lg-3">Tahun Pelajaran</label>
                                  <div class="col-lg-9">
                                    <input type="text" name="th_pelajaran" class="form-control" value="<?php echo $user->th_pelajaran; ?>" placeholder="Tahun Pelajaran" maxlength="100" required>
                                  </div>
                                </div>
                                <div class="form-group">

                                  <div class="form-group">
                                    <label class="control-label col-lg-3">No Surat Pengumuman</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="no_surat" class="form-control" value="<?php echo $user->no_surat; ?>" placeholder="No Surat" maxlength="100" required>
                                    </div>
                                  </div>
                                  <div class="form-group">

                                    <div class="form-group">
                                      <label class="control-label col-lg-3">Kepala Sekolah</label>
                                      <div class="col-lg-9">
                                        <input type="text" name="kepsek" class="form-control" value="<?php echo $user->kepsek; ?>" placeholder="Kepala Sekolah" maxlength="100" required>
                                      </div>
                                    </div>
                                    <div class="form-group">

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">NIP Kepala Sekolah</label>
                                        <div class="col-lg-9">
                                          <input type="text" name="nip_kepsek" class="form-control" value="<?php echo $user->nip_kepsek; ?>" placeholder="NIP Kepala Sekolah" maxlength="100" required>
                                        </div>
                                      </div>
                                      <div class="form-group">


            </fieldset>
            <div class="col-md-12">
              <hr style="margin-top:-10px;">
              <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>


    </div>
    <!-- /dashboard content -->