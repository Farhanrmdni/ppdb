<div class="panel">
  <div class="panel-heading" style="background: #275555ff; color: honeydew;">
    <h2 align="center" style="margin-top: 10px;">FORM ISIAN<br><b>ALAMAT CALON SISWA</b> </h2>
    <!-- <hr> -->
  </div>
  <div class="panel-body">

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Jenis tempat tinggal <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Pilih jenis tempat tinggal" name="jenis_tinggal" data-parsley-group="block2" data-parsley-errors-container='div[id="error-jenis_tinggal"]' required>
          <option value="">Pilih jenis tempat tinggal</option>
          <option value="1">Tinggal dengan orangtua/wali</option>
          <option value="2">Ikut saudara/kerabat</option>
          <option value="3">Asrama Madrasah</option>
          <option value="4">Kontrak/kost</option>
          <option value="5">Asrama Pesantren</option>
          <option value="6">Panti Asuhan</option>
          <option value="7">Rumah singgah</option>
          <option value="8">Lainnya</option>
        </select>
        <div id="error-jenis_tinggal" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Alamat <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="alamat_siswa" class="form-control bg-blue" placeholder="Alamat siswa" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-alamat_siswa"]' required>
        <i class="fa fa-home" style="margin-left:15px;"></i>
        <div id="error-alamat_siswa" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Cukup dituliskan nama dusun/jalan dan rt/rw (sesuai KK)</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Desa <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="desa" class="form-control bg-blue" placeholder="Desa" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-desa"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-desa" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Isi sesuai KK</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Kecamatan <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="kec" class="form-control bg-blue" placeholder="Kecamatan" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-kec"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-kec" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Isi sesuai KK</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Kabupaten <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="kab" class="form-control bg-blue" placeholder="Kabupaten" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-kab"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-kab" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Isi sesuai KK</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Provinsi <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="prov" class="form-control bg-blue" placeholder="Provinsi" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-prov"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-prov" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Isi sesuai KK</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Kode pos <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="kode_pos" class="form-control bg-blue" placeholder="Kode pos" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-kode_pos"]' required>
        <i class="fa fa-map-marker" style="margin-left:15px;"></i>
        <div id="error-kode_pos" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Isi sesuai KK</div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Jarak ke sekolah <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Jarak ke sekolah" name="jarak" data-parsley-group="block2" data-parsley-errors-container='div[id="error-jarak"]' required>
          <option value="">Pilih jarak siswa ke sekolah</option>
          <option value="1">Kurang dari 5 km</option>
          <option value="2">5 - 10 km</option>
          <option value="3">11 - 20 km</option>
          <option value="4">21 - 30 km</option>
          <option value="5">Lebih dari 30 km</option>
        </select>
        <div id="error-jarak" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Transportasi yang digunakan <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control bg-blue class" data-placeholder="Transportasi yang digunakan" name="trans" data-parsley-group="block2" data-parsley-errors-container='div[id="error-trans"]' required>
          <option value="">Pilih transportasi yang digunakan ke sekolah</option>
          <option value="1">Jalan Kaki</option>
          <option value="2">Sepeda</option>
          <option value="3">Sepeda motor</option>
          <option value="4">Mobil Pribadi</option>
          <option value="5">Antar jemput sekolah</option>
          <option value="6">Angkutan umum</option>
          <option value="7">Perahu/sampan</option>
          <option value="8">Lainnya</option>
        </select>
        <div id="faa-flash animated" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
      </div>
    </div>

  </div>
</div>

<div class="col-md-12">
  <div>