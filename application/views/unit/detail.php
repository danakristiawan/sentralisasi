<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('unit/add-pegawai/') . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id . '/'; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm" id="example2">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Bank</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pegawai as $r) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $r['nip']; ?></td>
                      <td><?= $r['nama']; ?></td>
                      <td><?= $r['nm_bank']; ?></td>
                      <td>
                        <a href="<?= base_url('unit/edit-detail/') . $r['id'] . '/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id; ?>" class="badge badge-success badge-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i></a>
                        <a href="<?= base_url('unit/delete-detail/') . $r['id'] . '/' . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i></a>
                      </td>
                    </tr>
                  <?php endforeach;  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>