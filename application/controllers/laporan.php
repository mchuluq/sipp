<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class laporan extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','Excel'));
		$this->load->helper(array('file'));
		$this->load->model('Laporan_model');
	}
	function index()
	{
		$data['title'] = "Laporan";
		$dir = APPPATH."../files/laporan";
		$data['file'] = get_filenames($dir);
		$this->template_ui->display('page/laporan',$data);
	}
	function hari_ini()
	{
		$data['title'] = "Aktifitas hari ini";
		$data['sp_today'] = $this->Laporan_model->sp_today();
		$data['pp_today'] = $this->Laporan_model->pp_today();
		$this->template_ui->display('page/laporan_today',$data);
	}
	function print_today()
	{
		$data['title'] = "Aktifitas hari ini :".date('l, F j, Y H:i');
		$data['sp_today'] = $this->Laporan_model->sp_today();
		$data['pp_today'] = $this->Laporan_model->pp_today();
		$this->load->view('page/print_today',$data);
	}
	function stok_hari_ini()
	{
		$data['title'] = "Stok Hari Ini ";
		$data['stok_hari_ini'] = $this->Laporan_model->stok_hari_ini();
		$this->template_ui->display('page/laporan_stok_pakan',$data);
	}
	function print_stok_today()
	{
		$data['title'] = "Stok Hari Ini : ".date('l, F j, Y H:i');
		$data['stok_hari_ini'] = $this->Laporan_model->stok_hari_ini();
		$this->template_ui->display('page/print_stok_today',$data);
	}
	function stok_hari_ini_excel()
	{
		$tgl = date('j F Y');
		$name = $this->session->userdata('user_nama');
		//initialize
		$this->excel->getProperties()->setCreator($name)
			->setLastModifiedBy($name)
			->setTitle("Stok Hari Ini")
			->setSubject("Stok pakan")
			->setDescription("Laporan Stok Pakan Harian")
			->setKeywords("stok pakan")
			->setCategory("stok pakan");
		//set template styling
		$this->excel->setActiveSheetIndex(0)
		->setCellValue('A1', 'stok hari ini : '.$tgl)
		->setCellValue('A2', 'Jenis Pakan')
		->setCellValue('B2', 'Sisa Stok');
		$this->excel->getActiveSheet()->mergeCells('A1:C1');
		$this->excel->getActiveSheet()->getStyle('A1:C1')->applyFromArray(
				array(
						'font'    => array('bold'=> true),
						'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
				)
		);
		$styleThinOutline = array(
				'borders' => array(
						'outline' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
								'color' => array('argb' => '000000'),
						),
				),
		);
		$this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('A2:B2')->getFont()->setBold(true);
		//fill "stok pakan" data
		$data = $this->Laporan_model->stok_hari_ini();
		$i = 3;
		foreach($data as $jp):
			$this->excel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $jp['jp_nama'])
				->setCellValue('B'.$i, $jp['jp_stok']." kg");
				$i++;
		endforeach;
		//data styling...
		$this->excel->getActiveSheet()->getStyle('A3:A'.$i)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('B3:B'.$i)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->setTitle('Stok hari ini');
		$this->excel->setActiveSheetIndex(0);
		//write excell file 
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save(APPPATH."../files/laporan/stok_pakan_".$tgl.".xls");
		$this->session->set_flashdata('notifikasi','laporan stok hari ini telah dibuat');
		redirect('laporan');
	}
	function hari_ini_excel()
	{
		$tgl = date('j F Y');
		$name = $this->session->userdata('user_nama');
		//initialize excel file
		$this->excel->getProperties()->setCreator($name)
			->setLastModifiedBy($name)
			->setTitle("Aktifitas Hari Ini")
			->setSubject("Aktifitas")
			->setDescription("Laporan Aktifitas Harian")
			->setKeywords("aktifitas harian")
			->setCategory("aktifitas");
		//set template
		$this->excel->setActiveSheetIndex(0)
		->setCellValue('A1', 'Aktifitas hari ini : '.$tgl)
		->setCellValue('A2', 'Penambahan Stok Pakan')
		->setCellValue('E2', 'Pemakaian Stok Pakan')
		->setCellValue('A3', 'Jenis')
		->setCellValue('B3', 'Jumlah Masuk')
		->setCellValue('C3', 'Oleh')
		->setCellValue('E3', 'Jenis')
		->setCellValue('F3', 'Jumlah Pakai')
		->setCellValue('G3', 'Oleh');
		//get data
		$pakai_pakan = $this->Laporan_model->pp_today();
		$stok_pakan = $this->Laporan_model->sp_today();
		//fill "stok pakan" data
		$i_sp = 4;
		foreach($stok_pakan as $sp):
		$this->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i_sp, $sp['jp_nama'])
			->setCellValue('B'.$i_sp, $sp['sp_jumlah_masuk'].' kg')
			->setCellValue('C'.$i_sp, $sp['user_nama']);
		$i_sp++;
		endforeach;
		//fill "pemakaian pakan" data
		$i_pp = 4;
		foreach($pakai_pakan as $pp):
			$this->excel->setActiveSheetIndex(0)
			->setCellValue('E'.$i_pp, $pp['jp_nama'])
			->setCellValue('F'.$i_pp, $pp['pp_jumlah_pakai'].' kg')
			->setCellValue('G'.$i_pp, $pp['user_nama']);
			$i_pp++;
		endforeach;
		//cell merging
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->mergeCells('A2:C2');
		$this->excel->getActiveSheet()->mergeCells('E2:G2');
		//cell styling
		$this->excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray(
				array(
						'font'    => array('bold'=> true),
						'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
				)
		);
		$this->excel->getActiveSheet()->getStyle('A2:C3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('E2:G3')->getFont()->setBold(true);
		//set border
		$styleThinOutline = array(
				'borders' => array(
						'outline' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
								'color' => array('argb' => '000000'),
						),
				),
		);
		//"stok pakan" styling...		
		$this->excel->getActiveSheet()->getStyle('A2:C2')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('A3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('B3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('C3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('A4:A'.$i_sp)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('B4:B'.$i_sp)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('C4:C'.$i_sp)->applyFromArray($styleThinOutline);
		//"pemakaian pakan" styling...
		$this->excel->getActiveSheet()->getStyle('E2:G2')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('E3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('F3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('G3')->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('E4:E'.$i_pp)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('F4:F'.$i_pp)->applyFromArray($styleThinOutline);
		$this->excel->getActiveSheet()->getStyle('G4:G'.$i_pp)->applyFromArray($styleThinOutline);
		//set title
		$this->excel->getActiveSheet()->setTitle('Aktifitas hari ini');
		$this->excel->setActiveSheetIndex(0);
		//write file
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save(APPPATH."../files/laporan/aktifitas_".$tgl.".xls");
		$this->session->set_flashdata('notifikasi','laporan aktifitas hari ini telah dibuat');
		redirect('laporan');
	}
	function pemakaian_pakan_excel()
	{
		$tgl = date('j F Y');
		$name = $this->session->userdata('user_nama');
		//initialize
		$this->excel->getProperties()->setCreator($name)
			->setLastModifiedBy($name)
			->setTitle("Catatan Pemakaian Pakan")
			->setSubject("pakai pakan")
			->setDescription("Laporan Pemakaian Pakan")
			->setKeywords("pakai pakan")
			->setCategory("pakai");
		//set template styling
		$this->excel->setActiveSheetIndex(0)
			->setCellValue('A1', 'pemakaian pakan hingga : '.$tgl)
			->setCellValue('A2', 'Jenis Pakan')
			->setCellValue('B2', 'Tanggal Pakai')
			->setCellValue('C2', 'Jam Pakai')
			->setCellValue('D2', 'Jumlah Pakai')
			->setCellValue('E2', 'Dicatat oleh');
		$this->excel->getActiveSheet()->mergeCells('A1:E1');
		$this->excel->getActiveSheet()->getStyle('A1:E1')->applyFromArray(
				array(
						'font'    => array('bold'=> true),
						'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
				)
		);
		$style = array(
				'borders' => array(
						'outline' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
								'color' => array('argb' => '000000'),
						),
				),
		);
		$this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('C2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('D2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($style);

		$this->excel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
		//fill "catatan pemakaian pakan" data
		$data = $this->Laporan_model->pemakaian_pakan();
		$i = 3;
		foreach($data as $pp):
		$this->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $pp['jp_nama'])
			->setCellValue('B'.$i, $pp['pp_tgl'])
			->setCellValue('C'.$i, $pp['pp_jam'])
			->setCellValue('D'.$i, $pp['pp_jumlah_pakai'].' kg')
			->setCellValue('E'.$i, $pp['user_nama']);
			$i++;
		endforeach;
		//data styling...
		$this->excel->getActiveSheet()->getStyle('A3:A'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('B3:B'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('C3:C'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('D3:D'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('E3:E'.$i)->applyFromArray($style);
		
		$this->excel->getActiveSheet()->setTitle('Pemakaian Pakan');
		$this->excel->setActiveSheetIndex(0);
		//write excell file
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save(APPPATH."../files/laporan/pemakaian_pakan_".$tgl.".xls");
		$this->session->set_flashdata('notifikasi','laporan pemakaian pakan telah dibuat');
		redirect('laporan');
	}
	function penambahan_stok_pakan_excel()
	{
		$tgl = date('j F Y');
		$name = $this->session->userdata('user_nama');
		//initialize
		$this->excel->getProperties()->setCreator($name)
		->setLastModifiedBy($name)
		->setTitle("Catatan Penambahan stok pakan")
		->setSubject("stok pakan")
		->setDescription("Laporan Penambahan Stok Pakan")
		->setKeywords("stok pakan")
		->setCategory("stok");
		//set template styling
		$this->excel->setActiveSheetIndex(0)
		->setCellValue('A1', 'penambahan stok pakan hingga : '.$tgl)
		->setCellValue('A2', 'Tanggal')
		->setCellValue('B2', 'No. Bukti')
		->setCellValue('C2', 'Jenis Pakan')
		->setCellValue('D2', 'Jumlah Masuk')
		->setCellValue('E2', 'Dicatat oleh');
		$this->excel->getActiveSheet()->mergeCells('A1:E1');
		$this->excel->getActiveSheet()->getStyle('A1:E1')->applyFromArray(
				array(
						'font'    => array('bold'=> true),
						'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
				)
		);
		$style = array(
				'borders' => array(
						'outline' => array(
								'style' => PHPExcel_Style_Border::BORDER_THIN,
								'color' => array('argb' => '000000'),
						),
				),
		);
		$this->excel->getActiveSheet()->getStyle('A2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('B2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('C2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('D2')->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('E2')->applyFromArray($style);
	
		$this->excel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);
		//fill "catatan pemakaian pakan" data
		$data = $this->Laporan_model->penambahan_stok_pakan();
		$i = 3;
		foreach($data as $sp):
		$this->excel->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $sp['sp_tgl'])
			->setCellValue('B'.$i, $sp['sp_no_bukti'])
			->setCellValue('C'.$i, $sp['jp_nama'])
			->setCellValue('D'.$i, $sp['sp_jumlah_masuk'].' kg')
			->setCellValue('E'.$i, $sp['user_nama']);
			$i++;
		endforeach;
		//data styling...
		$this->excel->getActiveSheet()->getStyle('A3:A'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('B3:B'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('C3:C'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('D3:D'.$i)->applyFromArray($style);
		$this->excel->getActiveSheet()->getStyle('E3:E'.$i)->applyFromArray($style);
	
		$this->excel->getActiveSheet()->setTitle('Penambahan Stok Pakan');
		$this->excel->setActiveSheetIndex(0);
		//write excell file
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$objWriter->save(APPPATH."../files/laporan/penambahan_stok_pakan_".$tgl.".xls");
		$this->session->set_flashdata('notifikasi','laporan penambahan stok pakan telah dibuat');
		redirect('laporan');
	}
	
	
}














