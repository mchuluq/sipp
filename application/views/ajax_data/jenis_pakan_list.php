<script type="text/javascript">
$(document).ready( function() {	
	$(".ch-table table tbody tr").contextMenu({
		menu: 'myMenu'
	}, function(action, el, pos) {
		var act = action
		if (act=="edit"){
		document.location='<?=base_url()?>jenis_pakan/ubah/'+$(el).attr('id');
		}
		else if(act=="new"){
		document.location='<?=base_url()?>jenis_pakan/baru/';				
		}
		else if(act=="del"){
			x = confirm("apakah anda yakin menghapus jenis pakan ini ?"); 
			if(x == 1){ 
				document.location='<?=base_url()?>jenis_pakan/hapus/'+$(el).attr('id');		
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
		<td>stok</td>
		<td>keterangan</td>
	</tr>
</thead>
<tbody>
<?php foreach($data as $jp): ?>
	<tr id="<?=$jp['jp_id']?>">
		<td>
			<?=$jp['jp_nama']?><br/>
			<abbr>ditambahkan oleh : <?=$jp['user_nama']?></abbr>
		</td>
		<td><?=$jp['jp_stok']?></td>
		<td><?=$jp['jp_keterangan']?></td>
	</tr>
<?php endforeach ?>
</tbody>
</table>
<?php echo $pagination; ?>

</div>
<div class="data-prop">
jumlah keseluruhan : <?php echo $jumlah;?> jenis <span style="float:right">ditampilkan dalam <strong>{elapsed_time}</strong> detik</span>
</div>
<ul id="myMenu" class="contextMenu">
	<li><a href="#new">tambah baru</a></li>
	<li><a href="#edit">ubah</a></li>
	<li><a href="#del">hapus</a></li>
</ul>
