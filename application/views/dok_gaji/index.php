<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('dok-gaji/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
            </div>
            <div class=" card-body">
              <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('dok-gaji/index/') . $thn . '/' . $b['kode']; ?>" class="btn btn-outline-secondary <?= $b['kode'] == $bln ? 'active' : '' ?> mb-3 mr-1"><?= $b['kode']; ?></a>
              <?php endforeach; ?>

              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                      <th>#</th>
                      <th>Tgl Kirim</th>
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
                        <td>
                          <?php
                          $kdsatker = $r['kode'];
                          $q = $this->db->query("SELECT COUNT(nip) AS jml  FROM data_perubahan WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn'")->row_array();
                          ?>
                          <?= $q['jml']; ?>
                        </td>
                        <td>
                          <?php
                          $s = $this->db->query("SELECT jumlah,date_created FROM data_register WHERE kdsatker='$kdsatker' AND bulan='$bln' AND tahun='$thn'")->row_array();
                          ?>
                          <?php if ($s) :  ?>
                            <span class="badge badge-success">terkirim</span>
                            <a href="<?= base_url('dok-gaji/reset/') . $kdsatker . '/'  . $bln . '/' . $thn; ?>" class="ml-2" onclick="return confirm('Apakah Anda yakin akan mereset data ini?');"><i class="fa fa-times" data-toggle="tooltip" data-placement="bottom" title="Reset"></i></a>
                          <?php else :  ?>
                            <span class="badge badge-danger">draft</span>
                            <a href="<?= base_url('dok-gaji/kirim/') . $kdsatker . '/'  . $bln . '/' . $thn . '/' . $q['jml']; ?>" class="ml-2" onclick="return confirm('Apakah Anda yakin akan mengirim data ini?');"><i class="fa fa-check" data-toggle="tooltip" data-placement="bottom" title="Kirim"></i></a>
                          <?php endif;  ?>
                        </td>
                        <td><a href="<?= base_url('dok-gaji/detail/') . $kdsatker . '/'  . $bln . '/' . $thn; ?>"><i class="fa fa-search"></i></a>
                        </td>
                        <td><?= $s['date_created'] == null ? '' : date('d-m-Y H:i:s', $s['date_created']); ?></td>
                      </tr>
                    <?php
                      $total += $q['jml'];
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
          </form>
        </div>
      </div>
    </div>

  </div>
</section>