<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Penempatan_model');
		$this->load->model('Mahasiswa_model');
		$this->load->model('User_model');

	}



	public function prosesPenempatan(){
		$data['title'] = "SIPKM | Proses Penempatan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Penempatan_model->get_proses_penempatan();
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/penempatan/v_proses_penempatan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function progresPenempatan(){
		$data['title'] = "SIPKM | Progres Penempatan ";
		$level = $this->session->userdata('level');
		$data['data'] = $this->Penempatan_model->get_progres_penempatan();
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/penempatan/v_progres_penempatan',$data);
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formProsesPenempatan(){
		$data['title'] = "SIPKM | Form Proses Penempatan ";
		$level = $this->session->userdata('level');
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/penempatan/form_proses_penempatan');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function formEditProsesPenempatan($id){
		$data['title'] = "SIPKM | Edit Proses Penempatan ";
		$data['data'] = $this->Penempatan_model->get_proses_penempatan_by_id($id);
		$level = $this->session->userdata('level');
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/penempatan/edit_proses_penempatan');
			$this->load->view('templates/footer');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}
	}

	public function addProsesPenempatan(){
		$level = $this->session->userdata('level');
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->Penempatan_model->add_proses_penempatan();
			$this->session->set_flashdata('sukses','ditambahkan!');
			redirect('Penempatan/prosesPenempatan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}

	}

	public function editProsesPenempatan($id){
		$level = $this->session->userdata('level');
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->Penempatan_model->edit_proses_penempatan($id);
			$this->session->set_flashdata('sukses','diubah!');
			redirect('Penempatan/prosesPenempatan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}

	}

	public function deleteProsesPenempatan($id){
		$level = $this->session->userdata('level');
		if($level == 'ADM' || $level == 'KABID' || $level == 'STAF'){
			$this->Penempatan_model->delete_proses_penempatan($id);
			$this->session->set_flashdata('sukses','dihapus!');

			redirect('Penempatan/prosesPenempatan');
		}else{
			echo "<script> alert('access denied!') </script>";
			redirect('admin');
		}

	}

	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('mahasiswa')->like('nama_mahasiswa',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_mahasiswa,
				'nim'	=>$row->nim,
				// 'jurusan'	=>$row->jurusan

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

	function get_mahasiswa(){
		if (isset($_GET['term'])) {
			$result = $this->Penempatan_model->search_mahasiswa($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'label'         => $row->nama_mahasiswa,
						'nim'   => $row->nim,
					);
				echo json_encode($arr_result);
			}elseif(count($result) < 0 ){
				foreach ($result as $row)
					$arr_result[] = array(
						'label'         => 'data tidak ditemukan',
						
					);
				echo json_encode($arr_result);
			}
		}
	}

	public function get_perusahaan(){
		if (isset($_GET['term'])) {
			$result = $this->Penempatan_model->search_perusahaan($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'label'         => $row->nama_perusahaan,
						'id_perusahaan'   => $row->id_perusahaan,
					);
				echo json_encode($arr_result);
			}
		}
	}



	public function export_progres_penempatan(){
    // Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
		$excel = new PHPExcel();
    // Settingan awal fil excel
		$excel->getProperties()->setCreator('Rafiq Mustaqim')
		->setLastModifiedBy('Admin')
		->setTitle("Data Progres Penempatan Perusahaan")
		->setSubject("Perusahaan")
		->setDescription("Laporan Progres Penempatan")
		->setKeywords("Data Progres Penempatan");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PROGRES PENEMPATAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Mahasiswa"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Perusahaan"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Tanggal Proses CV"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "Tanggal Diterima"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "Posisi"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Gaji"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Status");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Keterangan");



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

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $progres = $this->Penempatan_model->export_progres();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($progres as $data){ // Lakukan looping pada variabel siswa
    	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
    	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_mahasiswa);
    	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_perusahaan);
    	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, date('d M Y', strtotime($data->tgl_proses)));
    	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date('d M Y', strtotime($data->tgl_diterima)));
    	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->posisi_dilamar);
    	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->gaji);
    	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->status);
    	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, ucfirst($data->keterangan));

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

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
  }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);


    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Progres Penempatan");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Progres Penempatan.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
}









}
?>