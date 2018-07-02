
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="float: left;">Mis datos personales</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
		        <form method="get" action="<?php echo $update; ?>">
		        	<div style="max-height: 300px; overflow-y: scroll;">
		        		<div class="form-group">
							
							<label for="name" class="col-2 col-form-label">Nombre</label>
							<div class="col-10">
								<input class="form-control" type="text" name="name" placeholder="Nombre y Apellido">
							</div>

						</div>
						<div class="form-group">
							<label for="position">Posición</label>
							<input class="form-control" type="text" name="position" placeholder="Posición" value="<?php echo  $position; ?>" disabled="disabled">
						</div>
						
						<div class="form-group">
							<label for="description">Descripción</label> 
							<textarea class="form-control" name="description" placeholder="Descripción de mis tareas"></textarea>
						</div>
						<?php if(isset($guest)&&$guest===true): ?>
						<div class="form-group">
							<label for="email">Email</label> (No se verá en tu perfil) <a href="javascript:return false;" onclick="alert('Funcionalidad no disponible')">Editar</a>
							<input class="form-control" type="text" name="email" placeholder="nombre.apellido@email.com" style="color:black">
						</div>
						<?php endif ?>

						<div class="form-group">
							<label for="phone">Teléfono</label> (No se verá en tu perfil) <a href="javascript:return false;" onclick="alert('Funcionalidad no disponible')">Editar</a>
							<input class="form-control" type="text" name="phone" placeholder="4444-4444" style="color:black">
						</div>

						<hr>
						<div class="form-group">

<style type="text/css">
								input[type="file"] {
								    display: none;
								}
								.custom-file-upload {
								    border: 1px solid #ccc;
								    display: inline-block;
								    padding: 6px 12px;
								    cursor: pointer;
								}
/************************************************/
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.inputfile + label {
    padding: 2.5px 6px;
	color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
    border: 1px solid transparent;
    border-radius: 4px;
    text-transform: none;
    letter-spacing: 0px;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: gray;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
	pointer-events: none;
}


</style>

							<input type="file" name="file" id="file" class="inputfile" />
							<button type="button" class="btn btn-primary file">Subir CV</button>
							<button type="button" class="btn btn-primary">Crear CV Online (recomendado)</button>
						</div>

		        	</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	(function(document, $){
		$(document).ready(function(){
			var $ = jQuery;
			$('#exampleModal').modal('show');
			$('input[name=name]').keyup(function(){
				$('h2').html($(this).val());
			});
			$('textarea[name=description]').keyup(function(){
				$('.description').html($(this).val());
			});
		});
		$('.file').on('click', function(){
			$('input[type=file]').click();	
		})
		var upResume = $('input[type=file]').next().html();
		$('input[type=file]').on('change', function(){
			var fileName = $(this).val().split( '\\' ).pop();

			if($.trim(fileName) == ''){
				$(this).next().html(upResume);
			} else {
				$(this).next().html(fileName);
			}
		});

	})(document, jQuery)
	
</script>

