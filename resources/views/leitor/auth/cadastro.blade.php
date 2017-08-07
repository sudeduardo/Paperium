<form id="register-form" action="/cadastro" method="post" role="form" style="display: none;">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" name="nome" id="username" tabindex="1" class="form-control" placeholder="Nome" value="{{old('nome')}}">
    </div>
    <div class="form-group">
        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="{{old('email')}}">
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha">
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <input type="password" name="senha_confirmation" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Senha">
            </div>
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <button type="submit"  tabindex="4" class="form-control btn btn-register">Cadastrar</button>
            </div>
        </div>
    </div>
</form>
