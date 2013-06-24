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
<link href="<?=base_url()?>assets/styles/ttw-simple-notifications.css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-1.8.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/kendoui/js/kendo.web.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/ttw-simple-notifications.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery-ui-1.8.24.custom.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/chraven-ajax.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/scripts/jquery.json-2.2.min.js"></script>

<script type="text/javascript">
//MAIN STAGE DRAGGABLE BOXES
$(function(){
	$('.widgetbox')
	.each(function(){
		$(this).hover(function(){
			$(this).find('h2').addClass('collapse');
		}, function(){
		$(this).find('h2').removeClass('collapse');
		})
		.find('h2').hover(function(){
			$(this).find('.configure').css('visibility', 'visible');
		}, function(){
			$(this).find('.configure').css('visibility', 'hidden');
		})
		.click(function(){
			$(this).siblings('.widgetbox-content').toggle('blind');
			updateWidgetData();
		})
		.end()
		.find('.configure').css('visibility', 'hidden');
	});
    
	$('.column').sortable({
		connectWith: '.column',
		handle: 'h2',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.4,
		start: function(event, ui){
			//Firefox, Safari/Chrome fire click event after drag is complete, fix for that
			if($.browser.mozilla || $.browser.safari) 
				$(ui.item).find('.widgetbox-content').toggle('blind');
		},
		stop: function(event, ui){
			$(ui.item).find('h2').click();
			var sortorder='';
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				sortorder+=columnId+'='+itemorder.toString()+'&';
			});
			//alert('SortOrder: '+sortorder);
			updateWidgetData();
		}
	})
	.disableSelection();
});

function updateWidgetData(){
	var items=[];
	$('.column').each(function(){
		var columnId=$(this).attr('id');
		$('.widgetbox', this).each(function(i){
			var collapsed=0;
			if($(this).find('.widgetbox-content').css('display')=="none")
				collapsed=1;
			var item={
				id: $(this).attr('id'),
				collapsed: collapsed,
				order : i,
				column: columnId
			};
			items.push(item);
		});
	});
	var sortorder={ items: items };			
	//Pass sortorder variable to server using ajax to save state
	$.post('ajax_data/update_widget', 'data='+$.toJSON(sortorder), function(response){
		if(response=="success")
			$("#console").html('<span class="success">Saved</span>').hide().fadeIn(500);
		setTimeout(function(){
			$('#console').fadeOut(500);
		}, 1000);
	});
}
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
		<div class="column" id="column1" ><?php 
			$items1=mysql_query("SELECT * FROM i_widget WHERE column_id='1' ORDER BY sort_no");
			while($widget=mysql_fetch_array($items1))
			{ ?>
				<div class="widgetbox" id="item<?php echo $widget['id']?>">
					<h2><?php echo $widget['title'] ?></h2>
						<div class="widgetbox-content" <?php if($widget['collapsed']==1)echo 'style="display:none;" ';?>>
						<?php
						$title = $widget['title']; 
						get_widget($title);
						?>
						</div>
					</div>
		<?php }	?>
	</div>
	<div class="column" id="column0" ><?php 
			$items0=mysql_query("SELECT * FROM i_widget WHERE column_id='0' ORDER BY sort_no");
			while($widget=mysql_fetch_array($items0))
			{ ?>
				<div class="widgetbox" id="item<?php echo $widget['id']?>">
					<h2><?php echo $widget['title'] ?></h2>
						<div class="widgetbox-content" <?php if($widget['collapsed']==1)echo 'style="display:none;" ';?>>
						<?php
						$title = $widget['title']; 
						get_widget($title);
						?>
						</div>
					</div>
		<?php }	?>
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