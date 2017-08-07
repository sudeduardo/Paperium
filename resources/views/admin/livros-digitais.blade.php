@extends('layouts.admin')

@section('titulo')
    Administração | Livros digitais
@endsection

@section('css')
    {{--<link href="{{url('css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>--}}
@endsection

@section('conteudo')

	<div class="content-wrapper">
       <div id="page-content-wrapper">
	       <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <ul class="nav nav-tabs nav-justified" role="tablist" style="margin-top:1%">
                                <li role="presentation" class="{{Request::is('admin/livros/digitais/autor') ? 'active' : ''}}">
	                                <a href="#autor" aria-controls="autor" role="tab" data-toggle="tab">Autor</a>
                                </li>
                                <li role="presentation" class="{{Request::is('admin/livros/digitais/genero') ? 'active' : ''}}">
	                                <a href="#genero" aria-controls="genero" role="tab" data-toggle="tab">Gênero</a>
                                </li>
                                <li role="presentation" class="{{Request::is('admin/livros/digitais/livro') ? 'active' : ''}}">
	                                <a href="#livro" aria-controls="livro" role="tab" data-toggle="tab">Livro</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane {{Request::is('admin/livros/digitais/autor') ? 'active' : ''}}" id="autor">
                                    <form method="post" action="{{route('admin::cadastra.autor')}}" class="form-inline" style="margin-top:2%">
                                        <div class="form-group">
                                            {!! csrf_field() !!}
                                            <input type="text" name="autor" placeholder="Insira o nome do autor..." value="{{old('autor')}}" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form>
                                    <table id="tabela-autores" class="table table-bordered" style="margin-top:1%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Mostrar</th>
                                            <th>Alterar</th>
                                            <th>Excluir</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($autores as $autor)
                                        <tr>
                                            <th scope="row">{{$autor->id}}</th>
                                            <td>{{$autor->autor}}</td>
                                            <td>
                                                <a href="{{route('admin::mostra.autor',$autor->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin::mostra.edita.autor',$autor->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin::mostra.deleta.autor',$autor->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane {{Request::is('admin/livros/digitais/genero') ? 'active' : ''}}" id="genero">
                                    </br>
                                    <a href="{{route('admin::cadastra.genero')}}" class="btn btn-primary" role="button">Cadastrar novo</a>
                                    <table id="tabela-generos" class="table table-bordered" style="margin-top:1%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Mostrar</th>
                                            <th>Alterar</th>
                                            <th>Excluir</th> </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($generos as $genero)
                                            <tr>
                                                <th scope="row">{{$genero->id}}</th>
                                                <td>{{$genero->genero}}</td>
                                                <td>
                                                    <a href="{{route('admin::mostra.genero',$genero->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin::mostra.edita.genero',$genero->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin::mostra.deleta.genero',$genero->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane {{Request::is('admin/livros/digitais/livro') ? 'active' : ''}}" id="livro">
                                    </br>
                                    <a href="{{route('admin::cadastra.livro')}}" class="btn btn-primary" role="button">Cadastrar novo</a>
                                    <table id="tabela-livros" class="table table-bordered" style="margin-top:1%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Mostrar</th>
                                            <th>Alterar</th>
                                            <th>Excluir</th> </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($livros as $livro)
                                            <tr>
                                                <th scope="row">{{$livro->id}}</th>
                                                <td>{{$livro->nome}}</td>
                                                <td>
                                                    <a href="{{route('admin::mostra.livro',$livro->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin::mostra.edita.livro',$livro->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin::mostra.deleta.livro',$livro->id)}}" role="button" class="btn btn-default" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
           </div>
       </div>
	</div>
@endsection

@section('js')
	{{--<script src="{{url('js/URI.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{url('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{url('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{url('js/custom/admin-livrosDigitais.js')}}" type="text/javascript"></script>--}}
@endsection

