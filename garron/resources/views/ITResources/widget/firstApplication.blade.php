<style type="text/css">
input[type="file"] {
    display: nnone;
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
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="float: left;">Enviar CV</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="8">
				  <span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body">
				<input type="button" id="hasUser" value="Con usuario"  class="btn btn-primary" style="margin-bottom: 15px;">
				<input type="button" id="noUser" value="Sin Usuario"  class="btn btn-primary" style="margin-bottom: 15px;">
				
				<form id="first-application" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
		        	{{ csrf_field() }}
		        	<input type="hidden" name="positionId" value="{{ $position->id }}">
		        	<input type="hidden" name="password" value="{{ $password }}">
		        	<input type="hidden" name="password_confirmation" value="{{ $password }}">
		        	<input type="hidden" name="role" value="employee">
		        	<div style="max-height: 300px; overflow-y: scroll;display: none;" class="scroll-buttom">
		        		<div class="form-group">
							
							<label for="name" class="col-2 col-form-label" >Nombre y Apellido</label>
							<div class="col-10">
								<input class="form-control" type="text" name="name" placeholder="Nombre y Apellido" tabindex="1">
							</div>

						</div>
						<div class="form-group">
							<label for="position">Posición</label>
							<input class="form-control" type="text" name="position" placeholder="Posición" value="<?php echo  $position->title; ?>" disabled="disabled">
						</div>
						
						{{--<!--<div class="form-group">
							<label for="description">Descripción</label> 
							<textarea class="form-control" name="description" placeholder="Descripción de mis tareas"></textarea>
						</div>-->--}}
						@if(Auth::guest())
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="text" name="email" placeholder="nombre.apellido@email.com" style="color:black" tabindex="2">
						</div>
						@endif

						<div class="form-group">
							<label for="phone">Teléfono</label>
							<input class="form-control" type="text" name="phone" placeholder="+54(911)44445555" style="color:black" tabindex="3">
						</div>
						<div class="form-group">
							<input type="file" name="file" id="file" class="inputfile"/>
							<button type="button" class="btn btn-primary file" id="bottom" tabindex="5">Subir CV</button>
						</div>
						
		        	</div>
					<div class="modal-footer">
						{{--<!--<button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="7" 
						style="display: inline">Cancelar</button>-->--}}
						<div class="footer-buttons" style="display: none;">
							<button type="submit" class="btn btn-secondary" tabindex="6">Enviar CV</button>
							<button type="button" class="btn btn-primary apply-line"  tabindex="4">Crear CV y Ususario (recomendado)</button>
						</div>
					</div>
				</form>
		    </div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://formvalidation.io/vendors/formvalidation/css/formValidation.min.css">

<script type="text/javascript" src="https://www.lacaja.com.ar/cotizadorauto/static/assets_new/js/formValidation.min.js"></script>
<script type="text/javascript" src="https://www.lacaja.com.ar/cotizadorauto/static/assets_new/js/bootstrap.min.js"></script>
<script type="text/javascript">
(function(window,document, $){

		$('#noUser').on('click', function(){
			$('#noUser, #hasUser').animate({ marginTop: '-150px' , opacity:0}, 500);
			setTimeout(function(){
				$('.scroll-buttom').slideToggle();
				$('#noUser, #hasUser').hide();
				$('.footer-buttons').fadeIn();
				$('h5').html('Datos Personales');
			},500);
		});

		$('#hasUser').on('click', function(){
			window.location.href = "{{ route('login', ['parameter'=>'value'])}}";
		});

		$(document).ready(function(){
			var $ = jQuery;
			/*$('#exampleModal').modal('show');
			$('input[name=name]').keyup(function(){
				$('h2').html($(this).val());
			});
			$('textarea[name=description]').keyup(function(){
				$('.description').html($(this).val());
			});*/
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
var online = false;

$('button.apply-line').on('click', function(){
	online = true;
	$('#first-application').submit();
});




$('#first-application').formValidation({
    framework: 'bootstrap',
    icon: {
        valid: null,
        invalid: null,
        validating: null
    },
    fields: {
        email: {
            validators: {
                notEmpty: {
                    message: 'El campo email es requerido'
                },
                emailAddress: {
                    message: 'No es un email válido'
                }
            }
        },
        name: {
            validators: {
                notEmpty: {
                    message: 'El campo Nombre y Apellido es requerido'
                }
            }
        },
        phone: {
            validators: {
                notEmpty: {
                    message: 'El campo Teléfono es requerido'
                }
            }
        }/*,
        file: {
            validators: {
                notEmpty: {
                    message: 'El campo Subir CV es requerido.'
                }
            }
        }*/
    }
}).on('err.form.fv', function(e) {
	/*generateCaptcha();*/
	online = false;
	$('button[type=submit]').removeClass('disabled').removeAttr("disabled").focus();
}).on('success.form.fv', function(e) {
	
	// The e parameter is same as one
	// in the prevalidate.form.fv event above
	if(online){
		console.log('online');

	} else {
		online = false;
		if( $.trim($('input[name=file]').val())!==''){
			console.log($('input[name=file]').val());
		} else {
			console.log('Pedir File');
			$('.file').focus();
			$('button[type=submit]').removeClass('disabled').removeAttr("disabled").focus();
			e.preventDefault();
			return false;
		}
	}
	this.submit();
  //return false;
});






	})(window, document, jQuery)
	
</script>

