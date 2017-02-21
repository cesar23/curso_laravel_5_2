@extends('admin.template.main-lte')

@section('title')
{{$titulo}}
@endsection


@section('contenido')
<script>
	function getTimeSegundo(segundos){
   	//para los:  setTimeout  de javascript

   	return segundos*1000;

   }


   function sendFormularioProducto(form, limpiarFormulario, is_ajax,objectoButton) {

 

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
                <!-- para los flasshh messages en bootstrap -->        
                   @include('flash::message')

					<div class="box-header with-border">
						<button class="w3-btn w3-small w3-blue">
						<i class="fa fa-plus-square" aria-hidden="true"></i> <a href="{{ route('admin.articulos.create')}}">Agregar</a></button>
						  

					</div>


					
						


					<div id="messages" class="messages"></div>

					<!--                    COntenido          -->	
				
<div class="box-body">
                        <div class="table_mostrar_scroll_xs">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">

                            <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid">
                                <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="id pag: activate to sort column descending" style="width: 0px;">id</th>                              
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="URL-SEO: activate to sort column ascending" style="width: 0px;">TITULO</th>
                                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="URL-web: activate to sort column ascending" style="width: 0px;">FECHA</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 0px;">Acciones</th></tr>
                                </thead>
                                <tbody>
                                
                                 @foreach ($listado as $row)
                                <!-- lista-->
                                
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $row->id }}</td>

                                    <td>{{ $row->title }}</td>

                                    <td>{{ $row->created_at }}</td>
                                   


                                    <td>                                  

                                        <a href="{{ route('admin.articulos.edit',$row->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> |

                                        <a href="javascript:eliminarRegistro('{{ route('admin.articulos.destroy',$row->id) }}')" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a></td>
                                  </tr>
                                  @endforeach
                                  
                                  <!-- fin lista-->
                                </tbody></table></div></div><div class="row"><div class="col-sm-5"></div><div class="col-sm-7"></div></div></div>
                                <div class="conten_pag">
     <ul class="pagination">
    
            <!-- Previous page link -->
            {{ $listado->links() }}
                            <li class="disabled">
                            
                            
                </li>
                    </ul>
    </div>
                        </div>
                    </div>
						<!--                      Fin Contenido     -->		




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