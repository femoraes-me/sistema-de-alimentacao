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
            <div class="card border-light shadow pb-2 px-2">
                <div class="card-title">
                    <div class="mt-4 text-center">
                        <h1 class="h4 text-gray-900 pl-4">Menu de Ações</h1>
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="row mb-4">
                        <div class="col-4">
                            <a href="{{ route('secretaria.escolas.actions.consumo') }}" class="btn btn-primary p-5">Consumo Diário</a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('secretaria.escolas.actions.cardapio') }}" class="btn btn-primary p-5">Cardápio Diário</a>
                        </div>
                        <div class="col-4">
                            <a href="" class="btn btn-primary p-5">Entrada de Alimentos</a>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <a href="" class="btn btn-primary p-5">Relatório da Escola</a>
                        </div>
                        <div class="col-4">
                            <a href="{{ route('secretaria.escolas.actions.dados') }}" class="btn btn-primary p-5">Dados da Escola</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
