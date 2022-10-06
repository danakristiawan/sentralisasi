<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <form action="" method="post">
            <div class="card-header">
              <?= $this->session->flashdata('message'); ?>
              <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('perubahan/index/') . $t['tahun']; ?>" class="btn btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> mr-1"><?= $t['tahun']; ?></a>
              <?php endforeach; ?>
              <?php if ($kode) : ?>
                <a href="<?= base_url('perubahan/cetak/') . $thn . '/' . $bln; ?>" class="btn btn-outline-secondary float-right" download="download" data-toggle="tooltip" data-placement="bottom" title="Register Perubahan"><i class="fa fa-file-text-o"></i></a>
              <?php else :  ?>
                <a href="<?= base_url('perubahan/kirim/') . $thn . '/' . $bln; ?>" class="btn btn-outline-danger float-right" data-toggle="tooltip" data-placement="bottom" title="Kirim" onclick="return confirm('Apakah Anda yakin akan mengirim data ini?');"><i class="fa fa-send"></i></a>
                <a href="<?= base_url('perubahan/add-pegawai/') . $thn . '/' . $bln; ?>" class="btn btn-outline-secondary float-right mr-2" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-user-plus"></i></a>
              <?php endif; ?>

            </div>
            <div class=" card-body">
              <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('perubahan/index/') . $thn . '/' . $b['kode']; ?>" class="btn btn-outline-secondary <?= $b['kode'] == $bln ? 'active' : '' ?> mb-3 mr-1"><?= $b['kode']; ?></a>
              <?php endforeach; ?>

              <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis</th>
                      <th>Nomor</th>
                      <th>Tgl</th>
                      <th>Uraian</th>
                      <th>TMT</th>
                      <th>File</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    foreach ($perubahan as $r) : $no++;
                      $nip = $r['nip']; ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $nip; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <td><?= $r['dok']; ?></td>
                        <td><?= $r['no']; ?></td>
                        <td><?= $r['tgl'] == null ? '' : date('d-m-Y', $r['tgl']); ?></td>
                        <td><?= $r['uraian']; ?></td>
                        <td><?= $r['tmt'] == null ? '' : date('d-m-Y', $r['tmt']); ?></td>
                        <td><a href="<?= base_url('assets/files/') . $r['file']; ?>" download="download">
                            <i class="fa <?= $r['file'] == null ? '' : 'fa-file-pdf-o'; ?>"></i>
                          </a></td>
                        <td>
                          <?php if ($kode) : ?>
                            <span class="text-primary"><?= $r['sts'] == '1' ? 'terkirim' : 'draft'; ?></span>
                          <?php else : ?>
                            <a href="<?= base_url('perubahan/edit/') . $thn . '/' . $bln . '/' . $r['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="nav-icon fa fa-edit ml-1"></i></a>
                            <a href="<?= base_url('perubahan/delete/') . $thn . '/' . $bln  . '/' . $r['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="nav-icon fa fa-trash ml-1"></i></a>
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