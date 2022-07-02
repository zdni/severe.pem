			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">Fasilitas</h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="<?= base_url() ?>">Beranda</a></li>
									<li class="active">Fasilitas</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section class="medical-services bg-color-primary pt-5 p-relative z-index-1">
					<div class="container">
						<div class="row">
							<div class="col">
                                <div class="cards-medical-services row flex-wrap justify-content-center mb-0">
                                    <?php foreach ($facilities as $facility) { ?>
                                        <div class="card border-0 border-radius-0 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 bg-transparent appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                                            <div class="card-body py-5 d-flex flex-column justify-content-center align-items-center bg-color-light hover-effect-1">
                                                <img src="<?= base_url('uploads/facilities/') . $facility->image ?>" class="img-fluid mb-5" alt="<?= $facility->name ?>">
                                                <h4 class="card-title mb-2 text-5 font-weight-bold text-color-quaternary"><?= $facility->name ?></h4>
                                                <p class="card-text mb-2 text-center"><?= $facility->description ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>