<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('satker/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
            </div>
            <div class=" card-body">
              <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('satker/index/') . $thn . '/' . $b['kode']; ?>" class="btn btn-outline-secondary <?= $b['kode'] == $bln ? 'active' : '' ?> mb-3 mr-1"><?= $b['kode']; ?></a>
              <?php endforeach; ?>

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
                    foreach ($satker as $r) : $no++; ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r['kode']; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <td>
                          <?php
                          $kdsatker = $r['kode'];
                          $q = $this->db->query("SELECT COUNT(nip) AS jml FROM data_perubahan WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn'")->row_array();
                          ?>
                          <?= $q['jml']; ?>
                        </td>
                        <td><a href="<?= base_url('satker/detail/') . $kdsatker . '/'  . $bln . '/' . $thn; ?>"><i class="fa fa-search"></i></a></td>
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