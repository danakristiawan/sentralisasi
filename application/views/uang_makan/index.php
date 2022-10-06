<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?= $this->session->flashdata('message'); ?>
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('uang-makan/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
              <a href="<?= base_url('uang-makan/add/') . $thn; ?>" class="btn btn-outline-secondary float-right mr-2" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Jml Pegawai</th>
                      <th>Ket</th>
                      <th>File</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    foreach ($makan as $r) : $no++; ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r['nmbulan'] . ' ' . $r['tahun']; ?></td>
                        <td><?= number_format($r['jumlah'], 0, ',', '.'); ?></td>
                        <td><?= $r['ket']; ?></td>
                        <td><a href="<?= base_url('assets/files/') . $r['file']; ?>" download="download">
                            <i class="fa <?= $r['file'] == null ? '' : 'fa-file-pdf-o'; ?>"></i>
                          </a></td>
                        <td>
                          <?php if ($r['sts'] == '1') : ?>
                            <span class="text-primary">terkirim</span>
                          <?php else : ?>
                            <a href="<?= base_url('uang-makan/edit/') . $thn . '/' . $r['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="nav-icon fa fa-edit ml-1"></i></a>
                            <a href="<?= base_url('uang-makan/delete/') . $thn  . '/' . $r['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="nav-icon fa fa-trash ml-1"></i></a>
                            <a href="<?= base_url('uang-makan/kirim/') . $thn . '/' . $r['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Kirim" onclick="return confirm('Apakah Anda yakin akan mengirim data ini?');"><i class="nav-icon fa fa-send ml-1"></i></a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>