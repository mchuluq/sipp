<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_data_model extends CI_Model
{
	//jenis pakan data
	function jenis_pakan_list($limit,$offset)
	{
		$query = $this->db->query("SELECT * FROM view_jenis_pakan ORDER BY jp_id DESC LIMIT $offset, $limit");
		return $query->result_array();
	}
	function jenis_pakan_count()
	{
		return $this->db->count_all_results('view_jenis_pakan');
	}	
	//stok pakan data
	function stok_pakan_list($limit,$offset)
	{
		$query = $this->db->query("SELECT * FROM view_stok_pakan ORDER BY sp_id DESC LIMIT $offset, $limit");
		return $query->result_array();
	}
	function stok_pakan_count()
	{
		return $this->db->count_all_results('view_stok_pakan');
	}
	//pakai pakan data
	function pakai_pakan_list($limit,$offset)
	{
		$query = $this->db->query("SELECT * FROM view_pakai_pakan ORDER BY pp_id DESC LIMIT $offset, $limit ");
		return $query->result_array();
	}
	function pakai_pakan_count()
	{
		return $this->db->count_all_results('view_pakai_pakan');
	}
	//all user data
	function user_list($limit,$offset)
	{
		$query = $this->db->query("SELECT * FROM user_member ORDER BY user_id DESC LIMIT $offset, $limit ");
		return $query->result_array();
	}
	function user_count()
	{
		return $this->db->count_all_results('user_member');
	}
	//view log data
	function log_list($limit,$offset)
	{
		$query = $this->db->query("SELECT * FROM view_log ORDER BY log_time DESC LIMIT $offset, $limit ");
		return $query->result_array();
	}
	function log_count()
	{
		return $this->db->count_all_results('view_log');
	}
}