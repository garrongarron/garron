@extends('main.layout')

@section('content')

 @include('ITResources.header')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin: 20px 0px;">
			<div class="row">
				<div class="col-md-8">
					<h2>{{ $position }}</h2>
					<table class="table">
						<tr>
							<td>Publicado</td><td>Hoy</td>
						</tr>
						<tr>
							<td>Area</td><td>Tecnologia</td>
						</tr>
							<td>Tipo de puesto</td><td>Full-Time</td>
						</tr>
						<tr>
							<td>Salario</td><td>No especificado</td>
						</tr>
						<tr>
							<td>Luhar</td><td>CABA</td>
						</tr>
					</table>
				</div>
				<div class="col-md-4" style="background: #ddd; ">
					<h4 style="padding-top: 10px;">Garron Consulting Group</h4>
					<p style="text-align: justify;">La compañía donde las mejores empresas buscan a los mejores empleados</p>
					<img src="/img/GarronConsultingGroup.png" style="margin-left: 10%;  margin-bottom: 10px; width: 80%;  background: gray">
				</div>
			</div>
			<hr>
			<button type="button" class="btn btn-success" onclick="window.location.href= '{{ route('ITResources.Iam', ['position'=>str_slug($position)])}}'">Enviar CV</button>
			<br>
			
			<b>Descripción</b>
			<p>En Garron Consulting Group estamos buscando candidatos para la posición de {{ $position }}</p>
			
			<b>Requisitos Obligatorios</b>
			<p>El candidato debera contar con experiencia, y expertis en diferentes áreas y con diferentes herramientas que serán evaluadas con nuestro sistema de evaluación online</p>
			
			<b>Requisitos Deseables</b>
			<p>Se valorará la proximidad a las oficinas, flexibilidad para trabajar antes y despues de hora</p>

			<b>Se ofrece</b>
			<p>Flexibilidad horaria y beneficios corporativos, tales como clases de inglés, reconocimiento al desempeño plan de carrera.</p>

			<button type="button" class="btn btn-success">Enviar CV</button>
		</div>
	</div>
</div>


 @include('main.footer')

		
@endsection