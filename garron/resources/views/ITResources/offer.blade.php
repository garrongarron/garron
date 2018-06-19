@extends('main.layout')

@section('content')

 @include('ITResources.header')

@guest
	@include('ITResources.auth.nav')
@else
	@include('ITResources.auth.nav')
@endguest

@if($edit == '1')
	@include('ITResources.widget.offer-modal', ['position' =>  $position ])
@endif
 
 
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="background: silver; height: 150px;">
				<div style="background: green; 
				height: 180px;
				width: 180px;
				border-radius: 90px;
				border: 5px solid white; 
				bottom: 0px;
				left: 55px;
				margin-bottom: -70px;
				position: absolute;
				"></div>

			</div>



			<div class="col-md-6" style="margin-top: 80px; ">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
				style="position: absolute; top: 0px; right: 20px; margin-top: -50px;">
				<i class="fa fa-edit"></i>
				</button>
				
				<h2>Nombre Aprellido</h2>
				
				<h3>{{ $position }}</h3>
				<p class="description">
					Mis tareas consisten en... <br>Mi funcion es ...
				</p>
				


			</div>


			<div class="col-md-6" style="margin-top: -150px; padding-top: 20px; padding-bottom: 40px;">
				@include('ITResources.widget.card')
			</div>


			<div class="col-md-6" >

				<div class="form-group">
					<!--<label for="tags">Etiquetas</label>-->
					<input class="form-control" type="text" name="tags" placeholder="Habilidades">
				</div>

				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>
				<span class="badge badge-success">Habilidad Específica <a href="#">x</a></span>


			</div>
			<div class="col-md-12">
			<hr>
			<!--{--
				<hr>
				<h3>Otra cosa</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<hr>
			--}}-->
			</div>



		<!--
			<p>Aquí las mejores empresas buscan a los mejores recursos. Oportunidades de mejora.</p>
			<div class="col-md-12">
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
		-->

		</div>
	</div>
 @include('main.footer')

		
@endsection