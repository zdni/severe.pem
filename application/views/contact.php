			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md m-0">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">Contact Us</h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<li><a href="#">Home</a></li>
									<li class="active">Contact Us</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="googlemaps" class="google-map m-0"></div>

				<div class="container py-5">
					<div class="row">
						<div class="col pt-3">

							<h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2">Contact Info</h3>
							<p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Vestibulum auctor felis eget orci semper vestibulum. Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc.</p>

							<div class="row text-center pb-3 pt-4">
								<div class="col-lg-3 col-md-6 pb-4 pb-lg-0">
									<img width="60" src="img/demos/medical-2/icons/icon-location.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Address</h4>
									<p class="m-0">123 Street Name, City, England</p>
								</div>
								<div class="col-lg-3 col-md-6 pb-4 pb-lg-0">
									<img width="60" src="img/demos/medical-2/icons/icon-phone.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Phone Number</h4>
									<p class="m-0"><a href="tel:+1234567890" class="text-color-default text-color-hover-primary">(800) 123-4567</a></p>
								</div>
								<div class="col-lg-3 col-md-6 pb-4 pb-md-0">
									<img width="60" src="img/demos/medical-2/icons/icon-envelope.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">E-mail Address</h4>
									<p class="m-0"><a href="/cdn-cgi/l/email-protection#0469656d6844606b69656d6a2a676b69" class="text-default text-hover-primary"><span class="__cf_email__" data-cfemail="f598949c99b5908d9498859990db969a98">[email&#160;protected]</span></a></p>
								</div>
								<div class="col-lg-3 col-md-6">
									<img width="60" src="img/demos/medical-2/icons/icon-calendar.svg" alt="" />
									<h4 class="m-0 pt-4 font-weight-bold">Working Days/Hours</h4>
									<p class="m-0">Mon - Sun / 9:00AM - 8:00PM</p>
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
							<h3 class="text-color-quaternary font-weight-bold text-capitalize mb-2">Send a Message</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat ex finibus urna tincidunt, auctor ullamcorper risus luctus.</p>

							<form class="contact-form custom-form-style-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100" action="php/contact-form.php" method="POST">
								<div class="contact-form-success alert alert-success d-none mt-4">
									<strong>Success!</strong> Your message has been sent to us.
								</div>

								<div class="contact-form-error alert alert-danger d-none mt-4">
									<strong>Error!</strong> There was an error sending your message.
									<span class="mail-error-message text-1 d-block"></span>
								</div>
								<div class="row">
									<div class="form-group col-lg-6">
										<input type="text" placeholder="Your Name" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
									</div>
									<div class="form-group col-lg-6">
										<input type="email" placeholder="Your E-mail" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<input placeholder="Subject" type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<textarea placeholder="Your Message..." maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" required></textarea>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<input type="submit" value="Send Message" class="btn btn-primary px-4 py-3 text-center text-uppercase font-weight-semibold" data-loading-text="Loading...">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<!-- 			
		<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/lazysizes/lazysizes.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/jquery.vide.min.js"></script>
		<script src="vendor/vivus/vivus.min.js"></script>

		<script src="js/theme.js"></script>

		<script src="js/views/view.contact.js"></script>

		<script src="js/theme.init.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhpYHdYRY2U6V_VfyyNtkPHhywLjDkhfg"></script>
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- https://www.latlong.net/
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			function initializeGoogleMaps() {
				// Map Markers
				var mapMarkers = [{
					address: "New York, NY 10017",
					html: "<strong>Porto Medical</strong><br>New York, NY 10017",
					icon: {
						image: "img/demos/medical-2/icons/icon-location.svg",
						iconsize: [32, 40],
						iconanchor: [12, 20]
					},
					popup: true
				}];

				// Map Initial Location
				var initLatitude = 40.75198;
				var initLongitude = -73.96978;

				// Map Extended Settings
				var mapSettings = {
					controls: {
						draggable: (($.browser.mobile) ? false : true),
						panControl: true,
						zoomControl: true,
						mapTypeControl: true,
						scaleControl: true,
						streetViewControl: true,
						overviewMapControl: true
					},
					scrollwheel: false,
					markers: mapMarkers,
					latitude: initLatitude,
					longitude: initLongitude,
					zoom: 16
				};

				var map = $('#googlemaps').gMap(mapSettings),
					mapRef = $('#googlemaps').data('gMap.reference');

				// Styles from https://snazzymaps.com/
				var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

				var styledMap = new google.maps.StyledMapType(styles, {
					name: 'Styled Map'
				});

				mapRef.mapTypes.set('map_style', styledMap);
				mapRef.setMapTypeId('map_style');
			}

			// Initialize Google Maps when element enter on browser view
			theme.fn.intObs( '.google-map', 'initializeGoogleMaps()', {} );

			// Map text-center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$('#googlemaps').gMap("centerAt", options);
			}

		</script>




	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"7240f3c58b249e46","version":"2022.6.0","r":1,"token":"03fa3b9eb60b49789931c4694c153f9b","si":100}' crossorigin="anonymous"></script>
</body>
</html> -->
