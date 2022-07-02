			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">Kontak Kami</h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="<?= base_url() ?>">Beranda</a></li>
									<li class="active">Kontak Kami</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-5">
					<div class="row">
						<div class="col pt-3">

							<h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2"><?= $institut ?></h3>
							<div class="row text-center pb-3 pt-4">
								<div class="col-lg-3 col-md-6 pb-4 pb-lg-0">
									<img width="60" src="img/demos/medical-2/icons/icon-location.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Alamat</h4>
									<p class="m-0"><?= $alamat ?></p>
								</div>
								<div class="col-lg-3 col-md-6 pb-4 pb-lg-0">
									<img width="60" src="img/demos/medical-2/icons/icon-phone.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Telepon</h4>
									<p class="m-0"><a href="tel:<?= $telepon ?>" class="text-color-default text-color-hover-primary"><?= $telepon ?></a></p>
								</div>
								<div class="col-lg-3 col-md-6">
									<img width="60" src="img/demos/medical-2/icons/icon-calendar.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Fax</h4>
									<p class="m-0"><?= $fax ?></p>
								</div>
								<div class="col-lg-3 col-md-6 pb-4 pb-md-0">
									<img width="60" src="img/demos/medical-2/icons/icon-envelope.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Email</h4>
									<p class="m-0"><?= $email ?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<hr class="my-5">
						</div>
					</div>

					<div class="row">
						<div class="col">
							<h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2">Kirim Pesan</h3>
							<form class="contact-form custom-form-style-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100" action="<?= base_url('dashboard/send_message') ?>" method="post">
								<div class="row">
									<div class="form-group col-lg-6">
										<input type="text" placeholder="Nama" value="" data-msg-required="Silahkan Masukkan Nama" maxlength="100" class="form-control" name="name" id="name" required>
									</div>
									<div class="form-group col-lg-6">
										<input type="email" placeholder="Email" value="" data-msg-required="Silahkan Masukkan Email" data-msg-email="Silahkan Masukkan Email yang valid" maxlength="100" class="form-control" name="email" id="email" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-6">
										<input placeholder="Nomor Telepon" type="text" value="" data-msg-required="Silahkan Masukkan Nomor Telepon" maxlength="100" class="form-control" name="phone" id="phone" required>
									</div>
									<div class="form-group col-lg-6">
										<input placeholder="Subjek" type="text" value="" data-msg-required="Silahkan Masukkan Subjek" maxlength="100" class="form-control" name="subject" id="subject" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<textarea placeholder="Pesan Anda" maxlength="5000" data-msg-required="Silahkan Masukkan Pesan Anda" rows="10" class="form-control" name="message" id="message" required></textarea>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<input type="submit" value="Kirim" class="btn btn-primary px-4 py-3 text-center text-uppercase font-weight-semibold">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>