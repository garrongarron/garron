@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="margin: 10px 0px;">
					<span>Búsqueda de profesionales</span> > <a href="#">{{ $position }}</a>
				</div>
			
			

				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Juan</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Pedro</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Manuel</a></h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
 @include('main.footer')

		
@endsection