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
                                        <input type="text" readonly class="form-control-plaintext" placeholder="Arroz"
                                            value="1" name="alimento_id">
                                    </div>
                                </td>
                                <td class="col-3">
                                    <div class="form-group text-center">
                                        <select class="form-control col-4 mx-auto" name="medida">
                                            <option value="kg">kg</option>
                                            <option value="g">g</option>
                                            <option value="mg">mg</option>
                                        </select>
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
                    <input type="submit" value="Cadastrar" class="btn btn-success px-4">
                </div>
            </div>
        </form>


    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

@endsection
