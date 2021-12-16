@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">{{ $escola->nome }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div id="content">
        <!-- Main Content-->
        <div class="container-fluid">
            @csrf
            <div class="card border-light shadow-sm pb-4 px-3 pt-2">
                <div class="form-group p-4 col-12 mb-0">
                    <label for="" class="">Quantidade de alunos</label>
                    <input readonly value="{{ $escola->qtd_alunos }}" type="text" class="form-control">
                </div>
                <div class="form-group p-4 col-12">
                    <label for="" class="">Telefone</label>
                    <input readonly value="{{ $escola->telefone }}" type="text" class="form-control">
                </div>
                <div class="form-group mt-4 d-flex justify-content-center">
                    <button onclick="history.back()" class="btn btn-primary letra px-4 w-25">Voltar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
