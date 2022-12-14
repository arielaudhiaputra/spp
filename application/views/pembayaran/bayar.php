<div class="container laptop">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('pembayaran'); ?>
			<div class="card">
				<form action="<?= base_url('admin/pembayaran/proses_tambah') ?>" method="POST">
				<input type="text" name="id_users" id="id_users" hidden value="<?= $user['id'] ?>">
					<div class="card-header">
						<h4 class="card-title">SPP <?= $user['name']; ?></h4>
                    </div>

					<div class="card-body border-top py-0 my-3">
						<div class="row mt-3">
							<div class="col-xs-12 col-sm-2">
								<div class="form-group">
									<label for="id_spp">Tahun Bayar : </label>
									<select name="id_spp" id="id_spp" class="form-control" required>
										<option disabled selected hidden required>-- Tahun --</option>
										<?php foreach($spp as $s): ?>
											<option value="<?= $s['id_spp']; ?>"><?= $s['tahun']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="bulan_bayar">Bulan Bayar : </label>
									<input type="text" name="bulan_bayar" id="bulan_bayar" class="form-control" placeholder="Bulan Bayar" required>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="jumlah_bayar">Jumlah Bayar : </label>
									<input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required>
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 mt-1">
                                <br>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </button>
							</div>
							<div class="col-xs-12 col-sm-2 mt-1" style="margin-left: -55px;">
                                <br>
                                <a href="<?= base_url('admin/pembayaran/pdf/') . $user['id'] ?>" type="submit" class="btn btn-danger"><i class="fa fa-file"></i> PDF </a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>



    <div class="row mt-5">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
                                <th>Bulan Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								<?php foreach($bayar as $p): ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $p['bulan_bayar'] ?></td>
                                        <td><?= $p['jumlah_bayar'] ?></td>
                                        <td><?= $p['tgl_bayar'] ?></td>
										<td>
											<a href="<?= base_url('admin/pembayaran/hapus_pembayaran/') . $p['id_pembayaran'] ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return confirm('apakah anda yakin ingin menghapus data pembayaran ini?')"><i class="fa fa-trash"></i> Hapus</a>
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
