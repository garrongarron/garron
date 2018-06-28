<!-- Modal -->
<div class="modal fade" id="experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Experiencia</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>

			</div>
			{{ Form::open(array('url' => 'experience')) }}
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
					{{ Form::text('location', Input::old('location'), array('class' => 'form-control')) }}
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
					{{ Form::select('industry', ['2018'=>'2018','2017'=>'2017','2016'=>'2016'],
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
				{{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}
					
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
	});
	$('#experience #from').datepicker();
	$('#experience  #to').datepicker();
	$('#experience #from, #experience  #to, #experience #industry').attr('disabled', 'disabled');
})(window,document);
</script>