<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel_siswa extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('');
		} else {
			$data = array(
				'user'		=> $this->siswa->base_biodata($this->session->userdata('no_pendaftaran')),
				'judul_web'	=> "HOME"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/dashboard', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pengumuman()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('');
		} else {
			$data = array(
				'user'		=> $this->siswa->base_biodata($this->session->userdata('no_pendaftaran')),
				'judul_web'	=> "PENGUMUMAN"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/pengumuman', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function biodata()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		} else {
			$sess = $this->session->userdata('no_pendaftaran');
			$data = array(
				'user'		=> $this->siswa->base_biodata($sess),
				'judul_web'	=> "BIODATA"
			);

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/biodata', $data);
			$this->load->view('siswa/footer');
		}
	}


	public function cetak()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}
		$sess 		= $this->session->userdata('no_pendaftaran');
		$base_bio 	= $this->siswa->base_biodata($sess);
		$data = array(
			'user'			=> $base_bio,
			'judul_web'		=> ucwords($base_bio->no_pendaftaran) . '-' . ucwords($base_bio->nama_lengkap),
			'thn_ppdb'		=> date('Y', strtotime($base_bio->tgl_siswa))
		);

		$this->load->view('siswa/cetak', $data);
	}


	public function rekap_nilai()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}

		$sess 		= $this->session->userdata('no_pendaftaran');
		$base_bio 	= $this->siswa->base_biodata($sess);

		$data = array(
			'user'			=> $base_bio,
			'judul_web'		=> "Cetak Rekap Nilai " . ucwords($base_bio->nama_lengkap),
			'thn_ppdb'		=> $this->siswa->get_fy(),
			'nilai_rapor'	=> $this->siswa->get_print('study-report', $sess)->rata_rata_nilai,
			'rapor'			=> array(
				'sci'	=> $this->siswa->get_val('rapor', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'soc'	=> $this->siswa->get_val('rapor', $sess, "Ilmu Pengetahuan Sosial (IPS)"),
				'mat'	=> $this->siswa->get_val('rapor', $sess, "Matematika"),
				'ind'	=> $this->siswa->get_val('rapor', $sess, "Bahasa Indonesia"),
				'eng'	=> $this->siswa->get_val('rapor', $sess, "Bahasa Inggris"),
				'rlg'	=> $this->siswa->get_val('rapor', $sess, "Pendidikan Agama"),
				'nat'	=> $this->siswa->get_val('rapor', $sess, "PKN")
			),
			'nilai_usbn'	=> $this->siswa->get_print('schtest-val', $sess)->nilai_usbn,
			'usbn'			=> array(
				'sci'	=> $this->siswa->get_val('usbn', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'soc'	=> $this->siswa->get_val('usbn', $sess, "Ilmu Pengetahuan Sosial (IPS)"),
				'mat'	=> $this->siswa->get_val('usbn', $sess, "Matematika"),
				'ind'	=> $this->siswa->get_val('usbn', $sess, "Bahasa Indonesia"),
				'eng'	=> $this->siswa->get_val('usbn', $sess, "Bahasa Inggris"),
				'rlg'	=> $this->siswa->get_val('usbn', $sess, "Pendidikan Agama"),
				'nat'	=> $this->siswa->get_val('usbn', $sess, "PKN")
			),
			'nilai_unbk'	=> $this->siswa->get_print('nattest-val', $sess)->nilai_unbk,
			'unbk'			=> array(
				'sci'	=> $this->siswa->get_val('unbk', $sess, "Ilmu Pengetahuan Alam (IPA)"),
				'mat'	=> $this->siswa->get_val('unbk', $sess, "Matematika"),
				'ind'	=> $this->siswa->get_val('unbk', $sess, "Bahasa Indonesia"),
				'eng'	=> $this->siswa->get_val('unbk', $sess, "Bahasa Inggris")
			),
		);

		$this->load->view('siswa/rekap_nilai', $data);
	}

	public function cetak_lulus()
	{
		if ($this->session->userdata('no_pendaftaran') == NULL) {
			redirect('logcs');
		}

		$sess 		= $this->session->userdata('no_pendaftaran');
		$base_bio 	= $this->siswa->base_biodata($sess);

		$data = array(
			'user'		=> $this->siswa->get_print('passed', $sess),
			'judul_web'	=> "Cetak Bukti Lulus " . ucwords($base_bio->nama_lengkap),
			'thn_ppdb'	=> date('Y', strtotime($base_bio->tgl_siswa)),
			'v_ket'		=> $this->siswa->get_print('announcement')
		);

		if ($data['user']->status_pendaftaran != 'lulus') {
			redirect('404');
		}

		$this->load->view('siswa/cetak_lulus', $data);
	}

	public function logout()
	{
		if ($this->session->userdata('no_pendaftaran') != '') {
			$this->session->sess_destroy();
		}
		redirect('');
	}
}
