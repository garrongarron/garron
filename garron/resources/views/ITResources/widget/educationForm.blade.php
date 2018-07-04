<!-- Modal -->
<div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Educación</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{ Form::open(array('url' => 'education')) }}
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('school', 'Escuela') }}
					{{ Form::text('school', Input::old('school'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('degree', 'Titulo') }}
					{{ Form::text('degree', Input::old('degree'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('field_of_study', 'Disciplina académica') }}
					{{ Form::text('field_of_study', Input::old('field_of_study'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('grade', 'Nota') }}
					{{ Form::text('grade', Input::old('grade'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('activities', 'Actividades y Grupos') }}
					{{ Form::textarea('activities', Input::old('activities'), array('class' => 'form-control', 'size'=>'2x2')) }}
				</div>
				<div class="form-group">
					{{ Form::label('from', 'Desde') }}
					{{ Form::select('from', ['2018'=>'2018','2017'=>'2017','2016'=>'2016'], 
					null,
					array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('to', 'Hasta') }}
					{{ Form::select('to', ['2018'=>'2018','2017'=>'2017','2016'=>'2016'],
					null,
					array('class' => 'form-control')) }}
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
		/*$('#education').modal('show');*/
	});
	/*$('#education #from').datepicker();
	$('#education  #to').datepicker();*/
})(window,document);
</script>
