<div class="panel">
  <div class="panel-heading" style="background: #275555ff; color: honeydew;">
    <h2 align="center" style="margin-top: 10px;">FORM ISIAN<br><b>ORANG TUA/WALI CALON SISWA</b> </h2>
    <!-- <hr> -->
  </div>
  <div class="panel-body">

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nomor Kartu Keluarga <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="no_kk" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Nomor Kartu Keluarga" data-parsley-group="block3" data-parsley-errors-container='div[id="error-no_kk"]' required>
        <div id="error-no_kk" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan Kartu Keluarga (KK)</div>
      </div>
    </div>

   
    <hr>
    <h2><strong class="text-success" style="color:#000000;">
        <center>DATA AYAH KANDUNG</center>
      </strong></h2>
    <hr>
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama Ayah Kandung <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_ayah" class="form-control bg-blue" placeholder="Nama Ayah Kandung" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_ayah"]' required>
        <i class="fa fa-male" style="margin-left:15px;"></i>
        <div id="error-nama_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">NIK Ayah <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="nik_ayah" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="NIK Ayah" data-parsley-group="block3" data-parsley-errors-container='div[id="error-nik_ayah"]' required>
        <div id="error-nik_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan Kartu Keluarga (KK)</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tahun Lahir Ayah <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="th_lahir_ayah" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Tahun lahir Ayah" data-parsley-group="block3" data-parsley-errors-container='div[id="error-th_lahir_ayah"]' required>
        <div id="error-th_lahir_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pekerjaan Ayah <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pekerjaan Ayah" name="pekerjaan_ayah" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pekerjaan_ayah"]' required>
          <option value="">Pilih Pekerjaan Ayah</option>
          <?php foreach ($v_pekerjaan_ayah as $baris) : ?>
            <option value="<?php echo $baris->nama_pekerjaan; ?>"><?php echo $baris->nama_pekerjaan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pekerjaan_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Penghasilan Ayah<span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Penghasilan Ayah" name="penghasilan_ayah" data-parsley-group="block3" data-parsley-errors-container='div[id="error-penghasilan_ayah"]' required>
          <option value="">Pilih Penghasilan Ayah</option>
          <?php foreach ($v_penghasilan as $baris) : ?>
            <option value="<?php echo $baris->nama_penghasilan; ?>"><?php echo $baris->nama_penghasilan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-penghasilan_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pendidikan Ayah <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pendidikan Ayah" name="pdd_ayah" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pdd_ayah"]' required>
          <option value="">Pilih Pendidikan Ayah</option>
          <?php foreach ($v_pdd as $baris) : ?>
            <option value="<?php echo $baris->nama_pdd; ?>"><?php echo $baris->nama_pdd; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pdd_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. Handphone/WA <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="no_hp_ayah" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="No. Handphone/WA" data-parsley-group="block3" data-parsley-errors-container='div[id="error-no_hp_ayah"]' required>
        <div id="error-no_hp_ayah" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*jika tidak ada isi (-)</div>
      </div>
    </div>

   



    

    <hr>
    <h2><strong class="text-success" style="color:#000000;">
        <center>DATA IBU KANDUNG</center>
      </strong></h2>
    <hr>
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama Ibu Kandung <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_ibu" class="form-control bg-blue" placeholder="Nama Ibu Kandung" maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_ibu"]' required>
        <i class="fa fa-female" style="margin-left:15px;"></i>
        <div id="error-nama_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">NIK Ibu <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="nik_ibu" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="NIK Ibu" data-parsley-group="block3" data-parsley-errors-container='div[id="error-nik_ibu"]' required>
        <div id="error-nik_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan Kartu Keluarga (KK)</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tahun Lahir Ibu <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="th_lahir_ibu" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Tahun lahir Ibu" data-parsley-group="block3" data-parsley-errors-container='div[id="error-th_lahir_ibu"]' required>
        <div id="error-th_lahir_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

   

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pekerjaan Ibu <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pekerjaan Ibu" name="pekerjaan_ibu" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pekerjaan_ibu"]' required>
          <option value="">Pilih Pekerjaan Ibu</option>
          <?php foreach ($v_pekerjaan_ayah as $baris) : ?>
            <option value="<?php echo $baris->nama_pekerjaan; ?>"><?php echo $baris->nama_pekerjaan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pekerjaan_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Penghasilan Ibu <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Penghasilan Ibu" name="penghasilan_ibu" data-parsley-group="block3" data-parsley-errors-container='div[id="error-penghasilan_ibu"]' required>
          <option value="">Pilih Penghasilan Ibu</option>
          <?php foreach ($v_penghasilan as $baris) : ?>
            <option value="<?php echo $baris->nama_penghasilan; ?>"><?php echo $baris->nama_penghasilan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-penghasilan_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pendidikan Ibu <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pendidikan Ibu" name="pdd_ibu" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pdd_ibu"]' required>
          <option value="">Pilih Pendidikan Ibu</option>
          <?php foreach ($v_pdd as $baris) : ?>
            <option value="<?php echo $baris->nama_pdd; ?>"><?php echo $baris->nama_pdd; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pdd_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. Handphone/WA <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="no_hp_ibu" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="No. Handphone/WA" data-parsley-group="block3" data-parsley-errors-container='div[id="error-no_hp_ibu"]' required>
        <div id="error-no_hp_ibu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*jika tidak ada isi (-)</div>
      </div>
    </div>

    <hr>
    <h2><strong class="text-success" style="color:#000000;">
        <center>DATA WALI</center>
      </strong></h2>
    <hr>
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama wali <span class="text-danger"></span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_wali" class="form-control bg-blue" placeholder="Nama wali " maxlength="100" data-parsley-group="block3" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_wali"]'>
        <i class="fa fa-user" style="margin-left:15px;"></i>
        <div id="error-nama_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">NIK wali <span class="text-danger"></span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="nik_wali" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="NIK wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-nik_wali"]'>
        <div id="error-nik_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan Kartu Keluarga (KK)</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tahun Lahir wali <span class="text-danger"></span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="th_lahir_wali" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Tahun lahir wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-th_lahir_wali"]'>
        <div id="error-th_lahir_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pekerjaan wali <span class="text-danger"></span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pekerjaan wali" name="pekerjaan_wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pekerjaan_wali"]'>
          <option value="">Pilih Pekerjaan wali</option>
          <?php foreach ($v_pekerjaan_ayah as $baris) : ?>
            <option value="<?php echo $baris->nama_pekerjaan; ?>"><?php echo $baris->nama_pekerjaan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pekerjaan_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Penghasilan wali <span class="text-danger"></span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Penghasilan Ayah" name="penghasilan_wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-penghasilan_wali"]'>
          <option value="">Pilih Penghasilan wali</option>
          <?php foreach ($v_penghasilan as $baris) : ?>
            <option value="<?php echo $baris->nama_penghasilan; ?>"><?php echo $baris->nama_penghasilan; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-penghasilan_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Pendidikan wali <span class="text-danger"></span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih Pendidikan wali" name="pdd_wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-pdd_wali"]'>
          <option value="">Pilih Pendidikan wali</option>
          <?php foreach ($v_pdd as $baris) : ?>
            <option value="<?php echo $baris->nama_pdd; ?>"><?php echo $baris->nama_pdd; ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-pdd_wali" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. Handphone Wali <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:3px;">
        <input type="text" name="no_hp_ortu" class="form-control bg-blue class" maxlength="14" onkeypress="return hanyaAngka(this);" placeholder="No. Handphone Wali" data-parsley-group="block3" data-parsley-errors-container='div[id="error-no_hp_ortu"]'>
        <i class="fa fa-phone" style="margin-left:15px;"></i>
        <div id="error-no_hp_ortu" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>
  

   
  </div>
</div>

<div class="col-md-12">
  <div>