<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('SiswaModel');
  }
  
  public function index(){
    $sess = $this->session->userdata('id_admin');
    $data['siswa'] = $this->SiswaModel->view();
    $data = array('user'    => $this->admin->base('bio', $sess));
    $data['judul_web'] = "Export";
    $this->load->view('admin/header', $data);
    $this->load->view('admin/view', $data);
    $this->load->view('admin/footer');
    
  }

  function buktibayar()
  {
      $simpan = $this->SiswaModel->buktibayar();
      if ($simpan == 'success') {
          # code...
          redirect('siswa','refresh');
      } 

  }
  public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();


    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Siswa")
                 ->setSubject("Siswa")
                 ->setDescription("Laporan Semua Data Siswa")
                 ->setKeywords("Data Siswa");

    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR PENERIMAAN SISWA BARU"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:BF1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "NISN"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "JENIS KELAMIN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "TEMPAT LAHIR");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL LAHIR");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "AGAMA");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "STATUS DALAM KELUARGA");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "ANAK KE");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "JML SAUDARA");
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "HOBI");
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "CITA-CITA");
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "PAUD");
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "TK");
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "NO HP");
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "JENIS TEMPAT TINGGAL");
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "ALAMAT");
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "DESA");
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "KECAMATAN");
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "KABUPATEN");
    $excel->setActiveSheetIndex(0)->setCellValue('V3', "PROVINSI");
    $excel->setActiveSheetIndex(0)->setCellValue('W3', "KODE POS");
    $excel->setActiveSheetIndex(0)->setCellValue('X3', "JARAK KE SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "TRANSPORTASI");
    $excel->setActiveSheetIndex(0)->setCellValue('Z3', "NO. KK");
    $excel->setActiveSheetIndex(0)->setCellValue('AA3', "KEPALA KELUARGA");
    $excel->setActiveSheetIndex(0)->setCellValue('AB3', "NAMA AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AC3', "TH LAHIR AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AD3', "STATUS AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AE3', "NIK AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AF3', "PENDIDIKAN AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AG3', "PEKERJAAN AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AH3', "NAMA IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AI3', "TH LAHIR IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AJ3', "STATUS IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AK3', "NIK IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AL3', "PENDIDIKAN IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AM3', "PEKERJAAN IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AN3', "NAMA WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AO3', "TH LAHIR WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AP3', "NIK WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AQ3', "PENDIDIKAN WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AR3', "PEKERJAAN WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AS3', "PENGHASILAN AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('AT3', "PENGHASILAN IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('AU3', "PENGHASILAN WALI");
    $excel->setActiveSheetIndex(0)->setCellValue('AV3', "NO KKS");
    $excel->setActiveSheetIndex(0)->setCellValue('AW3', "NO PKH");
    $excel->setActiveSheetIndex(0)->setCellValue('AX3', "NO KIP");
    $excel->setActiveSheetIndex(0)->setCellValue('AY3', "NO HP ORTU");
    $excel->setActiveSheetIndex(0)->setCellValue('AZ3', "NAMA SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BA3', "JENJANG SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BB3', "STATUS SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BC3', "NPSN SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BD3', "LOKASI SEKOLAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BE3', "STATUS PENERIMAAN");
    $excel->setActiveSheetIndex(0)->setCellValue('BF3', "JURUSAN");
    $excel->setActiveSheetIndex(0)->setCellValue('BG3', "NO AKTE");
    $excel->setActiveSheetIndex(0)->setCellValue('BH3', "NO HP AYAH");
    $excel->setActiveSheetIndex(0)->setCellValue('BI3', "NO HP IBU");
    $excel->setActiveSheetIndex(0)->setCellValue('BJ3', "NO PESERTA UJIAN");
    $excel->setActiveSheetIndex(0)->setCellValue('BK3', "NO IJAZA");
    $excel->setActiveSheetIndex(0)->setCellValue('BL3', "NO SKHUS");
    
    

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AA3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AB3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AD3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AE3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AF3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AG3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AH3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AI3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AJ3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AK3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AL3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AM3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AN3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AO3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AP3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AQ3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AR3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AS3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AT3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AU3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AV3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AW3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AX3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AY3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AZ3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BA3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BB3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BC3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BD3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BE3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BF3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BG3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BH3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BI3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BJ3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BK3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('BL3')->applyFromArray($style_col);
    


    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->SiswaModel->view();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $data->nisn, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('C'.$numrow, $data->nik, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_lengkap);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tempat_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->agama);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->status_keluarga);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->anak_ke);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->jml_saudara);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->hobi);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->cita);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->paud);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->tk);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('P'.$numrow, $data->no_hp_siswa, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->jenis_tinggal);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->alamat_siswa);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->desa);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->kec);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->kab);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->prov);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->kode_pos);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->jarak);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->trans);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('Z'.$numrow, $data->no_kk, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->kepala_keluarga);
      $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->nama_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->th_lahir_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->status_ayah);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AE'.$numrow, $data->nik_ayah, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->pdd_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->pekerjaan_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->nama_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->th_lahir_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->status_ibu);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AK'.$numrow, $data->nik_ibu, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->pdd_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->pekerjaan_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->nama_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->th_lahir_wali);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AP'.$numrow, $data->nik_wali, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->pdd_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->pekerjaan_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->penghasilan_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->penghasilan_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->penghasilan_wali);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AV'.$numrow, $data->no_kks, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AW'.$numrow, $data->no_pkh, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AX'.$numrow, $data->no_kip, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('AY'.$numrow, $data->no_hp_ortu, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->nama_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->jenjang_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->status_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->npsn_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->lokasi_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->status_pendaftaran);
      $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->komp_ahli);
      $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->komp_ahli);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('BH'.$numrow, $data->no_hp_ayah, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('BI'.$numrow, $data->no_hp_ibu, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('BJ'.$numrow, $data->no_p_ujian, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('BK'.$numrow, $data->seri_ijaza, PHPExcel_Cell_DataType::TYPE_STRING);
      $excel->setActiveSheetIndex(0)->setCellValueExplicit('BL'.$numrow, $data->seri_skhus, PHPExcel_Cell_DataType::TYPE_STRING);


      $excel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AL'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AN'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AO'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AP'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AQ'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AR'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AS'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AT'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AU'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AV'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AW'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AX'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AY'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AZ'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BA'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BB'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BC'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BD'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BE'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BF'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BG'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BH'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BI'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BJ'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BK'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('BL'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }

    $excel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    // Set width kolom
    
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AK')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AL')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AM')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AN')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AO')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AP')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AR')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AS')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AT')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AU')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AV')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AW')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AX')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AY')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BA')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BB')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BC')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BD')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BE')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BF')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BG')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BH')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BI')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BK')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('BL')->setWidth(30);
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // $excel->getActiveSheet()->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Siswa");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Export Data Siswa.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2019');
    $write->save('php://output');
  }
}

