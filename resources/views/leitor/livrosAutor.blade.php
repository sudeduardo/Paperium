@extends('layouts.leitor')

@section('titulo')
	{{$autor->autor}} | Livros
@endsection

@section('css')
	<link href="{{url('css/custom/style.css')}}" rel="stylesheet" />
@endsection

@section('conteudo')
	<br>
	<div class="content-wrapper" id="conteudo">
		<div class="container-fluid">
			<div class="wrapper text-center">
				<a href="/autor/{{$autor->autor}}"><h3 class="text-center autor-titulo">{{$autor->autor}}</h3></a>
				<div class="form-group has-feedback">
					<form method="get" action="/autor/{{$autor->autor}}/pesquisa">
						<input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar livros nesse Autor ..." />
						<i class="glyphicon glyphicon-search form-control-feedback"></i>
					</form>
				</div>
				<div class="row">
					@if(Route::is('pesquisa.autor'))
						<h4 class="text-center">Livros digitais vindos da pesquisa '{{$pesquisa}}' no <b>Autor</b> {{$autor->autor}}</h4>
					@endif
					@forelse($livros as $livro)
						<div class="col-sm-12 col-md-3 col-lg-3">
							<div class="card panel panel-default" id="card-{{$livro->nome}}">
								<h4 class="card-title">{{$livro->nome}}</h4>
								<img class="card-img-top" src="{{url('img/livro/'.$livro->capa)}}" alt="Card image cap" height="250px" width="250px">
								<div class="card-block">
									<p><b>Autor(es):</b></p>
									@forelse($livro->autores as $autor)
										{{$autor->autor}},
									@empty Esse livro está sem autor
									@endforelse
									<p><b>Gênero:</b>{{$livro->genero->genero ? $livro->genero->genero : 'Esse livro está sem gênero'}}</p>
								</div>
								<div class="panel-footer">
									<div class="text-center">
										@if(Auth::check())
											@if(Auth::user()->livrosDigitais->contains($livro->id))
												<a href="#" class="btn btn-primary lista-remover" id="{{$livro->id}}" role="button">Remover da Lista</a>
												<?php $pagina= Auth::user()->livrosDigitais()->findOrFail($livro->id)->pivot->pag_atual ?>
												<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}#page={{$pagina}}" target="_blank" class="btn btn-danger" role="button">Ler</a>
											@elseif(!Auth::user()->livrosDigitais->contains($livro->id))
												<a href="#" class=" btn btn-primary lista-adicionar" id="{{$livro->id}}" role="button">Adicionar a lista</a>
												<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" class="btn btn-danger" role="button">Ler</a>
											@endif
										@else
											<a href="/download/{{$livro->id}}" class="btn-down btn btn-primary " role="button">Download</a>
											<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" target="_blank" class="btn btn-danger" role="button">Ler</a>
										@endif
									</div>
								</div>
							</div>
						</div>
					@empty
						<h5>Não foram encotrados livros para esse Autor</h5>
					@endforelse
					{{$livros->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection


