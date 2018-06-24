@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<hr>
				<h1>Salario de un {{ $position }}</h1>
				<p>Aquí las mejores empresas buscan a los mejores recursos. Oportunidades de mejora.</p>
				<div class="row">
					<hr>
					<ul>
						<li>{{ $position }}</li>
						<li>{{ $position }}</li>
						<li>{{ $position }}</li>
						<li>{{ $position }}</li>
						<li>{{ $position }}</li>
						<li>{{ $position }}</li>
					</ul>
				</div>
			</div>
			
			<div class="col-md-3">
				@include('ITResources.widget.search')
			</div>
		</div>
	</div>
 @include('main.footer')

		
@endsection