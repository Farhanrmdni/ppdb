<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Model_admin extends CI_Model
{

	function base($menu = '', $data = '')
	{
		switch ($menu) {
			case 'bio':
				// var_dump($data); exit;
				return $this->db->get_where('tbl_user', "username='$data'")->row();
				break;

			case 'status-ppdb':
				return $this->db->get_where('tbl_web', "id_web='1'")->row();
				break;

			default:
				# code...
				break;
		}
	}

	function ppdb_status($option, $date)
	{
		switch ($option) {
			case 'tutup':
				$data = array(
					'status_ppdb'	=> 'tutup',
					'tgl_diubah'	=> $date
				);
				return $this->db->update('tbl_web', $data, array('id_web' => '1'));;
				break;

			case 'buka':
				$data = array(
					'status_ppdb'	=> 'buka',
					'tgl_diubah'	=> $date
				);
				return $this->db->update('tbl_web', $data, array('id_web' => '1'));;
				break;

			default:
				# code...
				break;
		}
	}

	function auth($data)
	{
		$query = $this->db->where("username", $data['username'])->where("password", $data['password'])->get('tbl_user');
		return array(
			'res'	=> $query->row(),
			'sum'	=> $query->num_rows()
		);
	}

	function get_announce()
	{
		return $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();
	}

	function set_announce($act = null, $id = '')
	{
		switch ($act) {
			case 'lulus':
				$data = array(
					'status_pendaftaran'	=> 'lulus'
				);
				return $this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				break;

			case 'tdk_lulus':
				$data = array(
					'status_pendaftaran'	=> 'tidak lulus'
				);
				return $this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				break;

			case 'batal':
				$data = array(
					'status_pendaftaran'	=> null
				);
				return $this->db->update('tbl_siswa', $data, array('no_pendaftaran' => "$id"));
				break;

			case 'thn':
				return $id;
				break;

			default:
				return date('Y');
				break;
		}
	}

	function about_me($menu = '', $data = '')
	{
		switch ($menu) {
			case 'update':
				$old_user = $data['old_user'];
				$data = array(
					'username'		=> $data['username'],
					'nama_lengkap'	=> $data['nama_lengkap'],
					'alamat'		=> $data['alamat'],
					'telp'			=> $data['telp'],
					'email'			=> $data['email'],
					'website'		=> $data['website'],
					'kab_sekolah'	=> $data['kab_sekolah'],
					'ketua_panitia'	=> $data['ketua_panitia'],
					'nip_ketua'		=> $data['nip_ketua'],
					'th_pelajaran'	=> $data['th_pelajaran'],
					'no_surat'		=> $data['no_surat'],
					'kepsek'		=> $data['kepsek'],
					'nip_kepsek'	=> $data['nip_kepsek']
				);
				return $this->db->update('tbl_user', $data, array('username' => $old_user));
				break;

			case 'update-pass':
				$old_user = $data['old_user'];
				$data = array(
					'password'		=> $data['password']
				);
				return $this->db->update('tbl_user', $data, array('username' => $old_user));
				break;

			default:
				# code...
				break;
		}
	}

	function edit_siswa($menu = '', $data = '')
	{
		switch ($menu) {
			case 'update':
				$old_user = $data['old_user'];
				$data = array(
					'no_pendaftaran'		=> $data['no_pendaftaran'],
					'nisn'					=> $data['nisn'],
					'nik'					=> $data['nik'],
					'nama_lengkap'			=> $data['nama_lengkap'],
					'jk'					=> $data['jk'],
					'tempat_lahir'			=> $data['tempat_lahir'],
					'tgl_lahir'				=> $data['tgl_lahir'],
					'agama'					=> $data['agama'],
					'status_keluarga'		=> $data['status_keluarga'],
					'anak_ke'				=> $data['anak_ke'],
					'jml_saudara'			=> $data['jml_saudara'],
					'hobi'					=> $data['hobi'],
					'cita'					=> $data['cita'],
					'paud'					=> $data['paud'],
					'tk'					=> $data['tk'],
					'no_hp_siswa'			=> $data['no_hp_siswa'],
					'jenis_tinggal'			=> $data['jenis_tinggal'],
					'alamat_siswa'			=> $data['alamat_siswa'],
					'desa'					=> $data['desa'],
					'kec'					=> $data['kec'],
					'kab'					=> $data['kab'],
					'prov'					=> $data['prov'],
					'kode_pos'				=> $data['kode_pos'],
					'jarak'					=> $data['jarak'],
					'trans'					=> $data['trans'],
					'no_kk'					=> $data['no_kk'],
					'kepala_keluarga'		=> $data['kepala_keluarga'],
					'nama_ayah'				=> $data['nama_ayah'],
					'th_lahir_ayah'			=> $data['th_lahir_ayah'],
					'status_ayah'			=> $data['status_ayah'],
					'nik_ayah'				=> $data['nik_ayah'],
					'pdd_ayah'				=> $data['pdd_ayah'],
					'pekerjaan_ayah'		=> $data['pekerjaan_ayah'],
					'nama_ibu'				=> $data['nama_ibu'],
					'th_lahir_ibu'			=> $data['th_lahir_ibu'],
					'status_ibu'			=> $data['status_ibu'],
					'nik_ibu'				=> $data['nik_ibu'],
					'pdd_ibu'				=> $data['pdd_ibu'],
					'pekerjaan_ibu'			=> $data['pekerjaan_ibu'],
					'nama_wali'				=> $data['nama_wali'],
					'th_lahir_wali'			=> $data['th_lahir_wali'],
					'nik_wali'				=> $data['nik_wali'],
					'pdd_wali'				=> $data['pdd_wali'],
					'pekerjaan_wali'		=> $data['pekerjaan_wali'],
					'penghasilan_ayah'		=> $data['penghasilan_ayah'],
					'penghasilan_ibu'		=> $data['penghasilan_ibu'],
					'penghasilan_wali'		=> $data['penghasilan_wali'],
					'no_kks'				=> $data['no_kks'],
					'no_pkh'				=> $data['no_pkh'],
					'no_kip'				=> $data['no_kip'],
					'no_hp_ortu'			=> $data['no_hp_ortu'],
					'nama_sekolah'			=> $data['nama_sekolah'],
					'jenjang_sekolah'		=> $data['jenjang_sekolah'],
					'status_sekolah'		=> $data['status_sekolah'],
					'npsn_sekolah'			=> $data['npsn_sekolah'],
					'lokasi_sekolah'		=> $data['lokasi_sekolah'],
					'komp_ahli'				=> $data['komp_ahli']



				);
				return $this->db->update('tbl_siswa', $data, array('no_pendaftaran' => $old_user));
				break;

			default:
				# code...
				break;
		}
	}

	function verifikasi($menu = '', $thn = '', $status = '')
	{
		switch ($menu) {
			case 'siswa':
				$res = $this->db->like('tgl_siswa', "$thn", 'after')->order_by('id_siswa', 'DESC')->get('tbl_siswa');
				return (object) array(
					'bar'	=> $res->row(),
					'sum'	=> $res->num_rows(),
					'ori'	=> $res
				);
				break;

			case 'materi':
				return $this->db->get_where('tbl_verifikasi', "id_verifikasi='1'")->row();
				break;

			case 'acc':
				switch ($thn) {
					case 'total':
						return $this->db->like('tgl_siswa', "$thn", 'after')->get("tbl_siswa")->num_rows();
						break;

					case 'diverifikasi':
						return $this->db->like('tgl_siswa', "$thn", 'after')->where('status_verifikasi', '1')->get("tbl_siswa")->num_rows();
						break;

					case 'diterima':
						return $this->db->like('tgl_siswa', "$thn", 'after')->where('status_pendaftaran', 'lulus')->get("tbl_siswa")->num_rows();
						break;

					case 'tidak diterima':
						return $this->db->like('tgl_siswa', "$thn", 'after')->where('status_pendaftaran', 'tidak lulus')->get("tbl_siswa")->num_rows();
						break;

					default:
						# code...
						break;
				}
				break;

			default:
				# code...
				break;
		}
	}

	function get_val($menu = '', $id = '')
	{
		switch ($menu) {
			default:
				# code...
				break;
		}
	}

	function update($menu = '', $data = '')
	{
		switch ($menu) {
			case 'teks-verifikasi':
				$this->db->update('tbl_verifikasi', $data, array('id_verifikasi' => "1"));
				break;

			case 'change-stu-verif':
				$param = array(
					'status_verifikasi' => $data['status_verifikasi']
				);
				$this->db->update('tbl_siswa', $param, array('no_pendaftaran' => $data['id']));
				break;

			case 'announce-edited':
				$data = (object) $data;
				$data = array(
					'ket_pengumuman'	=> $data->post('ket_pengumuman')
				);
				$this->db->update('tbl_pengumuman', $data, array('id_pengumuman' => "1"));
				break;

			default:
				# code...
				break;
		}
	}
}
