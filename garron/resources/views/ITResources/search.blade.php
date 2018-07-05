@extends('main.layout')

@section('content')

 @include('ITResources.header')
 <style type="text/css">
 	.number{
 		color: #7CFC00;
 	}
 </style>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div style="margin: 10px 0px;">
					<span>Búsqueda de profesionales</span> > <a href="{{ route('ITResources.Iam', ['position' => str_slug($position)]) }}">{{ $position }}</a>
				</div>
			</div>
			<div class="col-md-12">
				<form id="searchProfessional" 
					action="{{ route('ITResources.searchProfesional') }}"
					style="display:inline">
					<input placeholder="Analista Funcional"  type="text" name="s"
					value="{{ $position or 'Analista Funcional'}}">
					<input class="btn btn-success" type="submit" value="Buscar">
				</form>
			
				@if(isset($skills))
				@foreach($skills as $skill)
					@if(isset($skill->quantity) && $skill->quantity>0)
						<span class="badge badge-success skill" skill-name="{{ $skill->name }}">{!! $skill->name.' <span class="number">'.$skill->quantity.'</span>' !!}</span>
					@else
						<span class="badge badge-success skill" skill-name="{{ $skill->name }}">{{ $skill->name }}</span>
					@endif
				@endforeach
				@endif
			<script type="text/javascript">
			(function(window,document){
				var $ = jQuery;
				$(document).ready(function(){
					$('span.skill').css('cursor','pointer');
					$('span.skill').on('click', function(){
						$('#searchProfessional input[name=s]')
							.val($(this).attr('skill-name'));
						$('#searchProfessional').submit();
					})
				});
			})(window,document);
			</script>
			</div>

			<div class="col-md-12">

				@if(count($employees)>0)
					@foreach ($employees as $employee)
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-3">

									<!--<div style="background: green;float: left;width: 100px; height: 100px; margin: 10px; border-radius: 50px; overflow: hidden;">-->
									<div style="float: left;width: 100px; height: 100px; margin: 10px;">
										<img src="img/ITResources/profesional.png">
									</div>
								</div>
								<div class="col-md-9">
									<h2><a target="_blank" href="{{ route('ITResources.profile', [
										'slug' => $employee->slug
										]) }}">{{ $employee->name }}</a></h2>
									<p>{{ $employee->description }}</p>
								</div>
							</div>
						</div>
						<div class="col-md-6" style="margin: 10px 0px;">
							@include('ITResources.widget.card')
						</div>
					</div>
					@endforeach
					<div align="center">{{ $paginatorLink }}</div>
				@else
					<b>No hay Profesionales con esas habilidades o conocimientos</b>
				@endif
				<hr>
			</div>
		</div>
 		@include('ITResources.footer')
	</div>
 @include('main.footer')

		
@endsection