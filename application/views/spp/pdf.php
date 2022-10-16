<h2><center>Data SPP SMKN 4 Bogor</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Tahun</th>
        <th>Nominal</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($spp as $s): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $s['tahun'] ?></td>
			<td><?= $s['nominal'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>
