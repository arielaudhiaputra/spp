<div class="container-fluid">
	<div class="row">
		<div class="col-12">
        <?= $this->session->flashdata('spp'); ?>
			<div class="card">
				<form action="<?= base_url('admin/spp') ?>" method="POST">
					<div class="card-header">
						<h4 class="card-title">SPP SMKN 4 Bogor</h4>
                    </div>

					<div class="card-body border-top py-0 my-3">
						<div class="row mt-3">
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<label for="tahun">Tahun : </label>
									<input type="text" name="tahun" id="tahun" class="form-control" placeholder="Masukan Tahun Bayar">
									<?php echo form_error('tahun', '<small class="text-danger pl-3">', '</small>')?>
								</div>
							</div>

							<div class="col-xs-12 col-sm-4">
                                <div class="form-group">
									<label for="nominal">Nominal : </label>
									<input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukan Nominal Tahun Bayar">
									<?php echo form_error('nominal', '<small class="text-danger pl-3">', '</small>')?>
								</div>
							</div>

							<div class="col-xs-12 col-sm-2 mt-1">
                                <br>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah </button>
							</div>
							<div class="col-xs-12 col-sm-2 mt-1" style="margin-left: -55px;">
                                <br>
                                <a href="<?= base_url('admin/spp/pdf') ?>" type="submit" class="btn btn-danger"><i class="fa fa-file"></i> PDF </a>
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
                                <th>Nominal</th>
								<th>Aksi</th>
							</thead>
							<tbody>
                                <?php $i = 1 ?>
                                <?php foreach($spp as $s): ?>
									<tr>
                                        <td><?= $i ?></td>
                                        <td><?= $s['tahun'] ?></td>
										<td>Rp. <?= number_format($s['nominal']) ?></td>
										<td width="20%">
											<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSppModal<?= $s['id_spp']; ?>"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('admin/spp/hapus_spp/') . $s['id_spp'] ?>" class="btn btn-danger btn-sm btn-delete" onclick="return confirm('apakah anda yakin ingin menghapus data barang ini ?')"><i class="fa fa-trash"></i> Hapus</a>
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

<?php foreach($spp as $s): ?>
<div class="modal fade" id="editSppModal<?= $s['id_spp']; ?>"  tabindex="-1" aria-labelledby="editSppModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSppModalLabel">Edit SPP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('admin/spp/edit_spp') ?>" method="POST">
       	<input type="hidden" name="id_spp" id="id_spp" value="<?= $s['id_spp']; ?>">
      <div class="modal-body">
         <div class="form-group">
		 	<label for="tahun">Tahun :</label>
			<input type="text" class="form-control" id="tahun" name="tahun" value="<?= $s['tahun']; ?>" required>
         </div>

		 <div class="form-group">
			 <label for="nominal">Nominal :</label>
			<input type="tel" class="form-control" id="nominal" name="nominal" value="<?= $s['nominal']; ?>" required>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit SPP</button>
      </div>
  	  </form>
    </div>
  </div>
</div>
<?php endforeach; ?>