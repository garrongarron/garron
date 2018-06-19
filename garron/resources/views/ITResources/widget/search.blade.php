			<h2>Profesionales</h2> 
			<ul>
				@foreach ($positions as $key => $position)
				<li><a href="{{ route('ITResources.search', ['position' => $key]) }}">{{ $position }}</a></li>
				@endforeach
				<!--{{--<li><input type="text" placeholder="Analista Funcional" name="search-resource">
				@include('ITResources.modal-button')
				</li>--}}-->
			</ul>