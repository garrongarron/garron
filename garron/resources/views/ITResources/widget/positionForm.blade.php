<!-- Modal -->
<div class="modal fade" id="position{{ $toUpdate or '' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Posición</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>

			</div>
			@if(!isset($toUpdate))
				{{ Form::open(array('url' => 'position')) }}
			@else
				{{ Form::model(
						$position, 
						array(
							'route'=> array( 
								'position.update', 
								$position->id
							),
							'method' => 'put'
						)
					)
				}}
			@endif
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('title', 'Titulo') }}
					{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Descripción') }}
					{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control','size'=>'2x2')) }}
				</div>

				<div class="form-group">
					{{ Form::label('type', 'Tipo de empleo') }}
					{{ Form::select('type', ['Part-Time'=>'Part-Time','Full-Time'=>'Full-Time'],
					null,
					array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('salary', 'Salario') }}
					{{ Form::text('salary', Input::old('salary'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('mandatory_requirements', 'Requisitos Obligatorios') }}
					{{ Form::textarea('mandatory_requirements', Input::old('mandatory_request'), array('class' => 'form-control','size'=>'2x2')) }}
				</div>

				<div class="form-group">
					{{ Form::label('desiderable_requirements', 'Requisitos Deseables') }}
					{{ Form::textarea('desiderable_requirements', Input::old('desiderable_requirements'), array('class' => 'form-control','size'=>'2x2')) }}
				</div>

				<div class="form-group">
					{{ Form::label('industry', 'Area') }}
					{{ Form::select('industry', $industry,
					null,
					array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('location', 'Lugar') }}
					{{ Form::text('location', Input::old('location'), array('class' => 'form-control')) }}
				</div>

			</div>
			<div class="modal-footer">
				{{ Form::submit('Enviar!', array('class' => 'btn btn-primary')) }}
					
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<script type="text/javascript">
(function(window,document){
	var $ = jQuery;
	$(document).ready(function(){
		/*$('#experience').modal('show');*/
		//$('#experience #from').datepicker();
		//$('#experience  #to').datepicker();
	});
	//$('#experience #industry').attr('disabled', 'disabled');
})(window,document);
</script>