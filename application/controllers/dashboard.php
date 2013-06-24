<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui','user_agent'));
	}
	
	function index()
	{
		$data['title']="dashboard";
		$this->template_ui->display('page/dashboard',$data);
	}
	
	function view_log()
	{
		$this->access->is_admin();
		$data['title'] = "Aktifitas";
		$this->template_ui->display('page/log_list',$data);
	}
}