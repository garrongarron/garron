@extends('main.layout')

@section('content')

 @include('ITResources.header')

<div class="container">
	<div class="row">
		@include('ITResources.modal')
		



		<div class="col-md-6">
			<hr>
			<h1>IT Resources</h1>
			<p>Aquí las mejores empresas buscan a los mejores recursos. Oportunidades de mejora.</p>
		</div>
		
		<div class="col-md-6">
			<hr>
			@include('ITResources.widget.card')
			<hr>
		</div>




		<div class="col-md-3">
			@include('ITResources.widget.search')
		</div>
		<div class="col-md-3">
			<h2>Busco empleo</h2> 
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.Iam', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<li><input type="text" placeholder="Soy Full Stack Developer" name="search-resource">
				@include('ITResources.modal-button')
				</li>
			</ul>
		</div>
		
		<div class="col-md-3">
			<h2>Salarios</h2>
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.salary', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<li><input type="text" placeholder="Salario Neto y Bruto de un" name="search-resource"> 
				@include('ITResources.modal-button')
				</li>
			</ul>
		</div>

		<div class="col-md-3">
			<h2>Descripción</h2>
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.tasks', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<li><input type="text" placeholder="Funciones y tareas de un" name="search-resource"> 
				@include('ITResources.modal-button')
				</li>
			</ul>
		</div>






		<div class="col-md-6">
			<hr>
			<h2>Desarroyo de proyectos</h2>
			<ul>
				<li><a href="#">Integración con Web Services</a></li>
				<li><a href="#">Desarrollo de Web Sites</a></li>
				<li><a href="#">Equipamiento Informatico</a></li>
				<li><a href="#">Implementacion de Libros Digitales</a></li>
				<li><a href="#">Auditorías de sistemas Informáticos</a></li>
			</ul>
		</div>

		<div class="col-md-6">
			<hr>
			<h2>Matenimiento de proyectos</h2>
			<ul>
				<li><a href="#">Mantenimiento evolutivo</a></li>
				<li><a href="#">Mantenimiento correctivo</a></li>
				<li><a href="#">Desarrollo de nuevas funcionalidades</a></li>
				<li><a href="#">Migraciones de servidores</a></li>
			</ul>
		</div>

		<div class="col-md-12">
			<hr>
		</div>


<script type="text/javascript">
$('input').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
})
</script>
			
		</div>
	</div>
</div>
 @include('main.footer')

		
@endsection