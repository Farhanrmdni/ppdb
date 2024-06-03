<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Model_web extends CI_Model
{

	function web_utama()
	{
		return $this->db->get_where('tbl_web', "id_web='1'")->row();
	}

	function pendaftaran($menu = '', $data = '')
	{
		switch ($menu) {
			case 'daftar':
				
				$data = (object) $data;
				$data = array(
					'no_pendaftaran'	=> $data->post('nis'),
					'password'			=> $data->post('nisn'),
					'komp_ahli'			=> $data->post('komp_ahli'),
					'nisn'				=> $data->post('nisn'),
					'nik'				=> $data->post('nik'),
					'nama_lengkap'		=> $data->post('nama_lengkap'),
					'jk'				=> $data->post('jk'),
					'tempat_lahir'		=> $data->post('tempat_lahir'),
					'tgl_lahir'			=> $data->post('tgl_lahir') . "-" . $data->post('bln_lahir') . "-" . $data->post('thn_lahir'),
					'agama'				=> $data->post('agama'),
					'status_keluarga'	=> $data->post('status_keluarga'),
					'anak_ke'			=> $data->post('anak_ke'),
					'jml_saudara'	    => $data->post('jml_saudara'),
					'hobi'				=> $data->post('hobi'),
					'cita'				=> $data->post('cita'),
					'paud'				=> $data->post('paud'),
					'tk'				=> $data->post('tk'),
					'no_hp_siswa'		=> $data->post('no_hp_siswa'),
					'jenis_tinggal'		=> $data->post('jenis_tinggal'),
					'alamat_siswa'		=> $data->post('alamat_siswa'),
					'desa'				=> $data->post('desa'),
					'kec'				=> $data->post('kec'),
					'kab'				=> $data->post('kab'),
					'prov'				=> $data->post('prov'),
					'kode_pos'			=> $data->post('kode_pos'),
					'jarak'				=> $data->post('jarak'),
					'trans'				=> $data->post('trans'),
					'no_kk'				=> $data->post('no_kk'),
					'kepala_keluarga'	=> $data->post('kepala_keluarga'),
					'nama_ayah'			=> $data->post('nama_ayah'),
					'nik_ayah'			=> $data->post('nik_ayah'),
					'th_lahir_ayah'		=> $data->post('th_lahir_ayah'),
					'status_ayah'		=> $data->post('status_ayah'),
					'pdd_ayah'			=> $data->post('pdd_ayah'),
					'pekerjaan_ayah'	=> $data->post('pekerjaan_ayah'),
					'penghasilan_ayah'	=> $data->post('penghasilan_ayah'),
					'nama_ibu'			=> $data->post('nama_ibu'),
					'nik_ibu'			=> $data->post('nik_ibu'),
					'th_lahir_ibu'		=> $data->post('th_lahir_ibu'),
					'status_ibu'		=> $data->post('status_ibu'),
					'pdd_ibu'			=> $data->post('pdd_ibu'),
					'pekerjaan_ibu'		=> $data->post('pekerjaan_ibu'),
					'penghasilan_ibu'	=> $data->post('penghasilan_ibu'),

					'nama_wali'			=> $data->post('nama_wali'),
					'nik_wali'			=> $data->post('nik_wali'),
					'th_lahir_wali'		=> $data->post('th_lahir_wali'),
					'pdd_wali'			=> $data->post('pdd_wali'),
					'pekerjaan_wali'	=> $data->post('pekerjaan_wali'),
					'penghasilan_wali'	=> $data->post('penghasilan_wali'),
					'no_hp_ortu'		=> $data->post('no_hp_ortu'),
					'no_kks'			=> $data->post('no_kks'),
					'no_pkh'			=> $data->post('no_pkh'),
					'no_kip'			=> $data->post('no_kip'),
					'nama_sekolah'		=> $data->post('nama_sekolah'),
					'jenjang_sekolah'	=> $data->post('jenjang_sekolah'),
					'status_sekolah'	=> $data->post('status_sekolah'),
					'npsn_sekolah'		=> $data->post('npsn_sekolah'),
					'lokasi_sekolah'	=> $data->post('lokasi_sekolah'),
					'no_akte'			=> $data->post('no_akte'),
					'no_hp_ayah'		=> $data->post('no_hp_ayah'),
					'no_p_ujian'		=> $data->post('no_p_ujian'),
					'seri_ijaza'		=> $data->post('seri_ijaza'),
					'seri_skhus'		=> $data->post('seri_skhus'),
					'bukti_bayar'		=> $data->post('bukti_bayar'),
					'tgl_siswa'			=> date('Y-m-d H:i:s')
				);
				return $this->db->insert('tbl_siswa', $data);
				break;

			case 'id_baru':
				$no_max = $this->db->select_max('no_pendaftaran', 'kode')->get('tbl_siswa')->row();
				$no_max = $no_max->kode;
				$no_max = (int) substr($no_max, 6) + 1;
				return date('Y-') . sprintf("%06s", time());
				break;

			case 'status_ppdb':
				return $this->db->get_where('tbl_web', "id_web='1'")->row();
				break;

			case 'v_pdd':
				return $this->db->order_by('id_pdd', 'ASC')->get('tbl_pdd')->result();
				break;

			case 'v_pekerjaan_ayah':
				return $this->db->where('ket_pekerjaan', 'ayah')->order_by('id_pekerjaan', 'ASC')->get('tbl_pekerjaan')->result();
				break;

			case 'v_komp':
				return $this->db->order_by('id_komp', 'ASC')->get('tbl_komp')->result();
				break;

			case 'v_pekerjaan_ibu':
				return $this->db->where('ket_pekerjaan', 'ibu')->order_by('id_pekerjaan', 'ASC')->get('tbl_pekerjaan')->result();
				break;

			case 'v_pekerjaan_wali':
				return $this->db->order_by('id_pekerjaan', 'ASC')->group_by('nama_pekerjaan')->get('tbl_pekerjaan')->result();
				break;

			case 'v_penghasilan':
				return $this->db->order_by('id_penghasilan', 'ASC')->get('tbl_penghasilan')->result();
				break;

			default:
				# code...
				break;
		}
	}

	function auth($menu = '', $data = '')
	{
		switch ($menu) {
			case 'cek-masuk':
				$query = $this->db->where("no_pendaftaran", $data['username'])->where("password", $data['password'])->get('tbl_siswa');
				return array(
					'res'	=> $query->row(),
					'sum'	=> $query->num_rows()
				);
				break;

			default:
				# code...
				break;
		}
	}

	
	public function buktibayar() {
		$bukti_bayar  = $_FILES['bukti_bayar'];
		if ($bukti_bayar=''){
	
		}else{
		  $config['upload_path'] = './uplods/bayar';
		  $config['allowed_types'] = 'jpg|jpeg|png|gif';
	
		  $this->load->library('upload',$config);
		  if(!$this->upload->do_upload('bukti_bayar')){
			echo "Upload Gagal"; die();
		}else{
		  $bukti_bayar=$this->upload->data('file_name');
		}
	  }

		return $bukti_bayar;
	}

}
