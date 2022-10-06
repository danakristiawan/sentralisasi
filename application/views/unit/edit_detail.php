<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <form action="" method="post" autocomplete="off">
            <div class="card-body">
              <div class="form-group">
                <label for="">Bank :</label>
                <select name="nm_bank" class="form-control">
                  <?php foreach ($bank as $s) : ?>
                    <option value="<?= $s['nama']; ?>" <?= $s['nama'] == $pegawai['nm_bank'] ? 'selected' : ''; ?>><?= $s['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
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