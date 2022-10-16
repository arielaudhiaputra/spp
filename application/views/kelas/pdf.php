<h2><center>Data Kelas SMKN 4 Bogor</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Kelas</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($kelas as $s): ?>
		<tr>
			<td width="10%"><?= $no ?></td>
			<td width="90%"><?= $s['nama_kelas'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>
