<div class="modal fade" id="mudar_senha">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{route('admin::mudar.senha')}}" method="post" role="form">
				{{csrf_field()}}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Alterar Senha</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="password" name="senha" tabindex="1" class="form-control" placeholder="Entre com sua nova senha...">
					</div>
					<div class="form-group">
						<input type="password" name="senha_confirmation" tabindex="1" class="form-control" placeholder="Confirme sua nova senha..." >
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Alterar</button>
				</div>
			</form>
		</div>
	</div>
</div>

