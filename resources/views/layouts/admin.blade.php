<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>

    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('titulo') </title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="{{url('css/builds/admin.css')}}" rel="stylesheet"/>
	<script src="{{url('js/libraries/modernizr.js')}}" type="text/javascript"></script>
    @yield('css') <!-- Aqui vem os css custom especificos de cada pagina-->

</head>
<body>

    @include('admin.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->
    </main>
    @include('admin.partes.adminModals')

   	<script src="{{url('js/builds/admin.js')}}" type="text/javascript"></script>
    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('admin.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>
