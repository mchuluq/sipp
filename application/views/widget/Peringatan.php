<div class="activities-w">
<?php $query = mysql_query("CALL stok_alert()");
	$jum = mysql_num_rows($query);
	if($jum > 0){
	while($wn = mysql_fetch_array($query)){ ?>
		<div class="warning">
			peringatan : <strong><?=$wn['jp_nama']?></strong> <span>sisa stok <strong><?=$wn['jp_stok']?></strong></span>
		</div>				
<?php }	} else {?>
		<div style="border:1px solid DarkRed; padding:5px;margin:3px;">
			Tidak Ada Peringatan
		</div>
<?php }?>
</div>