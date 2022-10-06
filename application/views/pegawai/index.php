<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('pegawai/add'); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kdanak</th>
                    <th>Kdsubanak</th>
                    <th>NIP</th>
                    <th>Nmpeg</th>
                    <th>Kdgol</th>
                    <th>Nmgol1</th>
                    <th>Rekening</th>
                    <th>NPWP</th>
                    <th>Nmrek</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0;
                  foreach ($pegawai as $u) : $no++; ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $u['kdanak']; ?></td>
                      <td><?= $u['kdsubanak']; ?></td>
                      <td><?= $u['nip']; ?></td>
                      <td><?= $u['nmpeg']; ?></td>
                      <td><?= $u['kdgol']; ?></td>
                      <td><?= $u['nmgol1']; ?></td>
                      <td><?= $u['rekening']; ?></td>
                      <td><?= $u['npwp']; ?></td>
                      <td><?= $u['nmrek']; ?></td>
                      <td>
                        <a href="<?= base_url('pegawai/edit/') . $u['id']; ?>" class="badge badge-success badge-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i></a>
                        <a href="<?= base_url('pegawai/delete/') . $u['id']; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>