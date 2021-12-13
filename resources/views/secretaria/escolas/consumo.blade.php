@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Consumo Diário: Nome da Escola</h1>
        </div>
    </div>
@endsection
@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="">
                    <label for="data_consumo">Dia:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <button type="submit" class="btn letra btn-primary "><i class="fa fa-search"></i></button>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="">
                    <button onclick="history.back()" class="btn letra btn-primary font-weight-bolder ml-2"
                        id="escolaCadastro">Voltar</button>
                </div>
            </div>
        </div>
        <div class="form-group col-12">
            <div class="card border-light shadow pb-2 px-2">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="col-6">Alimentos</th>
                                <th class="text-center col-3">Unidade de Medida</th>
                                <th class="text-center  col-3">Quantidade Consumida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Arroz
                                </td>
                                <td>
                                    <div class="form-group text-center">
                                        <div class="col-4 mx-auto" name="medida">
                                            kg
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="">
                                        <!-- campo quantidade consumida -->
                                        23
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
