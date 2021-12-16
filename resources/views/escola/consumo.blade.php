@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">

        <!-- page heading -->
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Consumo Diário</h1>
        </div>

        <!-- Mensagem de retorno -->
        @include('layouts._partials.return_message')

        @if (session()->has('fails'))
            <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                A quantidade do(s) alimento(s)
                @foreach (session()->get('fails') as $fail)
                    @foreach ($fail as $key => $value)
                        {{ $value->nome }},
                    @endforeach
                @endforeach
                no estoque é menor que a quantidade consumida
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('escola.consumo.store') }}" method="POST">
            @csrf
            <div class="form-group mx-0 mt-0 mb-2">
                <label for="data_consumo">Dia:</label>
                <input type="date" name="data_consumo" id="data_consumo"
                    class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                <div class="invalid-feedback">{{ $errors->first('data_consumo') }}</div>
            </div>

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
                            @foreach ($estoque as $estoque)
                                <tr>
                                    <!--campo id  -->
                                    <input type="hidden" name="alimentos[{{ $loop->index }}][alimento_id]"
                                        value="{{ $estoque->id }}">

                                    @foreach ($alimentos as $alimento)
                                        @if ($estoque->alimento_id == $alimento->id)
                                            <td class="align-middle pl-4">
                                                {{ $alimento->nome }}
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $alimento->unidade }}
                                            </td>
                                        @endif
                                    @endforeach
                                    <td
                                        class="align-middle {{ $errors->has("alimentos.{$loop->index}.quantidade_consumida") ? 'pb-1' : '' }}">
                                        <!-- campo quantidade consumida -->
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <input type="text"
                                                    class="form-control mx-auto {{ $errors->has("alimentos.{$loop->index}.quantidade_consumida") ? 'is-invalid' : '' }} text-center"
                                                    name="alimentos[{{ $loop->index }}][quantidade_consumida]"
                                                    value="{{ old("alimentos.{$loop->index}.quantidade_consumida") }}">
                                                <span class="invalid-feedback">
                                                    <strong
                                                        class="align-middle">{{ $errors->first("alimentos.{$loop->index}.quantidade_consumida") }}</strong>
                                                </span>
                                            </div>
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
