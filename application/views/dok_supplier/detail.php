<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">

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
                      <th>Tgl Upload</th>
                      <th>Tgl Kirim</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    foreach ($supplier as $r) : $no++; ?>
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
                            <span class="text-primary">draft</span>
                          <?php endif; ?>
                        </td>
                        <td><?= $r['date_created'] == null ? '' : date('d-m-Y H:i:s', $r['date_created']); ?></td>
                        <td><?= $r['date_sent'] == null ? '' : date('d-m-Y H:i:s', $r['date_sent']); ?></td>
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