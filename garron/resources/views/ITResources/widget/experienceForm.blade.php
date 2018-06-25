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
			<div class="modal-body">
				<form method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
				{{--<!-- 
            $table->string('title');
            $table->string('company');
            $table->date('from');
            $table->date('to');
            $table->string('headline');
            $table->string('description');
				-->--}}
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Cargo</label>

							<input class="form-control" type="text" name="title" placeholder="P. ej. Gerente" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Empresa</label>

							<input class="form-control" type="text" name="company" placeholder="P. ej. Google" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Ubicación</label>

							<input class="form-control" type="text" name="location" placeholder="P. ej. Buenos Aires, Argentina" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Desde</label>

							<input class="form-control" type="text" id="from" name="from" placeholder="P. ej. x" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Hasta</label>

							<input class="form-control" type="text" id="to" name="to" placeholder="P. ej. x" tabindex="1">

					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Sector</label>
							<select class="form-control" name="industry">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
					</div>
					<div class="form-group">
						<label for="name" class="col-2 col-form-label" >Titular</label>

							<input class="form-control" type="text" name="headline" placeholder="P. ej. Co-Founder" tabindex="1">

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
		/*$('#experience').modal('show');*/
	});
	$('#experience #from').datepicker();
	$('#experience  #to').datepicker();
})(window,document);
</script>