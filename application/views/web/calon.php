<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->db->get('tbl_user')->row_array();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PPDB Online | <?php echo $user['nama_lengkap']; ?></title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!-- Load Datatable & Bootsrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/lib/css/dataTables.bootstrap.min.css') ?>"/>
  </head>
  <body>
    <div class="container">
      <div style="background: whitesmoke;padding: 10px;">
        <center><h1 style="margin-top: 0; "><strong>Data Pendaftar PPDB <?php echo $user['nama_lengkap']; ?> Tahun Pelajaran <?php echo $user['th_pelajaran']; ?></strong></h1></center>
      </div>
      <hr>

      <div class="table-responsive">
        <table class="table table-bordered" id="table-siswa">
          <thead>
            <tr>
              <th>No</th>
              <th>NISN</th>
              <th>Nama Lengkap</th>
              <th>Jurusan</th>
              <th>Asal Sekolah</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>

    <!-- Load Jquery & Datatable JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
    <script>
    var tabel = null;

    $(document).ready(function() {
        tabel = $('#table-siswa').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?php echo base_url('index.php/calon/view') ?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                { "data": "id_siswa" }, // Tampilkan nis
                { "data": "nisn" },  // Tampilkan nama
                { "data": "nama_lengkap" },  // Tampilkan nama
                { "data": "komp_ahli" },  // Tampilkan nama
                { "data": "nama_sekolah" },  // Tampilkan nama
            ],
        });
    });
    </script>
  </body>
</html>