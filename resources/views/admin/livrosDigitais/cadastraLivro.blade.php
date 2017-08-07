@extends('layouts.admin')

@section('titulo')
    Livro Digital | Cadastrar
@endsection

@section('css')
    <link href="{{url('css/libraries/select2.min.css')}}" rel="stylesheet">
    <link href="{{url('css/libraries/select2-bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('conteudo')
    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('admin::cadastra.livro')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="input-group " style="margin-top:5%">
                        <span class="input-group-addon" id="basic-addon1">Nome:</span>
                        <input type="text" name="nome" placeholder="Insira o nome do livro" value="{{old('nome')}}" class="form-control" aria-describedby="basic-addon1">
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-2 col-sm-12">
                            <div class="form-group livro-arquivo" style="margin-top:2%;">
                                <input name="capa" id="capa-livro" type="file" class="file col-md-4-offset-2" data-preview-file-type="text" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-lg-offset-2 col-sm-12">
                            <div class="form-group livro-arquivo" style="margin-top:2%;">
                                <input name="arquivo" id="pdf-livro" type="file" class="file col-md-4-offset-2" data-preview-file-type="text" >
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-lg-4 col-md-6 col-md-offset-2 col-sm-12" style="margin-top:2%;">
                            <select name="genero" id="select-genero">
                                    <option value=""></option>
                                @foreach($generos as $genero)
                                    <option value="{{$genero->id}}">{{$genero->genero}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-md-offset-2 col-sm-12" style="margin-top:2%;">
                            <select name="autor[]" multiple id="select-autor">
                                @foreach($autores as $autor)
                                    <option value="{{$autor->id}}">{{$autor->autor}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success text-center" style="margin-top:5%">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{url('js/libraries/select2.min.js')}}" type="text/javascript"></script>
@endsection