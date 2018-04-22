
<!-- Start Project -->
		<section id="project" class="section clearfix">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInUp">
						<div class="section-title">
							<h2>{{ trans('home.some_of_our_work') }}</h2>
							<p>{{ trans('home.some_of_our_work_description') }}</p>
						</div>
					</div>
				</div>
				<div class="row no-margin wow fadeInUp">
					@foreach($projects as $project)
					<!-- Single Project -->
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="project-single">
								<div class="project-head">							
				                        <img width="300" height="206" src="{{ $project->img }}" class="attachment-medium size-medium wp-post-image" alt="" srcset="{{ $project->img }} 300w, {{ $project->img }} 480w" sizes="(max-width: 300px) 100vw, 300px" />		
				                </div>
								<div class="project-hover">
									<h4><a href="https://demo.samuraithemes.com/agency-x/2018/03/27/project-8/">{{ $project->title }}</a></h4>
									<p>{{ $project->description }}</p>
								</div>
							</div>
						</div>
					<!--/ End Project -->
					@endforeach
				</div>
			</div>
		</section>
		<!--/ End Project -->
	