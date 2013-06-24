<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class stok_pakan extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','form_validation'));
		$this->load->model('Stok_pakan_model');
		$this->load->helper('MY_tiny_mce');
	}
	
	function index()
	{
		$data['title'] = "catatan stok pakan";
		$this->template_ui->display('page/stok_pakan_list',$data);
	}
	function baru()
	{
		$data['sp_tgl'] = date("Y-m-d");
		$data['jenis']=$this->Stok_pakan_model->get_jenis_pakan();
		$data['title']="tambah stok";
		$this->form_validation->set_rules('jp_id','jenis pakan','required|max_length[40]');
		$this->form_validation->set_rules('sp_tgl','nama jenis pakan','required');
		$this->form_validation->set_rules('sp_jumlah_masuk','nama jenis pakan','required|max_length[15]');
		if ($this->form_validation->run()== FALSE) {
			$this->template_ui->display('page/stok_pakan_form',$data);
		} else
		{
			$this->Stok_pakan_model->simpan_stok_pakan();
			$this->session->set_flashdata('notifikasi','penambahan stok pakan telah di catat');
			redirect('stok_pakan');
		}
	}
	function hapus($sp_id)
	{
		$this->access->is_admin();
		$this->Stok_pakan_model->delete_stok_pakan($sp_id);
		$this->session->set_flashdata('notifikasi','catatan stok pakan telah dihapus');
		redirect('stok_pakan');
	}
}
