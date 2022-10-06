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
                <label for="">Kdanak :</label>
                <input type="text" name="kdanak" class="form-control <?= form_error('kdanak') ? 'is-invalid' : '' ?>" value="<?= $pegawai['kdanak']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('kdanak') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Kdsubanak :</label>
                <input type="text" name="kdsubanak" class="form-control <?= form_error('kdsubanak') ? 'is-invalid' : '' ?>" value="<?= $pegawai['kdsubanak']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('kdsubanak') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">NIP :</label>
                <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : '' ?>" value="<?= $pegawai['nip']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('nip') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nmpeg :</label>
                <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : '' ?>" value="<?= $pegawai['nmpeg']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('nmpeg') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Kdgol :</label>
                <input type="text" name="kdgol" class="form-control <?= form_error('kdgol') ? 'is-invalid' : '' ?>" value="<?= $pegawai['kdgol']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('kdgol') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nmgol1 :</label>
                <input type="text" name="nmgol1" class="form-control <?= form_error('nmgol1') ? 'is-invalid' : '' ?>" value="<?= $pegawai['nmgol1']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('nmgol1') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Rekening :</label>
                <input type="text" name="rekening" class="form-control <?= form_error('rekening') ? 'is-invalid' : '' ?>" value="<?= $pegawai['rekening']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('rekening') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">NPWP :</label>
                <input type="text" name="npwp" class="form-control <?= form_error('npwp') ? 'is-invalid' : '' ?>" value="<?= $pegawai['npwp']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('npwp') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="">Nmrek :</label>
                <input type="text" name="nmrek" class="form-control <?= form_error('nmrek') ? 'is-invalid' : '' ?>" value="<?= $pegawai['nmrek']; ?>">
                <div class="invalid-feedback">
                  <?= form_error('nmrek') ?>
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