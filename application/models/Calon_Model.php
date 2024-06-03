<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Calon_Model extends CI_Model
{
  public function filter($search, $limit, $start, $order_field, $order_ascdesc)
  {
    $this->db->like('id_siswa', $search); // Untuk menambahkan query where LIKE
    $this->db->like('nisn', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nama_lengkap', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('komp_ahli', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_sekolah', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT

    return $this->db->get('tbl_siswa')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

  public function count_all()
  {
    return $this->db->count_all('tbl_siswa'); // Untuk menghitung semua data siswa
  }

  public function count_filter($search)
  {
    $this->db->like('id_siswa', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('nisn', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_lengkap', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('komp_ahli', $search); // Untuk menambahkan query where OR LIKE
    $this->db->or_like('nama_sekolah', $search); // Untuk menambahkan query where OR LIKE

    return $this->db->get('tbl_siswa')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }
}
