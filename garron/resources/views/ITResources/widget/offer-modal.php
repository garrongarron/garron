
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Mis datos personales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

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
			<!--<div class="form-group">
				<label for="email">Email</label> (No se verá en tu perfil) <a href="javascript:return false;" onclick="alert('Funcionalidad no disponible')">Editar</a>
				<input class="form-control" type="text" name="email" placeholder="nombre.apellido@email.com" style="color:black">
			</div>-->

			<div class="form-group">
				<label for="phone">Teléfono</label> (No se verá en tu perfil) <a href="javascript:return false;" onclick="alert('Funcionalidad no disponible')">Editar</a>
				<input class="form-control" type="text" name="phone" placeholder="4444-4444" style="color:black">
			</div>

			<hr>
			<div class="form-group">
				<label class="custom-file">Curriculum</label>
			  <input type="file" id="file" class="custom-file-input">
			  <span class="custom-file-control"></span>
			</div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

	})(document, jQuery)
	
</script>
