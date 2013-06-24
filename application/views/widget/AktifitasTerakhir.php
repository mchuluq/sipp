<div class="activities-w">
<?php $myquery = mysql_query("SELECT * FROM view_log ORDER BY log_time DESC LIMIT 0, 10");
	$ws = now(); 
	while($act = mysql_fetch_assoc($myquery)) { ?>
		<div class="act">
			<?=$act['log_content']." <strong>".$act['jp_nama']."</strong> oleh <strong>".$act['user_nama']."</strong>";?><br/>
			<span><?=timespan($act['log_time'],$ws); ?> yang lalu</span>
		</div>				
<?php }	?>
</div>
