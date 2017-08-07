@extends('layouts.admin')

@section('titulo')

    @if(Route::is('admin::mostra.livro'))
        Livro Digital | {{$livro->nome}}
    @elseif(Route::is('admin::mostra.deleta.livro'))
        Livro Digital | Deletar {{$livro->nome}}
    @endif

@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @if(Route::is('admin::mostra.deleta.livro'))
                        <p class="text-center">Tem certeza que deseja deletar o livro?</p>
                        <form method="post" action="{{route('admin::deleta.livro',$livro->id)}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                                <a href="{{route('admin::livros.index',['rota' => 'livro'])}}" class="btn btn-primary">Cancelar</a>
                            </div>
                        </form>
                    @endif
                    <div class="col-md-4 col-sm-12">
                        <b>Nome:</b>{{$livro->nome}}<br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <b>Gênero:</b>{{$livro->genero ? $livro->genero->genero : 'Livro atualmente sem gênero'}}<br>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <b>Autor(es):</b>
                        @forelse($livro->autores as $autor)
                            {{$autor->autor}}<br>
                        @empty <p>Sem autores</p>
                        @endforelse
                    </div>
                    <div class="col-sm-12 col-md-3 col-md-offset-4">
                        <a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}"><img src="{{url('/img/livro/'.$livro->capa)}}"></a>
                    </div>
                    <div class="col-md-6">
                        <b>Livro cadastrado em:</b>{{$livro->criado_em}}<br>
                    </div>
                    <div class="col-md-6">
                        <b>Livro atualizado em:</b>{{$livro->atualizado_em}}<br>
                    </div>
                 </div>
            </div>
        </div>
    </div>

@endsection

