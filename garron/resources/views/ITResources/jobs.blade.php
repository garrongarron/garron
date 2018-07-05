@extends('main.layout')

@section('content')

 @include('ITResources.header')
<style type="text/css">
.offer{
	padding-top: 5px;
	padding-bottom: 5px; 
	background: #eee; 
	margin-top: 10px; 
	margin-bottom: 10px;
}
h3, img{
	margin-top: 15px;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin: 20px 0px;">
			<span>Búsqueda de trabajo</span> > <a href="#">{{ $position }}</a>
		</div>
		<div class="col-md-3">
			<div style="border: 1px solid gray">
				<div style="background: gray; padding: 10px; color: white;"><b>Últimas ofertas</b></div>
				<ul style="padding: 0px 10px;">
					@foreach($last as $title)
						<li><a target="_blank" href="{{ route('ITResources.position', ['position' => str_slug($title->title).'-'.$title->id]) }}">{{ $title->title }}</a></li>
					@endforeach
				</ul>
				{{--<!--<div style="padding: 0px 10px; color: black;"><b>Búsqueda de trabajo</b></div>
				<ul style="padding: 0px 10px;">
					@foreach($positions as $title)
						<li><a target="_blank" href="{{ route('ITResources.jobs', ['position' => str_slug($title->title)]) }}">{{ $title->title }}</a></li>
					@endforeach
				</ul>-->--}}
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<form action="{{ route('ITResources.searchJobs') }}">
					<div class="col-md-10">
						<div class="form-group">
							<input class="form-control" type="text" name="s" value="{{ $position }}" placeholder="{{ $position }}">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input class="btn btn-success form-control" type="submit" value="Buscar">
						</div>
					</div>
				</form>
			</div>

			@if(count($positions)>0)
				@foreach($positions as $title)
				<div class="row offer" onclick="window.open('{{ route('ITResources.position', ['position' => str_slug($title->title).'-'.$title->id]) }}', '_blank')" style="cursor: pointer;">
					<div class="col-md-3">
						<img src="/img/GarronConsultingGroup.png" width="80%" alt="IMAGEN" style="margin-left: 10%; background: silver; ; border: 1px solid gray;">
					</div>
					<div class="col-md-9">
						<h3>{{ $title->title }}</h3>
						<div><b>Garron Consulting Grup</b></div>
						<div><span>Capital Federal</span> <span>Full time</span> <span><i>Ayer</i></span></div>
					</div>
				</div>
				@endforeach
			@else
				<b>No hay resultados para esta búsqueda</b>
			@endif

			{{ $paginatorLink or 'Links'}}
			
			
		</div>
	</div>
	@include('ITResources.footer')
</div>


 
 @include('main.footer')

		
@endsection