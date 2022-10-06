<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0;
                  $total = 0;
                  foreach ($satker as $r) : $no++; ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['kdsatker']; ?></td>
                      <td><?= $r['nmsatker']; ?></td>
                      <td><?= $r['jumlah']; ?></td>
                      <td><a href="<?= base_url('per-bank/detail/') . $r['kdsubanak'] . '/'   . $r['kdsatker'] . '/'  . $r['bulan'] . '/' . $r['tahun']; ?>"><i class="fa fa-search"></i></a></td>
                    </tr>
                  <?php
                    $total += $r['jumlah'];
                  endforeach; ?>
                </tbody>
                <thead>
                  <tr>
                    <th colspan="3">Jumlah</th>
                    <th><?= number_format($total, 0, ',', '.'); ?></th>
                    <th></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>

  </div>
</section>