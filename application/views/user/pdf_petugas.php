<h2><center>Data Siswa/Siswi SMKN 4 Bogor</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama</th>
        <th>Email</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($petugas as $s): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $s['name'] ?></td>
			<td><?= $s['email'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>
