@extends('main.layout')

@section('content')

 @include('ITResources.header')


{{-- @if($edit == '1') --}}
	@include('ITResources.widget.offerModal', [
		'position' =>  $position,
		'update' => route('ITResources.update')])
{{-- @endif --}}
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
 
 @include('ITResources.widget.experienceForm', ['sectores'=>$sectores,'country'=>$country])
 @include('ITResources.widget.educationForm')


	<div class="container">
		<div class="row">
			<!--<div class="col-md-12" style="background: silver; height: 150px;">
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

			</div>-->



			<div class="col-md-6">
					<!-- Button trigger modal -->
					<div class="encuadre">
						<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
						style="position: absolute; top: 0px; right: 20px; margin-top: -50px;">
						<i class="fa fa-edit"></i>-->
						</button>
					
						<h2>{{ $user->name or 'Nombre Aprellido' }}</h2>
						<a href="#" name="edituser"><i class="fa fa-edit"></i></a>
						<h3>{{ $position }}</h3>
						<p class="description">
							{{ $user->description or 'Mis tareas consisten en... Mi funcion es ...'}}
						</p>
					</div>

					
					
					
					<div class="encuadre">
						<h4>Experiencia Laboral</h4> <a href="#" class="addExperience"><i class="fa fa-plus"></i></a>
						<ul>
							
							@foreach($experience as $value)
							<li>
								<h5>{{ $value->title }}</h5> <!--<a href="#"><i class="fa fa-edit"></i></a>--> en {{ $value->company }}
								<p>{{ Carbon\Carbon::parse($value->from)->formatLocalized('%b.  %Y') }} - {{ Carbon\Carbon::parse($value->to)->formatLocalized('%b. %Y') }}<br>
								{{ $value->description }}</p>
							</li>
							@endforeach

						</ul>
					</div>
					<div class="encuadre">
						<h4>Estudios</h4> <a href="#"  class="addStudy"><i class="fa fa-plus"></i></a>
						<ul>
							@foreach($education as $value)
							<li>
								<h5>{{ $value->school }}</h5> <!--<a href="#"><i class="fa fa-edit"></i></a>-->
								<p>{{ $value->degree }}</p>
								<p>{{ Carbon\Carbon::parse($value->from)->format('Y') }} - {{ Carbon\Carbon::parse($value->to)->format('Y') }}
								{{--<!--<b>{{ $value->field_of_study }}</b>: {{ $value->description }}-->--}}
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
				<p>Cuentanos cuales son tus habilidades con <b>palabras claves</b></p>
				<form id="skills">
				<input class="form-control" list="browsers" type="text" name="tags" placeholder="Habilidades">
					<datalist id="browsers">
						<option value="Internet Explorer">
						<option value="Firefox">
						<option value="Chrome">
						<option value="Opera">
						<option value="Safari">
					</datalist>
				</form>
				<script type="text/javascript">
					(function(window, document){
						var $ = jQuery;
						
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$('input[name=tags]').autocomplete({
							source:['a','b']
						});

						var timer
						$('input[name=tags]').keypress(function( event ) {
						  if ( event.which == 13 ) {
						  	send($( '#skills' ).serialize());
						    $(this).val('')
						    event.preventDefault();
						  } else {
							  clearTimeout(timer);
							  timer = setTimeout(function(){
							  	suggestion($( '#skills' ).serialize());
							  },2000);
						  }
						  //return false;
						});

						var send = function(dataSkill){
							$.ajax({
								method: "POST",
								url: "/ITResources/skills",
								data: dataSkill
							}).done(function( msg ) {
								$('.tags').prepend('<span class="badge badge-success">'+msg+'<a href="#">x</a></span>');
								console.log(msg);
							});
						}

						var deleteSkill = function(dataSkill){
							$.ajax({
								method: "GET",
								url: "/ITResources/skills",
								data: dataSkill
							}).done(function( msg ) {
								$('.tags').prepend('<span class="badge badge-success">'+msg+'<a href="#">x</a></span>');
								console.log(msg);
							});
						}

						var suggestion = function(tagTyped){
							$.ajax({
								method: "POST",
								url: "/ITResources/skillSuggestion",
								data: tagTyped
							}).done(function( suggestion ) {
								console.log(suggestion);
								$('#browsers').html('');
								for(var key in suggestion){
									$('#browsers').prepend('<option value="'+suggestion[key].name+'">');
								}
							});
						}
						suggestion($( '#skills' ).serialize());
						//suggestion('tags=test');


						$('.addExperience').on('click', function(){
							$('#experience').modal('show');
							return false;
						});
						$('.addStudy').on('click', function(){
							$('#education').modal('show');
							return false;
						});

						$('a[name=edituser]').on('click', function(){
							$('#userModal').modal('show');
							return false;
						})
					})(window, document)
				</script>
				<div class="tags">
					@foreach($userSkills as $skill)
						<span class="badge badge-success">{{ $skill->name }}<a href="#">x</a></span>
					@endforeach
				</div>
				
				@if(auth()->user()->role != 'company')
					<h4>Aplicaste como:</h4>
					<div>
					@foreach($positions as $application)
					<?php $slug = str_slug($application->title).'-'.$application->id; ?>
						<span> <a href="{{ route('ITResources.position',  $slug) }}">{{ $application->title }}</a> </span>
					@endforeach
					</div>
				@else
					@include('ITResources.widget.positionForm', ['industry'=>$industry])
						<div style="padding: 10px 0px;">
							<input type="button" class="btn btn-success" value="Crear publicación" name="" data-toggle="modal" data-target="#positionForm">
						</div>
					<h4>Tus Publicaciones:</h4>
					<div>
					@foreach($myPositions as $application)
					<?php $slug = str_slug($application->title).'-'.$application->id; ?>
						<span> <a href="{{ route('ITResources.position',  $slug) }}">{{ $application->title }}</a> </span>
					@endforeach
					</div>
				@endif



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