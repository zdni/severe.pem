	<body>

		<div class="body">

			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-top header-top-default header-top-borders border-bottom-0 bg-color-light">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-between">
									<div class="header-row">
										<nav class="header-nav-top w-100">
											<ul class="nav nav-pills justify-content-between w-100 h-100">
												<li class="nav-item py-2 d-none d-xl-inline-flex">
													<span class="header-top-phone py-2 d-flex align-items-center text-color-primary font-weight-semibold text-uppercase">
														<i class="icon-location-pin icons text-5 me-2"></i> <span><?= $alamat ?></span>
													</span>
													<span class="header-top-email px-0 font-weight-normal d-flex align-items-center"><i class="fas fa-phone text-4"></i><?= $telepon ?></span>
													<span class="header-top-opening-hours px-0 font-weight-normal d-flex align-items-center"><i class="fas fa-fax text-4"></i><?= $fax ?></span>
												</li>
												<li class="nav-item nav-item-header-top-socials d-flex justify-content-between">
													<span class="header-top-button-make-as-appoitment d-inline-flex align-items-center justify-content-center h-100 p-0 align-top">
														<img src="<?= base_url('assets/img/logo-kesehatan.png') ?>" alt="" height="30px" style="margin-right: 20px;">
														<img src="<?= base_url('assets/img/logo-48.png') ?>" alt="" height="30px" style="margin-right: 20px;">
														<a href="<?= $this->session->userdata('user_id') ? base_url('admin/dashboard') : base_url('auth/login'); ?>" class="d-flex align-items-center justify-content-center h-100 w-100 btn-primary font-weight-normal text-decoration-none"><?= ( $this->session->userdata('role_id') ? 'Beranda' : 'Login' ) ?></a>
													</span>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container bg-color-light">
						<div class="header-row">
							<div class="header-column header-column-logo">
								<div class="header-row">
									<div class="header-logo">
										<a href="demo-medical-2.html">
											<img alt="Porto" src="<?= base_url('assets/img/logo-with-text.png') ?>">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column header-column-nav-menu justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-links order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown-secondary">
														<a class="nav-link" href="<?= base_url('dashboard') ?>" id="dashboard_index" >
															Beranda
														</a>
													</li>
													<li class="dropdown dropdown-secondary">
														<a class="nav-link" href="#" id="dashboard_profile">
															Profil
														</a>
														<ul class="dropdown-menu">
															<?php foreach ($menu_profiles as $menu_profile) { ?>
																<li>
																	<a class="dropdown-item font-weight-normal" href="<?= base_url('dashboard/profile?slug=') . $menu_profile->slug ?>">
																		<?= $menu_profile->title ?>
																	</a>
																</li>
															<?php } ?>
														</ul>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="<?= base_url('dashboard/facilities') ?>" id="dashboard_facilities">
															Fasilitas
														</a>
													</li>
													<li class="dropdown dropdown-secondary">
														<a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#" id="dashboard_laboratory">
															Pusat Laboratorium
														</a>
														<ul class="dropdown-menu">
															<?php foreach ($menu_laboratories as $menu_laboratory) { ?>
																<li>
																	<a class="dropdown-item font-weight-normal" href="<?= base_url('dashboard/laboratory?slug=') . $menu_laboratory->slug ?>">
																		<?= $menu_laboratory->name ?>
																	</a>
																</li>
															<?php } ?>
														</ul>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="<?= base_url('dashboard/articles') ?>" id="dashboard_articles">
															Berita
														</a>
													</li>
													<li class="dropdown dropdown-secondary">
														<a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#" id="dashboard_documents">
															Download
														</a>
														<ul class="dropdown-menu">
															<?php foreach ($menu_downloads as $menu_download) { ?>
																<li>
																	<a class="dropdown-item font-weight-normal" href="<?= base_url('dashboard/documents/') . $menu_download->id ?>">
																		<?= $menu_download->menu ?>
																	</a>
																</li>
															<?php } ?>
														</ul>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="<?= base_url('dashboard/contact') ?>" id="dashboard_contact">
															Kontak
														</a>
													</li>
													<li class="dropdown-secondary">
														<a class="nav-link" href="<?= ( isset( $questionnaire->link ) ) ? $questionnaire->link : '#' ?>" target="_blank">
															Kuisioner
														</a>
													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>