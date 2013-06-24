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

</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>tentang</a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content" class="tentang">
<h2>Sistem Informasi Persediaan Pakan Ternak</h2>
<hr/>
<p class="main">Aplikasi ini dibuat untuk tujuan memenuhi tugas Praktek Kerja Nyata <strong><a href="http://www.yudharta.ac.id">Univesitas Yudharta Pasuruan</a></strong> tahun 2012 fakultas Teknik program studi Teknik Informatika di <strong>PT. Egindo Pratama Farm</strong>.</p>
<p class="main">Aplikasi berbasis web ini di bangun dengan menggunakan bahasa pemograman PHP dengan database MySQL untuk mengelola persediaan pakan ternak di <strong>PT. Egindo Pratama Farm</strong>.</p>
<p style="font-size:80%">copyright &copy; 2012 Mochammad Chusnul Chuluq (2009.69.04.0018)</p>
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
