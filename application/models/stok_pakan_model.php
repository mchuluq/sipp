<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stok_pakan_model extends CI_Model
{
	function simpan_stok_pakan()
	{
		$jp_id = $this->input->post("jp_id");
		$sp_no_bukti = $this->input->post("sp_no_bukti");
		$sp_tgl = $this->input->post("sp_tgl");
		$sp_jumlah = $this->input->post("sp_jumlah_masuk");
		$sp_ket = $this->input->post("sp_keterangan");
		$user_id = $this->session->userdata('user_id');
		$time = now();
		mysql_query("INSERT INTO tbl_stok_pakan(jp_id,sp_no_bukti,sp_tgl,sp_jumlah_masuk,sp_keterangan,user_id,sp_time)	VALUES('$jp_id','$sp_no_bukti','$sp_tgl','$sp_jumlah','$sp_ket','$user_id','$time')");
	}
	
	function get_jenis_pakan()
	{
		$query = $this->db->query("SELECT jp_id, jp_nama FROM tbl_jenis_pakan");
		return $query->result_array();
	}
	
	function delete_stok_pakan($id)
	{
		mysql_query("DELETE FROM tbl_stok_pakan WHERE sp_id='$id'");
	}
}