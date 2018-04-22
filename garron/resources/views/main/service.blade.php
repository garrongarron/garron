<!-- Start Service -->
	<section id="service" class="section clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-12 wow fadeInUp">
					<div class="section-title">
						<h2>{{ trans('home.our_services') }}</h2>
						<p>{!! trans('home.our_services_description') !!}</p>
					</div>
				</div>
			</div>
			<div class="row">
			
				@foreach($services as $service)
				<!-- Single Service -->
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
					<div class="single-service">
						<div class="number"><p>{{ $service->number }}</p></div>
						<h4>{{ $service->title }}</h4>
						<p>{{ $service->description }}</p>
						<i class="ico-bg fa fa-pencil"></i>
					</div>
				</div>
				<!--/ End Single Service -->
				@endforeach
			</div>
		</div>
	</section>
	<!--/ End Service -->