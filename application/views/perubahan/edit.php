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
              <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?= $perubahan['nama']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="">Jenis Dokumen:</label>
                <select name="dok_id" class="form-control">
                  <?php foreach ($dokumen as $s) : ?>
                    <option value="<?= $s['id']; ?>" <?= $s['id'] == $perubahan['dok_id'] ? 'selected' : ''; ?>><?= $s['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="no">Nomor Dokumen:</label>
                    <input type="text" name="no" class="form-control <?= form_error('no') ? 'is-invalid' : '' ?>" value="<?= $perubahan['no']; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('no') ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="">Tgl Dokumen :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                      <input class="form-control <?= form_error('tgl') ? 'is-invalid' : '' ?>" data-date-format="dd-mm-yyyy" data-provide="datepicker" name="tgl" value="<?= $perubahan['tgl'] == null ? '' : date('d-m-Y', $perubahan['tgl']); ?>">
                      <div class="invalid-feedback">
                        <?= form_error('tgl') ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="uraian">Uraian Dokumen:</label>
                    <input type="text" name="uraian" class="form-control <?= form_error('uraian') ? 'is-invalid' : '' ?>" value="<?= $perubahan['uraian']; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('uraian') ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tmt">TMT:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                      <input class="form-control <?= form_error('tmt') ? 'is-invalid' : '' ?>" data-date-format="dd-mm-yyyy" data-provide="datepicker" name="tmt" value="<?= $perubahan['tmt'] == null ? '' : date('d-m-Y', $perubahan['tmt']); ?>">
                      <div class="invalid-feedback">
                        <?= form_error('tmt') ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="">Upload File :</label>
                <div class="custom-file">
                  <input type="file" class="form-control custom" name="file" required>
                </div>
                <span><small class="text-muted">file dengan format .pdf, ukuran maksimal 10 Mb</small></span>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= base_url('perubahan/index/') . $tahun . '/' . $bulan; ?>" class="btn btn-sm btn-secondary float-left"><i class="fa fa-undo"></i> Kembali</a>
              <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-save"></i> Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>

  </div>
</section>