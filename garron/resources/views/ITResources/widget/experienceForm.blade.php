<!-- Modal -->
<div class="modal fade" id="experience{{ $toUpdate or '' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Experiencia</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>

			</div>
			@if(!isset($toUpdate))
				{{ Form::open(array('url' => 'experience')) }}
			@else
				{{ Form::model(
						$experience, 
						array(
							'route'=> array( 
								'experience.update', 
								$experience->id
							),
							'method' => 'put'
						)
					)
				}}
			@endif
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('title', 'Cargo') }}
					{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('company', 'Empresa') }}
					{{ Form::text('company', Input::old('company'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('location', 'Ubicación') }}
					{{ Form::select('location', $country,
					null,
					array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('from', 'Desde') }}
					{{ Form::text('from', Input::old('from'), array('class' => 'form-control', 'id'=>'from')) }}
				</div>
				<div class="form-group">
					{{ Form::label('to', 'Hasta') }}
					{{ Form::text('to', Input::old('to'), array('class' => 'form-control', 'id'=>'to')) }}

				</div>
				<div class="form-group">
					{{ Form::label('industry', 'Sector') }}
					{{ Form::select('industry', $sectores,
					null,
					array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('headline', 'Titular') }}
					{{ Form::text('headline', Input::old('headline'), array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Descripción') }}
					{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control','size'=>'2x2')) }}
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
		$.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: '< Ant',
		 nextText: 'Sig >',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 dateFormat: 'yy-mm-dd',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);
		$( "#from, #to" ).datepicker();
		/*$('#experience').modal('show');*/
	});
	/*$('#experience #from').datepicker();
	$('#experience  #to').datepicker();*/
	//$('#experience #industry').attr('disabled', 'disabled');
})(window,document);
</script>