<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<form action="<?= base_url('admin/user/tambah_murid') ?>" method="post">
                    <div class="d-inline ml-auto float-right" style="margin: 10px;">
						<a href="<?= base_url('admin/user')?>" class="btn btn-warning btn-sm">Kembali</a>
					</div>
					<div class="card-header">
						<h4 class="card-title">Tambah Murid</h4>
					</div>
					<div class="card-body border-top py-0 my-3">
						<h4 class="text-muted my-3">Profil</h4>
						<div class="row">
                            <div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="name">Nama Lengkap : </label>
									<input type="text" name="name" id="name" class="form-control" placeholder="Masukana Nama Lengkap Murid">
									<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group">
                                    <label for="id_spp">Angkatan : </label>
                                    <select name="id_spp" id="id_spp" class="form-control">
                                        <option value="" disabled selected hidden>-- Pilih Kelas --</option>
                                        <?php foreach($spp as $k): ?>
                                            <option value="<?= $k['id_spp']; ?>"><?= $k['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_spp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-3">
                                <div class="form-group">
                                    <label for="id_kelas">Kelas : </label>
                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                        <option value="" disabled selected hidden>-- Pilih Kelas --</option>
                                        <?php foreach($kelas as $k): ?>
                                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="nisn">NISN : </label>
									<input type="tel" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN">
									<?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
									<label for="nis">NIS : </label>
									<input type="tel" name="nis" id="nis" class="form-control" placeholder="Masukan NIS">
									<?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body border-top py-0 my-3">
						<h4 class="text-muted my-3">Akun</h4>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email">
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
									<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
