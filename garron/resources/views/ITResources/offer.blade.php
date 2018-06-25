@extends('main.layout')

@section('content')

 @include('ITResources.header')


@if($edit == '1')
	@include('ITResources.widget.offerModal', [
		'position' =>  $position,
		'update' => route('ITResources.update')])
@endif
<style type="text/css">
	.encuadre{
		border: 1px solid gray;
		border-radius: 10px;
		padding: 10px;
		margin: 10px 0px;
	}
	h4, h5{
		display: inline;
	}
</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
 @include('ITResources.widget.experienceForm')
 @include('ITResources.widget.studyForm')

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
					<div class="encuadre">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
						style="position: absolute; top: 0px; right: 20px; margin-top: -50px;">
						<i class="fa fa-edit"></i>
						</button>
					
						<h2>{{ $user->name or 'Nombre Aprellido' }}</h2>
						
						<h3>{{ $position }}</h3>
						<p class="description">
							{{ $user->description or 'Mis tareas consisten en... Mi funcion es ...'}}
						</p>
					</div>

					
					@include('ITResources.widget.card')
					
					<div class="encuadre">
						<h4>Experiencia Laboral</h4> <a href="#" class="addExperience"><i class="fa fa-plus"></i></a>
						<ul>
							<li>
								<h5>Experiencia Laboral</h5> <a href="#"><i class="fa fa-edit"></i></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</li>
							<li>
								<h5>Experiencia Laboral</h5> <a href="#"><i class="fa fa-edit"></i></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</li>
						</ul>
					</div>
					<div class="encuadre">
						<h4>Estudios</h4> <a href="#"  class="addStudy"><i class="fa fa-plus"></i></a>
						<ul>
							<li>
								<h5>Estudios </h5> <a href="#"><i class="fa fa-edit"></i></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</li>
							<li>
								<h5>Estudios</h5> <a href="#"><i class="fa fa-edit"></i></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</p>
							</li>
						</ul>
					</div>
			</div>



			<div class="col-md-6" >
				<input class="form-control" list="browsers" type="text" name="tags" placeholder="Habilidades">
					<datalist id="browsers">
						<option value="Internet Explorer">
						<option value="Firefox">
						<option value="Chrome">
						<option value="Opera">
						<option value="Safari">
					</datalist>
					<script type="text/javascript">
						(function(window, document){
							var $ = jQuery;
							$('input[name=tags]').keypress(function( event ) {
							  if ( event.which == 13 ) {
							     $('.tags').prepend('<span class="badge badge-success">'+$(this).val()+'<a href="#">x</a></span>');
							     $(this).val('')
							  }
							});
							$('.addExperience').on('click', function(){
								$('#experience').modal('show');
								return false;
							});
							$('.addStudy').on('click', function(){
								$('#study').modal('show');
								return false;
							});
						})(window, document)
					</script>
				<div class="tags"></div>
			</div>
			{{--<!--<div class="col-md-12">
				<hr>

				<hr>
				<h3>Otra cosa</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<hr>
			</div>



		
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
			</div>-->--}}
		

		</div>
	</div>
 @include('main.footer')

		
@endsection