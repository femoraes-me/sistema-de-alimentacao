@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Nome da escola vem aqui!</h1>
        </div>
    </div>
@endsection

@section('content')
    <div id="content">
        <!-- Main Content-->
        <div class="container-fluid mt-4">
            @csrf
            <div class="card border-light shadow pb-4 px-3">
                <div class="form-group p-4 col-10">
                    <label for="" class="">Quantidade de alunos</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mt-4 d-flex justify-content-center">
                    <input type="submit" value="Voltar" class="btn btn-color letra px-4 w-25">
                </div>
            </div>
        </div>
    </div>

@endsection
