<script type="text/javascript">
$(document).ready( function() {	
	$(".ch-table table tbody tr").contextMenu({
		menu: 'myMenu'
	}, function(action, el, pos) {
		var act = action
		if(act=="new"){
			document.location='<?=base_url()?>stok_pakan/baru/';				
		}
		else if(act=="del"){
			x = confirm("apakah anda yakin menghapus catatan stok pakan ini ?"); 
			if(x == 1){ 
				document.location='<?=base_url()?>stok_pakan/hapus/'+$(el).attr('id');		
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
		<td>jumlah masuk</td>
		<td>keterangan</td>
	</tr>
</thead>
<tbody>
<?php foreach($data as $sp): ?>
	<tr id="<?=$sp['sp_id']?>">
		<td>
			<?=$sp['jp_nama']?><br/>
			<abbr>tanggal: <?=$sp['sp_tgl']?> &bull; di catat oleh: <?=$sp['user_nama']?> &bull; no bukti: <?=$sp['sp_no_bukti']?></abbr>
		</td>
		<td><?=$sp['sp_jumlah_masuk']?></td>
		<td><?=$sp['sp_keterangan']?></td>
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
