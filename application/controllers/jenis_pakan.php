<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jenis_pakan extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','form_validation'));
		$this->load->model('Jenis_pakan_model');
		$this->load->helper('MY_tiny_mce');
	}
	
	function index()
	{
		$data['title'] = "jenis pakan";
		$this->template_ui->display('page/jenis_pakan_list',$data);
	}
	function baru()
	{
		$data['detil_jp'] = array('jp_nama' => "",'jp_id' => "",'jp_keterangan' => "");
		$data['title']="tambah baru";
		$this->form_validation->set_rules('jp_nama','nama jenis pakan','required|max_length[40]');
		if ($this->form_validation->run()== FALSE) {
			$this->template_ui->display('page/jenis_pakan_form',$data);	
		} else
		{
			$this->Jenis_pakan_model->simpan_jenis_pakan();
			$this->session->set_flashdata('notifikasi','jenis pakan baru telah disimpan');
			redirect('jenis_pakan');
		}
	}
	function ubah($jp_id)
	{
		$this->access->is_admin();
		$data['status']="ubah";
		$data['title']="ubah";
		$data['detil_jp']=$this->Jenis_pakan_model->getJpDet($jp_id);
		$this->form_validation->set_rules('jp_nama','nama jenis pakan','required|max_length[40]');
		if ($this->form_validation->run()== FALSE) {
			$this->template_ui->display('page/jenis_pakan_form',$data);
		} else
		{
			$this->Jenis_pakan_model->update_jenis_pakan();
			$this->session->set_flashdata('notifikasi','jenis pakan telah diubah');
			redirect('jenis_pakan');
		}
		
	}
	function hapus($jp_id)
	{
		$this->access->is_admin();
		$this->Jenis_pakan_model->delete_jenis_pakan($jp_id);
		$this->session->set_flashdata('notifikasi','jenis pakan telah dihapus');
		redirect('jenis_pakan');
	}
}














