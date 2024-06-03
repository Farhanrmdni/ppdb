<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel_admin extends CI_Controller
{

	public function index()
	{
		$sess = $this->session->userdata('id_admin');
		if ($this->session->userdata('id_admin') == NULL) {
			$this->load->view('404_content');
		} else {
			$data = array(
				'user'		=> $this->admin->base('bio', $sess),
				'web_ppdb'	=> $this->admin->base('status-ppdb'),
				'judul_web'	=> "HOME",
				'v_thn'		=> date('Y'),

			);

			$thn  = date('Y');
			foreach ($this->Model_data->statistik($thn)->result_array() as $row) {
				$data['grafik'][] = (float)$row['Januari'];
				$data['grafik'][] = (float)$row['Februari'];
				$data['grafik'][] = (float)$row['Maret'];
				$data['grafik'][] = (float)$row['April'];
				$data['grafik'][] = (float)$row['Mei'];
				$data['grafik'][] = (float)$row['Juni'];
				$data['grafik'][] = (float)$row['Juli'];
				$data['grafik'][] = (float)$row['Agustus'];
				$data['grafik'][] = (float)$row['September'];
				$data['grafik'][] = (float)$row['Oktober'];
				$data['grafik'][] = (float)$row['Nopember'];
				$data['grafik'][] = (float)$row['Desember'];
			}

			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnnonaktif'])) {
				$acts = $this->admin->ppdb_status('tutup', date('Y-m-d H:i:s'));
				redirect('panel_admin');
			}

			if (isset($_POST['btnaktif'])) {
				$acts = $this->admin->ppdb_status('buka', date('Y-m-d H:i:s'));
				redirect('panel_admin');
			}
		}
	}

	public function log_in()
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess != NULL) {
			$this->load->view('404_content');
		} else {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

			if (isset($_POST['btnlogin'])) {
				$send = array(
					'username'	=> $this->input->post('username'),
					'password'	=> $this->input->post('password')
				);
				$auth	= $this->admin->auth($send);

				if ($auth['sum'] == 0) {
					$this->session->set_flashdata('msg', $this->err->wrong_admin_auth($sess));
					redirect('panel_admin/log_in');
				} else {
					$this->session->set_userdata('administrator', $auth['res']->level);
					$this->session->set_userdata('id_admin', $auth['res']->username);
					redirect('panel_admin');
				}
			}
		}
	}

	public function logs()
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess != NULL) {
			$this->load->view('404_content');
		} else {
			$this->load->view('admin/login/header_login');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

			if (isset($_POST['btnlogin'])) {
				$send = array(
					'username'	=> $this->input->post('username'),
					'password'	=> $this->input->post('password')
				);
				$auth	= $this->admin->auth($send);

				if ($auth['sum'] == 0) {
					$this->session->set_flashdata('msg', $this->err->wrong_admin_auth($sess));
					redirect('panel_admin/log_in');
				} else {
					$this->session->set_userdata('administrator', $auth['res']->level);
					$this->session->set_userdata('id_admin', $auth['res']->username);
					redirect('panel_admin');
				}
			}
		}
	}

	public function profile()
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			$data = array(
				'user'		=> $this->admin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "PROFIL"
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/profile', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnupdate'])) {

				$data = array(
					'old_user'		=> $this->session->userdata('id_admin'),
					'username'		=> $this->input->post('username'),
					'nama_lengkap'	=> $this->input->post('nama_lengkap'),
					'alamat'		=> $this->input->post('alamat'),
					'telp'			=> $this->input->post('telp'),
					'email'			=> $this->input->post('email'),
					'kab_sekolah'	=> $this->input->post('kab_sekolah'),
					'ketua_panitia'	=> $this->input->post('ketua_panitia'),
					'nip_ketua'		=> $this->input->post('nip_ketua'),
					'website'		=> $this->input->post('website'),
					'th_pelajaran'	=> $this->input->post('th_pelajaran'),
					'no_surat'		=> $this->input->post('no_surat'),
					'kepsek'		=> $this->input->post('kepsek'),
					'nip_kepsek'	=> $this->input->post('nip_kepsek')
				);

				$acts = $this->admin->about_me('update', $data);

				$this->session->has_userdata('id_admin');
				$this->session->set_userdata('id_admin', $data['username']);

				$this->session->set_flashdata('msg', $this->err->update_admin('username'));

				redirect('panel_admin/profile');
			}
		}
	}


	public function ubah_siswa($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');

		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {

			switch ($aksi) {

				case 'thn':
					$thn = $id;
					break;

				default:
					$thn = date('Y');
					break;
			}

			$data = array(
				'user' 		=> $this->admin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "VERIFIKASI",
				'v_siswa'	=> $this->admin->verifikasi('siswa', $thn)->ori,
				'v_thn'		=> $thn
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnupdate'])) {

				$data = array(
					'old_user'				=> $this->session->userdata('id_siswa'),
					'no_pendaftaran'		=> $this->session->userdata('no_pendaftaran'),
					'nisn'					=> $this->session->userdata('nisn'),
					'nik'					=> $this->session->userdata('nik'),
					'nama_lengkap'			=> $this->session->userdata('nama_lengkap'),
					'jk'					=> $this->session->userdata('jk'),
					'tempat_lahir'			=> $this->session->userdata('tempat_lahir'),
					'tgl_lahir'				=> $this->session->userdata('tgl_lahir'),
					'agama'					=> $this->session->userdata('agama'),
					'status_keluarga'		=> $this->session->userdata('status_keluarga'),
					'anak_ke'				=> $this->session->userdata('anak_ke'),
					'jml_saudara'			=> $this->session->userdata('jml_saudara'),
					'hobi'					=> $this->session->userdata('hobi'),
					'cita'					=> $this->session->userdata('cita'),
					'paud'					=> $this->session->userdata('paud'),
					'tk'					=> $this->session->userdata('tk'),
					'no_hp_siswa'			=> $this->session->userdata('no_hp_siswa'),
					'jenis_tinggal'			=> $this->session->userdata('jenis_tinggal'),
					'alamat_siswa'			=> $this->session->userdata('alamat_siswa'),
					'desa'					=> $this->session->userdata('desa'),
					'kec'					=> $this->session->userdata('kec'),
					'kab'					=> $this->session->userdata('kab'),
					'prov'					=> $this->session->userdata('prov'),
					'kode_pos'				=> $this->session->userdata('kode_pos'),
					'jarak'					=> $this->session->userdata('jarak'),
					'trans'					=> $this->session->userdata('trans'),
					'no_kk'					=> $this->session->userdata('no_kk'),
					'kepala_keluarga'		=> $this->session->userdata('kepala_keluarga'),
					'nama_ayah'				=> $this->session->userdata('nama_ayah'),
					'th_lahir_ayah'			=> $this->session->userdata('th_lahir_ayah'),
					'status_ayah'			=> $this->session->userdata('status_ayah'),
					'nik_ayah'				=> $this->session->userdata('nik_ayah'),
					'pdd_ayah'				=> $this->session->userdata('pdd_ayah'),
					'pekerjaan_ayah'		=> $this->session->userdata('pekerjaan_ayah'),
					'nama_ibu'				=> $this->session->userdata('nama_ibu'),
					'th_lahir_ibu'			=> $this->session->userdata('th_lahir_ibu'),
					'status_ibu'			=> $this->session->userdata('status_ibu'),
					'nik_ibu'				=> $this->session->userdata('nik_ibu'),
					'pdd_ibu'				=> $this->session->userdata('pdd_ibu'),
					'pekerjaan_ibu'			=> $this->session->userdata('pekerjaan_ibu'),
					'nama_wali'				=> $this->session->userdata('nama_wali'),
					'th_lahir_wali'			=> $this->session->userdata('th_lahir_wali'),
					'nik_wali'				=> $this->session->userdata('nik_wali'),
					'pdd_wali'				=> $this->session->userdata('pdd_wali'),
					'pekerjaan_wali'		=> $this->session->userdata('pekerjaan_wali'),
					'penghasilan_ayah'		=> $this->session->userdata('penghasilan_ayah'),
					'penghasilan_ibu'		=> $this->session->userdata('penghasilan_ibu'),
					'penghasilan_wali'		=> $this->session->userdata('penghasilan_wali'),
					'no_kks'				=> $this->session->userdata('no_kks'),
					'no_pkh'				=> $this->session->userdata('no_pkh'),
					'no_kip'				=> $this->session->userdata('no_kip'),
					'no_hp_ortu'			=> $this->session->userdata('no_hp_ortu'),
					'nama_sekolah'			=> $this->session->userdata('nama_sekolah'),
					'jenjang_sekolah'		=> $this->session->userdata('jenjang_sekolah'),
					'status_sekolah'		=> $this->session->userdata('status_sekolah'),
					'npsn_sekolah'			=> $this->session->userdata('npsn_sekolah'),
					'lokasi_sekolah'		=> $this->session->userdata('lokasi_sekolah'),
					'komp_ahli'				=> $this->session->userdata('komp_ahli')

				);

				$acts = $this->admin->edit_siswa('update', $data);
				$this->session->has_userdata('id_siswa');
				$this->session->set_userdata('id_siswa', $data['no_pendaftaran']);
				$this->session->set_flashdata('msg', $this->err->update_admin('no_pendaftaran'));
				redirect('panel_admin/profile');
			}
		}
	}

	public function ubah_pass()
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			$data = array(
				'user' 		=> $this->admin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "UBAH PASSWORD"
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/ubah_pass', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnupdate2'])) {
				$send = array(
					'plama'	=> $this->input->post('password_lama'),
					'pbaru'	=> $this->input->post('password'),
					'pconf'	=> $this->input->post('password2')
				);

				if ($data['user']->password != $send['plama']) {
					$this->session->set_flashdata('msg2', $this->err->update_admin('password-notmatch'));
				} else if ($send['pbaru'] != $send['pconf']) {
					$this->session->set_flashdata('msg2', $this->err->update_admin('password-notconfirmed'));
				} else {
					$data = array(
						'old_user'	=> $sess,
						'password'	=> $send['pbaru']
					);
					$acts = $this->admin->about_me('update-pass', $data);

					$this->session->set_flashdata('msg2', $this->err->update_admin('password-success'));
				}
				redirect('panel_admin/ubah_pass');
			}
		}
	}

	public function verifikasi($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			switch ($aksi) {
				case 'cek':
					$cek_status = $this->siswa->base_biodata($id);
					$data = array(
						'id'				=> $id,
						'status_verifikasi'	=> ($cek_status->status_verifikasi == 1) ? 0 : 1
					);
					$acts = $this->admin->update('change-stu-verif', $data);
					redirect('panel_admin/verifikasi');
					break;

				case 'thn':
					$thn = $id;
					break;

				default:
					$thn = date('Y');
					break;
			}

			$data = array(
				'user' 		=> $this->admin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "VERIFIKASI",
				'v_siswa'	=> $this->admin->verifikasi('siswa', $thn)->ori,
				'v_thn'		=> $thn
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/verifikasi/verifikasi', $data);
			$this->load->view('admin/footer');
		}
	}

	public function edit_materi($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			$data = array(
				'user'		=> $this->admin->base('bio', $sess),
				'judul_web'	=> "MATERI & UJIAN",
				'v_materi'	=> $this->admin->verifikasi('materi')
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/verifikasi/verifikasi_edit_materi&jadwal', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnupdate'])) {
				$data = array(
					'isi'	=> $this->input->post('isi')
				);
				$acts = $this->admin->update('teks-verifikasi', $data);

				$this->session->set_flashdata('msg', $this->err->update_admin('materi'));
				redirect('panel_admin/verifikasi');
			}
		}
	}

	public function verifikasi_cetak($id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		}
		$data = array(
			'user'			=> $this->siswa->base_biodata($id),
			'judul_web'		=> "CETAK_VERIFIKASI_" . ucwords($this->siswa->base_biodata($id)->no_pendaftaran),
			'thn_ppdb'		=> date('Y', strtotime($this->siswa->base_biodata($id)->tgl_siswa)),
			'v_materi'		=> $this->admin->verifikasi('materi')
		);

		$this->load->view('admin/verifikasi/cetak', $data);
	}


	public function export($aksi = '', $id = '')
	{

		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {

			$thn = ($aksi == 'thn') ? $id : date('Y');

			$data = array(
				'user'		=> $this->admin->base('bio', $sess),
				'judul_web'	=> "EXPORT KE EXCEL HASIL FORMULIR PENDAFTARAN SISWA (BIODATA SISWA)",
				'v_siswa'	=> $this->admin->verifikasi('siswa', $thn)->ori,
				'v_thn'		=> $thn
			);
			var_dump($data);
			exit;
			$this->load->view('admin/export', $data);
			// $this->load->view('warnings/in-progress');
		}
	}

	public function edit($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			switch ($aksi) {
				case 'cek':
					$cek_status = $this->siswa->base_biodata($id);
					$data = array(
						'id'				=> $id,
						'status_verifikasi'	=> ($cek_status->status_verifikasi == 1) ? 0 : 1
					);
					$acts = $this->admin->update('change-stu-verif', $data);
					redirect('panel_admin/edit');
					break;

				case 'thn':
					$thn = $id;
					break;

				default:
					$thn = date('Y');
					break;
			}

			$data = array(
				'user' 		=> $this->admin->base('bio', $this->session->userdata('id_admin')),
				'judul_web'	=> "EDIT ADMIN",
				'v_siswa'	=> $this->admin->verifikasi('siswa', $thn)->ori,
				'v_thn'		=> $thn
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit/edit', $data);
			$this->load->view('admin/footer');
		}
	}


	public function set_pengumuman($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {

			switch ($aksi) {
				case 'lulus':
				case 'tdk_lulus':
				case 'batal':
					$this->admin->set_announce($aksi, $id);
					redirect('panel_admin/set_pengumuman');
					break;

				default:
					$thn = $this->admin->set_announce($aksi, $id);
					break;
			}

			$data = array(
				'user'		=> $this->admin->base('bio', $sess),
				'judul_web'	=> "KELULUSAN",
				'v_siswa'	=> $this->admin->verifikasi('siswa', $id)->ori,
				'v_thn'		=> $thn
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_pengumuman/set_pengumuman', $data);
			$this->load->view('admin/footer');
		}
	}

	public function edit_ket($aksi = '', $id = '')
	{
		$sess = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {
			$data = array(
				'user'		=> $this->admin->base('bio', $sess),
				'judul_web'	=> "KETERANGAN LULUS",
				'v_ket'		=> $this->admin->get_announce()
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/set_pengumuman/set_keterangan', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnupdate'])) {
				$this->admin->update('announce-edited', $this->input);

				$this->session->set_flashdata('msg', $this->err->update_admin('announce-edited'));
				redirect('panel_admin/set_pengumuman');
			}
		}
	}

	public function statistik($aksi = '', $id = '')
	{
		$sess 	 = $this->session->userdata('id_admin');
		if ($sess == NULL) {
			redirect('panel_admin/log_in');
		} else {

			$thn = ($aksi == 'thn') ? $id : date('Y');

			foreach ($this->Model_data->statistik($thn)->result_array() as $row) {
				$data['grafik'][] = (float)$row['Januari'];
				$data['grafik'][] = (float)$row['Februari'];
				$data['grafik'][] = (float)$row['Maret'];
				$data['grafik'][] = (float)$row['April'];
				$data['grafik'][] = (float)$row['Mei'];
				$data['grafik'][] = (float)$row['Juni'];
				$data['grafik'][] = (float)$row['Juli'];
				$data['grafik'][] = (float)$row['Agustus'];
				$data['grafik'][] = (float)$row['September'];
				$data['grafik'][] = (float)$row['Oktober'];
				$data['grafik'][] = (float)$row['Nopember'];
				$data['grafik'][] = (float)$row['Desember'];
			}

			foreach ($this->Model_data->statistik($thn, 'diverifikasi')->result_array() as $row) {
				$data['grafik2'][] = (float)$row['Januari'];
				$data['grafik2'][] = (float)$row['Februari'];
				$data['grafik2'][] = (float)$row['Maret'];
				$data['grafik2'][] = (float)$row['April'];
				$data['grafik2'][] = (float)$row['Mei'];
				$data['grafik2'][] = (float)$row['Juni'];
				$data['grafik2'][] = (float)$row['Juli'];
				$data['grafik2'][] = (float)$row['Agustus'];
				$data['grafik2'][] = (float)$row['September'];
				$data['grafik2'][] = (float)$row['Oktober'];
				$data['grafik2'][] = (float)$row['Nopember'];
				$data['grafik2'][] = (float)$row['Desember'];
			}

			foreach ($this->Model_data->statistik($thn, 'diterima')->result_array() as $row) {
				$data['grafik3'][] = (float)$row['Januari'];
				$data['grafik3'][] = (float)$row['Februari'];
				$data['grafik3'][] = (float)$row['Maret'];
				$data['grafik3'][] = (float)$row['April'];
				$data['grafik3'][] = (float)$row['Mei'];
				$data['grafik3'][] = (float)$row['Juni'];
				$data['grafik3'][] = (float)$row['Juli'];
				$data['grafik3'][] = (float)$row['Agustus'];
				$data['grafik3'][] = (float)$row['September'];
				$data['grafik3'][] = (float)$row['Oktober'];
				$data['grafik3'][] = (float)$row['Nopember'];
				$data['grafik3'][] = (float)$row['Desember'];
			}

			foreach ($this->Model_data->statistik($thn, 'tidak diterima')->result_array() as $row) {
				$data['grafik4'][] = (float)$row['Januari'];
				$data['grafik4'][] = (float)$row['Februari'];
				$data['grafik4'][] = (float)$row['Maret'];
				$data['grafik4'][] = (float)$row['April'];
				$data['grafik4'][] = (float)$row['Mei'];
				$data['grafik4'][] = (float)$row['Juni'];
				$data['grafik4'][] = (float)$row['Juli'];
				$data['grafik4'][] = (float)$row['Agustus'];
				$data['grafik4'][] = (float)$row['September'];
				$data['grafik4'][] = (float)$row['Oktober'];
				$data['grafik4'][] = (float)$row['Nopember'];
				$data['grafik4'][] = (float)$row['Desember'];
			}

			$data = array(
				'user'					=> $this->admin->base('bio', $sess),
				'judul_web'				=> "STATISTIK",
				'v_thn'					=> $thn,
				'total_pendaftar'		=> $this->admin->verifikasi('acc', 'total'),
				'total_diverifikasi'	=> $this->admin->verifikasi('acc', 'verified'),
				'total_diterima'		=> $this->admin->verifikasi('acc', 'accepted'),
				'total_tidak_diterima'	=> $this->admin->verifikasi('acc', 'rejected'),
				'grafik'				=> $data['grafik'],
				'grafik2'				=> $data['grafik2'],
				'grafik3'				=> $data['grafik3'],
				'grafik4'				=> $data['grafik4']
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/statistik/index', $data);
			$this->load->view('admin/footer');
		}
	}


	public function logout()
	{
		if ($this->session->has_userdata('id_admin') != '' and $this->session->has_userdata('administrator') != '') {
			$this->session->sess_destroy();
		}
		redirect('panel_admin/log_in');
	}

	public function delete($id_siswa)
	{
		$this->Model_admin->delete($id_siswa);
		// return redirect()->to('/panel_admin/verifikasi');
	}
}
