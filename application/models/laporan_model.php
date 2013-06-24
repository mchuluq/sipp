<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan_model extends CI_Model
{
	function sp_today()
	{
		$tgl = date("Y-m-d");
		$query = $this->db->query("SELECT * FROM view_stok_pakan WHERE sp_tgl ='$tgl' ");
		return $query->result_array();
	}
	function pp_today()
	{
		$tgl = date("Y-m-d");
		$query = $this->db->query("SELECT * FROM view_pakai_pakan WHERE pp_tgl ='$tgl' ");
		return $query->result_array();
	}
	function stok_hari_ini()
	{
		$query = $this->db->query("SELECT jp_nama,jp_stok FROM tbl_jenis_pakan");
		return $query->result_array();
	}
	
	function penambahan_stok_pakan()
	{
		$query = $this->db->query("SELECT * FROM view_stok_pakan ORDER BY sp_id DESC");
		return $query->result_array();
	}
	function pemakaian_pakan()
	{
		$query = $this->db->query("SELECT * FROM view_pakai_pakan ORDER BY pp_id DESC");
		return $query->result_array();
	}
	
	
	
	function files_in_dir()
	{
		$dir = APPPATH."../files/laporan/";
		if($handle = opendir($dir)){
			while(false !== ($file = readdir($handle))){
			if($file !== "." && $file != ".."){	
				$file[] = $file;
			}
		}
			closedir($handle);
		}	
		return $file;
	}
}

