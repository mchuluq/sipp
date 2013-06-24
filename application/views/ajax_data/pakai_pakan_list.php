<script type="text/javascript">
$(document).ready( function() {	
	$(".ch-table table tbody tr").contextMenu({
		menu: 'myMenu'
	}, function(action, el, pos) {
		var act = action
		if(act=="new"){
			document.location='<?=base_url()?>pakai_pakan/baru/';				
		}
		else if(act=="del"){
			x = confirm("apakah anda yakin menghapus catatan pakai pakan ini ?"); 
			if(x == 1){ 
				document.location='<?=base_url()?>pakai_pakan/hapus/'+$(el).attr('id');		
		    }				
		}
	});
});
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
		<td>jenis pakan</td>
		<td>jumlah pakai</td>
	</tr>
</thead>
<tbody>
<?php foreach($data as $pp): ?>
	<tr id="<?=$pp['pp_id']?>">
		<td>
			<?=$pp['jp_nama']?><br/>
			<abbr>tanggal: <strong><?=$pp['pp_tgl']?></strong> jam: <strong><?=$pp['pp_jam']?></strong> &bull; di catat oleh: <?=$pp['user_nama']?></abbr>
		</td>
		<td><?=$pp['pp_jumlah_pakai']?></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>
<?php echo $pagination; ?>

</div>
<div class="data-prop">
jumlah keseluruhan : <?php echo $jumlah;?> <span style="float:right">ditampilkan dalam <strong>{elapsed_time}</strong> detik</span>
</div>
<ul id="myMenu" class="contextMenu">
	<li><a href="#new">tambah baru</a></li>
	<li><a href="#del">hapus</a></li>
</ul>
