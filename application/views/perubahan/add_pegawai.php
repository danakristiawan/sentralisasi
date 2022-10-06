<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <form action="" method="post" autocomplete="off">
              <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari nama atau nip pegawai.." aria-label="Cari nama pegawai.." aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i> Cari</button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pegawai as $r) :
                    $nip = $r['nip'];
                    $nama = $r['nama']; ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $nip; ?></td>
                      <td><?= $nama; ?></td>
                      <td>
                        <input class="form-check-input-perubahan" type="checkbox" data-nip="<?= $nip; ?>" data-kdsatker="<?= $kdsatker; ?>" data-tahun="<?= $tahun; ?>" data-bulan="<?= $bulan; ?>"> tambah
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?= base_url('perubahan/index/') . $tahun . '/' . $bulan; ?>" class="btn btn-sm btn-secondary float-left"><i class="fa fa-undo"></i> Kembali</a>
          </div>
        </div>
      </div>
    </div>



  </div>
</section>