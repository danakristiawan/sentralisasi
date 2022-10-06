<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
        <form action="" method="post" autocomplete="off">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                <label for="">Tanggal :</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </div>
                  <input class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" data-date-format="dd-mm-yyyy" data-provide="datepicker" name="tanggal" value="<?= set_value('tanggal'); ?>">
                  <div class="invalid-feedback">
                    <?= form_error('tanggal') ?>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Jenis :</label>
                  <select name="jenis" class="form-control">
                    <?php foreach ($jenis as $r) : ?>
                      <option value="<?= $r['id']; ?>"><?= $r['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Status :</label>
                  <select name="status" class="form-control">
                    <?php foreach ($status as $r) : ?>
                      <option value="<?= $r['id']; ?>"><?= $r['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="mb-0">Agenda : </label> <p class="text-muted text-sm mb-0 mt-0">Uraian maksimal 255 karakter.</p>
              <textarea name="agenda" class="form-control  <?= form_error('agenda') ? 'is-invalid' : '' ?>" cols="10" rows="5"></textarea>
              <div class="invalid-feedback">
                <?= form_error('agenda') ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="mb-0">Progres : </label> <p class="text-muted text-sm mb-0 mt-0">Uraian maksimal 255 karakter.</p>
              <textarea name="progres" class="form-control  <?= form_error('progres') ? 'is-invalid' : '' ?>" cols="10" rows="5"></textarea>
              <div class="invalid-feedback">
                <?= form_error('progres') ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="mb-0">Keterangan : </label> <p class="text-muted text-sm mb-0 mt-0">Uraian maksimal 255 karakter.</p>
              <textarea name="keterangan" class="form-control  <?= form_error('keterangan') ? 'is-invalid' : '' ?>" cols="10" rows="5"></textarea>
              <div class="invalid-feedback">
                <?= form_error('keterangan') ?>
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