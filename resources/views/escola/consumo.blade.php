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
                                @foreach ($alimentos as $alimento)
                                    <tr>
                                        <input type="hidden" value="{{ $alimento->id }}"
                                            name="{{ $alimento->nome }}[alimentos_id]">
                                        <td class="col-6">
                                            {{ $alimento->nome }}
                                        </td>
                                        <td class="col-3">
                                            <div class="form-group text-center">
                                                <div class="col-4 mx-auto" name="medida">
                                                    {{ $alimento->unidade }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center col-3">
                                            <div class="">
                                                <input type="text"
                                                    class="form-control col-md-5 mx-auto {{ $errors->has('quantidade_consumida') ? 'is-invalid' : '' }} text-center"
                                                    name="{{ $alimento->nome }}[quantidade_consumida]"
                                                    value="{{ old('quantidade_consumida') }}">
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('quantidade_consumida') }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
