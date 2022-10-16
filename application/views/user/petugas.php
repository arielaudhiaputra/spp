<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?= $this->session->flashdata('petugas'); ?>
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">Data Petugas / <span><a href="<?= base_url('admin/user') ?>">Data Murid</a></span></h4>
					<div class="d-inline ml-auto float-right">
						<a  data-toggle="modal" data-target="#tambahPetugasModel" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
						<a href="<?= base_url('admin/user/pdf_petugas') ?>" type="submit" class="btn btn-danger"><i class="fa fa-file"></i> PDF </a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th width="30%">Name</th>
								<th>Email</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach($petugas as $s): ?>
									<tr>
										<td><?= $i; ?></td>
										<td>
											<div class="row">
												<div class="col-4">
													<img src="<?= base_url('assets/img/profile/'). $s['photo']; ?>" alt="Img Profil" class="img-thumbnail rounded-circle" width="80">
												</div>
												<div class="col-8 pl-2 mt-2">
													<span class="font-weight-bold"><?= $s['name']; ?></span> <br>
													<span class="font-weight-bold text-danger"><?= $s['level']; ?></span>
												</div>
											</div>
										</td>
										<td><?= $s['email'] ?></td>
										<td>
											<a data-toggle="modal" data-target="#editPetugasModel<?= $s['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('admin/user/hapus_petugas/') . $s['id'] ?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return confirm('apakah anda yakin ingin menghapus data karyawan ini ?')"><i class="fa fa-trash"></i> Hapus</a>
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



<?php foreach($petugas as $s): ?>
<div class="modal fade" id="editPetugasModel<?= $s['id']; ?>"  tabindex="-1" aria-labelledby="editPetugasModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPetugasModelLabel">Edit Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('admin/user/edit_petugas') ?>" method="POST">
       	<input type="hidden" name="id" id="id" value="<?= $s['id']; ?>">
      <div class="modal-body">
         <div class="form-group">
		 	<label for="name">Name :</label>
			<input type="text" class="form-control" id="name" name="name" value="<?= $s['name']; ?>" placeholder="Masukan nama lengkap" required>
         </div>

		 <div class="form-group">
			 <label for="email">Email :</label>
			<input type="tel" class="form-control" id="email" name="email" value="<?= $s['email']; ?>" placeholder="Masukan email" required>
         </div>

		 <div class="form-group">
			 <label for="password">Password :</label>
			<input type="tel" class="form-control" id="password" name="password" placeholder="********">
			<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>


<div class="modal fade" id="tambahPetugasModel"  tabindex="-1" aria-labelledby="tambahPetugasModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahPetugasModelLabel">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('admin/user/tambah_petugas') ?>" method="POST">
       	<input type="hidden" name="id" id="id" value="">
      <div class="modal-body">
         <div class="form-group">
		 	<label for="name">Name :</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Masukan nama lengkap" required>
         </div>

		 <div class="form-group">
			 <label for="email">Email :</label>
			<input type="tel" class="form-control" id="email" name="email" placeholder="Masukan email" required>
         </div>

		 <div class="form-group">
			 <label for="password">Password :</label>
			<input type="tel" class="form-control" id="password" name="password" placeholder="Masukan Password">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
