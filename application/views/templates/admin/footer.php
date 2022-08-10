    <div class="footer">
      <div class="copyright">
        <p>SISTEM PENENTUAN STATUS GIZI BURUK &copy; 2022 </p>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/') ?>vendor/global/global.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/custom.js"></script>
	<script src="<?= base_url('assets/') ?>js/deznav-init.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/plugins-init/datatables.init.js"></script>

  <script>
    if( '<?= $this->session->flashdata('alert') ?>' == 'success' ) Swal.fire( 'Berhasil!', '<?= $this->session->flashdata('message') ?>', 'success' );
    if( '<?= $this->session->flashdata('alert') ?>' == 'warning' ) Swal.fire( 'Peringatan!', '<?= $this->session->flashdata('message') ?>', 'warning' );
    if( '<?= $this->session->flashdata('alert') ?>' == 'error' ) Swal.fire( 'Gagal!', '<?= $this->session->flashdata('message') ?>', 'error' );
    if( "<?php echo $this->session->flashdata('logout') != null ?>" ) setTimeout(() => { window.location.replace("<?= base_url('auth/logout') ?>") }, 5000);

    const menu_id = "<?= $menu_id ?>";
    const menu_link = document.getElementById( menu_id );
    if( menu_link ) menu_link.classList.add('active');
  </script>
  <!-- <script>
    $(function () {
      $(".table-data").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script> -->
</body>
</html>