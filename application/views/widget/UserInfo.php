<table style="width:100%" class="user_info-w">
<tr>
	<td width="50%">Login Sebagai :</td>
	<td width="50%"><?=get_username()?></td>
</tr>
<tr>
	<td>Hak Akses :</td>
	<td><?=$this->session->userdata('user_level')?></td>
</tr>
<tr>
	<td>Browser :</td>
	<td><strong><?=$this->agent->browser();?></strong> versi : <strong><?=$this->agent->version();?></strong></td>
</tr>
<tr>
	<td>Sistem operasi :</td>
	<td><?=$this->agent->platform();?></td>
</tr>
</table>