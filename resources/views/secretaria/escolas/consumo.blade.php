@extends('layouts.admin')
@section('content')


    <!-- Main Content-->
    <div class="container-fluid mt-4">

        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">CONSUMO DIÁRIO: {{ $escola->nome }}</h1>
        </div>

        <div class="d-flex justify-content-between pt-4 pb-2">
            <div class="">
                <label for="data_consumo">Dia:</label>
                <input type="date" name="data_consumo" id="data_consumo" value="{{ $data }}"
                    class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                <button class="btn letra btn-primary px-4" onclick="location.search = `?data=${$('#data_consumo').val()}`;">
                    <i class="fa fa-search fa-fw"></i>
                </button>
                <div class="invalid-feedback"></div>
            </div>
            <div class="">
                <a href="{{ route('secretaria.escolas.actions', $escola->id) }}"
                    class="btn letra btn-primary font-weight-bolder px-4" id="escolaCadastro">Voltar</a>
            </div>
        </div>


        <div class="card border-light shadow-sm pb-2 px-2">
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
                        @foreach ($alimentos as $alimento)
                            <tr>
                                <td class="col-6">{{ $alimento->nome }}</td>
                                <td class="text-center col-3">{{ $alimento->unidade }}</td>
                                <td class="text-center  col-3">{{ $alimento->quantidade_consumida }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
