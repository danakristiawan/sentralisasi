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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Nomor</th>
                    <th>Tgl</th>
                    <th>Uraian</th>
                    <th>TMT</th>
                    <th>File</th>
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
                    </tr>
                  <?php endforeach; ?>
                </tbody>
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