<!-- Start Slider -->
<section id="j-slider" class="clearfix">
	<div id="particles-js"></div>
	<div class="slide-main">
	@foreach($sliders as $slider)
	<!-- Single Slider -->
		<div class="single-slider" style="background-image:url({{ $slider->img }});" >
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="slide-text left">
							<h1>{{ $slider->title }}</h1>
							<p>{{ $slider->description }}</p>
							<div class="slide-button">
								<a href="{{ $slider->url }}" class="button hvr-bounce-to-top">{{ trans('home.read_more') }}</a>
				
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--/ End Single Slider -->
	@endforeach
	</div>
</section>
<!--/ End Slider -->

<!-- Start Statics -->
<div id="statics">
	<div class="container">
		<div class="row  no-margin">
			<div class="statics">
																								<!-- Static Single -->
					<div class="col-md-4 col-sm-4 col-xs-12 static-single">
						<div class="icon">
							<i class=""></i>
						</div>
						<div class="s-info">
							<div class="number"><span class="counter">45</span></div>
							<p>{{ trans('home.project_complete') }}</p>
						</div>
					</div>
					<!-- End Single -->
																								<!-- Static Single -->
					<div class="col-md-4 col-sm-4 col-xs-12 static-single active">
						<div class="icon">
							<i class=""></i>
						</div>
						<div class="s-info">
							<div class="number"><span class="counter">97</span></div>
							<p>{{ trans('home.satisfied_customers') }}</p>
						</div>
					</div>
					<!-- End Single -->
																								<!-- Static Single -->
					<div class="col-md-4 col-sm-4 col-xs-12 static-single">
						<div class="icon">
							<i class=""></i>
						</div>
						<div class="s-info">
							<div class="number"><span class="counter">10</span></div>
							<p>{{ trans('home.current_sustomers') }}</p>
						</div>
					</div>
					<!-- End Single -->
								
			</div>
		</div>
	</div>
</div>	
<!--/ End Statics -->