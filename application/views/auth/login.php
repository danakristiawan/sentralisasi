<div class="login-box">
    <div class="login-logo">
        Login
    </div>
    <div class="card">
        <div class="card-body login-card-body">

            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login Gagal</strong> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <form action="" method="post" autocomplete="off">
                <div class="form-group has-feedback">
                    <label>NIP :</label>
                    <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>" placeholder="NIP" value="<?= set_value('nip'); ?>">
                    <?= form_error('nip', '<small class="text-danger pl-0">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-0">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>