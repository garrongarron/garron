<!-- Modal -->
<div class="modal fade" id="study" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel" style="float: left;">Educación</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body">
				<form method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
				{{--<!-- 
            $table->string('school');
            $table->string('degree');
            $table->string('field_of_study');
            $table->string('grade');
            $table->string('activities');
            $table->date('from');
            $table->date('to');
            $table->string('description');
				-->--}}
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Universidad</label>

							<input class="form-control" type="text" name="school" placeholder="P. ej. Universidad de Buenos Aires" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Titulo</label>

							<input class="form-control" type="text" name="degree" placeholder="P. ej. Ingeniero de Software" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Disciplina académica</label>

							<input class="form-control" type="text" name="field_of_study" placeholder="P. ej. Ingeniería" tabindex="1">

					</div>
					<div class="form-group">Nota</label>

							<input class="form-control" type="text" name="grade" placeholder="P. ej. 8.50" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Actividades y Grupos</label>
						<textarea  class="form-control" name="activities" tabindex="1"></textarea>
					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Desde</label>
						<select class="form-control" name="from">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Hasta</label>
						<select class="form-control" name="to">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>

					</div>

					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Descripción</label>
							<textarea  class="form-control" name="description" tabindex="1"></textarea>

					</div>

				</form>
			</div>
			<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" tabindex="6">Enviar CV</button>
					<button type="button" class="btn btn-primary apply-line"  tabindex="4">Crear CV y Ususario (recomendado)</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
(function(window,document){
	var $ = jQuery;
	$(document).ready(function(){
		/*$('#study').modal('show');*/
	});
	$('#study #from').datepicker();
	$('#study  #to').datepicker();
})(window,document);
</script>