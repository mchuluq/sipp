<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function app_config_dpp()
{
	$query = mysql_query("SELECT data_per_page FROM app_config");
	$hasil = mysql_fetch_array($query);
	return $hasil[0];
}
