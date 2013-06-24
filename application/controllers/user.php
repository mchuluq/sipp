<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','template_ui'));
		$this->load->model('User_model');
	}
	function index()
	{
		$this->access->is_admin();
		$data['title'] = "semua user";
		$this->template_ui->display('page/user_list',$data);
	}
	function login()
	{
		$data['title']="Login";
		$this->form_validation->set_rules('username','Username','required|maxlength[20]');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('page/login_page',$data);
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$log = $this->access->login($username, $password);
			switch ($log)
			{
				case "not_found":
					$this->session->set_flashdata('log_stat','user name tidak dikenal');
					redirect("user/login");
					break;
				case "fail":
					$this->session->set_flashdata('log_stat','password salah');
					redirect("user/login");
					break;
				case "success":
					$this->session->set_flashdata('log_stat','password salah');
					redirect("dashboard");
					break;
				default:
					$this->session->set_flashdata('log_stat','unknown error');
					redirect("user/login");
					break;
			}
		}
	}
	function logout()
	{
		$this->access->logout();
		$this->session->set_flashdata('log_stat','anda telah logout');
		redirect("user/login");
	}
	function profile()
	{
		$data['tema'] = $this->session->userdata('user_tema');
		$data['nama'] = $this->session->userdata('user_nama');
		$data['title']="profile";
		$this->template_ui->display('page/profile',$data);
	}
	function update_profile()
	{
		$this->form_validation->set_rules('um_nama','username','required|maxlength[20]');
		$this->form_validation->set_rules('um_tema','tema','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('user/profile');
		}
		else
		{
			$this->User_model->update_profile();
			$this->session->set_flashdata('notifikasi','profile anda telah diubah');
			redirect('user/profile');
		}
	}
	function update_password()
	{
		$this->form_validation->set_rules('new_pass1','password baru','required|maxlength[20]');
		$this->form_validation->set_rules('new_pass2','re-type password','matches[new_pass1]|required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('user/profile');
		}
		else
		{
			$pass = $this->input->post("new_pass1");
			$cyrpted = $this->access->chraven_crypt($pass);
			$this->User_model->update_password();
			$this->session->set_flashdata('notifikasi','password anda telah diubah');
			redirect('user/profile');
		}
	}
	function  baru()
	{
		$this->access->is_admin();
		$data['title']="pengguna baru";
		$this->form_validation->set_rules('um_nama','username','required|maxlength[20]');
		$this->form_validation->set_rules('um_level','hak akses','required');
		$this->form_validation->set_rules('new_pass1','password baru','required|maxlength[20]');
		$this->form_validation->set_rules('new_pass2','re-type password','matches[new_pass1]|required');
		if($this->form_validation->run() == FALSE)
		{
			$this->template_ui->display('page/user_form',$data);
		}
		else
		{
			$this->User_model->user_baru();
			$this->session->set_flashdata('notifikasi','user baru telah ditambahkan');
			redirect('user');
		}
	}
	function hapus($id)
	{
		$this->access->is_admin();
		$this->User_model->user_delete($id);
		$this->session->set_flashdata('notifikasi','user telah dihapus');
		redirect('user');
	}
	function ubah_hak_akses($id)
	{
		$this->access->is_admin();
		$this->User_model->change_level($id);
		$this->session->set_flashdata('notifikasi','hak akses user telah diubah');
		redirect('user');
	}
}









