<!DOCTYPE html>
<html>
<head>
    <style>
        #sb-site {
            display: none;

        }

        .loader {
            margin: 0px auto;
            text-align: center;
            width: 100%;
            height: 100%;
            position: fixed;
        }

        .loader_gif {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100px;
            height: 75px;
            margin-left: -50px; /* la mitad del ancho*/
            margin-top: -38px; /* la mitad del alto*/
        }


    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Default') - Administrador</title>
    <meta name="robots" content="noindex" />

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/assets_admin_lte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets_admin_lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/assets_admin_lte/dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/assets_admin_lte/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->

    <link rel="stylesheet" href="/assets_admin_lte/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet"
    href="/assets_admin_lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/assets_admin_lte/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
    href="/assets_admin_lte/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
    href="/assets_admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
    href="/assets_admin_lte/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet"
    href="/assets_admin_lte/css/w3.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  MIOS   -->



    <link rel="stylesheet"
    href="/assets_admin_lte/js/bootstrap-vertical-tabs/bootstrap.vertical-tabs.css">


    <link rel="stylesheet" href="/assets_admin_lte/css/style.css">
    <link href="/assets_admin_lte/css/bootstrap_altos.css" rel="stylesheet">


    <script src="/assets_admin_lte/js/jquery-2.1.1.min.js"></script>
    <script src="/assets_admin_lte/js/jquery.cookie.js"></script>
    <script src="/assets_admin_lte/js/jquery.ajax-progress.js"></script>
    <!-- jvalidate -->
    <script src="/assets_admin_lte/js/jquery.validate.js"
    type="text/javascript"></script>
    <script src="/assets_admin_lte/js/jquery.validate.extendido.js"
    type="text/javascript"></script>
    <!-- jvalidate -->


    <!--bootsrap select combo-->
    <link href="/assets_admin_lte/bootstrap-select-master/css/bootstrap-select.min.css"
    rel="stylesheet">
    <script src="/assets_admin_lte/bootstrap-select-master/js/bootstrap-select.min.js"
    type="text/javascript"></script>
    <!--bootsrap select combo-->

    <!-- jquery Select -->
    <link href="/assets_admin_lte/js/lou-multi-select/css/multi-select.css"
    media="screen" rel="stylesheet" type="text/css">
    <script src="/assets_admin_lte/js/lou-multi-select/js/jquery.multi-select.js"
    type="text/javascript"></script>
    <!-- jquery Select -->
    <!-- bootstrap progress js -->
    <script src="/assets_admin_lte/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/assets_admin_lte/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- bootstrap tags -->
    <link rel="stylesheet"
    href="/assets_admin_lte/js/bootstrap_tagsinput/bootstrap-tagsinput.css">
    <script
    src="/assets_admin_lte/js/bootstrap_tagsinput/bootstrap-tagsinput.min.js"></script>
    <!-- bootstrap tags -->


    <!--     Morris.js charts -->

    <script src="/assets_admin_lte/js/raphael-min.js"></script>
    <script src="/assets_admin_lte/plugins/morris/morris.min.js"></script>
    <script src="/assets_admin_lte/js/Chart.js"></script>



    <!-- jquery Editores wisiwing -->

    <!-- treeview -->
    <link rel="stylesheet"
    href="/assets_admin_lte/js/treeview_jquery/jquery.treeview.css"/>
    <script src="/assets_admin_lte/js/treeview_jquery/jquery.cookie.js"
    type="text/javascript"></script>
    <script src="/assets_admin_lte/js/treeview_jquery/jquery.treeview.js"
    type="text/javascript"></script>


    <style>

        .treeview li a.active {
            color: red;

        }

        .redd {
            text-decoration: underline;
            color: #006495;
        }

        .blackk {

            text-decoration: none;
            color: #333;
        }

        .enlace {
            font-family: "Segoe UI", Tahoma, Arial;
            font-size: 14px;
            text-decoration: none;
            color: #333;
        }

        .enlace-hover {
            font-family: "Segoe UI", Tahoma, Arial;
            text-decoration: underline;
            color: #006495;
        }

        #navigator_ul {
            width: 350px;
        }

        #prog .ui-progressbar-value {
            background-color: #ccc;
        }

    </style>

    <script type="text/javascript"
    src="http://newsmartwave.net/magento/porto/js/smartwave/jquery/plugins/fancybox/js/jquery.mousewheel-3.0.6.pack.js"></script>
    <link rel="stylesheet" type="text/css"
    href="http://newsmartwave.net/magento/porto/skin/frontend/smartwave/porto/css/magegiant/dailydeal.css"
    media="all"/>
    <link rel="stylesheet" type="text/css"
    href="http://newsmartwave.net/magento/porto/skin/frontend/smartwave/default/fancybox/css/jquery.fancybox.css"
    media="all"/>

    <script type="text/javascript"
    src="http://newsmartwave.net/magento/porto/js/smartwave/jquery/plugins/fancybox/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="
    http://newsmartwave.net/magento/porto/js/smartwave/jquery/plugins/fancybox/js/jquery.mousewheel-3.0.6.pack.js"></script>


    <script type="text/javascript">$(window).load(function () {
        setTimeout(function () {
            $('#loading').fadeOut(400, "linear");
        }, 300);
    });
</script>
<script>

</script>
</head>
<body class="hold-transition skin-red sidebar-mini">
    <script>
        $(document).ready(function () {
            var xcookie = document.cookie;
            console.log(document.cookie);
        //definimos la cokiie
        var check_cookie = $.cookie('modal_suscripcion');
        console.log("estado cookie (modal_suscripcion) :" + check_cookie);
        //---ya la cokkie esta en no no mostraremos nada
        if (check_cookie != 'no') {

            setTimeout(function () {
                beginNewsletterForm();
            }, 3000);

        }

        //al presionar checkbox
        $('#no_suscripcion').on('change', function () {
         var date = new Date();
         var minutes = 60;
         date.setTime(date.getTime() + (minutes * 60 * 1000));

         if ($(this).length) {
            document.cookie = "name=oeschger";
            $.cookie('modal_suscripcion', 'no',{ path: '/',expires: date });
        } else {
            $.cookie('modal_suscripcion', 'si',{ path: '/',expires: date });
        }
    });


    });

        function beginNewsletterForm() {
          var date = new Date();
          var minutes = 60;
          date.setTime(date.getTime() + (minutes * 60 * 1000));
          jQuery.fancybox({
            'padding': '0px',
            'autoScale': true,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'inline',
            'href': '#suscripcion_popup',
            'onComplete': function () {
                $.cookie('modal_suscripcion', 'no',{ path: '/',expires: date });
            },
            'tpl': {
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close fancybox-newsletter-close" href="javascript:;"></a>'
            },
            'helpers': {
                overlay: {
                    locked: false
                }
            }
        });
          jQuery('#suscripcion_popup').trigger('click');
      }


      function sendFormPadre(elemento, ajax) {

        //cogemos el form padre del elemento
        var form = $(elemento).parents('form:first');

        var formData = new FormData($(form)[0]);//tiene que ser asi

        //obteniendo la accion
        var actionURL = $(form).attr("action");
        //obteniendo la metodo
        var method = $(form).attr("method");


        $(form).validate({
            rules: {
                email: "required email"
            },
            //---------------- para poner un mensaje diferente solo para un elemento
            errorPlacement: function (error, element) {
                error.insertAfter("#msj_error");
            }
            //--------------------
        });

        // validamos si es valido con jqueryValidate (validamos con la classe validate)
        var isvalidate = $(form).valid();
        // si no es valido retornamos
        if (!isvalidate) {
            $(form).attr('disabled', false);

            return false;
        }
        $(form).html('enviando...');
        //--------si llega  aqui seteamos la cokkie paar que ya no aparesca
        $(document).ready(function () {
         var date = new Date();
         var minutes = 60;
         date.setTime(date.getTime() + (minutes * 60 * 1000));
         $.cookie('modal_suscripcion', 'no',{ path: '/',expires: date });
     });
        //---------
        $.fancybox.close();//erramos el panel


        $.ajax({
            url: actionURL,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (data) {
                var str = JSON.stringify(data);
                //una vez hecho eso ya podemos parsear
                var objson = JSON.parse(str);


                console.log(objson.msg);
                //------------desaparecer
                //$.cookie('modal_suscripcion', 'no');
                $(form).html('su mensaje ah sido enviado gracias...');


                //---------------


            },
            error: function (request, status, error) {
                console.log(request.responseText);

            },
            complete: function () {

            }
        });

        $(form).attr('disabled', false);
        return false;

    }


</script>



<div id="sb-site">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><h4><?php echo APP_SYSTEM_NAME ?></h4></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><h4><?php echo APP_SYSTEM_NAME ?></h4></b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/assets_admin_lte/img/usuario_32x32.jpg"
                                class="user-image" alt="User Image">
                                <span class="hidden-xs">usus</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/assets_admin_lte/img/usuario_160x160.jpg"
                                    class="img-circle" alt="User Image">

                                    <p>
                                        usus
                                        <small>Tipo de Usuario: ??</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!--                                <div class="pull-left">-->
                                    <!--                                    <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                    <!--                                </div>-->
                                    <div class="pull-right">
                                        <a href="<?php echo APP_LOGOUT ?>" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/assets_admin_lte/img/usuario_160x160.jpg"
                        class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>??></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <script>
                    <?php
                    //$actual_link = $this->serverUrl(true);
                    $actual_link = 'htt://localhost:8000';
                    ?>

                     //Script para poner active el menu
                     $(document).ready(function () {
                   
                    });

                </script>

                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li id="recurso_home" class="ocultar">
                        <!--                <li class="active" id="home_li">-->
                        <a href="/tienda/index/index">
                            <i class="fa fa-home"></i>
                            <span>Home</span>


                        </a>

                    </li>
                    <li id="recurso_categorias" class="treeview">
                        <a href="#">
                            <i class="fa fa-reorder"></i>
                            <span>Usuarios</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo BASE_URL ?>admin/usuarios"
                             title="listar">
                             <span>listar</span></a></li>
                             <li><a href="<?php echo BASE_URL ?>admin/usuarios/create"                                    title="agregar">                                    <span>agregar</span></a></li>                        </ul>                    </li>
                             <li id="recurso_menu" class="treeview ">
                                <a href="#">
                                    <i class="fa fa-sitemap"></i>
                                    <span>Menu</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo BASE_URL ?>tienda/menu/tipoMenu"
                                     title="Agregar">
                                     <span>Tipo de Menu</span></a></li>
                                     <!--    solo para mostrar el active-->
                                     <li style="display: none"><a href="<?php echo BASE_URL ?>tienda/menu/agregar"
                                       title="Agregar">
                                       <span>#</span></a></li>
                                       <li><a href="<?php echo BASE_URL ?>tienda/menu/listar"
                                         title="Listar">
                                         <span>Listar</span></a></li>

                                     </ul>
                                 </li>

                                 <li id="recurso_productos" class="treeview ocultar">
                                    <a href="#">
                                        <i class="fa fa-book"></i>
                                        <span>Productos</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo BASE_URL ?>tienda/productos/agregar"
                                         title="Agregar">
                                         <span>Agregar</span></a></li>
                                         <li><a href="<?php echo BASE_URL ?>tienda/productos/listar"
                                             title="Listar">
                                             <span>Listar</span></a></li>

                                         </ul>
                                     </li>

                                     <li id="recurso_web-inicio" class="treeview ocultar">
                                        <a href="#">
                                            <i class="fa fa-file"></i>
                                            <span>Web Inicio</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="<?php echo BASE_URL ?>tienda/paginas"
                                             title="Web inicio">
                                             <span>Web Inicio</span></a></li>


                                         </ul>
                                     </li>

                                     <li id="recurso_paginas" class="treeview ocultar">
                                        <a href="#">
                                            <i class="fa fa-file"></i>
                                            <span>Paginas</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">

                                            <li><a href="<?php echo BASE_URL ?>tienda/paginas/agregar"
                                             title="Agregar">
                                             <span>Agregar</span></a></li>
                                             <li><a href="<?php echo BASE_URL ?>tienda/paginas/listar"
                                                 title="Listar">
                                                 <span>Listar</span></a></li>

                                             </ul>
                                         </li>

                                         <li id="recurso_post" class="treeview ocultar">
                                            <a href="#">
                                                <i class="fa fa-files-o"></i>
                                                <span>Post</span>
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li><a href="<?php echo BASE_URL ?>tienda/posts/agregar"
                                                 title="Agregar">
                                                 <span>Agregar</span></a></li>
                                                 <li><a href="<?php echo BASE_URL ?>tienda/posts/listar"
                                                     title="Listar">
                                                     <span>Listar</span></a></li>

                                                 </ul>
                                             </li>

                                             <li id="recurso_widget" class="treeview ocultar">
                                                <a href="#">
                                                    <i class="fa fa-th"></i>
                                                    <span>Widtget</span>
                                                    <i class="fa fa-angle-left pull-right"></i>
                                                </a>
                                                <ul class="treeview-menu">
                                                    <li><a href="<?php echo BASE_URL ?>tienda/widget/agregar"
                                                     title="Agregar">
                                                     <span>Agregar</span></a></li>
                                                     <li><a href="<?php echo BASE_URL ?>tienda/widget/listar"
                                                         title="Listar">
                                                         <span>Listar</span></a></li>

                                                     </ul>
                                                 </li>

                                                 <li id="recurso_pedidos" class="treeview ocultar">
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span>Pedidos</span>
                                                        <i class="fa fa-angle-left pull-right"></i>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="<?php echo BASE_URL ?>tienda/pedidos/listar"   title="Listar">
                                                            <span>Listar</span></a></li>
                                                            <li style="display: none"><a href="<?php echo BASE_URL ?>tienda/pedidos/detalle"
                                                               title="Listar">
                                                               <span></span></a></li>

                                                           </ul>
                                                       </li>


                                                       <li id="recurso_reportes" class="treeview ocultar">

                                                       </li>


                                                       <li id="recurso_atributos" class="treeview ocultar">
                                                        <a href="#">
                                                            <i class="fa fa-share-alt"></i>
                                                            <span>Atributos</span>
                                                            <i class="fa fa-angle-left pull-right"></i>
                                                        </a>
                                                        <ul class="treeview-menu">
                                                            <li><a href="<?php echo BASE_URL ?>tienda/atributo/agregar"
                                                             title="Agregar">
                                                             <span>Agregar</span></a></li>
                                                             <li><a href="<?php echo BASE_URL ?>tienda/atributo/listar"
                                                                 title="Listar">
                                                                 <span>Listar</span></a></li>

                                                             </ul>
                                                         </li>

                                                         <li id="recurso_banner" class="treeview ocultar">
                                                            <a href="#">
                                                                <i class="fa fa-photo"></i>
                                                                <span>Banner</span>
                                                                <i class="fa fa-angle-left pull-right"></i>
                                                            </a>
                                                            <ul class="treeview-menu">
                                                                <li><a href="<?php echo BASE_URL ?>tienda/banner/agregar"
                                                                 title="Agregar">
                                                                 <span>Agregar</span></a></li>
                                                                 <li><a href="<?php echo BASE_URL ?>tienda/banner/listar"
                                                                     title="Listar">
                                                                     <span>Listar</span></a></li>

                                                                 </ul>
                                                             </li>


                                                             <li id="recurso_configuraciones" class="treeview ocultar">
                                                                <a href="#">
                                                                    <i class="fa fa-gears"></i>
                                                                    <span>Configuraciones</span>
                                                                    <i class="fa fa-angle-left pull-right"></i>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    <li><a href="<?php echo BASE_URL ?>tienda/setting/agregar?update=1"
                                                                     title="Agregar">
                                                                     <span>configurar</span></a></li>
                                                                     <li><a href="<?php echo BASE_URL ?>tienda/setting/generales?update=1"
                                                                         title="generales">
                                                                         <span>generales</span></a></li>

                                                                     </ul>
                                                                 </li>


                                                                 <li id="recurso_parametros" class="treeview ocultar">
                                                                    <a href="#">
                                                                        <i class="fa fa-gear"></i>
                                                                        <span>Parametros del Sistema</span>
                                                                        <i class="fa fa-angle-left pull-right"></i>
                                                                    </a>
                                                                    <ul class="treeview-menu">
                                                                        <li><a href="<?php echo BASE_URL ?>tienda/parametro/agregar"
                                                                         title="Agregar">
                                                                         <span>Agregar Parametros</span></a></li>
                                                                         <li><a href="<?php echo BASE_URL ?>tienda/parametro/listar"
                                                                             title="Agregar">
                                                                             <span>Listar Parametros</span></a></li>

                                                                         </ul>
                                                                     </li>

                                                                     <!---->


                                                                 </ul>
                                                             </section>
                                                             <!-- /.sidebar -->
                                                         </aside>

                                                         <!-- Content Wrapper. Contains page content -->

                                                         <!--  CUERPO -->



                                                         @yield('contenido')

                                                         <!-- /.content-wrapper -->
                                                         <footer class="main-footer">
                                                            <div class="pull-right hidden-xs">
                                                                <?php echo APP_SYSTEM_NAME ?> <b>Version</b> <?php echo APP_SYSTEM_VERSION ?>
                                                            </div>

                                                            <strong>Copyright &copy; 2015-<?php echo date("Y"); ?> <a
                    href="http://"></a>.</strong>
                    Todos los derechos reservados.
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Create the tabs -->
                    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Home tab content -->
                        <div class="tab-pane" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Recent Activity</h3>
                            <ul class="control-sidebar-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                            <p>Will be 23 on April 24th</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon fa fa-user bg-yellow"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                            <p>New phone +1(800)555-1234</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                            <p>nora@example.com</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                            <p>Execution time 5 seconds</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->

                            <h3 class="control-sidebar-heading">Tasks Progress</h3>
                            <ul class="control-sidebar-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Custom Template Design
                                            <span class="label label-danger pull-right">70%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Update Resume
                                            <span class="label label-success pull-right">95%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Laravel Integration
                                            <span class="label label-warning pull-right">50%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <h4 class="control-sidebar-subheading">
                                            Back End Framework
                                            <span class="label label-primary pull-right">68%</span>
                                        </h4>

                                        <div class="progress progress-xxs">
                                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->


                        </div>
                        <!-- /.tab-pane -->


                        <!-- Stats tab content -->
                        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                        <!-- /.tab-pane -->
                        <!-- Settings tab content -->
                        <div class="tab-pane" id="control-sidebar-settings-tab">
                            <form method="post">
                                <h3 class="control-sidebar-heading">General Settings</h3>

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Report panel usage
                                        <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>
                                        Some information about this general settings option
                                    </p>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Allow mail redirect
                                        <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>
                                        Other sets of options are available
                                    </p>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Expose author name in posts
                                        <input type="checkbox" class="pull-right" checked>
                                    </label>

                                    <p>
                                        Allow the user to show his name in blog posts
                                    </p>
                                </div>
                                <!-- /.form-group -->

                                <h3 class="control-sidebar-heading">Chat Settings</h3>

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Show me as online
                                        <input type="checkbox" class="pull-right" checked>
                                    </label>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Turn off notifications
                                        <input type="checkbox" class="pull-right">
                                    </label>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Delete chat history
                                        <a href="javascript:void(0)" class="text-red pull-right"><i
                                            class="fa fa-trash-o"></i></a>
                                        </label>
                                    </div>
                                    <!-- /.form-group -->
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                    </aside>
                    <!-- /.control-sidebar -->
                    <!-- Add the sidebar's background. This div must be placed
                    immediately after the control sidebar -->
                    <div class="control-sidebar-bg"></div>
                </div>
            </div>
            <div class="loader" id="loader">
                <img class="loader_gif" width="100" height="76"
                src="/assets_admin_lte/svg-loaders/bars.svg" alt="">

            </div>
            <!-- ./wrapper -->


            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



    <!--la Carga loading-->
    <script type="text/javascript">
        $(window).load(function () {
            setTimeout(function () {
                $('#loader').fadeOut(400, "linear");
                $('#sb-site').show("slow");
            }, 300);

        });

    </script>
    <!--la Carga-->
    <link href="/assets_admin_lte/js/ui/themes/cupertino/jquery-ui.css" rel="stylesheet">
    <!-- Jquery UI CSS -->
    <script src="/assets_admin_lte/js/ui/jquery-ui.js"></script><!-- Jquery UI JS -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/assets_admin_lte/bootstrap/js/bootstrap.min.js"></script>

    <!-- Sparkline -->
    <script src="/assets_admin_lte/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script
    src="/assets_admin_lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script
    src="/assets_admin_lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/assets_admin_lte/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="/assets_admin_lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/assets_admin_lte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script
    src="/assets_admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/assets_admin_lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/assets_admin_lte/plugins/fastclick/fastclick.js"></script>
    <!-- Add the minified version of files from the /dist/ folder. -->
    <!-- jquery-confirm files -->
    <link rel="stylesheet"
    type="text/css"
    href="/assets_admin_lte/jquery-confirm/css/jquery-confirm.min.css"/>
    <script type="text/javascript"
    src="/assets_admin_lte/jquery-confirm/js/jquery-confirm.js"></script>
    <!--<script type="text/javascript"-->
    <!--src="dist/jquery-confirm.min.js"></script>-->
    <!--END jquery-confirm files-->

    <!-- DataTables -->
    <script src="/assets_admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets_admin_lte/plugins/datatables/dataTables.bootstrap.min.js"></script>


    <!-- page script -->
    <script>
function eliminarRegistro(url){
$.confirm({
    title: ' Eliminar Registro!',
    content: 'Estas Seguro de eliminar Este registro!',
     theme: 'material',
     icon: 'fa fa-trash',
    buttons: {
        confirm: function () {
            location.href = url;
        },
        cancel: function () {
            //$.alert('Canceled!');
            alerta("Cancelado!");
        },
        /*
        somethingElse: {
            text: 'Something else',
            btnClass: 'btn-primary',
            keys: ['enter', 'shift'],
            action: function(){
                $.alert('Something else?');
            }
        }
        */
    }
});
}
// function eliminarRegistro(id){
//     //location.href = 'http://zf.localhost/tienda/categorias/agregar?active=' + estado;

// alerta("msg");
// }

        function alerta(msg,title){
            if (typeof title === "undefined") {title="Alerta!";}
                if (typeof msg === "undefined") {msg="";}

                 $.alert({
                    title: title,
            //type: 'red',
            content: msg,
        });

         }



         $(function () {
            if ($('#example1').length) {
                $('#example1').DataTable({

                    "searching": false,
                    "paging": false,
                    "info": false
                });
            }

            if ($('#example2').length) {
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            }


        });
    </script>
    <div class="ocultar" id="suscripcion_popup">
        <form action="/tienda/index/suscripcion" method="post" id="newsletter-popup-validate-detail"
        onsubmit="return sendSuscripcion(this)">
        <div class="block-content">
            <img src="http://newsmartwave.net/magento/porto/skin/frontend/smartwave/porto/images/logo_black.png"
            alt=""/>
            <h2>LOS MEJORES SISTEMAS DEL PERU</h2>
            <p>Suscribete a nuestros paquetes de sistemas.</p>
            <div class="input-box">
                <input type="emai" title="Introduce un email correcto" name="email" id="email"
                class="input-text required-entry validate-email required"
                placeholder="Email Address"/>
                <button title="Go!" class="button" onclick="sendFormPadre(this,'ajax');return false;">
                    <span><span>Go!</span></span></button>
                    <div class="clearer"></div>
                </div>
                <div id="msj_error"></div>
            </div>
        </form>

        <div class="subscribe-bottom">
            <input type="checkbox" id="no_suscripcion"/>
            <label for="newsletter_popup_dont_show_again">no mostrar esta ventana denuevo</label>
        </div>
    </div>

    <!-- AdminLTE App -->
    <script src="/assets_admin_lte/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="/assets_admin_lte/dist/js/demo.js"></script>

    <script src="/assets_admin_lte/plugins/sweetalert/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/assets_admin_lte/plugins/sweetalert/css/sweetalert.css">
<script>
//  $(function () {
//     swal({
//   title: "Error!",
//   text: "Here's my error message!",
//   type: "error",
//   confirmButtonText: "Cool"
// });
//     });
</script>

</body>
</html>
