</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div></div>
  <div class="text-right mr-2">
    &copy; 2017-2022 Bagian Keuangan.
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="<?= base_url(); ?>/assets/plugins/chartjs-old/Chart.min.js"></script>

<script>
  $('.datepicker').datepicker();
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  $('.form-check-input-peg').on('click', function() {
    const nip = $(this).data('nip');
    const nama = $(this).data('nama');
    const eselon2_id = $(this).data('eselon2_id');
    const eselon3_id = $(this).data('eselon3_id');
    const eselon4_id = $(this).data('eselon4_id');
    $.ajax({
      url: "<?= base_url('unit/addnip'); ?>",
      type: 'post',
      data: {
        nip: nip,
        nama: nama,
        eselon2_id: eselon2_id,
        eselon3_id: eselon3_id,
        eselon4_id: eselon4_id
      },
      success: function() {}
    });
  });

  $('.form-check-input-perubahan').on('click', function() {
    let tahun = $(this).data('tahun');
    let bulan = $(this).data('bulan');
    let kdsatker = $(this).data('kdsatker');
    let nip = $(this).data('nip');
    $.ajax({
      url: "<?= base_url('perubahan/addnip'); ?>",
      type: 'post',
      data: {
        tahun: tahun,
        bulan: bulan,
        kdsatker: kdsatker,
        nip: nip
      },
      success: function() {}
    });
  });

  $('.form-check-input-user').on('click', function() {
    const nip = $(this).data('nip');
    const nama = $(this).data('nama');
    $.ajax({
      url: "<?= base_url('user/adduser'); ?>",
      type: 'post',
      data: {
        nip: nip,
        nama: nama
      },
      success: function() {}
    });
  });
</script>

</body>


</html>