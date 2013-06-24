<?php
function _clean($str){
	$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($str,ENT_QUOTES))));
	return $filter;
}
