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
		<article class="breadcrumbs"><a>home</a> &raquo; <a><?=$title?></a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content">
<form class="ch-form" method="post" action="<?=base_url()?>user/update_profile">
<h3>user profile</h3>
<table>
<tr>
	<td><label for="um_nama" class="required">username</label></td>
	<td><input type="text" name="um_nama" class="k-textbox" placeholder="nama anda" value="<?=$nama?>" required validationMessage="harap masukkan nama anda"/></td>
</tr>
<tr>
	<td><label for="um_tema" class="required">tema</label></td>
	<td>
		<select id="um_tema" name="um_tema">
			<option value="black" <?php if($tema=="black") echo "selected";?>>black</option>
			<option value="blueopal" <?php if($tema=="blueopal") echo "selected";?>>blueopal</option>
			<option value="default" <?php if($tema=="default") echo "selected";?>>default</option>			
			<option value="metro" <?php if($tema=="metro") echo "selected";?>>metro</option>
			<option value="silver" <?php if($tema=="silver") echo "selected";?>>silver</option>
			
		</select>
	</td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="k-button" value="simpan" id="submitter" style="margin-right:10px;"/><input type="reset" class="k-button" value="kosongkan" id="reseter"/></td>
</tr>
<tr>
	<td></td>
	<td>
</tr>
</table>
</form>

<form class="ch-form" method="post" action="<?=base_url()?>user/update_password">
<h3>user password</h3>
<table>
<tr>
	<td><label for="new_pass1" class="required">password baru</label></td>
	<td><input type="password" name="new_pass1" class="k-textbox" placeholder="password baru" required validationMessage="harap masukkan passwod baru anda"/></td>
</tr>
<tr>
	<td><label for="new_pass2" class="required">password baru</label></td>
	<td><input type="password" name="new_pass2" class="k-textbox" placeholder="ulangi password baru" required validationMessage="ulangi password baru anda"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" class="k-button" value="simpan" id="submitter" style="margin-right:10px;"/><input type="reset" class="k-button" value="kosongkan" id="reseter"/></td>
</tr>
</table>
</form>
<div class="status"><?=validation_errors()?></div>
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
    	$("#um_tema").kendoDropDownList();
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
