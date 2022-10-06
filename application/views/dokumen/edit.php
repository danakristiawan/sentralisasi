<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <form action="" method="post" autocomplete="off">
            <div class="card-header">

            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="">Kode :</label>
                <input type="text" name="kode" class="form-control <?= form_error('kode') ? 'is-invalid' : '' ?>" value="<?= $dokumen['kode']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('kode') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nama :</label>
                <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" value="<?= $dokumen['nama']; ?>">
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