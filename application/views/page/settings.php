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

<link href="<?=base_url()?>assets/styles/ttw-simple-notifications.css" rel="stylesheet"/>

<link href="<?=base_url()?>assets/kendoui/css/kendo.common.css" rel="stylesheet"/>
<link href="<?=base_url()?>assets/kendoui/css/kendo.<?=$_color?>.css" rel="stylesheet"/>

<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/kendoui/js/kendo.web.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery.contextMenu.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/ttw-simple-notifications.js"></script>

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
		<article class="breadcrumbs"><a>home</a> &raquo; <a><?=$title?></a> </article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content">
<form class="ch-form" method="post" action="<?=base_url()?>settings/update_config">
<h3>Pengaturan Aplikasi</h3>
<table>
<tr>
	<td><label for="conf_dpp" class="required">tampilan data perhalaman</label></td>
	<td><input type="number" min="1" max="20" name="conf_dpp" class="k-textbox" value="<?=$conf['data_per_page']?>" placeholder="data per halaman" required validationMessage="harap masukkan angka 1 - 20"/></td>
</tr>
<tr>
	<td><label for="conf_ms" class="required">stok minimal</label></td>
	<td><input type="number" name="conf_ms" class="k-textbox" value="<?=$conf['min_stok']?>" placeholder="dalam kg" required validationMessage="harap masukkan angka"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="k-button" value="simpan" id="submitter"/></td>
</tr>
<tr>
	<td><div class="status"><?=validation_errors()?></div></td>
	<td>
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
