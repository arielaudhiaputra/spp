<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('murid'); ?>
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">SPP Saya</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                    <table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
                                <th>Bulan Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								<?php foreach($user as $p): ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $p['bulan_bayar'] ?></td>
                                        <td><?= $p['jumlah_bayar'] ?></td>
                                        <td><?= $p['tgl_bayar'] ?></td>
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
