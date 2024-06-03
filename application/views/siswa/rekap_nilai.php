<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="img/faviconn.png"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    </style>
  </head>
  <body onload="window.print();">
    <?php $this->load->view('kop_lap'); ?>
    <h4 align="center" style="margin-top:0px;"><u>REKAPITULASI NILAI</u></h4>
    <br>

    <table width="100%" border="0">
      <tr>
        <td width="200">NO. PENDAFTARAN</td>
        <td width="1">:</td>
        <td><b><i><?php echo $user->no_pendaftaran; ?></i></b></td>
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
        <td><?php echo "$user->tempat_lahir, ".$this->lib_data->tgl_id($user->tgl_lahir); ?></td>
      </tr>
      <tr>
        <td>ASAL SEKOLAH</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_sekolah); ?></td>
      </tr>
    </table>
    <br>

    <table width="100%" border="1">
      <tr>
        <th rowspan="2">Mata Pelajaran</th>
        <th colspan="5">Nilai Rapor Semester</th>
        <th rowspan="2">Rata - Rata<br>Rapor</th>
        <th rowspan="2">Nilai USBN</th>
        <th rowspan="2">Nilai<br>UNBK/UNKP</th>
      </tr>
      <tr>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
      </tr>
      <tr align="center">
        <td align="left">Ilmu Pengetahuan Alam (IPA)</td>
        <td><?php echo number_format($rapor['sci']['semester1'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['sci']['semester2'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['sci']['semester3'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['sci']['semester4'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['sci']['semester5'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['sci']['rata_rata_nilai'],2,",","."); ?></td>
        <td><?php echo number_format($usbn['sci'],2,",","."); ?></td>
        <td><?php echo number_format($unbk['sci'],2,",","."); ?></td>
      </tr>
      <tr align="center">
        <td align="left">Ilmu Pengetahuan Sosial (IPS)</td>
        <td><?php echo number_format($rapor['soc']['semester1'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['soc']['semester2'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['soc']['semester3'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['soc']['semester4'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['soc']['semester5'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['soc']['rata_rata_nilai'],2,",","."); ?></td>
        <td><?php echo number_format($usbn['soc'],2,",","."); ?></td>
        <td>-</td>
      </tr>
      <tr align="center">
        <td align="left">Matematika</td>
        <td><?php echo number_format($rapor['mat']['semester1'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['mat']['semester2'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['mat']['semester3'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['mat']['semester4'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['mat']['semester5'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['mat']['rata_rata_nilai'],2,",","."); ?></td>
        <td><?php echo number_format($usbn['mat'],2,",","."); ?></td>
        <td><?php echo number_format($unbk['mat'],2,",","."); ?></td>
      </tr>
      <tr align="center">
        <td align="left">Bahasa Indonesia</td>
        <td><?php echo number_format($rapor['ind']['semester1'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['ind']['semester2'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['ind']['semester3'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['ind']['semester4'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['ind']['semester5'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['ind']['rata_rata_nilai'],2,",","."); ?></td>
        <td><?php echo number_format($usbn['ind'],2,",","."); ?></td>
        <td><?php echo number_format($unbk['ind'],2,",","."); ?></td>
      </tr>
      <tr align="center">
        <td align="left">Bahasa Inggris</td>
        <td><?php echo number_format($rapor['eng']['semester1'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['eng']['semester2'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['eng']['semester3'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['eng']['semester4'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['eng']['semester5'],2,",","."); ?></td>
        <td><?php echo number_format($rapor['eng']['rata_rata_nilai'],2,",","."); ?></td>
        <td><?php echo number_format($usbn['eng'],2,",","."); ?></td>
        <td><?php echo number_format($unbk['eng'],2,",","."); ?></td>
      </tr>
      <tr align="center">
        <td align="left">Pendidikan Agama</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td><?php echo number_format($usbn['rlg'],2,",","."); ?></td>
        <td>-</td>
      </tr>
      <tr align="center">
        <td align="left">PKN</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td><?php echo number_format($usbn['nat'],2,",","."); ?></td>
        </td>
        <td>-</td>
      </tr>
      <tr>
        <th colspan="6">Jumlah</th>
        <th><?php echo number_format($nilai_rapor,2,",","."); ?></th>
        <th><?php echo number_format($nilai_usbn,2,",","."); ?></th>
        <th><?php echo number_format($nilai_unbk,2,",","."); ?></th>
      </tr>
      <tr>
        <th colspan="6">Rata - Rata</th>
        <th><?php echo number_format($nilai_rapor / 5,2,",","."); ?></th>
        <th><?php echo number_format($nilai_usbn / 7,2,",","."); ?></th>
        <th><?php echo number_format($nilai_unbk / 4,2,",","."); ?></th>
      </tr>
    </table>
    <br><br>

    <div style="float:right;margin-right:100px;">
      ..............,...................<?php echo date('Y'); ?><br>
			Orang Tua / Wali  <br>
      <br><br><br>
      .............................................
    </div>
    <br><br><br><br><br><br><br><br>

    <table width="100%" border="0" style="margin-left:5px;">
      <tr>
        <td valign="top" width="1">1.</td>
        <td>Semua data nilai yang di masukan adalah benar dan sesuai dengan nilai asli.</td>
      </tr>
      <tr>
        <td valign="top">2.</td>
        <td align="justify">Apabila ditemukan data nilai yang telah saya berikan tidak benar, maka saya bersedia dikenakan sanksi dan atau di diskualifikasi dari seleksi Penerimaan Peserta Didik Baru (PPDB) SMK Mitra Sehat Mandiri Sidoarjo Tahun Pelajaran <?php echo $thn_ppdb; ?>.</td>
      </tr>
    </table>

  </body>
</html>
