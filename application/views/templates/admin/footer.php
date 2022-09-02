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
  <script src="<?= base_url('assets/') ?>vendor/ckeditor/ckeditor.js"></script>
  <script src="<?= base_url('assets/') ?>js/plugins-init/summernote-init.js"></script>

  <script>
    if( '<?= $this->session->flashdata('alert') ?>' == 'success' ) Swal.fire( 'Berhasil!', '<?= $this->session->flashdata('message') ?>', 'success' );
    if( '<?= $this->session->flashdata('alert') ?>' == 'warning' ) Swal.fire( 'Peringatan!', '<?= $this->session->flashdata('message') ?>', 'warning' );
    if( '<?= $this->session->flashdata('alert') ?>' == 'error' ) Swal.fire( 'Gagal!', '<?= $this->session->flashdata('message') ?>', 'error' );
    if( "<?php echo $this->session->flashdata('logout') != null ?>" ) setTimeout(() => { window.location.replace("<?= base_url('auth/logout') ?>") }, 5000);

    const menu_id = "<?= $menu_id ?>";
    const menu_link = document.getElementById( menu_id );
    if( menu_link ) menu_link.classList.add('active');
    
    const btnHitungIMT = $('#btn-hitung-imt');
    if( btnHitungIMT.length > 0 ) {
      btnHitungIMT.click(function() {
        const bb = $('#bb');
        const tb = $('#tb');
        
        if( bb.val() == 0 ) { bb.focus(); return Swal.fire( 'Gagal!', 'Inputan berat badan tidak boleh kosong', 'error' ); }
        if( tb.val() == 0 ) { tb.focus(); return Swal.fire( 'Gagal!', 'Inputan tinggi badan tidak boleh kosong', 'error' ); }

        let kategori = ' Obesitas';
        
        let imt = parseFloat( bb.val() ) / ( parseFloat( tb.val()/100 ) * parseFloat( tb.val()/100 ) );
        imt = imt.toFixed(1)
        
        if( imt <= 27.0  ) kategori = ' Overweight';
        if( imt <= 25.0  ) kategori = ' Normal';
        if( imt < 18.5  ) kategori = ' Underweight';
        return Swal.fire( 'Nilai IMT'+kategori+'!', ''+imt, 'success' );
      })
    }
  </script>
</body>
</html>