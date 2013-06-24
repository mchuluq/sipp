<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model
{
	function get_app_config()
	{
		$query = mysql_query("SELECT * FROM app_config");
		$result = mysql_fetch_array($query);
		return $result;
	}
	function update_config()
	{
		$dpp = $this->input->post("conf_dpp");
		$ms = $this->input->post("conf_ms");
		mysql_query("UPDATE app_config SET data_per_page = '$dpp',min_stok = '$ms' ");
	}
}

