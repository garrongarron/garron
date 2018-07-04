@extends('main.layout')

@section('content')

@include('ITResources.header')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin: 20px 0px;">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@if(Session::has('message'))
					<p class="alert alert-success">{{ Session::get('message') }}</p>
				@endif

			
			<div class="row">
				<div class="col-md-8">
					<h2>{{ $position->title or 'Position' }}</h2>
					<table class="table">
						<tr>
							<td>Publicado</td><td>{{ $date or 'Hoy' }}</td>
						</tr>
						<tr>
							<td>Area</td><td>{{ $industry[$position->industry] or 'Tecnologia' }}</td>
						</tr>
							<td>Tipo de puesto</td><td>{{ $position->type or 'Full-Time*' }}</td>
						</tr>
						<tr>
							<td>Salario</td><td>{{ $position->salary or 'No especificado*' }}</td>
						</tr>
						<tr>
							<td>Lugar</td><td>{{ $position->location or 'CABA*' }}</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4" style="background: #ddd; padding-bottom: 20px; margin: 10px 0px;">
					<h4 style="padding-top: 10px;">Garron Consulting Group</h4>
					<p style="text-align: justify;">Aquí las mejores empresas buscan a los mejores profesionales.</p>

<style type="text/css">

div.title{
	margin: 10px 30px;
	margin-bottom: 0px;
	background: #F2784B;
	padding: 10px 30px;
	text-align: center;
	color: white;
	font-family: sans-serif;
	border-radius:30px 0px 30px 0px ;
	text-align: center;
	display: block;
}
div.title img{
	display: inline;
}
</style>
					<div class="title" >
						<img style="width: 280px" src="http://garron.com.ar/img/GarronConsultingGroup.png">
					</div>
				</div>
			</div>

			@guest
				@include('ITResources.widget.firstApplication', [
					'position' =>  $position,
					'update' => route('ITResources.update'),
					'password' => $password ])
				<input type="button" class="btn btn-success" value="Enviar CV" data-toggle="modal" data-target="#exampleModal">
			@else
				@if($applied)
					<div class="alert alert-danger">CV enviado</div>
				@else
					<form method="GET"  action="{{ route('ITResources.apply') }}">
						<input type="hidden" name="positionid" value={{ $positionId }}>
						<input type="submit" class="btn btn-primary" value="Enviar CV">
					</form>
				@endif
			@endguest

			
			<br>
			
			<b>Descripción</b>
			<p>{{ $position->description or 'CABA*' }}</p>
			
			<b>Requisitos Obligatorios</b>
			<p>{{ $position->mandatory_requirements or 'CABA*' }}</p>
			
			<b>Requisitos Deseables</b>
			<p>{{ $position->desiderable_requirements or 'CABA*' }}</p>

			<b>Se ofrece</b>
			<p>Flexibilidad horaria y beneficios corporativos, tales como clases de inglés, reconocimiento al desempeño plan de carrera.</p>
		</div>
	</div>
</div>


 @include('main.footer')

		
@endsection