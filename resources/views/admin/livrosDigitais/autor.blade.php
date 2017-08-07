@extends('layouts.admin')

@section('titulo')
    Autor | {{$autor->autor}}
@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
	                <div class="col-xs-6 col-md-6" style="margin-top:10%">
                    @if(Route::is('admin::mostra.autor'))
                        <b>Nome do Autor:</b>{{$autor->autor}}<br>
                    @elseif(Route::is('admin::mostra.edita.autor'))
						<form action="{{route('admin::atualiza.autor',$autor->id)}}" method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
							<div class="form-group">
                                <input type="text" name="autor" value="{{$autor->autor}}" class="form-control">
							</div>
							<div class="form-group text-center">
								<button type="submit" class="btn btn-success">Atualizar</button>
								<a href="{{route('admin::livros.index',['rota' => 'autor'])}}" class="btn btn-primary">Cancelar</a>
							</div>
                        </form>
                    @elseif(Route::is('admin::mostra.deleta.autor'))
                        <p>Tem certeza que deseja deletar o autor?</p>
                        <form action="{{route('admin::deleta.autor',$autor->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
	                        <div class="form-group text-center">
		                        <button type="submit" class="btn btn-danger">Deletar</button>
		                        <a href="{{route('admin::livros.index',['rota' => 'autor'])}}" class="btn btn-success">Cancelar</a>
	                        </div>
                        </form>
			            <b>Nome do autor:</b>{{$autor->autor}}<br>
                    @endif
		            <b>Criado em:</b>{{$autor->criado_em}}<br>
                    <b>Atualizado pela última vez em:</b>{{$autor->atualizado_em}}
	                </div>
	                <div class="col-xs-6 col-md-6" style="margin-top:3%">
		                <table id="tabela-livros-autor" class="table table-bordered">
			                   <thead>
			                        <tr>
			                            <th><b>Livros cadastrados com o autor</b></th>
			                        </tr>
			                   </thead>
			                   <tbody>
                    @forelse($autor->livrosDigitais as $livro)
                        <tr>
	                       <td><a href="{{route('admin::mostra.livro',$livro->id)}}">{{$livro->nome}}</a></td>
                        </tr>
                    @empty
                        <tr><td>Sem livros</td></tr>
                    @endforelse
			                  </tbody>
		                </table>
		            </div>
		            </div>
                </div>
           </div>
        </div>
    </div>
@endsection


