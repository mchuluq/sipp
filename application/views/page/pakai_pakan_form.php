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
		<article class="breadcrumbs"><a>home</a> &raquo; <a>pakai pakan</a> &raquo; <a><?=$title?></a></article>
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
<h3>detil pemakaian pakan</h3>
<table>
<tr>
	<td width="20%"><label for="jp_id" class="required">jenis pakan </label></td>
	<td>
		<select id="jp_id" name="jp_id">
		<?php foreach($jenis as $jp):?>
			<option value="<?=$jp['jp_id']?>"><?=$jp['jp_nama']?></option>
		<?php endforeach;?>
		</select>
	</td>
</tr>
<tr>
	<td><label for="pp_tgl" class="required">tanggal pakai</label></td>
	<td><input type="date" id="pp_tgl" name="pp_tgl" class="k-textbox" placeholder="tttt-bb-hh" value="<?=$pp_tgl?>" required validationMessage="harap masukkan tanggal"/></td>
</tr>
<tr>
	<td><label for="pp_jam" class="required">jam pakai</label></td>
	<td><input type="text" name="pp_jam" class="k-textbox" placeholder="contoh: 18:15" value="<?=$pp_jam?>" required validationMessage="harap masukkan jam"/></td>
</tr>
<tr>
	<td><label for="pp_jumlah_pakai" class="required">jumlah pakai</label></td>
	<td><input type="number" name="pp_jumlah_pakai" class="k-textbox" placeholder="dalam kg" required validationMessage="harap masukkan jumlah pakai"/></td>
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
