
                <!-- Begin Page Content -->
                <div class="container-fluid" >
					<div class="laptop">
                    <!-- Page Heading -->
                    <div class="row mb-5">
						<div class="col-12 col-md-8">
                        <?= $this->session->flashdata('profile'); ?>
							<div class="card">

								<form action="<?= base_url('profile'); ?>" method="post">
								    <input type="text" name="id" id="id" hidden value="<?= $profile['id'] ?>">
									<div class="card-header">
										<h4 class="card-title">Edit Profile</h4>
									</div>

									<div class="card-body border-top py-0 my-3">
										<h4 class="text-muted my-3">Profile</h4>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Nama Lengkap : </label>
                                                    <input type="text" value="<?= $profile['name'] ?>" name="name" id="name"  class="form-control" placeholder="Masukan nama lengkap">
                                                    <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>')?>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="id_kelas">Kelas : </label>
                                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                                        <option disabled selected hidden>
                                                            <?php if(isset($user['id_kelas'])): ?>
                                                                <?= $user['nama_kelas'] ?>
                                                            <?php else: ?>
                                                                -- Pilih kelas --
                                                            <?php endif; ?>
                                                        </option>
                                                        <?php foreach($kelas as $k): ?>
                                                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>')?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="nisn">NISN : </label>
                                                    <input type="text" value="<?= $profile['nisn'] ?>" name="nisn" id="nisn"  class="form-control" placeholder="Masukan NISN">
                                                    <?php echo form_error('nisn', '<small class="text-danger pl-3">', '</small>')?>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="nis">NIS : </label>
                                                    <input type="text" value="<?= $profile['nis'] ?>" name="nis" id="nis"  class="form-control" placeholder="Masukana NIS">
                                                    <?php echo form_error('nis', '<small class="text-danger pl-3">', '</small>')?>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-4">
                                                <div class="form-group">
                                                    <label for="no_telp">No.Telp : </label>
                                                    <input type="text" value="<?= $profile['no_telp'] ?>" name="no_telp" id="no_telp"  class="form-control" placeholder="Masukana No.Telp">
                                                    <?php echo form_error('no_telp', '<small class="text-danger pl-3">', '</small>')?>
                                                </div>
                                            </div>
                                        </div>
									</div>

									<div class="card-body border-top py-0 my-3">
										<h4 class="text-muted my-3">Akun</h4>
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label for="email">Email :</label>
													<input type="text" value="<?= $profile['email'] ?>" name="email" id="email"  class="form-control" placeholder="Masukan Email">
                                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>')?>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label for="password">Password :</label>
													<input type="password" name="password" id="password" class="form-control" placeholder="********" />
                                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>')?>
													<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
												</div>
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="row w-100">
											<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
												<button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>



						<div class="col-12 col-md-4">
                            <?= form_open_multipart('profile/update_photo'); ?>
                                <div class="card">
                                    <input type="text" name="id" id="id" hidden value="<?= $profile['id'] ?>">
                                    <div class="card-header">
                                        <h4 class="card-title">Foto Profile</h4>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="<?= base_url('assets/img/profile/'). $profile['photo']; ?>" alt="Photo Profil" width="200px">
                                    </div>

                                    <div class="card-footer">
                                        <div class="custom-file mb-3">
                                            <input type="file" name="photo" class="custom-file-input" id="photo" aria-describedby="photo">
                                            <label class="custom-file-label" for="photo">Pilih Gambar</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block mt-2">Simpan <i class="fa fa-save"></i></button>
                                 </form>

                                        <form action="<?= base_url('profile/hapus_photo') ?>" method="post">
                                            <input type="text" name="id" id="id" hidden value="<?= $profile['id'] ?>">
                                            <input type="text" hidden value="default.png" name="photo" id="photo">
                                            <button type="submit" class="btn btn-danger btn-block mt-2">Hapus <i class="fa fa-trash"></i></button>
                                        </form>

                                    </div>
                                </div>
                        </div>
					</div>

					</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
