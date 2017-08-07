@extends('layouts.leitor')

@section('titulo')
    Perfil de {{Auth::user()->nome}}
@endsection

@section('css')
    <link href="{{url('css/custom/style.css')}}" rel="stylesheet" />
@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        @if(Auth::user()->verificaSocialLogins())
                            <img src="{{Auth::user()->foto}}" width="100px" height="100px">
                        @else
                            <img src="{{url('/img/leitor/',Auth::user()->foto)}}" width="100px" height="100px">
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <h2 class="text-center">Minha lista de leitura</h2>
                    </div>
                </div>
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
                                        <a href="#" class="btn btn-primary lista-remover" id="{{$livro->id}}" role="button">Remover da Lista</a>
                                        <?php $pagina= Auth::user()->livrosDigitais()->findOrFail($livro->id)->pivot->pag_atual ?>
                                        <a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}#page={{$pagina}}" target="_blank" class="btn btn-danger" role="button">Ler</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$livros->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

