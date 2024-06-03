<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_data extends CI_Model
{

    public function view()
    {
        return $this->db->get('tbl_data')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    function statistik($thn = '', $aksi = '')
    {
        switch ($thn) {
            case 'diverifikasi':
                $status = "AND status_verifikasi='1'";
                break;

            case 'diterima':
                $status = "AND status_pendaftaran='lulus'";
                break;

            case 'tidak diterima':
                $status = "AND status_pendaftaran='tidak lulus'";
                break;

            default:
                $status = "";
                break;
        }

        $sql = $this->db->query("
        select
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=1) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Januari`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=2) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Februari`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=3) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Maret`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=4) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `April`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=5) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Mei`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=6) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Juni`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=7) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Juli`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=8) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Agustus`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=9) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `September`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=10) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Oktober`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=11) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Nopember`,
            ifnull((SELECT count(id_siswa) FROM (tbl_siswa)WHERE((Month(tgl_siswa)=12) $status AND (YEAR(tgl_siswa)='$thn'))),0) AS `Desember`
            from tbl_siswa GROUP BY YEAR(tgl_siswa)
        ");
        return $sql;
    }

    // Fungsi upload file dan tanggal format Indonesia pindah ke /app/libraries/Lib_data.php.

}
