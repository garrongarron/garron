<!-- Start Testimonials -->
		<section id="testimonial" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2>{{ trans('home.testimonial_title') }}</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="testimonial-carousel">
							@foreach($testimonials as $testimonial)
								<!-- Start Testimonial -->
								<div class="single-testimonial">
									<div class="testimonial-content">
										<p>{{ $testimonial->description }}</p>
									</div>
									<div class="testimonial-info">
										<span class="arrow"></span>
											<img src="{{ $testimonial->img }}" class="img-circle" alt="SM JAHED">
											<h6>{{ $testimonial->fullname }}</h6>
									</div>			
								</div>
								<!--/ End Testimonial -->
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Testimonial -->