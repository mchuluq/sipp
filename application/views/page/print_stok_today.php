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
<h1><?=$title?></h1>
<table class="report">
<thead>
	<tr>
		<th class="stok-today">Sisa Stok</th>
	</tr>
</thead>
<tbody>
	<tr>
	<td>
		<ul>
		<?php foreach($stok_hari_ini as $jp): ?>
			<li>
				<strong><?=$jp['jp_nama']?></strong>, sisa stok : <?=$jp['jp_stok']?> kg <br/>
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
