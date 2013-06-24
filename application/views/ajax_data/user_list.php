<script type="text/javascript">
$(document).ready( function() {	
	$(".ch-table table tbody tr").contextMenu({
		menu: 'myMenu'
	}, function(action, el, pos) {
		var act = action
		if(act=="new"){
			document.location='<?=base_url()?>user/baru/';				
		}
		else if(act=="del"){
			x = confirm("apakah anda yakin menghapus user ini ?"); 
			if(x == 1){ 
				document.location='<?=base_url()?>user/hapus/'+$(el).attr('id');		
		    }				
		}
		else if(act=="chg"){
			x = confirm("apakah anda yakin mengubah hak akses user ini ?"); 
			if(x == 1){ 
				document.location='<?=base_url()?>user/ubah_hak_akses/'+$(el).attr('id');		
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
		<td>user nama</td>
		<td>hak akses</td>
	</tr>
</thead>
<tbody>
<?php foreach($data as $um): ?>
	<tr id="<?=$um['user_id']?>">
		<td>
			<?=$um['user_nama']?>
		</td>
		<td>
			<?=$um['user_level']?>
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
<ul id="myMenu" class="contextMenu">
	<li><a href="#new">tambah baru</a></li>
	<li><a href="#del">hapus</a></li>
	<li><a href="#chg">ubah level</a></li>
</ul>
