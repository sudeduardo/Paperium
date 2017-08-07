<div class="modal fade" id="mudar_senha">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/mudar/senha" method="post" role="form">
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

<div class="modal fade" id="mudar_foto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/mudar/foto" method="post" role="form" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Alterar Foto</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<h5 class="text-center">Foto Atual</h5>
							<div class="thumbnail">
								<img src="{{url('img/leitor/'.Auth::user()->foto)}}">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<h5 class="text-center">Nova foto</h5>
							<div class="form-group">
								<input type="file" name="foto" id="foto-leitor" tabindex="1" class="form-control">
							</div>
						</div>
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

