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



////////-------------------para ajax


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });
 
 function GuardarElemento(){
 
        // Guardamos el elemento Form en una variable (Rendimiento!!)
        var $form = $(this);
        // Guardamos el elemento Input en una variable (Rendimiento!!)
        var $images = $("#images");
 
        // Cogemos los atributos del form
        var method = $form.attr("method");
        var url = $form.attr("action");
 
        // Cogemos las files del input
        var files = $images[0].files;
 
        // Creamos el objeto formData
        var formData = new FormData();
 
        // Recorremos las files del input
        for (var i = 0; i < files.length; i++) { var file = files[i]; 
        	// Si no es una imagen se salta 
        	if (!file.type.match("image.*")) { continue; } 
        	// Si es una imagen la guardamos para mandarla a laravel 
        	formData.append("images[]", file, file.name); } 
        	// Un ajax de toa la vida 
        	$.ajax({ 
        		url : url, 
        		// Ruta 
        		type: method, 
        		// mMtodo 
        		data : formData, 
        		// Imagenes 
        		cache: false, 
        		// 0 Cache para que no pete nada (La cache es el mal) 
        		contentType: false, 
        		// Nos la suda el 
        		contentType processData: false, 
        		// No queremos procesar los datos 
        		// Si lo has hecho bien, (que yo si lo he hecho bien...).. 
        		success:function(data) { 
        			// Taraaaaaaa...!!! imprimirmos el dd(); 
        			$("#resultado").html(data) }, 
        			// Si lo has hecho mal!!....... 
        			error: function(data) { 
        				// Buscate la vida para controlar el error y dar un buen servicio 
        				console.log(data); 
        			} 
        		});
      }
        				

        				 	
        				 </script>


</script>


<?php

 ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{$titulo}}
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

						<h3 class="box-title">Agregar</h3>
					</div>


					<div id="messages" class="messages">
						@if(count($errors)>0)
						<div class="box-body">

							<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<ul>							
									@foreach($errors->all() as $error)
									<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif
					</div>

					<!--                    *************** COntenido *******************         -->	
					

					{!! Form::open(['url' => 'admin/articulos/up','method' => 'post', 'files' => true,'class' => 'bordered-row','id' => 'formulario','name' => 'formulario','role' => 'form']) !!}

					<!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> -->

					<div class="box-body">


					<div class="form-group">
							{!! Form::label('title', 'Titulo') !!}
							{!! Form::text('title',null,['class' => 'form-control required','id' => 'title','placeholder'=>"Titulo del articulo"]) !!}
					</div>
					<div class="form-group">
							{!! Form::label('title_url', 'Seo Url') !!}
							{!! Form::text('title_url',null,['class' => 'form-control required','id' => 'title_url','placeholder'=>"seo Url"]) !!}
					</div>


					<div class="form-group">
							{!! Form::label('Imagen de nota', 'Imagen de Nota') !!}
							{!! Form::file('image',['class' => 'required','id' => 'image']) !!}
					</div>
					<div class="form-group">
							{!! Form::label('Imagen de nota', 'Imagen de Nota') !!}
							{!! Form::file('image',['class' => 'required','id' => 'image']) !!}
					</div>

					<div class="form-group">
							<button type="button" onclick="GuardarElemento()">Agregar Imagen</button>
					</div>

					

					<div class="form-group">
							{!! Form::label('meta_keywords', 'Meta Keywords') !!}
							{!! Form::textarea('meta_keywords',null,['class' => 'form-control required','id' => 'meta_keywords','placeholder'=>"Descripcion del articulo"]) !!}
					</div>

					<div class="form-group">
							{!! Form::label('content', 'Contenido') !!}
							{!! Form::textarea('content',null,['class' => 'form-control required','id' => 'content','placeholder'=>"Descripcion del articulo"]) !!}
					</div>

			

					<div class="form-group">
							{!! Form::label('id_categoria', 'Categoria') !!}
							{!!  Form::select('id_categoria', 
								 $lst_categorias,
								'', 
								['class' => 'form-control required','id' => 'id_categoria'])!!}
					</div>






							<div class="form-group">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('active', 1, true) !!}
										Activo
									</label>
								</div>

							</div>

							<div class="box-footer">

								<button  type="submit" class="btn btn-info pull-left"  
								onclick="sendFormularioProducto(document.formulario,1,'noajax',this);">Guardar</button>




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