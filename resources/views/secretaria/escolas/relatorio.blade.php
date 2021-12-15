@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">RELATÓRIOS: {{ $escola->nome }}</h1>
        </div>
    </div>
@endsection

@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container-fluid">
            <div class="d-flex justify-content-between p-4">
                <div class="row">
                <div class="mr-3">
                    <label for="data_consumo">Início:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mr-3">
                    <label for="data_consumo">Final:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="mr-3">
                    <button class="btn btn-secondary px-4">Gerar Relatorios</button>
                </div>
                </div>

                <div class="">
                    <button onclick="history.back()" class="btn letra btn-danger font-weight-bolder ml-2 px-4"
                        id="escolaCadastro">Voltar</button>
                </div>
            </div>
        </div>

        <hr>

        <div class="container mt-2">
            <div class="container-fluid mt-4">
                <div class="text-dark">
                <h4>Entrada Total de Alimentos</h4>
                    <div class="card p-4 mt-4 border border-secondary">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="pl-4">Alimentos</th>
                                    <th class="text-center col-3">Un. de Medida</th>
                                    <th class="text-center col-3">Quantidade de Entrada</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                    <tr>
                                        <!--campo id escola-->
                                        <td class="align-middle pl-4">
                                            <span class="text-uppercase"> TESTE </span>
                                        </td>
                                        <!-- campo unidade -->
                                        <td class="align-middle">
                                            <div class="align-middle text-center">
                                                KG
                                            </div>
                                        </td>
                                        <!-- campo quantidade atual-->
                                        <td class="align-middle text-center">
                                            10
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--campo id escola-->
                                        <td class="align-middle pl-4">
                                            <span class="text-uppercase"> TESTE </span>
                                        </td>
                                        <!-- campo unidade -->
                                        <td class="align-middle">
                                            <div class="align-middle text-center">
                                                KG
                                            </div>
                                        </td>
                                        <!-- campo quantidade atual-->
                                        <td class="align-middle text-center">
                                            10
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
