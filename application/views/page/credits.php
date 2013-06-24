<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>S.I.P.P | <?=$title?></title>
<link rel="icon" href="<?=base_url()?>yudha.ico">
<!-- HTML5 shiv -->
<link href="<?=base_url()?>assets/styles/reset.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/html5shiv-printshiv.js"></script>
<!-- end shiv -->
<link href="<?=base_url()?>assets/styles/chraven-ui.main.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/styles/chraven-color.<?=$_color?>.css" rel="stylesheet"/>

<link href="<?=base_url()?>assets/kendoui/css/kendo.common.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.<?=$_color?>.css" rel="stylesheet"/>

<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/kendoui/js/kendo.web.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/scripts/ttw-simple-notifications.js"></script>
<link href="<?=base_url()?>assets/styles/ttw-simple-notifications.css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready( function() {	
	var notifications = $('body').ttwSimpleNotifications();
	<?php if($this->session->flashdata('notifikasi')) {	?>
		notifications.show({msg:'<?php echo $this->session->flashdata('notifikasi')?>'});
  	<?php } ?>
});
</script>
</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a><?=$title?></a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content" class="tentang">
<ul style="list-style-type: circle;margin-left:20px;">
<li>Eclipse For PHP Developers, version 3.0.2 | <a href="http://www.eclipse.org">eclipse</a></li>
<li>XAMPP, version 1.7.7 | <a href="http://www.apachefriends.org/en/">apachefriends.org</a></li>
<li>Codeigniter, version 2.1.3 | <a href="http://codeigniter.com/">Ellislab, Inc.</a> </li>
<li>PHPExcel, version 1.7.8 | <a href="http://www.codeplex.com/PHPExcel">Codeplex</a> </li>
<li>Highcharts JS, version 2.3.3 | <a href="http://highcharts.com/">Torstein Hønsi</a> </li>
<li>jQuery, version 1.8.1 | <a href="http://jquery.com/">jquery javascript library</a> </li>
<li>jQuery-UI, version 1.8.24 | <a href="http://jqueryui.com/">jquery-ui</a></li>
<li>Kendo UI, version 2012.2.710 | <a href="http://kendoui.com">Telerik AD.</a></li>
<li>TTW-Simple-Notification | <a href="http://www.codebasehero.com/">codebasehero.com</a></li>
<li>Tiny MCE, version 3.5.7 | <a href="http://www.moxiecode.com/" target="_blank">Moxiecode Systems AB</a></li>
<li>jQuery Context Menu Plugin, version 1.01 | <a href="http://abeautifulsite.net/2008/09/jquery-context-menu-plugin/">Cory S.N. LaViska</a></li>
</ul>
</div>
<footer>
	<?=$_footer?>
</footer>
</article>
</section>
<aside id="right_sider">
<?=$_sider?>
</aside>
</div>
<div id="chraven-loader"></div>
<script>
	$(document).ready(function() {
    	$("#k-menu").kendoMenu();
    	$("#k-panel").kendoPanelBar();
    });
</script>
</body>
</html>
