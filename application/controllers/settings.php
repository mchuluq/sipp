<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class settings extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','form_validation'));
		$this->load->model('Settings_model');
		$this->access->is_admin();
	}
	function index()
	{
		$data['title']="pengaturan";
		$data['conf']=$this->Settings_model->get_app_config();
		$this->template_ui->display('page/settings',$data);
	}
	function update_config()
	{
		$this->form_validation->set_rules('conf_dpp','tampilan per halaman','numeric|required|greater_than[1]|less_than[20]');
		$this->form_validation->set_rules('conf_ms','stok minimal','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('settings');
		}
		else
		{
			$this->Settings_model->update_config();
			$this->session->set_flashdata('notifikasi','pengaturan aplikasi telah disimpan');
			redirect('settings');
		}
	}
}