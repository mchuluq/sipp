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
	      url: "<?=base_url()?>ajax_data/pakai_pakan_list",
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
		<article class="breadcrumbs"><a>home</a> &raquo; <a>pakai pakan</a> &raquo; <a>list</a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3>pemakaian pakan</h3>
</header>
<div id="main_content">

<div id="divPageData"></div>
<div id="chraven-loader"></div>
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
