<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template_ui
{
	
	function __construct()
	{
		$this->_ci =& get_instance();
	}
	
	function is_ajax()
	{
		return ($this->_ci->input->server('HTTP_X_REQUESTED_WITH')&&($this->_ci->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
	}
	
	function display($page,$data=null)
	{
		if(!$this->is_ajax())
		{
			$data['_sider']=$this->_ci->load->view('template/side_menu',$data, true);
			$data['_header']=$this->_ci->load->view('template/head_menu',$data, true);
			$data['_footer']=$this->_ci->load->view('template/footer',$data, true);
			$data['_color']=$this->_ci->session->userdata('user_tema');
			$this->_ci->load->view($page,$data);
		}
		else
		{	
			$this->_ci->load->view($template,$data);
		}
	}
}
