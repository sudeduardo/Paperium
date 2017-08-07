<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>

	<meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Projeto Paperium é o site que visa dar uma identidade digital á biblioteca Municipal de Mogi Mirim">
	<meta name="keywords" content="paperium,biblioteca,municipal,mogi,mirim">

    <title> @yield('titulo') </title>

	<link href="{{url('css/builds/leitor.css')}}" rel="stylesheet" />
	<script src="{{url('js/libraries/modernizr.js')}}" type="text/javascript"></script>

	@yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('leitor.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->
    </main>

    @if(Auth::check() && !Auth::user()->verificaSocialLogins()) <!-- caso n seja um usuario social,ele pode acessar seus modais-->
		@include('leitor.partes.leitorModals')
	@endif

	<script src="{{url('js/builds/leitor.js')}}" type="text/javascript"></script>
    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('leitor.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>

