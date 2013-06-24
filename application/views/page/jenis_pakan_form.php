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
<script type="text/javascript" src="<?=base_url()?>assets/scripts/tiny_mce/tiny_mce.js"></script>

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
<?=embed_tinymce($_color)?>
</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>jenis pakan</a> &raquo; <a><?=$title?></a></article>
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
<h3>detil jenis pakan</h3>
<table>
<tr>
	<td width="15%"><label for="jp_nama" class="required">jenis pakan </label></td>
	<td>
		<input type="text" id="jp_nama" name="jp_nama" class="k-textbox" placeholder="nama jenis pakan" required validationMessage="harap masukkan nama jenis pakan" value="<?=$detil_jp['jp_nama']?>"/>
		<input type="hidden" value="<?=$detil_jp['jp_id']?>" name="jp_id"/>
	</td>
</tr>
<tr>
	<td><label for="jp_keterangan">keterangan </label></td>
	<td>
		<textarea name="jp_keterangan" style="width:100%"><?=$detil_jp['jp_keterangan']?></textarea>
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
