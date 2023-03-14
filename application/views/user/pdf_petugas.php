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

		a, img{
			width: 200px;
		}

	</style>
</head>
<body>

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

</body>
</html>
