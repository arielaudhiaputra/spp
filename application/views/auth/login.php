
<div class="container" style="margin-top: 60px">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>

                                <?= $this->session->flashdata('message'); ?>

                            <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="email" name="email" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                         <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>')?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="Password">
                                         <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
