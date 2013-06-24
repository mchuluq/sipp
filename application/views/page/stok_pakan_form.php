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
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery.contextMenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/tiny_mce/tiny_mce.js"></script>

<?=embed_tinymce($_color)?>
</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>stok pakan</a> &raquo; <a><?=$title?></a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content">
<form class="ch-form" method="post" action="">
<h3>detil stok pakan</h3>
<table>
<tr>
	<td width="15%"><label for="jp_id" class="required">jenis pakan </label></td>
	<td>
		<select id="jp_id" name="jp_id">
		<?php foreach($jenis as $jp):?>
			<option value="<?=$jp['jp_id']?>"><?=$jp['jp_nama']?></option>
		<?php endforeach;?>
		</select>
	</td>
</tr>
<tr>
	<td><label for="sp_no_bukti">no. bukti</label></td>
	<td><span class="k-textbox"><input type="text" name="sp_no_bukti" placeholder="no bukti"/></span></td>
</tr>
<tr>
	<td><label for="sp_tgl" class="required">tanggal masuk</label></td>
	<td><input type="date" id="sp_tgl" name="sp_tgl" class="k-textbox" placeholder="tttt-bb-hh" value="<?=$sp_tgl?>" required validationMessage="harap masukkan tanggal"/></td>
</tr>
<tr>
	<td><label for="sp_jumlah_masuk" class="required">jumlah masuk</label></td>
	<td><input type="number" id="sp_jumlah_masuk" name="sp_jumlah_masuk" class="k-textbox" placeholder="dalam kg" required validationMessage="harap masukkan jumlah masuk"/></td>
</tr>
<tr>
	<td><label for="sp_keterangan">keterangan </label></td>
	<td>
		<textarea name="sp_keterangan"></textarea>
	</td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="k-button" value="simpan" id="submitter" style="margin-right:10px;"/><input type="reset" class="k-button" value="kosongkan" id="reseter"/></td>
</tr>
<tr>
	<td></td>
	<td><div class="status"><?=validation_errors()?></div>
</tr>
</table>
</form>
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
    	$("#jp_id").kendoDropDownList();
	    var validator = $(".ch-form").kendoValidator().data("kendoValidator"),
        status = $(".status");
        $("#submitter").click(function() {
            if (validator.validate()) {
                status.text("data segera disimpan!").addClass("valid");
        	} else {
            	status.text("Oops! masukan data ada yang salah.").addClass("invalid");
            }
        });
    });
</script>
</body>
</html>
