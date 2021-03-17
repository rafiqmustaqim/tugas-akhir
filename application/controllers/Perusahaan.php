<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Perusahaan extends CI_Controller{


	function __construct(){
		parent:: __construct();
		$this->load->model('Perusahaan_model');
		$this->load->model('User_model');


	}

	public function getPerusahaan(){
		$data['title'] = "SIPKM | Data Perusahaan ";
		$level = $this->session->userdata('level');
		$data['permintaan'] = $this->Perusahaan_model->get_permintaan_perusahaan();
		$data['penawaran'] = $this->Perusahaan_model->get_penawaran_perusahaan();

		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_perusahaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	/*permintaan perusahaan*/
	public function permintaanPerusahaan(){
		$data['title'] = "SIPKM | Permintaan Perusahaan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Perusahaan_model->get_permintaan_perusahaan();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_permintaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function detailPermintaan($id_perusahaan){
		$data['title'] = "SIPKM | Detail Permintaan Perusahaan ";
		$level = $this->session->userdata('level');
		$data['permintaan'] = $this->Perusahaan_model->get_detail_permintaan($id_perusahaan);
		$data['proses_penempatan'] = $this->Perusahaan_model->get_proses_by_permintaan($id_perusahaan);

		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_detail_permintaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	/*penawaran perusahaan*/
	public function penawaranPerusahaan(){
		$data['title'] = "SIPKM | Penawaran Perusahaan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Perusahaan_model->get_penawaran_perusahaan();
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_penawaran',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function detailPenawaran($id_perusahaan){
		$data['title'] = "SIPKM | Detail Penawaran ";
		$level = $this->session->userdata('level');
		$data['penawaran'] = $this->Perusahaan_model->get_penawaran_perusahaan_by_id($id_perusahaan);
		$data['proses_penempatan'] = $this->Perusahaan_model->get_proses_by_penawaran($id_perusahaan);

		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/v_detail_penawaran',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function formTambah(){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Tambah Data Perusahaan ";
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/form_tambah_perusahaan');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}


	public function formEdit($id_perusahaan){
		$level = $this->session->userdata('level');
		$data['title'] = "SIPKM | Edit Data Perusahaan ";
		$data['data'] = $this->Perusahaan_model->get_perusahaan_by_id($id_perusahaan);
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/Perusahaan/form_edit_perusahaan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function addPerusahaan(){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Perusahaan_model->add_perusahaan();
			$this->session->set_flashdata('msg','ditambahkan!');
			redirect('Perusahaan/getPerusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function editPerusahaan($id_perusahaan){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Perusahaan_model->edit_perusahaan($id_perusahaan);
			$this->session->set_flashdata('msg','diubah!');

			redirect('Perusahaan/getPerusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function deletePerusahaan($id_perusahaan){
		$level = $this->session->userdata('level');
		if($level === 'ADM' || $level === 'KABID' || $level === 'STAF'){
			$this->Perusahaan_model->delete_perusahaan($id_perusahaan);
			$this->session->set_flashdata('msg','dihapus!');

			redirect('Perusahaan/getPerusahaan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}



	public function export_permintaan_perusahaan(){
    // Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
		$excel = new PHPExcel();
    // Settingan awal fil excel
		$excel->getProperties()->setCreator('Rafiq Mustaqim')
		->setLastModifiedBy('Admin')
		->setTitle("Data Permintaan Perusahaan")
		->setSubject("Perusahaan")
		->setDescription("Laporan Permintaan Perusahaan")
		->setKeywords("Data Permintaan Perusahaan");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PERMINTAAN PERUSAHAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Perusahaan"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Alamat"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Permintaan Via"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Contact Person"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Jabatan"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Telepon/Fax"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Email"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Posisi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "Kriteria"); // Set kolom E3 dengan tulisan "ALAMAT"



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
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $permintaan = $this->Perusahaan_model->export_permintaan_perusahaan();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($permintaan as $data){ // Lakukan looping pada variabel siswa
    	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_perusahaan);
    	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat);
    	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->permintaan_via);
    	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->contact_person);
    	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jabatan);
    	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->telepon);
    	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->email);
    	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->posisi);
    	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kriteria);

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

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
  }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(45); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(60);


    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Permintaan");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Permintaan.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
}




public function export_penawaran_perusahaan(){
    // Load plugin PHPExcel nya
	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
	$excel = new PHPExcel();
    // Settingan awal fil excel
	$excel->getProperties()->setCreator('Rafiq Mustaqim')
	->setLastModifiedBy('Admin')
	->setTitle("Data Penawaran Perusahaan")
	->setSubject("Perusahaan")
	->setDescription("Laporan Penawaran Perusahaan")
	->setKeywords("Data Penawaran Perusahaan");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENAWARAN PERUSAHAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Perusahaan"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Alamat"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Permintaan Via"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Contact Person"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Jabatan"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Telepon/Fax"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Email"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Posisi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "Kriteria"); // Set kolom E3 dengan tulisan "ALAMAT"



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
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $permintaan = $this->Perusahaan_model->export_penawaran_perusahaan();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($permintaan as $data){ // Lakukan looping pada variabel siswa
    	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_perusahaan);
    	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat);
    	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->permintaan_via);
    	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->contact_person);
    	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jabatan);
    	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->telepon);
    	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->email);
    	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->posisi);
    	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kriteria);

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

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
  }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(45); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(60);


    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Penawaran");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Penawaran.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
}






}


?>