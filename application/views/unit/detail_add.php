<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <form action="" method="post" autocomplete="off">
            <div class="card-body">
              <div class="form-group">
                <label for="">NIP :</label>
                <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : '' ?>" value="<?= set_value('nip'); ?>">
                <div class="invalid-feedback">
                  <?= form_error('nip') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nama :</label>
                <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" value="<?= set_value('nama'); ?>">
                <div class="invalid-feedback">
                  <?= form_error('nama') ?>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>