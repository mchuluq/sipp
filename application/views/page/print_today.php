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
<link href="<?=base_url()?>assets/styles/print.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.common.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.<?=$this->session->userdata('user_tema')?>.css" rel="stylesheet"/>

<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/kendoui/js/kendo.web.min.js"></script>

</head>
<body>
<div id="content">
<a id="print-button" onclick="window.print()">cetak</a>
<h1><?="Laporan Aktifitas Harian : ".date('l, F j, Y H:i')?></h1>
<table class="report">
<thead>
	<tr>
		<th class="act-today">Penambahan Stok Pakan</th>
		<th  class="act-today">Pemakaian Pakan</th>
	</tr>
</thead>
<tbody>
	<tr>
	<td>
		<ul>
		<?php foreach($sp_today as $sp): ?>
			<li>
				<strong><?=$sp['jp_nama']?></strong>, jumlah masuk : <?=$sp['sp_jumlah_masuk']?> kg <br/>
				<span>dicatat oleh : <?=$sp['user_nama']?></span>
				
			</li>
		<?php endforeach ?>
		</ul>
	</td>
	<td>
		<ul>
		<?php foreach($pp_today as $pp): ?>
			<li>
				<strong><?=$pp['jp_nama']?></strong>, jumlah pakai <?=$pp['pp_jumlah_pakai']?> kg <br/>
				 <span>di catat oleh : <?=$pp['user_nama']?></span>
				
			</li>
		<?php endforeach ?>
		</ul>
	</td>	
	</tr>
</tbody>
</table>
</div>
</body>
</html>
