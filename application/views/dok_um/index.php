<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('dok-um/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
            </div>
            <div class=" card-body">
              <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('dok-um/index/') . $thn . '/' . $b['kode']; ?>" class="btn btn-outline-secondary <?= $b['kode'] == $bln ? 'active' : '' ?> mb-3 mr-1"><?= $b['kode']; ?></a>
              <?php endforeach; ?>

              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Berkas</th>
                      <th>Jml Peg</th>
                      <th>File</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    $total = 0;
                    foreach ($satker as $r) : $no++; ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r['kode']; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <?php
                        $kdsatker = $r['kode'];
                        $s = $this->db->query("SELECT COUNT(jumlah) AS jml FROM data_uang_makan WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn' GROUP BY kdsatker,tahun,bulan")->row_array();
                        $s ? $jmla = $s['jml'] : $jmla = 0;
                        $q = $this->db->query("SELECT jumlah AS jml,file,sts FROM data_uang_makan WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn'")->row_array();
                        $q ? $jmlb = $q['jml'] : $jmlb = 0;
                        $q ? $file = $q['file'] : $file = '';
                        ?>
                        <td><a href="<?= base_url('dok-um/detail/') . $kdsatker . "/" . $thn . "/" . $bln; ?>"><?= $jmla; ?></a></td>
                        <td><?= $jmlb; ?></td>
                        <td><a href="<?= base_url('assets/files/') . $file; ?>" download="download">
                            <i class="fa <?= $file == '' ? '' : 'fa-file-pdf-o'; ?>"></i>
                          </a></td>
                        <td>
                          <?php if ($q) : ?>
                            <?php if ($q['sts'] == '1') : ?>
                              <span class="text-primary">terkirim</span>
                            <?php else : ?>
                              <span class="text-primary"></span>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php
                      $total += $jmlb;
                    endforeach; ?>
                  </tbody>
                  <thead>
                    <tr>
                      <th colspan="4">Jumlah</th>
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