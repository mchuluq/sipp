<script type="text/javascript">
$('.page_link').click(function(e){
	e.preventDefault();
	$.get($(this).attr('href'),function(Res){
	$('#divPageData').html(Res);
});
});	
</script>
<div class="ch-table">
<table>
<thead>
	<tr>
		<td>Aktifitas</td>
	</tr>
</thead>
<tbody>
<?php $ws = now(); 
	foreach($data as $act): ?>
	<tr>
		<td>
			<?=$act['log_content']." <strong>".$act['jp_nama']."</strong> oleh <strong>".$act['user_nama']."</strong>";?><br/>
			<abbr><?=timespan($act['log_time'],$ws); ?> yang lalu</abbr>
		</td>
	</tr>
<?php endforeach ?>
</tbody>
</table>
<?php echo $pagination; ?>
</div>
<div class="data-prop">
jumlah keseluruhan : <?php echo $jumlah;?> <span style="float:right">ditampilkan dalam <strong>{elapsed_time}</strong> detik</span>
</div>