<!-- Modal -->
<div class="modal fade" id="user{{ $toUpdate or '' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Mis Datos Personales</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			@if(!isset($toUpdate))
				{{ Form::open(array('url' => 'user')) }}
			@else
				{{ Form::model(
						$user, 
						array(
							'route'=> array( 
								'user.update', 
								$user->id
							),
							'method' => 'put'
						)
					)
				}}
			@endif
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('name', 'Nombre Completo') }}
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('position', 'Posición') }}
					{{ Form::text('position', Input::old('position'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Descripción') }}
					{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control','size'=>'2x2')) }}
				</div>
				<div class="form-group">
					{{ Form::label('phone', 'Telefono') }}
					{{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="modal-footer">
					{{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
