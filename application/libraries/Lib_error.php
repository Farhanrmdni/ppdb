<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Lib_error
{
	
	function wrong_regnum($data)
	{
		return '
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;&nbsp;</span>
			</button>
			<strong>Kombinasi No. Pendaftaran ' . $data['username'] . '</strong> dengan N.I.S.N tidak ditemukan.
		</div>';
	}

	function wrong_auth()
	{
		return '
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;&nbsp;</span>
			</button>
			<strong>No. Pendaftaran atau N.I.S.N salah!</strong>.
		</div>';
	}

	function wrong_admin_auth()
	{
		return '
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;&nbsp;</span>
			</button>
			Kombinasi username dan password tidak ditemukan.
		</div>';
	}

	function update_admin($value='')
	{
		switch ($value) {
			case 'username':
				return '
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					</button>
					<strong>Sukses!</strong> Profile berhasil diperbarui.
				</div>';
				break;

			case 'password-success':
				return '
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					</button>
					<strong>Sukses!</strong> Password berhasil diperbarui.
				</div>';
				break;

			case 'password-notmatch':
				return '
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					</button>
					<strong>Gagal!</strong> Password Lama tidak cocok.
				</div>';
				break;

			case 'password-notconfirmed':
				return '
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					</button>
					<strong>Gagal!</strong> Password baru dan konfirmasi password baru tidak cocok.
				</div>';
				break;

			case 'materi':
				return '
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					</button>
					<strong>Sukses!</strong> Meteri & Jadwal Ujian berhasil diperbarui.
				</div>';
				break;

			case 'announce-edited':
				return '
				<div class="alert alert-success alert-dismissible" role="alert">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
					 </button>
					 <strong>Sukses!</strong> Keterangan Pengumuman berhasil diperbarui.
				</div>';
				break;
			
			default:
				# code...
				break;
		}
	}
}