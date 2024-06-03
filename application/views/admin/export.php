<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export_$v_thn.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="assets/images/smaja3.png"/>
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
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
    </style>
  </head>
  <body>

    <table width="100%" border="1">
      <tr>
        <th rowspan="4">No.</th>
        <th rowspan="3" colspan="11">BIODATA SISWA</th>
        <th colspan="31">NILAI RAPOR</th>
        <th rowspan="1" colspan="9">NILAI USBN</th>
        <th rowspan="1" colspan="6">NILAI UNBK/UNKP</th>
      </tr>
      <tr>
        <th colspan="6">Ilmu Pengetahuan Alam (IPA)</th>
        <th colspan="6">Ilmu Pengetahuan Sosial (IPS)</th>
        <th colspan="6">Matematika</th>
        <th colspan="6">Bahasa Indonesia</th>
        <th colspan="6">Bahasa Inggris</th>
        <th rowspan="3">RATA - RATA RAPOR</th>

        <th rowspan="3">Pendidikan Agama</th>
        <th rowspan="3">PKN</th>
        <th rowspan="3">Bahasa Indonesia</th>
        <th rowspan="3">Bahasa Inggris</th>
        <th rowspan="3">Matematika</th>
        <th rowspan="3">IPA</th>
        <th rowspan="3">IPS</th>
        <th rowspan="3">JUMLAH NILAI USBN</th>
        <th rowspan="3">RATA - RATA NILAI USBN</th>

        <th rowspan="3">Ilmu Pengetahuan Alam (IPA)</th>
        <th rowspan="3">Matematika</th>
        <th rowspan="3">Bahasa Indonesia</th>
        <th rowspan="3">Bahasa Inggris</th>
        <th rowspan="3">JUMLAH NILAI UNBK</th>
        <th rowspan="3">RATA - RATA NILAI UNBK</th>
      </tr>
      <tr>
        <?php for ($i=1; $i <=5 ; $i++) {?>
          <th colspan="5">SEMESTER</th>
          <th rowspan="2">RATA - RATA NILAI</th>
        <?php } ?>
      </tr>
      <tr>
        <th>NO. PENDAFTARAN</th>
        <th>NIS</th>
        <th>NISN</th>
        <th>NIK</th>
        <th>NAMA LENGKAP</th>
        <th>JENIS KELAMIN</th>
        <th>TEMPAT, TANGGAL LAHIR</th>
        <th>AGAMA</th>
        <th>STATUS DALAM KELUARGA</th>
        <th>ALAMAT SISWA</th>
        <th>NO. HANDPHONE</th>
        <?php for ($i=1; $i <=5 ; $i++) {?>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
        <?php } ?>
      </tr>
      <?php $no=1;
      error_reporting(0);
      foreach ($v_siswa->result() as $baris):
        $ipa = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
        $ips = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Sosial (IPS)"))->row();
        $mtk = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel"=>"Matematika"))->row();
        $ind = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel"=>"Bahasa Indonesia"))->row();
        $ing = $this->db->get_where('tbl_rapor', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel"=>"Bahasa Inggris"))->row();
        $rata_rata_rapor = number_format(($ipa->rata_rata_nilai+$ips->rata_rata_nilai+$mtk->rata_rata_nilai+$ind->rata_rata_nilai+$ing->rata_rata_nilai)/5,2,",",".");

        $agama = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Pendidikan Agama"))->row();
        $pkn   = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"PKN"))->row();
        $ind2  = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Bahasa Indonesia"))->row();
        $ing2  = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Bahasa Inggris"))->row();
        $mtk2  = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Matematika"))->row();
        $ipa2  = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
        $ips2  = $this->db->get_where('tbl_nilai_usbn', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_usbn"=>"Ilmu Pengetahuan Sosial (IPS)"))->row();
        $jumlah_usbn = $agama->nilai_usbn+$pkn->nilai_usbn+$ind2->nilai_usbn+$ing2->nilai_usbn+$mtk2->nilai_usbn+$ipa2->nilai_usbn+$ips2->nilai_usbn;

        $ipa3 = $this->db->get_where('tbl_nilai_unbk', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_unbk"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
        $mtk3 = $this->db->get_where('tbl_nilai_unbk', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_unbk"=>"Matematika"))->row();
        $ind3 = $this->db->get_where('tbl_nilai_unbk', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_unbk"=>"Bahasa Indonesia"))->row();
        $ing3 = $this->db->get_where('tbl_nilai_unbk', array('no_pendaftaran' => $baris->no_pendaftaran, "mapel_unbk"=>"Bahasa Inggris"))->row();
        $jumlah_unbk = $ipa3->nilai_unbk+$mtk3->nilai_unbk+$ind3->nilai_unbk+$ing3->nilai_unbk;
      ?>
        <tr>
          <th><?php echo $no++; ?></th>
          <td><?php echo $baris->no_pendaftaran; ?></td>
          <td><?php echo $baris->nis; ?></td>
          <td><?php echo $baris->nisn; ?></td>
          <td><?php echo $baris->nik; ?></td>
          <td><?php echo ucwords($baris->nama_lengkap); ?></td>
          <td><?php echo $baris->jk; ?></td>
          <td><?php echo "$baris->tempat_lahir, ".$this->Model_data->tgl_id($baris->tgl_lahir); ?></td>
          <td><?php echo $baris->agama; ?></td>
          <td><?php echo $baris->status_keluarga; ?></td>
          <td><?php echo $baris->alamat_siswa; ?></td>
          <td><?php echo $baris->no_hp_siswa; ?></td>
          <td><?php echo number_format($ipa->semester1,2,",","."); ?></td>
          <td><?php echo number_format($ipa->semester2,2,",","."); ?></td>
          <td><?php echo number_format($ipa->semester3,2,",","."); ?></td>
          <td><?php echo number_format($ipa->semester4,2,",","."); ?></td>
          <td><?php echo number_format($ipa->semester5,2,",","."); ?></td>
          <th><?php echo number_format($ipa->rata_rata_nilai,2,",","."); ?></th>
          <td><?php echo number_format($ips->semester1,2,",","."); ?></td>
          <td><?php echo number_format($ips->semester2,2,",","."); ?></td>
          <td><?php echo number_format($ips->semester3,2,",","."); ?></td>
          <td><?php echo number_format($ips->semester4,2,",","."); ?></td>
          <td><?php echo number_format($ips->semester5,2,",","."); ?></td>
          <th><?php echo number_format($ips->rata_rata_nilai,2,",","."); ?></th>
          <td><?php echo number_format($mtk->semester1,2,",","."); ?></td>
          <td><?php echo number_format($mtk->semester2,2,",","."); ?></td>
          <td><?php echo number_format($mtk->semester3,2,",","."); ?></td>
          <td><?php echo number_format($mtk->semester4,2,",","."); ?></td>
          <td><?php echo number_format($mtk->semester5,2,",","."); ?></td>
          <th><?php echo number_format($mtk->rata_rata_nilai,2,",","."); ?></th>
          <td><?php echo number_format($ind->semester1,2,",","."); ?></td>
          <td><?php echo number_format($ind->semester2,2,",","."); ?></td>
          <td><?php echo number_format($ind->semester3,2,",","."); ?></td>
          <td><?php echo number_format($ind->semester4,2,",","."); ?></td>
          <td><?php echo number_format($ind->semester5,2,",","."); ?></td>
          <th><?php echo number_format($ind->rata_rata_nilai,2,",","."); ?></th>
          <td><?php echo number_format($ing->semester1,2,",","."); ?></td>
          <td><?php echo number_format($ing->semester2,2,",","."); ?></td>
          <td><?php echo number_format($ing->semester3,2,",","."); ?></td>
          <td><?php echo number_format($ing->semester4,2,",","."); ?></td>
          <td><?php echo number_format($ing->semester5,2,",","."); ?></td>
          <th><?php echo number_format($ing->rata_rata_nilai,2,",","."); ?></th>
          <th><?php echo $rata_rata_rapor; ?></th>
          <td><?php echo number_format($agama->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($pkn->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($ind2->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($ing2->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($mtk2->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($ipa2->nilai_usbn,2,",","."); ?></td>
          <td><?php echo number_format($ips2->nilai_usbn,2,",","."); ?></td>
          <th><?php echo number_format($jumlah_usbn,2,",","."); ?></th>
          <th><?php echo number_format($jumlah_usbn/7,2,",","."); ?></th>
          <td><?php echo number_format($ipa3->nilai_unbk,2,",","."); ?></td>
          <td><?php echo number_format($mtk3->nilai_unbk,2,",","."); ?></td>
          <td><?php echo number_format($ind3->nilai_unbk,2,",","."); ?></td>
          <td><?php echo number_format($ing3->nilai_unbk,2,",","."); ?></td>
          <th><?php echo number_format($jumlah_unbk,2,",","."); ?></th>
          <th><?php echo number_format($jumlah_unbk/4,2,",","."); ?></th>
        </tr>
      <?php
      endforeach; ?>
    </table>

  </body>
</html>
