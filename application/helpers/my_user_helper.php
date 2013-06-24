<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function get_uid()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_level');
}
function get_username()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_nama');	 
}
function get_level()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_level');	
}
function get_theme()
{
	$CI =& get_instance();
 	return $CI->session->userdata('user_tema');	 
}
function get_widget($data)
{
	$CI =& get_instance();
	$wtitle = str_replace(" ", "", $data);
	$CI->load->view('widget/'.$wtitle);
}