<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('per-bank/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
            </div>
            <div class=" card-body">
              <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('per-bank/index/') . $thn . '/' . $b['kode']; ?>" class="btn btn-outline-secondary <?= $b['kode'] == $bln ? 'active' : '' ?> mb-3 mr-1"><?= $b['kode']; ?></a>
              <?php endforeach; ?>

              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>File</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    $total = 0;
                    foreach ($bank as $r) : $no++; ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r['kode']; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <td>
                          <?php
                          $query = $this->db->get_where('view_per_bank', ['bulan' => $bln, 'tahun' => $thn, 'kdsubanak' => $r['nama']])->row_array();
                          echo $query['jumlah'];
                          ?>
                        </td>
                        <td>
                          <a href="<?= base_url('per-bank/file/') . $r['nama'] . '/'  . $bln . '/' . $thn; ?>" target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                        </td>
                        <td><a href="<?= base_url('per-bank/satker/') . $r['nama'] . '/'  . $bln . '/' . $thn; ?>"><i class="fa fa-search"></i></a></td>
                      </tr>
                    <?php
                      $total += $query['jumlah'];
                    endforeach; ?>
                  </tbody>
                  <thead>
                    <tr>
                      <th colspan="3">Jumlah</th>
                      <th><?= number_format($total, 0, ',', '.'); ?></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                </table>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>