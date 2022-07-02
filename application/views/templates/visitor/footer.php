

			<footer id="footer" class="m-0 bg-color-quaternary">
				<div class="container">
					<div class="row py-5">
						<div class="col-sm-12 pb-4 pb-lg-0 col-lg-2 mb-2 d-flex align-items-center">
							<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo Footer" width="100%">
						</div>
						<div class="col-sm-6 col-lg-3 footer-column footer-column-get-in-touch">
							<h4 class="mb-4 text-uppercase"><?= $institut ?></h4>
							<div class="info custom-info mb-4">
								<div class="custom-info-block custom-info-block-address">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-address">Alamat</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-address"><?= $alamat ?></span>
								</div>
								<div class="custom-info-block custom-info-block-phone">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-phone">Telepon</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-phone">(<?= $telepon ?></span>
								</div>
								<div class="custom-info-block custom-info-block-email">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-email">Fax</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-email">(<?= $fax ?></span>
								</div>
								<div class="custom-info-block custom-info-block-email">
									<span class="text-color-default font-weight-bold text-uppercase title-custom-info-block title-custom-info-block-email">Email</span>
									<span class="font-weight-normal text-color-light text-custom-info-block p-relative bottom-6 text-custom-info-block-email"><?= $email ?></span>
								</div>
							</div>
						</div>
						<div class="col-sm-6 pt-5 pt-md-0 col-lg-4">
							<div class="nav-footer-container">
								<h4 class="mb-4 text-uppercase">Laboratorium</h4>
								<div class="nav-footer d-flex">
									<ul>
										<?php foreach ($menu_laboratories as $menu_laboratory) { ?>
											<li>
												<a href="<?= base_url('dashboard/laboratory/') . $menu_laboratory->slug ?>"><?= $menu_laboratory->name ?></a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright pt-3 pb-3 container bg-color-quaternary">
					<div class="row">
						<div class="col-lg-12 text-center m-0 pb-4">
							<p class="text-color-default"><?= $institut ?> ©  2022.</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

		
		<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
        <script src="<?= base_url('assets/visitor/') ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- <script src="<?= base_url('assets/visitor/') ?>vendor/jquery.validation/jquery.validate.min.js"></script> -->
		<!-- <script src="<?= base_url('assets/visitor/') ?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script> -->
		<!-- <script src="<?= base_url('assets/visitor/') ?>vendor/jquery.gmap/jquery.gmap.min.js"></script> -->
		<script src="<?= base_url('assets/visitor/') ?>vendor/lazysizes/lazysizes.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?= base_url('assets/visitor/') ?>vendor/vide/jquery.vide.min.js"></script>
		<!-- <script src="<?= base_url('assets/visitor/') ?>vendor/vivus/vivus.min.js"></script> -->

		<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>

		<script src="<?= base_url('assets/visitor/') ?>js/theme.js"></script>

		<script src="<?= base_url('assets/visitor/') ?>js/theme.init.js"></script>
		<script>
			if( '<?= $this->session->flashdata('alert') ?>' == 'success' ) Swal.fire( 'Berhasil!', '<?= $this->session->flashdata('message') ?>', 'success' );
			if( '<?= $this->session->flashdata('alert') ?>' == 'warning' ) Swal.fire( 'Peringatan!', '<?= $this->session->flashdata('message') ?>', 'warning' );
			if( '<?= $this->session->flashdata('alert') ?>' == 'error' ) Swal.fire( 'Gagal!', '<?= $this->session->flashdata('message') ?>', 'error' );

			const menu_id = "<?= $menu_id ?>";
			const menu_link = document.getElementById( menu_id );
			if( menu_link ) menu_link.classList.add('active');
		</script>
    </body>
</html>
