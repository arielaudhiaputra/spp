<div class="container-fluid">
    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">Transaksi</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                        <table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Bulan Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal</th>
								<th>Status</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								<?php foreach($transaksi as $p): ?>
									<tr>
										<td><?= $i ?></td>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $p['tahun']  ?></td>
										<td><?= $p['bulan_bayar'] ?></td>
                                        <td><?= $p['jumlah_bayar'] ?></td>
                                        <td><?= $p['tgl_bayar'] ?></td>
                                        <td class="text-danger"><?= $p['status'] ?></td>
										<td>
											<a href="<?= base_url('admin/transaksi/add/') . $p['id_transaksi'] ?>" class="btn btn-primary btn-sm btn-delete ml-2"><i class="fa fa-plus "></i> Add</a>
										</td>
									</tr>
								<?php $i++ ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
