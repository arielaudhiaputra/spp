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

<h2><center>Data Pembayaran SPP <?=  $users['name'] ?> </center></h2>
<hr/>

<table width="100%">
	<tr>
		<th>No</th>
		<th>Tahun</th>
		<th>Bulan</th>
        <th>Jumlah Bayar</th>
        <th>Tanggal</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($bayar as $p): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $p['tahun'] ?></td>
			<td><?= $p['bulan_bayar'] ?></td>
            <td><?= number_format($p['jumlah_bayar'])  ?></td>
            <td><?= $p['tgl_bayar'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>

</body>
</html>