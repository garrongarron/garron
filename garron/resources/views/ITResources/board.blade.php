@extends('main.layout')

@section('content')

 @include('ITResources.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<hr>
				<h1>Tablero</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<h2>Postulaciones</h2>
				<table class="table">
				<thead>
				  <tr>
				    <th>Imagen</th>
				    <th>Compania</th>
				    <th>Status</th>
				    <th>Avance</th>
				    <th>Alcance</th>
				    <th>Mensaje</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
				    <td>John</td>
				    <td>Doe</td>
				    <td>john@example.com</td>
				    <td>John</td>
				    <td>Doe</td>
				    <td>john@example.com</td>
				  </tr>
				  <tr>
				    <td>Mary</td>
				    <td>Moe</td>
				    <td>mary@example.com</td>
				    <td>Mary</td>
				    <td>Moe</td>
				    <td>mary@example.com</td>
				  </tr>
				  <tr>
				    <td>July</td>
				    <td>Dooley</td>
				    <td>july@example.com</td>
				    <td>July</td>
				    <td>Dooley</td>
				    <td>july@example.com</td>
				  </tr>
				</tbody>
				</table>
			</div>
		</div>
		@include('ITResources.footer')
	</div>
 
 
 @include('main.footer')

		
@endsection