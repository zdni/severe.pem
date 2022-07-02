			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100"><?= $article->title ?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="<?= base_url() ?>">Beranda</a></li>
									<li class="active">Berita</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-5">
					<div class="row">
						<div class="col-lg-9">

							<article>
								<div class="card border-0 border-radius-0 mb-5 box-shadow-1">
									<div class="card-body p-4 z-index-1">
										<p class="text-uppercase text-1 mb-3 text-color-default"><time pubdate datetime="<?= $article->post_date ?>"><?= date('d M Y', strtotime( $article->post_date )) ?></time> <span class="opacity-3 d-inline-block px-2">|</span> <?= $article->username ?></p>

										<div class="post-image pb-4">
											<img class="card-img-top border-radius-0" src="<?= base_url('uploads/articles/thumbnails/') . $article->thumbnail  ?>" alt="Thumbnail Berita">
										</div>

										<div class="card-body p-0">
											<?= $article->file_content ?>
									</div>
								</div>
							</article>

						</div>
						<div class="col-lg-3 pt-4 pt-lg-0">
							<aside class="sidebar">
								<div class="px-3 mt-4">
									<h3 class="text-color-secondary text-capitalize font-weight-bold text-5 m-0 mb-3">Berita Terkini</h3>
									<div class="pb-2 mb-1">
										<?php foreach ($new_articles as $new_article) { ?>
											<a href="<?= base_url('dashboard/article?slug=') . $new_article->slug ?>" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none"><?= date('d M Y', strtotime( $new_article->post_date )) ?> <span class="opacity-3 d-inline-block px-2">|</span> <?= $new_article->username ?></a>
											<a href="<?= base_url('dashboard/article?slug=') . $new_article->slug ?>" class="text-color-dark text-hover-primary font-weight-bold text-3 d-block pb-3 line-height-4"><?= $new_article->title ?></a>
										<?php } ?>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>