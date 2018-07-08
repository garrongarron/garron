@extends('emails.template')

@section('content')
<?php
$img_file = './img/GarronConsultingGroup.png';
$imgData = base64_encode(file_get_contents($img_file));
$imgSrc = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
?>
<div class="container" style="background: white">
	<div class="title" style="margin-bottom: 10px;">
		<!--<img style="width: 280px" src="{{ $imgSrc }}">-->
		<img style="width: 280px" src="https://www.garron.com.ar/img/GarronConsultingGroup.png">
	</div>
	<div class="body" >
		<div align="center">
			<h2>Éxitos</h2>
			<small>Tu <b>Desarrollo Profesional</b> depende sólo de ti. En <b>GCG</b> generamos las oportunidades para ayudarte a conseguirlo.</small>
		</div>
		<hr>
		<h3>Aplicaste para una posición</h3>
		<p>Pronto tendrás novedades del proceso</p>
		<ul>
			<li>Posición: {{ $position->title or '[Team Leader]' }}</li>
			<li>Tipo: {{ $position->type or '[Full-Time]' }}</li>
			<li>Salario: {{ $position->salary or '[$40.000]' }}</li>
			@if(isset($position))
				<li>Haz clic <a href="{{ route('ITResources.position', ['position' => str_slug($position->title).'-'.$position->id]) }}">aquí</a> para ver más detalles</li>
			@else
				<li>Haz clic <a href="{{ route('ITResources') }}">aquí</a> para ver más detalles</li>
			@endif
		</ul>
		<div align="center">
			<a href="{{ route('ITResources') }}">www.garron.com.ar/ITResources</a>
		</div>
	</div>
	<div class="footer">
		Garron Consulting Group
	</div>
</div>

@endsection	