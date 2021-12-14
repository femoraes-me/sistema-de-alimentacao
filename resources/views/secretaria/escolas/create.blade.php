@extends('layouts.admin')

@section('content')
    <!-- Main Content-->
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Cadastrar Escola</h1>
        </div>

        <!-- Register Escola -->
        <div class="card border-light shadow-sm pb-2 px-2 mt-2">
            <div class="card-body mt-2 px-5">
                <div class="pt-3 px-5">
                    <form action="{{ route('secretaria.escolas.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-9">
                                <label for="">Nome da Escola</label>
                                <input name="nome" type="text" class="form-control" id="nome">
                                <strong class="invalid-feedback"></strong>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Quantidade de Alunos</label>
                                <input name="qtd_alunos" type="text" class="form-control text-center " id="qtd_alunos">
                                <strong class="invalid-feedback"></strong>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for=""></label>
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success px-3" id="btnCadastrar">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- -->
    </div>
@endsection
