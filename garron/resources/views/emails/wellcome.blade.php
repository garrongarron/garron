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
	<div class="body">
		<div align="center">
			<h2>Bienvenido</h2>
			<small>Tu <b>Desarrollo Profesional</b> depende sólo de ti. En <b>GCG</b> generamos las oportunidades para ayudarte a conseguirlo.</small>
		</div>
		<hr>
		<h3>Busca Trabajo o a tus Candidatos</h3>
		<p>Aquí las mejores empresas buscan a los mejores profesionales.</p>
		<ul>
			<li>Tu ususario: {{ $data['name'] or 'Pepe' }}</li>
			<li>Tu email: {{ $data['email'] or 'pepe@gmail.com' }}</li>
			<li>Tu pasword: {{ $data['password'] or '123456' }}</li>
			<li>Haz clic <a href="{{ route('ITResources') }}">aquí</a> para empezar</li>
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


			
