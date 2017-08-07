<!doctype html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paperium | Redefinição de senha</title>

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
                        <div class="col-xs-12">
                            <h4 class="active titulo text-center" >Redefinição de senha</h4>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                                     </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" placeholder="Insira sua nova senha...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua nova senha...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Redefinir Senha</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<script src="{{url('js/builds/login.js')}}" type="text/javascript"></script>
	@include('leitor.partes.mensagens')

</body>
</html>