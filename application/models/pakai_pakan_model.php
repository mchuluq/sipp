<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pakai_pakan_model extends CI_Model
{
	function get_jenis_pakan()
	{
		$query = $this->db->query("SELECT jp_id, jp_nama FROM tbl_jenis_pakan");
		return $query->result_array();
	}
	function simpan_pakai_pakan()
	{
		$jp = $this->input->post("jp_id");
		$tgl = $this->input->post("pp_tgl");
		$jam = $this->input->post("pp_jam");
		$pakai = $this->input->post("pp_jumlah_pakai");
		$user = $this->session->userdata('user_id');
		$time = now();
		mysql_query("INSERT INTO tbl_pakai_pakan(jp_id,pp_tgl,pp_jam,pp_jumlah_pakai,user_id,pp_time) VALUES('$jp','$tgl','$jam','$pakai','$user','$time') ");
	}
	function delete_pakai_pakan($id)
	{
		mysql_query("DELETE FROM tbl_pakai_pakan WHERE pp_id = '$id'");
	}
}
