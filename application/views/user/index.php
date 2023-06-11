<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('murid'); ?>
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">Data Murid | <span><a href="<?= base_url('admin/user/petugas') ?>">Petugas</a></span></h4>
					<div class="d-inline ml-auto float-right">
						<a href="<?= base_url('admin/user/tambah_murid') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
						<a href="<?= base_url('admin/user/pdf_murid') ?>" type="submit" class="btn btn-danger"><i class="fa fa-file"></i> PDF </a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th>Name</th>
								<th>Kelas</th>
								<th>NISN/NIS</th>
								<th>Tahun Angkatan</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach($users as $s): ?>
									<tr>
										<td><?= $i; ?></td>
										<td><?= $s['name']; ?></td>
										<td><?= $s['nama_kelas']; ?></td>
										<td>
											<address>
												NISN: <?= $s['nisn']; ?><br>
												NIS: <?= $s['nis']; ?>
											</address>
										</td>
										<td><?= $s['tahun']; ?></td>
										<td>
											<a href="<?= base_url('admin/user/edit_murid/') . $s['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('admin/user/hapus_murid/') . $s['id'] ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return confirm('apakah anda yakin ingin menghapus data karyawan ini ?')"><i class="fa fa-trash"></i> Hapus</a>
										</td>
									</tr>
								<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
