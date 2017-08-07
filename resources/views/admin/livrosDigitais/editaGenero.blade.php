@extends('layouts.admin')

@section('titulo')
   Gênero | Editar {{$genero->genero}}
@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('admin::atualiza.genero',$genero->id)}}" method="post" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="input-group " style="margin-top:5%">
                            <span class="input-group-addon" id="basic-addon1">Gênero:</span>
                            <input type="text"name="genero" placeholder="Insira o nome do gênero" value="{{$genero->genero}}" class="form-control" aria-describedby="basic-addon1">
                        </div><br>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="thumbnail">
                                    <img src="{{url('img/genero/'.$genero->img)}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6  col-sm-12">
                                    <div class="form-group" style="margin-top:2%;">
                                        <input id="img-genero" type="file" name='img' class="file col-md-4-offset-4" data-preview-file-type="text" ><br>
                                    </div>
                            </div>
                        <div class="col-lg-4 col-lg-offset-4 col-sm-12">
                            <button type="submit" class="btn btn-success">Atualizar</button>
                            <a href="{{route('admin::livros.index',['rota' => 'genero'])}}" class="btn btn-danger">Cancelar</a>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

@endsection

