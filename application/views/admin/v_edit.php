<form>
<div class="header">
     <div class="title">
          <h3>Edit Pengguna</h3>
     </div>
     
</div>
<?php foreach ($v_siswa->result_array() as $i) :
  ?>
<form action="" method="POST" id="edit-pengguna">
     <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" value="<?php echo $v_siswa->nama_lengkap; ?>">
     </div>
     <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <label><input type="radio" name="jenis_kelamin" value="Lelaki"<?php echo ($v_siswa->jk == 'Lelaki' ? ' checked' : ''); ?>> Lelaki</label>
          <label><input type="radio" name="jenis_kelamin" value="Perempuan"<?php echo ($v_siswa->jk == 'Perempuan' ? ' checked' : ''); ?>> Perempuan</label>
     </div>
     <div class="action">
          <button type="submit" form="edit-pengguna" class="btn btn-default">Simpan</button>
     </div>
</form>
<?php endforeach; ?>