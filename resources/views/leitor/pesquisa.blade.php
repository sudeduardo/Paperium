@extends('layouts.leitor')

@section('titulo')
	{{$pesquisa}} | Paperium
@endsection

@section('css')
	<link href="{{url('css/custom/style.css')}}" rel="stylesheet" />
@endsection

@section('conteudo')
	<br>
	<div class="content-wrapper" id="conteudo">
		<div class="container-fluid">
			<div class="wrapper">
				<ul class="nav nav-pills nav-justified">
					<li class="{{(($parametro == 'livros') ? 'active' : '')}}"><a data-toggle="pill" href="#livrodigital">Livros Digitais</a></li>
					<li class="{{(($parametro == 'autores') ? 'active' : '')}}"><a data-toggle="pill" href="#autor">Autores</a></li>
				</ul>
				<div class="tab-content text-center">
					<div id="livrodigital" class="tab-pane fade in {{(($parametro == 'livros') ? 'active' : '')}}">
						<h4 class="text-center">Resultados da pesquisa '{{$pesquisa}}' em Livros Digitais</h4>
						<div class="row">
						@forelse($livros as $livro)
							<div class="col-sm-12 col-md-3 col-lg-3">
								<div class="card panel panel-default">
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
							<h5>Não foram encotrados resultados para essa pesquisa</h5>
						@endforelse
						{{$livros->links()}}
						</div>
					</div>
					<div id="autor" class="tab-pane fade {{(($parametro == 'autores') ? 'active' : '')}}">
						<h4 class="text-center">Resultados da pesquisa '{{$pesquisa}}' em Autores</h4>
						<div class="row">
						@forelse($autores->chunk(10) as $autoresChunk)
							<div class="list-group col-md-4 col-sm-12">
							@foreach($autoresChunk as $autor)
									<a href="/autor/{{$autor->autor}}" class="list-group-item">{{$autor->autor}}</a>
							@endforeach
							</div>
						@empty
							<h5>Não foram encotrados resultados para essa pesquisa</h5>
						@endforelse
						{{$autores->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
