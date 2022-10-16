<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<form action="<?= base_url('admin/user/proses_edit_murid') ?>" method="post">
                    <input type="text" name="id" id="id" hidden value="<?= $murid['id'] ?>">

                    <div class="d-inline ml-auto float-right" style="margin: 10px;">
						<a href="<?= base_url('admin/user')?>" class="btn btn-warning btn-sm">Kembali</a>
					</div>
					<div class="card-header">
						<h4 class="card-title">Edit Data Murid</h4>
					</div>
					<div class="card-body border-top py-0 my-3">
						<h4 class="text-muted my-3">Profil</h4>
						<div class="row">
                            <div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="name">Nama Lengkap : </label>
									<input value="<?= $murid['name'] ?>" type="text" name="name" id="name" class="form-control" placeholder="Masukana Nama Lengkap Murid">
								</div>
							</div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
									<label for="id_kelas">kelas : </label>
									<input value="<?= $murid['nama_kelas'] ?>" type="text" name="id_kelas" id="id_kelas" disabled class="form-control" placeholder="Masukana Nama Lengkap Murid">
								</div>
                            </div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="nisn">NISN : </label>
									<input type="tel" value="<?= $murid['nisn'] ?>" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN">
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
									<label for="nis">NIS : </label>
									<input type="tel" value="<?= $murid['nis'] ?>" name="nis" id="nis" class="form-control" placeholder="Masukan NIS">
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
									<input type="text" value="<?= $murid['email'] ?>" name="email" id="email" class="form-control" placeholder="Masukan Email">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="********">
									<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
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
