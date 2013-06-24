<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pakai_pakan extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','form_validation'));
		$this->load->model('Pakai_pakan_model');
	}
	function index()
	{
		$data['title']="data pemakaian pakan";
		$this->template_ui->display('page/pakai_pakan_list',$data);
	}
	function baru()
	{
		$data['pp_tgl'] = date("Y-m-d");
		$data['pp_jam'] = date("H:i");
		$data['jenis']=$this->Pakai_pakan_model->get_jenis_pakan();
		$data['title']="pakai";
		$this->form_validation->set_rules('jp_id','jenis pakan','required|max_length[40]');
		$this->form_validation->set_rules('pp_tgl','tanggal','required');
		$this->form_validation->set_rules('pp_jam','jam','required');
		$this->form_validation->set_rules('pp_jumlah_pakai','jumlah pemakaian','required|max_length[15]');
		if ($this->form_validation->run()== FALSE) {
			$this->template_ui->display('page/pakai_pakan_form',$data);
		} else
		{
			$this->Pakai_pakan_model->simpan_pakai_pakan();
			$this->session->set_flashdata('notifikasi','pemakaian pakan telah di catat');
			redirect('pakai_pakan');
		}
	}
	function hapus($id)
	{
		$this->access->is_admin();
		$this->Pakai_pakan_model->delete_pakai_pakan($id);
		$this->session->set_flashdata('notifikasi','catatan pemakaian pakan telah di hapus');
		redirect('pakai_pakan');
	}
}
