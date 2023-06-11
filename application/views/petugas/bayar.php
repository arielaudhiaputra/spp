



<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('pembayaran'); ?>
		<form action="<?= base_url('petugas/pembayaran/proses_tambah') ?>" method="POST">
				<input type="text" name="id_users" id="id_users" hidden value="<?= $user['id'] ?>">
			<div class="card">
					<div class="card-header d-block">
						<h4 class="card-title float-left">SPP Saya</h4>
						<div class="d-inline ml-auto float-right" style="margin: 10px;">
							<h4> Belum dibayar : Rp. <?php
								if ($total['jumlah_bayar'] == NULL) {
									echo number_format($nominal['nominal'] - 0);
								} else{
									echo number_format($nominal['nominal'] - $total['jumlah_bayar']);
								}
							?></h4>
						</div>
					</div>

					<div class="card-body">
						<div class="row mt-3">

							<div class="col-xs-12 col-sm-3">
                                <div class="form-group">
									<label for="bulan_bayar">Bulan Bayar : </label>
									<select name="bulan_bayar" id="bulan_bayar" class="form-control" required>
										<option disabled selected hidden required>-- Bulan --</option>
											<option value="Januari">Januari</option>
											<option value="Februari">Februari</option>
											<option value="Maret">Maret</option>
											<option value="April">April</option>
											<option value="Mei">Mei</option>
											<option value="Juni">Juni</option>
											<option value="Juli">Juli</option>
											<option value="Agustus">Agustus</option>
											<option value="September">September</option>
											<option value="Oktober">Oktober</option>
											<option value="November">November</option>
											<option value="Desember">Desember</option>
									</select>
								</div>
								<?= form_error('bulan_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>


							<div class="col-xs-12 col-sm-4">
								<div class="form-group">
									<label for="jumlah_bayar">Jumlah Bayar :</label>
									<input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar">
								</div>
								<?= form_error('jumlah_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="col-xs-12 col-sm-2 mt-1 float-right">
                                <br>
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah </button>
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
								<th>Tahun</th>
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
										<td><?= $p['tahun'] ?></td>
										<td><?= $p['bulan_bayar'] ?></td>
                                        <td>Rp. <?= number_format( $p['jumlah_bayar']) ?></td>
                                        <td><?= $p['tgl_bayar'] ?></td>
										<td>
											<a href="<?= base_url('petugas/pembayaran/hapus_pembayaran/') . $p['id_pembayaran'] ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return confirm('apakah anda yakin ingin menghapus data pembayaran ini?')"><i class="fa fa-trash"></i> Hapus</a>
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
