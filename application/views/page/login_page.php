<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>S.I.P.P | <?=$title?></title>
<link rel="icon" href="<?=base_url()?>yudha.ico">
<!-- HTML5 shiv -->
<link href="<?=base_url()?>assets/styles/reset.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/html5shiv-printshiv.js"></script>
<!-- end shiv -->
<link href="<?=base_url()?>assets/styles/chraven-ui-login.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.2.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-ui-1.8.24.custom.min.js"></script>
<script>			
$(function() {	
$('.the-username').click(function(){
	$( ".the-password" ).toggle('blind');
});
});					
</script>
<script>
function showLogin()
{
	$('.login').show();
	$('.errors').hide();
}
function resetForm()
{
	$( ".field-username" ).val('');
	$( ".field-password" ).val('');
}
$(document).ready(function() {
	options = {distance: 30, times: 3};						
	<?php if($this->session->flashdata('log_stat')) {?>
		$('.errors').effect('shake', options, 90, function(){});
		$('.login').hide();
	<?php } else { ?>
	$('.errors').hide();
	<?php } ?>
});
</script>
</head>
<body>
<div id="gate_container">
	<div class="login">
		<img src="<?=base_url()?>assets/images/chraven-login/logo.png" class="form-title" />
		<div class="shield">
			<div class="form-box-content">
				<div class="the-username">
					<img src="<?=base_url()?>assets/images/chraven-login/login-photo.png"/>
				</div>
				<div class="the-password">
					<form method="post" class="the-form" action="<?=base_url()?>user/login">
						<table>
							<tr>
								<td><input type="text" name="username" class="field-username" placeholder="user name" required/></td>
							</tr>
							<tr>
								<td><input type="password" name="password" class="field-password" placeholder="password" required/></td>
							</tr>
							<tr>
								<td><input type="submit" name="login" value="login"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div id="back">
			<div class="try-again">
			<p>
				<a onclick ="resetForm()">
				<img src="<?=base_url()?>assets/images/chraven-login/try-again.png"/> <br />
					Kosongkan Form</a>
            </p>
            </div>
            <div class="back-home">
			<p>
				<a href="">
				<img src="<?=base_url()?>assets/images/chraven-login/back-article.png"/> <br />
					Kembali ke Awal</a>
            </p>
            </div>
		</div>
	</div>
	<div class="errors">
		<?php if($this->session->flashdata('log_stat')) {?>
			<div class="hilight_message">
				<p><strong>ERROR </strong>: <?=$this->session->flashdata('log_stat')?></p>
			</div>
		<?php } ?>	
		<a class="flipper" onclick="showLogin()" >Ok</a>
	</div>
</div>
</body>
</html>