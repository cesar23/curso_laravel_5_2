    <!DOCTYPE HTML>
    <html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    	<title>@yield('title','Default') - Administrador</title>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

    </head>
    <body>
    	@include('admin.template.partial.navar')
    	<section>
    		@yield('contenido')
    	</section>
    	@include('admin.template.partial.footer')
    </body>
    <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </html>
    