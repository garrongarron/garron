
<!-- Start Team -->
<section id="team" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 wow fadeInUp">
				<div class="section-title">
					<h2>{{ trans('home.our_team') }}</h2>
					<p>{{ trans('home.our_team_description') }}</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($team as $member)
				<!-- Team Single -->
				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">		
					<div class="single-team">
						<div class="team-head">
							<img src="{{ $member->img }}" alt="SM JEHAD">
								<ul class="team-social">
								<li><a href="{{ $member->url }}"><i class="fa fa-link"></i></a></li>
							</ul>
						</div>
						<div class="team-info">
							<div class="name">
								<h4>{{ $member->fullname }}</h4>
							</div>
							<p>{{ $member->position }}</p>
						</div>
					</div>
				</div>
				<!--/ End Single Team -->
			@endforeach
        </div>
	</div>
</section>	 
<!--/ End Team -->