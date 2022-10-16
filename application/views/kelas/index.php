<div class="container">
<div class="row mt-5">
		<div class="col-12">
		<?= $this->session->flashdata('kelas'); ?>
			<div class="card">
				<div class="card-header d-block">
					<h4 class="card-title float-left">Kelas</h4>
					<div class="d-inline ml-auto float-right">
						<a data-toggle="modal" data-target="#tambahKelasModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
						<a href="<?= base_url('admin/kelas/pdf') ?>" type="submit" class="btn btn-danger"><i class="fa fa-file"></i> PDF </a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="table" class="table table-striped datatable">
							<thead>
								<th>No</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach($kelas as $k): ?>
									<tr>
										<td><?= $i ?></td>
                                        <td><?= $k['nama_kelas'] ?></td>
										<td>
											<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editKelasModal<?= $k['id_kelas']; ?>"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('admin/kelas/hapus_kelas/') . $k['id_kelas']?>" class="btn btn-danger btn-sm btn-delete ml-2" onclick="return confirm('apakah anda yakin ingin menghapus data kelas ini ?')"><i class="fa fa-trash"></i> Hapus</a>										</td>
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



<div class="modal fade" id="tambahKelasModal"  tabindex="-1" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('admin/kelas/tambah_kelas') ?>" method="POST">
      <div class="modal-body">
         <div class="form-group">
		 	<label for="nama_kelas">Kelas :</label>
			<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
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



<?php foreach($kelas as $k): ?>
<div class="modal fade" id="editKelasModal<?= $k['id_kelas']; ?>"  tabindex="-1" aria-labelledby="editKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('admin/kelas/edit_kelas') ?>" method="POST">
       	<input type="hidden" name="id_kelas" id="id_kelas" value="<?= $k['id_kelas']; ?>">
      <div class="modal-body">
         <div class="form-group">
		 	<label for="nama_kelas">Kelas :</label>
			<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $k['nama_kelas']; ?>" required>
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