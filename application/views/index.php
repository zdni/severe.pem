			<div role="main" class="main">
				<section class="section section-funnel border-0 m-0 p-0">
					<div class="owl-carousel-wrapper" style="height: 991px;">
						<div class="owl-carousel dots-inside dots-horizontal-center custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1, 'dots': true}, '768': {'items': 1, 'dots': true}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': true, 'dotsVerticalOffset': '-250px', 'nav': false, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': true, 'autoplayTimeout': 7000, 'autoplayHoverPause': true, 'rewind': true}">
							<?php foreach ($heros as $hero) { ?>
								<div class="position-relative overflow-hidden pb-5" data-dynamic-height="['991px','991px','991px','650px','650px']" style="height: 991px;">
									<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url(<?= base_url('uploads/heros/') . $hero->image ?>); background-size: cover; background-position: center;"></div>
									<div class="container position-relative z-index-3 pb-5 h-100">
										<div class="row align-items-center pb-5 h-100">
											<div class="col-md-10 col-lg-6 text-center text-md-end pb-5 ms-auto">
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="section-funnel-layer-bottom d-none d-xl-block z-index-1">
						<div class="section-funnel-layer bg-light"></div>
						<div class="section-funnel-layer bg-light"></div>
					</div>
				</section>

				<div class="cards custom-cards container z-index-2">
					<div class="cards-container row justify-content-center justify-content-xl-between w-100 my-5 mt-xl-0 mx-0">
						<?php foreach ($galleries as $gallery) { ?>
							<div class="col-xs-12 col-lg-6 col-xl-4 mb-4 mb-xl-0 pb-2 pb-xl-0">
								<div class="card border-radius-0 bg-color-light border-0 box-shadow-1 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
									<div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
										<img src="<?= base_url('uploads/galleries/') . $gallery->image ?>" alt="Thumbnail Galeri" width="100%">
										<h4 class="card-title mb-1 font-weight-bold"><?= $gallery->title ?></h4>
										<p class="card-text text-center"><?= $gallery->description ?></p>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

				<!-- <section class="patient-reviews p-relative overflow-hidden lazyload m-0" data-bg-src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail ?>">
					<div class="container">
						<div class="row">
							<?php if( $article ): ?>
								<div class="col-xs-12 col-xl-6 p-relative bg-color-light z-index-1">
									<p class="text-uppercase p-0 m-0"><?= date('d M Y', strtotime($article->post_date)) ?></p>
									<h3 class="font-weight-bold text-color-quaternary mb-2 p-0 text-capitalize"><?= $article->title ?></h3>
									<p class="p-0 m-0 font-weight-normal"><?= $article->description ?></p>
									<a href="<?= base_url('dashboard/article/') . $article->slug ?>" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Selengkapnya</a>
									<div style="height: 340px;"></div>
								</div>
								<div class="col-md-6 col-lg-6 p-relative overflow-hidden col-cutting-patient-reviews"></div>
							<?php endif; ?>
						</div>
					</div>
				</section> -->

				<section class="medical-services py-5 p-relative overflow-hidden lazyload" data-bg-src="<?= base_url('assets/visitor/img/demos/medical-2/bg/bg-3.png') ?>">
					<div class="container">
						<div class="row">
							<div class="col pt-4">
								<p class="text-uppercase mb-0 text-color-light appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">Berita</p>
								<h3 class="text-color-quaternary mb-2 text-color-light font-weight-bold text-capitalize appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Berita Terkini</h3>
							</div>
						</div>
						<div class="row justify-content-center justify-lg-content-between">
							<?php if( count($articles) ): ?>
								<?php foreach ($articles as $article) { ?>
									<div class="col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
												<div class="card-body p-4 z-index-1">
													<a href="<?= base_url('dashboard/article?slug=') . $article->slug ?>">
														<img class="card-img-top border-radius-0" src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail ?>" alt="Thumbnail Berita">
													</a>
													<p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="<?= $article->post_date ?>"><?= date('d M Y', strtotime( $article->post_date )) ?></time> <span class="opacity-3 d-inline-block px-2">|</span> <?= $article->username ?></p>
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-bold"><a class="text-color-secondary" href="<?= base_url('dashboard/article?slug=') . $article->slug ?>"><?= $article->title ?></a></h4>
														<p class="card-text mb-3"><?= $article->description ?></p>
														<a href="<?= base_url('dashboard/article?slug=') . $article->slug ?>" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Selengkapnya</a>
													</div>
												</div>
											</div>
										</article>
									</div>
								<?php } ?>
							<?php else: ?>
								<div class="row justify-content-center">
									<div class="col">
										<div class="row justify-content-center" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
											<img src="<?= base_url('assets/img/not-found.png') ?>" alt="" style="width: 450px !important;">
										</div>
										<h5 class="text-center text-white" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Belum ada Berita Terkini.</h5>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col text-center pb-lg-5 mb-lg-5">
							</div>
						</div>
					</div>

					<div class="section-funnel-layer-bottom">
						<div class="section-funnel-layer bg-color-light"></div>
						<div class="section-funnel-layer bg-color-light"></div>
					</div>
				</section>

				<section class="our-blog pt-5 pt-lg-0 pb-lg-5 mb-5 p-relative bg-color-light">
					<div class="container">
						<div class="row">
							<div class="col">
								<p class="text-uppercase mb-0 d-block text-center text-uppercase appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Bahan Ajar</p>
								<h3 class="text-color-quaternary mb-2 d-block text-center font-weight-bold text-capitalize appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">Video Terbaru</h3>
							</div>
						</div>
						<div class="row justify-content-center justify-lg-content-between">
							<?php if( count($videos) ): ?>
								<?php foreach ($videos as $video) { ?>
									<div class="col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
												<div class="card-body p-4 z-index-1">
													<a href="<?= $video->link ?>" target="_blank">
														<?php $explode = explode( "v=", $video->link ); $id = $explode[1]; $source = "http://img.youtube.com/vi/" . $id . "/0.jpg" ?>
														<img class="card-img-top border-radius-0" src="<?= $source ?>" alt="Card Image">
													</a>
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-bold"><a class="text-color-secondary" href="<?= $video->link ?>" target="_blank"><?= $video->title ?></a></h4>
														<a href="<?= $video->link ?>" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3" target="_blank">Nonton Video</a>
													</div>
												</div>
											</div>
										</article>
									</div>
								<?php } ?>
							<?php else: ?>
								<div class="row justify-content-center">
									<div class="col">
										<div class="row justify-content-center" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
											<img src="<?= base_url('assets/img/not-found.png') ?>" alt="" style="width: 450px !important;">
										</div>
										<h5 class="text-center" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Belum ada video bahan ajar.</h5>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>

			</div>