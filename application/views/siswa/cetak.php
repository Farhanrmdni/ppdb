<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $judul_web; ?></title>
  <base href="<?php echo base_url(); ?>" />
  <link rel="icon" type="image/png" href="img/faviconn.png" />
  <style>
    table {
      border-collapse: collapse;
    }

    thead>tr {
      background-color: #0070C0;
      color: #f1f1f1;
    }

    thead>tr>th {
      background-color: #0070C0;
      color: #fff;
      padding: 10px;
      border-color: #fff;
    }

    th,
    td {
      padding: 2px;
    }

    th {
      color: #222;
    }

    body {
      font-family: Calibri;
    }
  </style>
</head>

<body onload="window.print();">
  <?php $this->load->view('kop_lap'); ?>
  <h4 align="center" style="margin-top:0px;"><u>BUKTI PENDAFTARAN</u></h4>
  <b>
    <center>
      PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB) <br>
      <?php echo $id['nama_lengkap']; ?> TAHUN PELAJARAN <?php echo $id['th_pelajaran']; ?></center>
  </b>
  <br>

  <table width="100%" border="0">
    <tr>
      <td width="200">NO. PENDAFTARAN</td>
      <td width="1">:</td>
      <td><?php echo $user->no_pendaftaran; ?></td>
    </tr>
    <tr>
      <td>TANGGAL PENDAFTARAN </td>
      <td>:</td>
      <td><?php echo $this->lib_data->tgl_id(date('d-m-Y', strtotime($user->tgl_siswa))); ?></td>
    </tr>
    <tr>
      <td>TANGGAL CETAK </td>
      <td>:</td>
      <td><?php echo $this->lib_data->tgl_id(date('d-m-Y')); ?></td>
    </tr>
    <tr>
      <td>NIS</td>
      <td>:</td>
      <td><?php echo $user->nis; ?></td>
    </tr>
    <tr>
      <td>NISN</td>
      <td>:</td>
      <td><?php echo $user->nisn; ?></td>
    </tr>
    <tr>
      <td>NIK</td>
      <td>:</td>
      <td><?php echo $user->nik; ?></td>
    </tr>
    <tr>
      <td>NAMA LENGKAP</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_lengkap); ?></td>
    </tr>
    <tr>
      <td>JENIS KELAMIN</td>
      <td>:</td>
      <td><?php echo $user->jk; ?></td>
    </tr>
    <tr>
      <td>TEMPAT, TANGGAL LAHIR</td>
      <td>:</td>
      <td><?php echo "$user->tempat_lahir, " . $this->lib_data->tgl_id($user->tgl_lahir); ?></td>
    </tr>
    <tr>
      <td>AGAMA</td>
      <td>:</td>
      <td><?php echo $user->agama; ?></td>
    </tr>
    <tr>
      <td>NAMA ORANG TUA /WALI</td>
      <td>:</td>
      <td></td>
    </tr>
    <tr>
      <td style="padding-left:55px;">AYAH</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_ayah); ?></td>
    </tr>
    <tr>
      <td style="padding-left:55px;">IBU</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_ibu); ?></td>
    </tr>
    <tr>
      <td style="padding-left:55px;">WALI</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_wali); ?></td>
    </tr>
    <tr>
      <td>NO. HANDPHONE (HP)</td>
      <td>:</td>
      <td><?php echo $user->no_hp_siswa; ?></td>
    </tr>
    <tr>
      <td>ASAL SEKOLAH</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_sekolah); ?></td>
    </tr>
  </table>
  <br>

  <div style="float:right;">
    <?php echo $id['kab_sekolah']; ?>, <?php echo $this->lib_data->tgl_id(date('d-m-Y')); ?> <br>
    Ketua Panitia PPDB, <br>
    <img src="img/ttd.png" alt="" width="100"><br>
    <b><u><?php echo $id['ketua_panitia']; ?></u></b><br>
    NIP. <?php echo $id['nip_ketua']; ?>
  </div>
  <br><br><br><br><br><br><br><br><br>

  <b><u>Siapkan Berkas Berikut Ketika anda melakukan DAFTAR ULANG :</u></b>
  <br>
  <table width="100%" border="0" style="margin-left:5px;">
    <tr>
      <td width="1">1.</td>
      <td>Cetak bukti pendaftaran</td>
      <td width="1">:</td>
      <td>1 lembar</td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Foto copy Akte Kelahiran dan Kartu Keluarga</td>
      <td>:</td>
      <td>2 lembar</td>
    </tr>
    <tr>
      <td>3.</td>
      <td>Surat Keterangan Lulus dan Ijazah MTs/SMP <b>(*Apabila sudah ada)</b></td>
      <td>:</td>
      <td>2 lembar</td>
    </tr>
    <tr>
      <td>4.</td>
      <td>Fc. Kartu NISN <b>(*No. NISN/Screen NISN)</b></td>
      <td>:</td>
      <td>1 lembar</td>
    </tr>
    <tr>
      <td valign="top">7.</td>
      <td colspan="3">Semua berkas dimasukan kedalam map biru (PUTRA), map Kuning (PUTRI) dan diserahkan kepada Panitia PPDB <?php echo $id['nama_lengkap']; ?> Tahun Pelajaran <?php echo $id['th_pelajaran']; ?></td>
    </tr>
  </table>

</body>

</html>