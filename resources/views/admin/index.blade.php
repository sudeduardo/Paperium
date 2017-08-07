@extends('layouts.admin')

@section('titulo','Administração do site')

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h4>Olá, {{Auth::guard('admin')->user()->nome}}</h4>
                </div>
            </div>
        </div>
    </div>

@endsection

