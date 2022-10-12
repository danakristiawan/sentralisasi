<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h2 style="font-weight:200;"><i class="fa fa-building-o"></i> &nbsp; <?= $user['nmsatker']; ?></h2>
            <span class="ml-5" style="font-weight:200;"><i class="fa fa-user-o"></i>&nbsp;<?= $user['role']; ?></span>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($tahun as $r) : ?>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">Tahun <?= $r['tahun']; ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Bulan</th>
                      <th>Dokumen</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($bulan as $s) :
                      $kdsatker = getSatker();
                      $bln = $s['kode'];
                      $thn = $r['tahun'];
                      $dokumen = $this->db->get_where('data_register', ['kdsatker' => $kdsatker, 'bulan' => $bln, 'tahun' => $thn])->row_array();
                    ?>
                      <tr>

                        <td><?= $s['bulan']; ?></td>

                        <?php if ($dokumen) : ?>
                          <td>
                            <?= $dokumen['jumlah']; ?>
                          </td>
                          <td>
                            <a href="<?= base_url('home/detail/') . $bln . '/' . $thn; ?>"><i class="fa fa-search"></i></a>
                          </td>
                        <?php else : ?>
                          <td></td>
                          <td></td>
                        <?php endif; ?>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>