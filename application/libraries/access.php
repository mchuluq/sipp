<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Access
{
	public $user;
	
	function __construct()
	{
		$this->CI =& get_instance();
	}
	
	function login($username,$password)
	{
		$crypted_pass = $this->chraven_crypt($password);
		$query = mysql_query("SELECT * FROM user_member WHERE user_nama = '$username'");
		$result = mysql_numrows($query);
		$data = mysql_fetch_array($query);
		if($result != 1)
		{
			$log = "not_found";
			return $log;
		}elseif($data['user_password'] == $crypted_pass )
		{	
			$logData = array(
					'user_id' => $data['user_id'],
					'user_nama' => $data['user_nama'],
					'user_level' => $data['user_level'],
					'user_tema' => $data['user_tema']);
			$this->CI->session->set_userdata($logData);
			$log = "success";
			return $log;
		}
		else
		{
			$log = "fail";
			return $log;
		}
		
	}
	
	function is_login()
	{
		return (($this->CI->session->userdata('user_id'))? TRUE : FALSE);
	}
	
	function is_admin()
	{
		if(!($this->CI->session->userdata('user_level') == "admin"))
		{
			show_error('Anda membutuhkan hak Administrator untuk mengakses halaman ini');
		}
	}
	
	function logout()
	{
		$this->CI->session->sess_destroy();
	}
	
	function chraven_crypt($string)
	{
		$this->CI =& get_Instance();
		$key = $this->CI->config->item('encryption_key');
		$key2 = md5($string);
		$encrypted = sha1($key.$key2);
		return $encrypted;
	}
}
