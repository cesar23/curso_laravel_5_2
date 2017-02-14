@extends('admin.template.main-lte')

@section('title')
Inicio de Mi pagina
@endsection


@section('contenido')
<script>
	function getTimeSegundo(segundos){
   	//para los:  setTimeout  de javascript

   	return segundos*1000;

   }


   function sendFormularioProducto(form, limpiarFormulario, is_ajax,objectoButton) {

   	if (is_ajax!='ajax') {
   		return true;
   	}

 

		//prevenimos el envio
		$(form).submit(function (e) {
			e.preventDefault();
		});

		//validamos el formulario
		
		$(form).validate({
				//---------------- para poner un mensaje diferente solo para un elemento
//			  errorPlacement: function(error, element) {				 
//				if (element.attr("name") == "id_parent") {
//					console.log('id_parent');
//				  error.insertAfter("#msj_categoria");
//				} else {
//				  error.insertAfter(element);
//				}
//			  }
			//--------------------
		});
		// validamos si es valido con jqueryValidate (validamos con la classe validate)
		var isvalidate=$(form).valid();
	    // si no es valido retornamos 
	    if(!isvalidate){
			//console.log(1);
			//habilitamos el botton enviar
			$(objectoButton).removeAttr("disabled");
			$(form).find('input, textarea, button, select').removeAttr("disabled");
			return false;
		}


        //obteniendo la accion
        var actionURL = $(form).attr("action");
        //obteniendo la metodo
        var method = $(form).attr("method");
        //obteniendo los Datos
        var formData = new FormData(form);
        //---- deshabilitar formulario
        $(objectoButton).attr("disabled", "disabled");
		$(form).find('input, textarea, button, select').attr("disabled", "disabled");
		//---- fin deshabilitar formulario
     








            //alert("Se reara uno nuevo");
            //dehabilitanos el submit
            $(form).submit(function (e) {
            	e.preventDefault();
            });


            $.ajax({
            	url: actionURL,
            	type: method,
                // Form data
                //datos del formulario
                data: formData,
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
                //mientras enviamos el archivo
                /*
                 beforeSend: function(){
                 message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                 showMessage(message);
                 },
                 */
                //una vez finalizado correctamente
                success: function (data) {
                	console.log(data);
					///------------------------------------------------ASING JSON--------------------------------------
			  //convertimos el objeto debuelto en json a string
			  var str = JSON.stringify(data);
			  //una vez hecho eso ya podemos parsear
			  var objson = JSON.parse(str);

			  if(objson.success==true){
			  	///----limpiar el formulario
			  	if (limpiarFormulario == 1) {
			  		form.reset();
			  	}
			  
			  	///---- fin limpiar el formulario
			  	message = $('<div class="box-body"><div class="alert alert-success alert-dismissible">								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>								<h4><i class="icon fa fa-check"></i> Success!</h4>								'+objson.msg+'</div>	</div>');
			  	showMessage(message,3);


			  }else{
			  	message = $('<div class="alert alert-danger alert-dismissible">                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                <h4><i class="icon fa fa-ban"></i> Alert!</h4> '+objson.msg+'</div>');
			  	showMessage(message,30);
			  }







			  //si ah sido cargada una imagen haremos el cambio de imagen
			  if(objson.data.is_imagen_cargada){
				  // if ($('#load_imagen').length ){
				  // $('#load_imagen').html(
				  // '<img src="'+objson.data.imagen_cargada+'"  width="200" height="100"  alt="..." />');
				  // document.getElementById("imagen").value = "";
				  // }
				}
			///------------------------------------------------ASING JSON--------------------------------------



                    // message = $("<span class='success'>La imagen ha subido correctamente.</span>");




                   

                },


                progress: function (e) {
                	if (e.lengthComputable) {
                		var pct = (e.loaded / e.total) * 100;
                        //$('#progress_bar').css('width', pct + '%').attr('aria-valuenow', pct).text(pct + '%');


                    }


                },
                 //si ha ocurrido un error
                error: function (jqXHR, exception) {
                	var msg = '';
                	if (jqXHR.status === 0) {
                		msg = 'Not connect.\n Verify Network.';
                	} else if (jqXHR.status == 404) {
                		msg = 'Requested page not found. [404]';
                	} else if (jqXHR.status == 500) {
                		msg = 'Internal Server Error [500].';
                	} else if (exception === 'parsererror') {
                		msg = 'Requested JSON parse failed.';
                	} else if (exception === 'timeout') {
                		msg = 'Time out error.';
                	} else if (exception === 'abort') {
                		msg = 'Ajax request aborted.';
                	} else {
                		msg = 'Uncaught Error.\n' + jqXHR.responseText;
                	}
                	//$('#post').html(msg);
                	 //message = $("<span class='error'>Ha ocurrido un error.</span>");
                    message = $('<div class="box-body"><div class="alert alert-danger alert-dismissible">                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                <h4><i class="icon fa fa-ban"></i> Alert!</h4> '+msg+'</div></div>');
                    showMessage(message,30);
                }
            });
//habilitamos el botton enviar
$(objectoButton).removeAttr("disabled");
$(form).find('input, textarea, button, select').removeAttr("disabled");
	

} 


 // $.ajaxSetup({
 //        headers: {
 //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //        }
 //    });

function showMessage(message,segundos) {
	$(".messages").html("").show();
	$(".messages").html(message);
        //ocultamos
        setTimeout(function () {
        	$(".messages").hide("slow");
        }, getTimeSegundo(segundos));

    }


</script>




<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			seccion title
			<small>estado</small>
		</h1>
		<ol class="breadcrumb ruta_estado">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->

	<section class="content">
		<!-- Small boxes (Stat box) -->

		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->

				<div class="box">
					<div class="box-header with-border">
						<i class="fa fa-edit"></i>

						<h3 class="box-title">Editar Usuario: <strong></strong></h3>
					</div>


					<div id="messages" class="messages"></div>

					<!--                    *************** COntenido *******************         -->	
				






{!! Form::open(['url' => 'admin/usuarios/10','method' => 'put', 'files' => true,'class' => 'bordered-row','id' => 'formulario','name' => 'formulario','role' => 'form']) !!}


<!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> -->

					<div class="box-body">


						<div class="form-group">
							{!! Form::label('usuario', 'Usuario') !!}
							{!! Form::text('usuario',$entidad->usuario,['class' => 'form-control required','id' => 'usuario','placeholder'=>"Nombre"]) !!}
						</div>


						<div class="form-group">
							{!! Form::label('correo', 'Correo') !!}
							{!! Form::text('correo',$entidad->correo,['class' => 'form-control required','id' => 'correo','placeholder'=>"email@hhh.com"]) !!}
						</div>

			

						<div class="form-group">
							{!! Form::label('cod_rol', 'Rol del cliente') !!}
							{!!  Form::select('cod_rol', 
								[''=>'Seleccionar','AD' => 'Administrador',  'GES' => 'Gestor de Contenido','CLI' => 'Cliente'],
								$entidad->cod_rol, 
								['class' => 'form-control required','id' => 'cod_rol'])!!}
							</div>




							<div class="form-group">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('active', 1, $entidad->active) !!}
										Activo
									</label>
								</div>

							</div>

							<div class="box-footer">

								<button  type="submit" class="btn btn-info pull-left"  
								onclick="sendFormularioProducto(document.formulario,1,'ajax',this);">Guardar</button>




							</div>



						</div>

						{!! Form::close() !!}

						<!--                    *********************  Fin Contenido  ******************   -->		




						<div class="box-body">


							<div class="table_mostrar_scroll_xs">


							</div>
						</div>
						<!-- /.box-body -->
					</div>

					<!-- /.box -->

				</div>
				<!--/.col (left) -->
				<!-- right column -->

				<!--/.col (right) -->
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->
	</div>
	@endsection