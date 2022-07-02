			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100"><?= $laboratory->name ?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="<?= base_url() ?>">Beranda</a></li>
									<li class="active">Laboratorium</li>
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
									<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Laboratorium</h3>
									<ul class="nav nav-list flex-column mb-0 p-relative right-9">
										<?php foreach ($menu_laboratories as $menu_laboratory) { ?>
											<li class="nav-item"><a class="nav-link font-weight-bold text-primary text-3 border-0 my-1 p-relative" href="<?= base_url('dashboard/laboratory?slug=') . $menu_laboratory->slug ?>"><?= $menu_laboratory->name ?></a></li>
										<?php } ?>
									</ul>
								</div>
								
								<div class="pb-1 clearfix">
									<hr class="my-2">
								</div>

								<div class="px-3 mt-4">
									<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Modul Bahan Ajar</h3>
									<ul class="nav nav-list flex-column mb-0 p-relative right-9">
										<?php foreach ($moduls as $modul) { ?>
											<li class="nav-item"><a class="nav-link font-weight-bold text-primary text-3 border-0 my-1 p-relative" href="<?= base_url('uploads/laboratories/moduls/') . $modul->file ?>" target="_blank"><?= $modul->title ?></a></li>
										<?php } ?>
									</ul>
								</div>

							</aside>
						</div>
						<div class="col-lg-9 order-1 order-lg-2">
							<h1><?= $laboratory->name ?></h1>
							<?= $laboratory->file_content ?>

							<hr class="my-5">

							<div class="row">
								<strong class="font-weight-bold text-dark d-block text-5 mt-4 mb-0">
									Video Bahan Ajar
								</strong>
								<?php foreach ($videos as $video) { ?>
									<div class="col-lg-4 text-center">
										<div class="card border-0 mb-4 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
											<div class="card-body p-3 z-index-1 text-center">
												<a href="<?= $video->link ?>" target="_blank" class="d-block text-center bg-color-grey">
													<?php $explode = explode( "v=", $video->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
													<img alt="Doctor" class="img-fluid rounded" src="<?= $source ?>">
												</a>
												<strong class="font-weight-bold text-dark d-block text-3 mt-4 mb-0">
													<a href="<?= $video->link ?>" target="_blank" class="text-dark">
														<?= $video->title ?>
													</a>
												</strong>
												<a href="<?= $video->link ?>" target="_blank" class="btn btn-outline btn-light bg-hover-light text-dark text-hover-primary border-color-grey border-color-active-primary border-color-hover-primary text-uppercase rounded-0 px-4 py-2 mb-4 mt-3 text-2">Nonton Video</a>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>


						</div>
					</div>
				</div>

			</div>
