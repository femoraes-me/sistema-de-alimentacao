@extends('layouts.admin')

@section('content')

<div id="content">
    <!-- Main Content-->
    <div class="container mt-5">

        <div class="text-center">
            <h1 class="h3 text-gray-900 mb-4">Cadastrar Consumo Diário</h1>
        </div>


        <form action="" method="POST">
            @csrf

            <div class="form-group col-md-6">
                <label for="data">Data do Consumo:</label>
                <input type="date" name="data_consumo" id="data_consumo" class="text-secondary border rounded p-1">
            </div>

            <div class="card">
                <table class="table">
                    <thead>
                        <th class="col-md-6">Alimentos</th>
                        <th class="text-center">Unidade de Medida</th>
                        <th class="text-center">Quantidade Consumida</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                TESTE
                            </td>
                            <td class="text-center">
                                KG
                            </td>
                            <td class="text-center">
                                5
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TESTE
                            </td>
                            <td class="text-center">
                                KG
                            </td>
                            <td class="text-center">
                                5
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group mt-4 d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-success px-4 w-25">
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