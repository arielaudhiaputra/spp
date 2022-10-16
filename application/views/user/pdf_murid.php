<h2><center>Data Siswa/Siswi SMKN 4 Bogor</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Nama</th>
        <th>Kelas</th>
        <th>NISN</th>
        <th>NIS</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($users as $s): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $s['name'] ?></td>
			<td><?= $s['nama_kelas'] ?></td>
			<td><?= $s['nisn'] ?></td>
			<td><?= $s['nis'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>
