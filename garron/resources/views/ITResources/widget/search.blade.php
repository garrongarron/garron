			<h2>Profesionales</h2> 
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.search', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<form action="{{ route('ITResources.searchProfesional') }}">
					<input placeholder="Analista Funcional" class="form-control" type="text" name="s">
					<input class="btn btn-warning form-control" type="submit" value="Buscar">
				</form>
			</ul>