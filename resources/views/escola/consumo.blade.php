@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">

        <!-- page heading -->
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Consumo Diário</h1>
        </div>

        <!-- Mensagem de retorno -->
        @include('layouts._partials.return_message')

        <form action="{{ route('escola.consumo.store') }}" method="POST">
            @csrf
            <div class="form-group mx-0 mt-0 mb-2">
                <label for="data_consumo">Dia:</label>
                <input type="date" name="data_consumo" id="data_consumo"
                    class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('data_consumo') }}</div>
            </div>

            <!-- id  da escola -->
            <input type="hidden" name="escolas_id" value="{{Auth::user()->escolas_id}}">
            <!-- tabela de estoque -->
            <div class="card border-light shadow-sm py-1">
                <div class="card-body px-4">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="pl-4">Alimentos</th>
                                <th class="text-center col-3">Unidade de Medida</th>
                                <th class="text-center  col-3">Quantidade Consumida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alimentos as $alimento)
                                <tr>
                                    <!--campo id  -->
                                    <input type="hidden" name="alimentos[{{ $alimento->nome }}][alimentos_id]"
                                        value="{{ $alimento->id }}">
                                    <td class="align-middle pl-4">
                                        {{ $alimento->nome }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $alimento->unidade }}
                                    </td>
                                    <td class="align-middle">
                                        <!-- campo quantidade consumida -->
                                        <input type="text"
                                            class="form-control col-md-5 mx-auto {{ $errors->has("alimentos.{$alimento->nome}.quantidade_consumida") ? 'is-invalid' : '' }} text-center"
                                            name="alimentos[{{ $alimento->nome }}][quantidade_consumida]"
                                            value="{{ old("alimentos.{$alimento->nome}.quantidade_consumida") }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first("alimentos.{$alimento->nome}.quantidade_consumida") }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- botão cadastrar -->
                <div class="form-group mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success px-5"><strong>Cadastrar</strong></button>
                </div>
            </div>
        </form>

    </div>
@endsection
