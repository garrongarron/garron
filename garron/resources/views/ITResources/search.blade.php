@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="margin: 10px 0px;">
					<span>Búsqueda de profesionales</span> > <a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">{{ $position }}</a>
				</div>
			
			

				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Federico Zacayan</a></h2>
						<p>Licenciado en Sistemas de Información de las Organizaciones, Especialista en sistemas de gestión, con fuertes skills en Base de datos y desarrollo web. Desarrollo agil, efectivo y resolutivo</p>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Federico Zacayan</a></h2>
						<p>Licenciado en Sistemas de Información de las Organizaciones, Especialista en sistemas de gestión, con fuertes skills en Base de datos y desarrollo web. Desarrollo agil, efectivo y resolutivo</p>
					</div>
					<div class="col-md-6" style="margin: 10px 0px;">
						@include('ITResources.widget.card')
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<h2><a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">Federico Zacayan</a></h2>
						<p>Licenciado en Sistemas de Información de las Organizaciones, Especialista en sistemas de gestión, con fuertes skills en Base de datos y desarrollo web. Desarrollo agil, efectivo y resolutivo</p>
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