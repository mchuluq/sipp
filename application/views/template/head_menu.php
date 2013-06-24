<ul id="k-menu">
	<li><a href="<?=base_url()?>dashboard">dashboard</a></li>
	<li>Menu Utama
		<ul>
			<li>Stok Pakan
			<ul>
				<li><a href="<?=base_url()?>stok_pakan">penambahan stok pakan</a></li>
				<li><a href="<?=base_url()?>stok_pakan/baru">tambah stok pakan</a></li>
			</ul>
			</li>
			<li>Jenis Pakan
				<ul>
					<li><a href="<?=base_url()?>jenis_pakan">daftar jenis pakan</a></li>
					<li><a href="<?=base_url()?>jenis_pakan/baru">tambah jenis pakan</a></li>
				</ul>
			</li>
			<li>Pemakaian Pakan
				<ul>
					<li><a href="<?=base_url()?>pakai_pakan">catatan pemakaian pakan</a></li>
					<li><a href="<?=base_url()?>pakai_pakan/baru">pakai pakan</a></li>
				</ul>
			</li>
			<li>Laporan
				<ul>
					<li><a href="<?=base_url()?>laporan">Laporan Path</a></li>
					<li>Laporan Excel
						<ul>
							<li><a href="<?=base_url()?>laporan/stok_hari_ini_excel">Stok Hari Ini :: Excel</a></li>				
							<li><a href="<?=base_url()?>laporan/hari_ini_excel">Aktifitas Hari Ini :: Excel</a></li>
							<li><a href="<?=base_url()?>laporan/pemakaian_pakan_excel">Pemakaian Pakan :: Excel</a></li>
							<li><a href="<?=base_url()?>laporan/penambahan_stok_pakan_excel">Penambahan Stok Pakan :: Excel</a></li>
						</ul>
					</li>
					<li><a href="<?=base_url()?>laporan/hari_ini">Aktifitas Hari Ini</a></li>
					<li><a href="<?=base_url()?>laporan/stok_hari_ini">Stok Hari Ini</a></li>	
					
				</ul>
			</li>
			<li><a href="<?=base_url()?>user">User Manager</a></li>
			<li><a href="<?=base_url()?>settings">Pengaturan</a></li>
			<li><a href="<?=base_url()?>dashboard/view_log">Aktifitas</a></li>
		</ul>
	</li>
	<li>Tentang
		<ul>
			<li><a href="<?=base_url()?>tentang">tentang aplikasi ini</a></li>
			<li><a href="<?=base_url()?>tentang/credits">credits</a></li>
		</ul>	
	</li>
</ul>
