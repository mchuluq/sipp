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

</head>
<body>
<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>user</a> &raquo; <a><?=$title;?></a></article>
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
<h3>user profile</h3>
<table>
<tr>
	<td><label for="um_nama" class="required">username</label></td>
	<td><input type="text" name="um_nama" class="k-textbox" placeholder="username" required validationMessage="harap masukkan nama anda"/></td>
</tr>
<tr>
	<td><label for="um_level" class="required">hak akses</label></td>
	<td>
		<select id="um_level" name="um_level">
			<option value="user">user</option>
			<option value="admin">admin</option>
		</select>
	</td>
</tr>
<tr>
	<td><label for="new_pass1" class="required">password</label></td>
	<td><input type="password" name="new_pass1" class="k-textbox" placeholder="password" required validationMessage="harap masukkan password"/></td>
</tr>
<tr>
	<td><label for="new_pass2" class="required">password</label></td>
	<td><input type="password" name="new_pass2" class="k-textbox" placeholder="ulangi password" required validationMessage="ulangi password"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="k-button" value="simpan" id="submitter" style="margin-right:10px;"/><input type="reset" class="k-button" value="kosongkan" id="reseter"/></td>
</tr>
<tr>
	<td></td>
	<td><div class="status"><?=validation_errors()?></div></td>
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
    	$("#um_level").kendoDropDownList();
	    var validator = $(".ch-form").kendoValidator().data("kendoValidator"),
        status = $(".status");
        $("#submitter").click(function() {
            if (validator.validate()) {
                status.text("data telah disimpan!").addClass("valid");
        	} else {
            	status.text("Oops! masukan data ada yang salah.").addClass("invalid");
            }
        });
    });
</script>
</body>
</html>
