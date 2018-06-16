@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr>
				<h1>Busco {{ $position }}</h1>
				<p>Aquí las mejores empresas buscan a los mejores recursos. Oportunidades de mejora.</p>
				<hr>
			
			

				<div class="row">
					<div class="col-md-6">
						<h2>{{ $position }}</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2>{{ $position }}</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2>{{ $position }}</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-md-6">
						@include('ITResources.widget.card')
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
 @include('main.footer')

		
@endsection