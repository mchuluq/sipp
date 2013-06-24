<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		if(!$this->access->is_login())
		{
			redirect('user/login');
		}
	}	
	
	function is_login()
	{
		return $this->access->is_login();
	}
}

class MY_Controlller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
}