<!doctype html>
<html lang="pt-br" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Paperium | Entre ou cadastra-se</title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="{{url('css/builds/login.css')}}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 25px;">
			<div class="col-md-6 col-md-offset-3" >
				<div class="panel panel-login" id="login">
					<div class="panel-heading">
						<a href="/"> <img class="img-responsive" style="max-height: 600px;" src="{{url('img/paperium.png')}}" /></a>
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="{{Request::is('login') ? 'active' : ''}}" id="login-form-link">Entrar</a>
							</div>
							<div class="col-xs-6">
								<a href="#" class="{{Request::is('cadastro') ? 'active' : ''}}" id="register-form-link">Cadastrar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								@include('leitor.auth.login') <!-- incluo o formulario de login-->

								@include('leitor.auth.cadastro') <!-- incluo o formulario de cadastro-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('leitor.auth.passwords.email')
	</div>

	<script src="{{url('js/builds/login.js')}}" type="text/javascript"></script>
	@include('leitor.partes.mensagens')

</body>
</html>

