			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100"><?= $profile->title ?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="<?= base_url() ?>">Beranda</a></li>
									<li class="active">Profil</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-5">
					<div class="row">
						<div class="col-lg-3 order-2 order-lg-1 pt-4 pt-lg-0">
							<aside class="sidebar">
								
								<div class="px-3 mb-4">
									<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Profil</h3>
									<ul class="nav nav-list flex-column mb-0 p-relative right-9">
                                        <?php foreach ($menu_profiles as $menu_profile) { ?>
                                            <li class="nav-item"><a class="nav-link font-weight-bold text-primary text-3 border-0 my-1 p-relative" href="<?= base_url('dashboard/profile/') . $menu_profile->slug ?>"><?= $menu_profile->title ?></a></li>
                                        <?php } ?>
									</ul>
								</div>

								<div class="pb-1 clearfix">
									<hr class="my-2">
								</div>

							</aside>
						</div>
						<div class="col-lg-9 order-1 order-lg-2">
							<?= $profile->file_content ?>

						</div>
					</div>
				</div>

			</div>