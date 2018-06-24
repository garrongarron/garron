@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="margin: 10px 0px;">
					<span>Búsqueda de profesionales</span> > <a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">{{ $position }}</a>
				</div>
			
			

				@foreach ($employees as $employee)
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<div style="background: green;float: left;width: 100px; height: 100px; margin: 10px; border-radius: 50px; overflow: hidden;">
								</div>
							</div>
							<div class="col-md-9">
								<h2><a target="_blank" href="{{ route('ITResources.Iam2', [
									'position' => str_slug($position),
									'slug' => $employee->slug
									]) }}">{{ $employee->name }}</a></h2>
								<p>{{ $employee->description }}</p>
							</div>
						</div>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>
				@endforeach


				<hr>
			</div>
		</div>
	</div>
 @include('main.footer')

		
@endsection