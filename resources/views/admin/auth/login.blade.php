<!doctype html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administração | Paperium</title>

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
                            <h4 class="active titulo text-center">Administração | Entrar</h4>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="/admin/login" method="post" role="form" style="display: block;">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="email" name="email"  tabindex="1" class="form-control" placeholder="E-mail" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" tabindex="2" class="form-control" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="#" tabindex="5" class="forgot-password" data-toggle="modal" data-target="#esqueceu_senha">Esqueceu a  Senha?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="lembrar_me" id="remember">
                                    <label for="remember"> Lembra-Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Entrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.auth.passwords.email')
</div>

    <script src="{{url('js/builds/login.js')}}" type="text/javascript"></script>
    @include('admin.partes.mensagens')

</body>
</html>
