<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
	function update_profile()
	{
		$id = $this->session->userdata('user_id');
		$nama = $this->input->post("um_nama");
		$tema = $this->input->post("um_tema");
		mysql_query("UPDATE user_member SET user_nama='$nama',user_tema='$tema' WHERE user_id ='$id'");
		$data = array('user_nama' => $nama,'user_tema' => $tema);
		$this->session->set_userdata($data);
	}
	
	function update_password()
	{
		$id = $this->session->userdata('user_id');
		$pass = $this->input->post("new_pass1");
		$crypted = $this->access->chraven_crypt($pass);
		mysql_query("UPDATE user_member SET user_password='$crypted' WHERE user_id ='$id'");
	}
	function user_baru()
	{
		$nama = $this->input->post('um_nama');
		$level = $this->input->post('um_level');
		$pass = $this->input->post("new_pass1");
		$crypted = $this->access->chraven_crypt($pass);
		mysql_query("INSERT INTO user_member(user_nama,user_level,user_password) VALUES('$nama','$level','$crypted')");
	}
	function user_delete($id)
	{
		mysql_query("DELETE FROM user_member WHERE user_id='$id'");
	}
	function change_level($id)
	{
		$check = mysql_query("SELECT user_level FROM user_member WHERE user_id='$id'");
		$status = mysql_fetch_array($check);
		switch ($status['user_level']){
			case "admin" :
				$query = mysql_query("UPDATE user_member SET user_level = 'user' WHERE user_id='$id'");
				break;
			case "user" :
				$query = mysql_query("UPDATE user_member SET user_level = 'admin' WHERE user_id='$id'");
				break;
		}
	}
	
}
