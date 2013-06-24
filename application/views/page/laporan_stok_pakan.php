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
	      url: "<?=base_url()?>ajax_data/jenis_pakan_list",
	  		success:function(data)
	  		{
	  			$('#divPageData').html(data);
	  		}
	    });
});
</script>
<script type="text/javascript">
$(function () {
    // On document ready, call visualize on the datatable.
    $(document).ready(function() {
        /**
         * Visualize an HTML table using Highcharts. The top (horizontal) header
         * is used for series names, and the left (vertical) header is used
         * for category names. This function is based on jQuery.
         * @param {Object} table The reference to the HTML table to visualize
         * @param {Object} options Highcharts options
         */
        Highcharts.visualize = function(table, options) {
            // the categories
            options.xAxis.categories = [];
            $('tbody th', table).each( function(i) {
                options.xAxis.categories.push(this.innerHTML);
            });
    
            // the data series
            options.series = [];
            $('tr', table).each( function(i) {
                var tr = this;
                $('th, td', tr).each( function(j) {
                    if (j > 0) { // skip first column
                        if (i == 0) { // get the name and init the series
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                            };
                        } else { // add values
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
    
            var chart = new Highcharts.Chart(options);
        }
    
        var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: '<?=date('l, F j, Y')?>'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'Stok dalam kg'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.y +' '+ this.x.toLowerCase();
                }
            }
        };
    
        Highcharts.visualize(table, options);
    });
    
});
		</script>
</head>
<body>
<script src="<?=base_url()?>assets/highcharts/highcharts.js"></script>
<script src="<?=base_url()?>assets/highcharts/modules/exporting.js"></script>
<?php 
if($_color == "black") { ?>
<script src="<?=base_url()?>assets/highcharts/themes/gray.js"></script>
<?php } 
elseif($_color == "blueopal") { ?>
<script src="<?=base_url()?>assets/highcharts/themes/grid.js"></script>
<?php } ?>

<section id="first_bar">
<?=$_header?>
</section>
<section id="second_bar">
	<div class="breadcrumbs_container">
		<article class="breadcrumbs"><a>home</a> &raquo; <a>laporan</a> &raquo; <a><?=$title?></a></article>
	</div>
</section>

<div id="main_container">
<section id="left_content">
<article>
<header>
	<h3><?=$title?></h3>
</header>
<div id="main_content">
<div id="container" style="min-width: 90%; height: 400px; margin: 2px"></div>
<table id="datatable" style="display:none;">
<thead>
	<tr>
		<th>jenis pakan</th>
		<th>stok</th>
	</tr>
</thead>
<tbody>
<?php foreach($stok_hari_ini as $jp): ?>
	<tr>
		<th><?=$jp['jp_nama']?></th>
		<td><?=$jp['jp_stok']?></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>
<div class="data-prop" style="text-align:right">
<a class="k-button" href="<?=base_url()?>laporan/print_stok_today">bentuk cetak</a>
</div>
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
