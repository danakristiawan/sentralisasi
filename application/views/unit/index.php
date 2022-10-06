<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('unit/add'); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fa fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm" id="example2">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($unit as $r) : $eselon2_id = $r['id']; ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td>
                        <?= $r['nama']; ?>
                        <a href="<?= base_url('unit/edit/') . $eselon2_id; ?>" class="badge badge-success badge-sm ml-2"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i></a>
                        <a href="<?= base_url('unit/delete/') . $eselon2_id; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i></a>
                        <a href="<?= base_url('unit/add-2/') . $eselon2_id; ?>" class="badge badge-primary badge-sm"><i class="fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Tambah"></i></a>
                        <!-- level 2 -->
                        <ul class="mb-0">
                          <?php
                          $row = $this->db->get_where('ref_eselon3', ['eselon2_id' => $eselon2_id])->result_array();
                          foreach ($row as $r) : $eselon3_id = $r['id'];
                          ?>
                            <li>
                              <?= $r['nama']; ?>
                              <a href="<?= base_url('unit/edit-2/') . $eselon3_id; ?>" class="badge badge-success badge-sm ml-2"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i></a>
                              <a href="<?= base_url('unit/delete-2/') . $eselon3_id; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i></a>
                              <a href="<?= base_url('unit/add-3/') . $eselon2_id . '/' . $eselon3_id; ?>" class="badge badge-primary badge-sm"><i class="fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Tambah"></i></a>
                              <a href="<?= base_url('unit/detail-2/') . $eselon2_id . '/' . $eselon3_id; ?>" class="badge badge-info badge-sm"><i class="fa fa-user" data-toggle="tooltip" data-placement="bottom" title="Detail"></i></a>
                              <!-- level 3 -->
                              <ul>
                                <?php
                                $row = $this->db->get_where('ref_eselon4', ['eselon3_id' => $eselon3_id])->result_array();
                                foreach ($row as $r) : $eselon4_id = $r['id'];
                                ?>
                                  <li>
                                    <?= $r['nama']; ?>
                                    <a href="<?= base_url('unit/edit-3/') . $eselon4_id; ?>" class="badge badge-success badge-sm ml-2"><i class="fa fa-edit" data-toggle="tooltip" data-placement="bottom" title="Ubah"></i></a>
                                    <a href="<?= base_url('unit/delete-3/') . $eselon4_id; ?>" class="badge badge-danger badge-sm" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i></a>
                                    <a href="<?= base_url('unit/detail/') . $eselon2_id . '/' . $eselon3_id . '/' . $eselon4_id; ?>" class="badge badge-info badge-sm"><i class="fa fa-user" data-toggle="tooltip" data-placement="bottom" title="Detail"></i></a>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                              <!-- end level 3 -->
                            </li>
                          <?php endforeach; ?>
                        </ul>
                        <!-- end level 2 -->
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