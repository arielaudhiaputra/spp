<div class="container-fluid">
    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">Pembayaran</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th>Name</th>
                                <th>NISN</th>
								<th>NIS</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</thead>
							<tbody>
                                <?php $i = 1 ?>
                                <?php foreach($users as $s): ?>
									<tr>
                                        <td><?= $i ?></td>
                                        <td><?= $s['name'] ?></td>
										<td><?=  $s['nisn'] ?></td>
										<td><?=  $s['nis'] ?></td>
										<td><?=  $s['nama_kelas'] ?></td>
										<td>
											<a href="<?= base_url('petugas/pembayaran/tambah_pembayaran/') . $s['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Bayar</a>
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
