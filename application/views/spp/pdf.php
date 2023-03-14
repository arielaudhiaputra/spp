<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SPP SMKN 4 Bogor</title>

	<style>
		table,th,td{
			margin: auto;
			text-align: center;
			border: 2px solid;
			border-collapse: collapse;
		}

	</style>
</head>
<body>

	<h2><center>Data SPP SMKN 4 Bogor</center></h2>
	<hr/>
	<table width="100%">
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
				<td>Rp. <?= number_format($s['nominal']) ?></td>
			</tr>
		<?php $no++ ?>
		<?php endforeach; ?>
	</table>

</body>
</html>
