<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Kelas SMKN 4 Bogor</title>

	<style>
		table,th,td{
			margin: auto;
			text-align: center;
			border: 2px solid;
			border-collapse: collapse;
		}

		a, img{
			width: 200px;
		}

	</style>
</head>
<body>




	<h2><center>Data Kelas SMKN 4 Bogor</center></h2>
	<hr/>
	<br>

	<table width="100%">
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

</body>
</html>