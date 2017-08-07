@extends('layouts.leitor')

@section('titulo')
	Paperium | Inicio
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
					<li id="tab-livros" class="{{($parametro == 'livros') ? 'active' : ''}}"><a data-toggle="pill" href="#livros">Livros Digitais</a></li>
					<li id="tab-generos" class="{{($parametro == 'generos') ? 'active' : ''}}"><a data-toggle="pill" href="#generos">Selecione o gênero</a></li>
				</ul>
				<div class="tab-content text-center">
					<div id="livros" class="tab-pane in {{($parametro == 'livros') ? 'active' : ''}}">
						<div class="row">
							@foreach($livros as $livro)
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
														<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" target="_blank" class="btn btn-danger" role="button">Ler</a>
													@endif
												@else
													<a href="/download/{{$livro->id}}" class="btn-down btn btn-primary " role="button">Download</a>
													<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" target="_blank" class="btn btn-danger" role="button">Ler</a>
												@endif
											</div>
										</div>
									</div>
								</div>
							@endforeach
							{{$livros->links()}}
						</div>
					</div>
					<div id="generos" class="tab-pane {{($parametro == 'generos') ? 'active' : ''}}">
						<div class="row">
							@foreach($generos as $genero)
							<div class="col-xs-6 col-md-3">
									<div class="thumbnail">
										<a href="/genero/{{$genero->genero}}"><img src="{{url('img/genero/'.$genero->img)}}"></a>
									</div>
							</div>
							@endforeach
							{{$generos->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

