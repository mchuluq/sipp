<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jenis_pakan_model extends CI_Model
{
	function simpan_jenis_pakan()
	{
		$jp_nama = $this->input->post("jp_nama");
		$jp_keterangan = $this->input->post("jp_keterangan");
		$user_id = $this->session->userdata('user_id');
		$query=mysql_query("INSERT INTO tbl_jenis_pakan(jp_nama,jp_keterangan,user_id) VALUES('$jp_nama','$jp_keterangan','$user_id')");
	}
	function getJpDet($jp_id)
	{
		$query = mysql_query("SELECT * FROM tbl_jenis_pakan WHERE jp_id = '$jp_id'");
		$result = mysql_fetch_array($query);
		return $result;
	}
	function update_jenis_pakan()
	{
		$jp_nama = $this->input->post("jp_nama");
		$jp_keterangan = $this->input->post("jp_keterangan");
		$jp_id = $this->input->post("jp_id");
		$query=mysql_query("UPDATE tbl_jenis_pakan SET jp_nama='$jp_nama' ,jp_keterangan='$jp_keterangan' WHERE jp_id = '$jp_id'");
	}
	function delete_jenis_pakan($jp_id)
	{
		$query=mysql_query("DELETE FROM tbl_jenis_pakan WHERE jp_id='$jp_id'");
	}
}

