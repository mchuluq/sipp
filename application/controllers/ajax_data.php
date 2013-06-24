<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ajax_data extends Member_Controller
{
	//constructor dan pengecekan hanya untuk method ajax
	function __construct()
	{
		parent::__construct();
		$this->_ci =& get_instance();
		$this->load->library(array('template_ui','form_validation'));
		$this->load->helper(array('MY_app_config'));
		$this->load->model(array('ajax_data_model'));
		$this->dpp = app_config_dpp();
		if(!$this->is_ajax_page())
		{
			show_404();
		};
	}
	
	private function is_ajax_page()
	{
		return ($this->_ci->input->server('HTTP_X_REQUESTED_WITH')&&($this->_ci->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
	}	
	// jenis pakan list
	function jenis_pakan_list($offset = 0)
	{
		if (empty($offset)) $offset = 0;
		$data['data']= $this->ajax_data_model->jenis_pakan_list($this->dpp, $offset);
		$this->load->library('pagination');
			$config['base_url'] = site_url('ajax_data/jenis_pakan_list');
			$config['total_rows'] = $this->ajax_data_model->jenis_pakan_count();
			$config['per_page'] = $this->dpp;
			$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['jumlah']=$this->ajax_data_model->jenis_pakan_count();
		$this->load->view('ajax_data/jenis_pakan_list',$data);
	}
	//stok pakan list
	function stok_pakan_list($offset = 0)
	{
		if (empty($offset)) $offset = 0;
		$data['data']= $this->ajax_data_model->stok_pakan_list($this->dpp, $offset);
		$this->load->library('pagination');
			$config['base_url'] = site_url('ajax_data/stok_pakan_list');
			$config['total_rows'] = $this->ajax_data_model->stok_pakan_count();
			$config['per_page'] = $this->dpp;
			$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['jumlah']=$this->ajax_data_model->stok_pakan_count();
		$this->load->view('ajax_data/stok_pakan_list',$data);
	}
	//pakai pakan list
	function pakai_pakan_list($offset=0)
	{
		if (empty($offset)) $offset = 0;
		$data['data']= $this->ajax_data_model->pakai_pakan_list($this->dpp, $offset);
		$this->load->library('pagination');
			$config['base_url'] = site_url('ajax_data/pakai_pakan_list');
			$config['total_rows'] = $this->ajax_data_model->pakai_pakan_count();
			$config['per_page'] = $this->dpp;
			$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['jumlah']=$this->ajax_data_model->pakai_pakan_count();
		$this->load->view('ajax_data/pakai_pakan_list',$data);
	}
	//user list
	function user_list($offset=0)
	{
		if (empty($offset)) $offset = 0;
		$data['data']= $this->ajax_data_model->user_list($this->dpp, $offset);
		$this->load->library('pagination');
			$config['base_url'] = site_url('ajax_data/user_list');
			$config['total_rows'] = $this->ajax_data_model->user_count();
			$config['per_page'] = $this->dpp;
			$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['jumlah']=$this->ajax_data_model->user_count();
		$this->load->view('ajax_data/user_list',$data);
	}
	//log data
	function log_list($offset=0)
	{
		if (empty($offset)) $offset = 0;
		$data['data']= $this->ajax_data_model->log_list($this->dpp, $offset);
		$this->load->library('pagination');
			$config['base_url'] = site_url('ajax_data/log_list');
			$config['total_rows'] = $this->ajax_data_model->log_count();
			$config['per_page'] = $this->dpp;
			$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['jumlah']=$this->ajax_data_model->log_count();
		$this->load->view('ajax_data/log_list',$data);
	}
	//update widget di dashboard
	function update_widget()
	{
		if(!$_POST["data"]){
			echo "Invalid data";
			exit;
		}
		$data=json_decode($_POST["data"]);
		foreach($data->items as $item)
	{
		$col_id=preg_replace('/[^\d\s]/', '', $item->column);
		$widget_id=preg_replace('/[^\d\s]/', '', $item->id);
		$sql="UPDATE i_widget SET column_id='$col_id', sort_no='".$item->order."', collapsed='".$item->collapsed."' WHERE id='".$widget_id."'";
		mysql_query($sql) or die('Error updating widget DB');
	}
		echo "success";
	}
}








