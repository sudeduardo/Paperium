<div class="modal fade" id="esqueceu_senha">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/admin/password/email" method="post" role="form">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Esqueceu sua Senha?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Entre com seu email.." value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Recuperar </button>
                </div>
            </form>
        </div>
    </div>
</div>
