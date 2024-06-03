<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Lib_data
{
	
	function statistik($year = '', $act = '')
	{
		switch ($year) {
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


	}

	public function upload_file($filename){
		$config = array(
			'upload_path'	=> './assets/excel/',
			'allowed_types'	=> 'xlsx',
			'max_size'		=> '10048', //10 MB
			'overwrite'		=> true,
			'file_name'		=> $filename
		);

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('tbl_data', $data);
	}

	public function date($aksi)
	{
		// date_default_timezone_set('Asia/Jakarta');
		switch ($aksi) {
			case 'waktu':
				$date	 = date('d-m-Y H:i:s');
				break;

			case 'waktu_default':
				$date	 = date('Y-m-d H:i:s');
				break;

			case 'thn':
				$date	 = date('Y');
				break;

			case 'bln':
				$date	 = date('m');
				break;

			case 'tgl_default':
				$date	 = date('Y-m-d');
				break;

			case 'tgl':
				$date	 = date('d-m-Y');
				break;

			case 'jam':
				$date	 = date('H:i:s');
				break;
			
			default:
				$date  = 'Null';
				break;
		}

		return $date;
	}

	public static function tgl_id($date)
 	{
		$str = explode('-', $date);
		$var = (int) $str[1] - 1;
		$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		return $str[0] . " " . $bulan[$var] . " " .$str[2];
	}

	public static function bln_id($date)
	{
	$str = explode('-', $date);
	$str = (int) $str[1];
	$bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $bulan[$str];
	}
}
