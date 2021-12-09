@extends('layouts.admin')
@section('pageHeading')
    <div class="container">
        <div class="row ">
            <div class="col-10 mt-5 text-left">
                <h1 class="h3 text-gray-900 mb-4">Cardápio do Dia: Nome da Escola</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Main Content-->
    <div class="container mt-2">
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="">
                    <label for="data_consumo">Dia:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <button type="submit" class="btn letra btn-primary "><i class="fa fa-search"></i></button>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="">
                    <button class="btn letra btn-primary font-weight-bolder ml-2" id="escolaCadastro">Voltar</button>
                </div>
            </div>
        </div>

        <div class="card p-4 bg-primary mt-4">
            <div class="bg-white p-2 m-2 rounded text-dark">Bolacha maizena, bolacha rosquinha, café, leite, achocolatado em pó</div>
            <div class="bg-white p-2 m-2 rounded text-dark">Arroz, feijão, frango desfiado e salada de alface e tomate</div>
            <div class="bg-white p-2 m-2 rounded text-dark">Bolacha maizena, bolacha rosquinha, café, leite, achocolatado em pó</div>
            <div class="bg-white p-2 m-2 rounded text-dark">Arroz, feijão, frango desfiado e salada de alface e tomate</div>
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