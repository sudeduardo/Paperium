@extends('layouts.admin')

@section('titulo')

    @if(Route::is('admin::mostra.genero'))
        Genero | {{$genero->genero}}
    @elseif(Route::is('admin::mostra.deleta.genero'))
        Genero | Deletar {{$genero->genero}}
    @endif

@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-md-6" style="margin-top:10%">
                    @if(Route::is('admin::mostra.deleta.genero'))
                        <p>Tem certeza que deseja deletar o gênero?</p>
                        <form action="{{route('admin::deleta.genero',$genero->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Deletar</button>
                            <a href="{{route('admin::livros.index',['rota' => 'genero'])}}" class="btn btn-success">Cancelar</a>
                        </form>
                    @endif
                    <b>Nome do gênero:</b>{{$genero->genero}}<br>
                    <div class="thumbnail">
                        <img src="{{url('/img/genero/'.$genero->img)}}">
                    </div>
                    <b>Criado em:</b>{{$genero->criado_em}}<br>
                    <b>Atualizado pela última vez em:</b>{{$genero->atualizado_em}}<br>
                    </div>
                    <div class="col-xs-6 col-md-6" style="margin-top:10%">
                        <table id="tabela-livros-genero" class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th><b>Livros cadastrados com esse autor</b></th>
                                </tr>
                            </thead>
                            <tbody>
                    @forelse($genero->livrosDigitais as $livro)
                        <tr>
                            <td><a href="{{route('admin::mostra.livro',$livro->id)}}"></a>{{$livro->nome}}<br></td>
                        </tr>
                    @empty
                        <tr>
                            <td>Sem livros</td>
                        </tr>
                    @endforelse
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

@endsection

