<!-- This view using AdminLTE-3 template -->
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="card-header">
              <div class="card-text">
                <p><?= $this->session->flashdata('message'); ?></p>
              </div>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="">Bulan:</label>
                    <select name="bulan" class="form-control">
                      <?php foreach ($bulan as $s) : ?>
                        <option value="<?= $s['kode']; ?>" <?= $s['kode'] == $lembur['bulan'] ? 'selected' : ''; ?>><?= $s['bulan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="jumlah">Jumlah Pegawai:</label>
                    <input type="text" name="jumlah" class="form-control <?= form_error('jumlah') ? 'is-invalid' : '' ?>" value="<?= $lembur['jumlah']; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('jumlah') ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="">Upload File :</label>
                <div class="custom-file">
                  <input type="file" class="form-control custom" name="file" required>
                </div>
                <span><small class="text-muted">file dengan format pdf|rar|zip, ukuran maksimal 10 Mb</small></span>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= base_url('uang-lembur/index/') . $tahun; ?>" class="btn btn-sm btn-secondary float-left"><i class="fa fa-undo"></i> Kembali</a>
              <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-save"></i> Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>

  </div>
</section>