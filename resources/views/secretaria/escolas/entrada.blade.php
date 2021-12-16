@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">

        <!-- page heading -->
        <div class="text-left">
            <h1 class="h2 text-gray-900 ml-0">Entrada de Alimentos:</h1>
            <h1 class="h3 text-gray-900 mb-4">{{ $escola->nome }}</h1>
        </div>
       
        <!-- Data Tables e Form -->
        <form action="{{ route('secretaria.escolas.actions.entrada.store') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between mx-0 mt-0 mb-2">
                <!-- input de data -->
                <div class="form-group col-md-6 pl-0 my-0">
                    <label for="data">Dia:</label>
                    <input type="date" name="data" id="data"
                        class="text-secondary border rounded p-1 {{ $errors->has('data') ? 'is-invalid' : '' }}">
                    <div class="invalid-feedback"><strong>{{ $errors->first('data') }}</strong></div>
                </div>
                <!-- -->
                <!-- botao voltar -->
                <div class="col-md-6 d-flex justify-content-end pr-0">
                    <div class="">
                        <a class="btn btn-primary px-4"
                            href="{{ route('secretaria.escolas.actions', $escola->id) }}">Voltar</a>
                    </div>
                </div>
                <!-- -->
            </div>

            <!-- Tabela de estoque -->
            <div class="card border-light shadow-sm py-1">
                <div class="card-body px-4">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="pl-4">Alimentos</th>
                                <th class="text-center col-3">Unidade de Medida</th>
                                <th class="text-center col-3">Quantidade Atual</th>
                                <th class="text-center col-3">Entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--campo id  escola-->
                            <input type="hidden" name="escola_id" value="{{ $escola->id }}">
                            @foreach ($alimentos as $alimento)
                                <tr>
                                    <input type="hidden" name="alimento[{{ $loop->index }}][id]"
                                        value="{{ $alimento->id }}">
                                    <td class="align-middle pl-4">
                                        <span class="text-uppercase">{{ $alimento->nome }}</span>
                                    </td>
                                    <!-- campo unidade -->
                                    <td class="align-middle">
                                        <div class="align-middle text-center">
                                            {{ $alimento->unidade }}
                                        </div>
                                    </td>
                                    <!-- campo quantidade atual-->
                                    <td class="align-middle text-center ">
                                        @foreach ($estoque as $estoqui)
                                            @if ($estoqui->alimento_id == $alimento->id)
                                                {{ $estoqui->quantidade }}
                                            @else
                                                
                                            @endif
                                        @endforeach
                                    </td>
                                    <!-- campo entrada de alimento -->
                                    <td class="align-middle text-center {{ $errors->has("alimento.{$loop->index}.quantidade") ? 'pb-1' : '' }}">
                                        <div class="">
                                            <input type="text"
                                                class="form-control col-md-5 mx-auto {{ $errors->has("alimento.{$loop->index}.quantidade") ? 'is-invalid' : '' }}  text-center"
                                                name="alimento[{{$loop->index}}][quantidade]" value="{{ old("alimento.{$loop->index}.quantidade") }}">
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first("alimento.{$loop->index}.quantidade") }}</strong>
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
