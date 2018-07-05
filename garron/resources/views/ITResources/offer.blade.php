@extends('main.layout')

@section('content')

@include('ITResources.header')

<style type="text/css">
	.encuadre{
		border: 1px solid gray;
		border-radius: 10px;
		padding: 10px;
		margin: 10px 0px;
	}
	h2, h4, h5{
		display: inline;
	}
</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
	<div class="row">
		<div class="col-md-6">

			<div class="encuadre">
				<h2>{{ $user->name or 'Nombre Aprellido' }}</h2>
				<h3>{{ 'It Profesional' }}</h3>
				<p class="description">
					{{ $user->description or 'Mis tareas consisten en... Mi funcion es ...'}}
				</p>
			</div>

			<div class="encuadre">
				<h4>Experiencia Laboral</h4>
				<ul>
					
					@foreach($experience as $value)
					<li>
						<h5>{{ $value->title }}</h5> en {{ $value->company }}
						<p>{{ Carbon\Carbon::parse($value->from)->formatLocalized('%b.  %Y') }} - {{ Carbon\Carbon::parse($value->to)->formatLocalized('%b. %Y') }}<br>
						{{ $value->description }}</p>
					</li>
					@endforeach

				</ul>
			</div>
			<div class="encuadre">
				<h4>Estudios</h4></a>
				<ul>
					@foreach($education as $value)
					<li>
						<h5>{{ $value->school }}</h5>
						<p>{{ $value->degree }}</p>
						<p>{{ Carbon\Carbon::parse($value->from)->format('Y') }} - {{ Carbon\Carbon::parse($value->to)->format('Y') }}

						</p>
					</li>
					@endforeach
				</ul>
			</div>
				@include('ITResources.widget.card')
				<hr>
		</div>

		<div class="col-md-6" style="margin-top: 10px; ">
			@if ($errors->any())
			<div>
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			</div>
			@endif
			@if(Session::has('message'))
				<p class="alert alert-success">{{ Session::get('message') }}</p>
			@endif
			<h4>Habilidades</h4>
			<div class="tags">
				@foreach($userSkills as $skill)
					<span class="badge badge-success">{{ $skill->name }}</span>
				@endforeach
			</div>
		</div>
		
	</div>
	@include('ITResources.footer')
</div>
 
 @include('main.footer')

		
@endsection