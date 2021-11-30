@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Consumo Diário</h1>
        </div>
    </div>
@endsection
@section('content')

    <div id="content">
        <!-- Main Content-->

        <div class="container-fluid mt-4">
            @if (session()->has('message'))
                <div class="alert alert-success card text-center m-4">{{ session('message') }}</div>
            @endif
            <form action="{{ route('escola.consumo.store') }}" method="POST">
                @csrf

                <div class="form-group col-md-6">
                    <label for="data_consumo">Dia:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <div class="invalid-feedback">{{ $errors->first('data_consumo') }}</div>
                </div>
                <div class="card border-light shadow pb-2 px-2">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="col-6">Alimentos</th>
                                    <th class="text-center">Unidade de Medida</th>
                                    <th class="text-center">Quantidade Consumida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-6">
                                        <div class="form-group">
                                            <input 
                                                type="text" 
                                                readonly 
                                                class="form-control-plaintext" 
                                                placeholder="Arroz"
                                                value="1" 
                                                name="alimento_id"
                                            >
                                        </div>
                                    </td>
                                    <td class="col-3">
                                        <div class="form-group text-center">
                                        </div>
                                    </td>
                                    <td class="text-center col-3">
                                        <div class="col-md-5 mx-auto">
                                            <input type="text" class="form-control" name="quantidade">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-success px-5">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
