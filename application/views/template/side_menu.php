<div class="user_app">
<span class="user_name">
<?=$this->session->userdata('user_level')?><br/>
<strong><?=get_username()?></strong><br/>
<a href="<?=base_url()?>user/profile">profile</a> | <a href="<?=base_url()?>user/logout" onclick="return confirm('apa anda yakin untuk keluar ?')">Log out</a>
</span>
</div>
<ul id="k-panel">
<li>Stok Pakan
		<ul>
			<li><a href="<?=base_url()?>stok_pakan">penambahan stok pakan</a></li>
			<li><a href="<?=base_url()?>stok_pakan/baru">tambah stok pakan</a></li>
		</ul>
	</li>
	<li>Jenis Pakan
		<ul>
			<li><a href="<?=base_url()?>jenis_pakan">jenis pakan</a></li>
			<li><a href="<?=base_url()?>jenis_pakan/baru">tambah jenis pakan</a></li>
		</ul>
	</li>
	<li>Pemakaian Pakan
		<ul>
			<li><a href="<?=base_url()?>pakai_pakan">catatan pemakaian pakan</a></li>
			<li><a href="<?=base_url()?>pakai_pakan/baru">pakai pakan</a></li>
		</ul>
	</li>
<li>User
	<ul>
		<li><a href="<?=base_url()?>user/profile">Profile Anda</a></li>
		<li><a href="<?=base_url()?>user/logout" onclick="return confirm('apa anda yakin untuk keluar ?')">Keluar</a></li>
	</ul>
</li>
</ul>
