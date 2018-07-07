@extends('main.layout')

@section('content')

 @include('ITResources.header')



<div class="container">
	<div class="row">

		<div class="col-md-6">
			<hr>
			<h1>IT Resources</h1>
			<p>Aquí las mejores empresas buscan a los mejores recursos.</p>
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
				<li><a href="{{ route('ITResources.jobs', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<li>
					<form action="{{ route('ITResources.searchJobs') }}">
						<input placeholder="Analista Funcional" class="form-control" type="text" name="s">
						<input class="btn btn-warning form-control" type="submit" value="Buscar">
					</form>
				</li>
			</ul>
		</div>

		<div class="col-md-6" >
			<h2 align="center">Desarrollo Profesional</h2> 
			<div style="background: #ddd; padding: 20px; margin: 10px 0px;">
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
					<img style="width: 280px" src="https://garron.com.ar/img/GarronConsultingGroup.png">
				</div>
				<p>Portal de busqueda laboral de profesionales de tecnología de la información</p>
			</div>
		</div>

		@if(false)
    		<div class="col-md-3">
				<h2>Mis aplicaciones</h2> 
				<ul>
					@foreach ($positions as $key => $position)
					<li><a href="{{ route('ITResources.jobs', ['position' => $key]) }}">{{ $position }}</a></li>
					@endforeach
					<li>
						<form action="{{ route('ITResources.searchJobs') }}">
							<input placeholder="Analista Funcional" class="form-control" type="text" name="s">
							<input class="btn btn-success form-control" type="submit" value="Buscar">
						</form>
					</li>
				</ul>
			</div>
    	@endif

    	
		<!-- {{-- 
		<div class="col-md-3">
			<h2>Salarios</h2>
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.salary', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<li><input type="text" placeholder="Salario Neto y Bruto de un" name="search-resource"> 
				@include('ITResources.modalButton')
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
				@include('ITResources.modalButton')
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
	--}}-->

		<div class="col-md-12">
			<hr>
		</div>


		<script type="text/javascript">
		(function(document, $){
			$('input').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
			});

			$(document).ready(function(){
				$('.search-job').on('click', function(){
					var str = $('input[name=search-job').val();
					if(str == ''){
						return false;
					}
					$('.result-job-offer').html(str);
				})
			});

		})(document, jQuery)
			
		</script>
			
	</div>
	@include('ITResources.footer')
</div>
 
 @include('main.footer')

		
@endsection