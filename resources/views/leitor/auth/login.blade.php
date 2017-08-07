<form id="login-form" action="/login" method="post" role="form" style="display: block;">
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
        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
        <label for="remember"> Lembra-Me</label>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Entrar">
                <div class="form-group">
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <a href="login/google" class="form-control" id="google_mais" ><span class="fa fa-google-plus"></span> Google+</a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                            <a href="login/facebook" class="form-control" id="facebook" ><span class="fa fa-facebook-official"></span> Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
