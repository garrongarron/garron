{{ Form::open(array('url' => 'positionloader')) }}
<div class="modal-body">
	<div class="form-group">
		{{ Form::label('url', 'URL') }}
		{{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}

		<br>
		{{ Form::label('keywords', 'Key Word') }}
		{{ Form::text('keywords', Input::old('keywords'), array('class' => 'form-control')) }}


		{{ Form::label('location', 'Ubicacion') }}
		{{ Form::text('location', Input::old('location'), array('class' => 'form-control')) }}

		{{ Form::submit('Procesar', array('class' => 'btn btn-primary')) }}
	</div>
</div>
{{ Form::close() }}