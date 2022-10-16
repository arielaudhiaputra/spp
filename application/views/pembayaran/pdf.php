<h2><center>Data Pembayaran SPP <?=  $users['name'] ?> </center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
		<th>Bulan</th>
        <th>Jumlah Bayar</th>
        <th>Tanggal</th>
	</tr>

	<?php $no = 1 ?>
	<?php foreach($bayar as $p): ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $p['bulan_bayar'] ?></td>
            <td><?= $p['jumlah_bayar'] ?></td>
            <td><?= $p['tgl_bayar'] ?></td>
		</tr>
	<?php $no++ ?>
	<?php endforeach; ?>
</table>
