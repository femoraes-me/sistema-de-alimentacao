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
            @include('layouts._partials.return_message')

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
                                        <td>
                                            {{ $alimento->nome }}
                                        </td>
                                        <td>
                                            <div class="form-group text-center">
                                                <div class="col-4 mx-auto" name="medida">
                                                    {{ $alimento->unidade }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="">
                                                <!-- campo quantidade consumida -->
                                                <input type="text"
                                                    class="form-control col-md-5 mx-auto {{ $errors->has("alimentos.{$alimento->nome}.quantidade_consumida") ? 'is-invalid' : '' }} text-center"
                                                    name="alimentos[{{ $alimento->nome }}][quantidade_consumida]"
                                                    value="{{old("alimentos.{$alimento->nome}.quantidade_consumida")}}">
                                                <div class="invalid-feedback">
                                                    {{ $errors->first("alimentos.{$alimento->nome}.quantidade_consumida") }}
                                                </div>
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
