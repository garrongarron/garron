@extends('main.layout')

@section('content')

 @include('ITResources.header')

<div class="container">
	<div class="row">
		@include('ITResources.modal')
		<div class="col-md-12">
			<hr>
			<h1>IT Resources</h1>
			<p>Busca las oportunidades de mejora. Aquí las mejores empresas buscan a los mejores recursos.</p>
			<hr>
		</div>
		

		<div class="col-md-6">
			<h2>Busco Recursos</h2> 
			<ul>
				<li><a href="#">Full Stack Developer</a></li>
				<li><a href="#">Team Leader</a></li>
				<li><a href="#">System Administrator</a></li>
				<li><a href="#">DBA</a></li>
				<li>Busco: <input type="text" placeholder="Full Stack Developer" name="search-resource">
				@include('ITResources.modal-button')
				</li>
			</ul>

		</div>
		<div class="col-md-6">
			<h2>Ofresco Recursos</h2> 
			<ul>
				<li><a href="#">Full Stack Developer</a></li>
				<li><a href="#">Team Leader</a></li>
				<li><a href="#">System Administrator</a></li>
				<li><a href="#">DBA</a></li>
				<li>Soy <input type="text" placeholder="Full Stack Developer" name="search-resource">
				@include('ITResources.modal-button')
				</li>
			</ul>
		</div>
		
		<div class="col-md-12">
			<hr>
			<h3>Salarios</h3>
			<p>Busca las oportunidades de mejora. Aquí las mejores empresas buscan a los mejores recursos.</p>
			<ul>
				<li><a href="#">Full Stack Developer</a></li>
				<li><a href="#">Team Leader</a></li>
				<li><a href="#">System Administrator</a></li>
				<li><a href="#">DBA</a></li>
				<li>Salarios Neto de un:<input type="text" placeholder="Full Stack Developer" name="search-resource"> 
				@include('ITResources.modal-button')
				</li>
			</ul>
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