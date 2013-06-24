<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tentang extends Member_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template_ui'));
	}
	
	function index()
	{
		$data['title']="tentang aplikasi ini";
		$this->template_ui->display('page/tentang',$data);
	}
	
	function credits()
	{
		$data['title']="Credits";
		$this->template_ui->display('page/credits',$data);
	}
}