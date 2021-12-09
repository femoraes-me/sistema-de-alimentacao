@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">


            <div class="text-left">
                <h1 class="h2 text-gray-900 ml-0">Entrada de Alimentos:</h1>
                <h1 class="h3 text-gray-900 mb-4">{{ $escola->nome }}</h1>
            </div>

            <!-- DataTales Example -->
            <form action="{{ route('escola.consumo.store') }}" method="POST">
                @csrf
                <div class="row justify-content-between">
                    <div class="form-group col-md-6">
                        <label for="data_consumo">Dia:</label>
                        <input type="date" name="data_consumo" id="data_consumo"
                            class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">{{ $errors->first('data_consumo') }}</div>

                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="">
                            <a class="btn btn-primary" href="{{route('secretaria.escolas.actions', $escola->id)}}">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card border-light shadow-sm py-2">
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
                                @foreach ($estoques as $estoque)
                                    <tr>
                                        <!--campo id  -->
                                        <input type="hidden" name="" value="">
                                        <td class="align-middle pl-4">
                                            {{ $estoque->nome }}
                                        </td>
                                        <td class="align-middle">
                                            <div class="align-middle text-center">
                                                {{ $estoque->unidade }}
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $estoque->quantidade }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="">
                                                <input type="text"
                                                    class="form-control col-md-5 mx-auto {{ $errors->has('') ? 'is-invalid' : '' }}  text-center"
                                                    name="Entrada" value="">
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('') }}
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
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
