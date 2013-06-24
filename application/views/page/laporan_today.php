<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>S.I.P.P | <?php echo $title;?></title>
<link rel="icon" href="<?=base_url()?>yudha.ico">
<!-- HTML5 shiv -->
<link href="<?=base_url()?>assets/styles/reset.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/html5shiv-printshiv.js"></script>
<!-- end shiv -->
<link href="<?=base_url()?>assets/styles/chraven-ui.main.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/styles/chraven-color.<?=$_color?>.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/styles/ttw-simple-notifications.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.common.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.<?=$_color?>.css" rel="stylesheet"/>

<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/kendoui/js/kendo.web.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery.contextMenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/ttw-simple-notifications.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/chraven-ajax.js"></script>
<script type="text/javascript">
$(document).ready( function() {	
	var notifications = $('body').ttwSimpleNotifications();
	<?php if($this->session->flashdata('notifikasi')) {	?>
		notifications.show({msg:'<?php echo $this->session->flashdata('notifikasi')?>'});
  	<?php } ?>
         
	$.ajax({
	      url: "<?=base_url()?>ajax_data/jenis_pakan_list",
	  		success:function(data)
	  		{
	  			$('#divPageData').html(data);
	  		}
	    });
});
</script>
</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>laporan</a> &raquo; <a><?=$title?></a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3>Laporan Aktifitas Harian</h3>
</header>
<div id="main_content">
<table class="report_today">
<thead>
	<tr>
		<th>Penambahan Stok Pakan</th>
		<th>Pemakaian Pakan</th>
	</tr>
</thead>
<tbody>
	<tr>
	<td>
		<ul>
		<?php foreach($sp_today as $sp): ?>
			<li>
				<strong><?=$sp['jp_nama']?></strong>, dicatat oleh : <?=$sp['user_nama']?><br/>
				<abbr>jumlah masuk : <?=$sp['sp_jumlah_masuk']?> kg</abbr>
			</li>
		<?php endforeach ?>
		</ul>
	</td>
	<td>
		<ul>
		<?php foreach($pp_today as $pp): ?>
			<li>
				<strong><?=$pp['jp_nama']?></strong>, di catat oleh: <?=$pp['user_nama']?><br/>
				<abbr>jumlah pakai <?=$pp['pp_jumlah_pakai']?> kg</abbr>				
			</li>
		<?php endforeach ?>
		</ul>
	</td>	
	</tr>
</tbody>
</table>
<div class="data-prop" style="text-align:right">
<a class="k-button" href="<?=base_url()?>laporan/print_today">bentuk cetak</a>
</div>
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
<script>
	$(document).ready(function() {
    	$("#k-menu").kendoMenu();
    	$("#k-panel").kendoPanelBar();
    	$("#k-select").kendoDropDownList();
    });
</script>
</body>
</html>
