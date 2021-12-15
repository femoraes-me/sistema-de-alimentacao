@extends('layouts.admin')
@section('pageHeading')
    <div class="container mt-4">
        <div class="row ">
            <div class="col-10 text-left">
                <h1 class="h2 text-gray-900 mb-4">CARDÁPIO: {{ $escola->nome }}</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Main Content-->
    <div class="container">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="">
                    <label for="data_consumo">Dia:</label>
                    <input type="date" name="data_consumo" id="data_consumo"
                        class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                    <button type="submit" class="btn letra btn-dark px-4"><i class="fa fa-search"></i>     Buscar</button>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="">
                    <button onclick="history.back()" class="btn letra btn-danger font-weight-bolder ml-2 px-4" id="escolaCadastro">Voltar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="card p-4 bg-white border mt-4">
            <label class="pl-2"><strong>Café da Manhã:</strong></label>
            <div class="bg-white p-2 mb-4 border rounded text-dark">Bolacha maizena, bolacha rosquinha, café, leite, achocolatado em pó</div>
            
            <label class="pl-2"><strong>Almoço:</strong></label>
            <div class="bg-white p-2 mb-4 border rounded text-dark">Arroz, feijão, frango desfiado e salada de alface e tomate</div>
            
            <label class="pl-2"><strong>Lanche da Tarde:</strong></label>
            <div class="bg-white p-2 mb-4 border rounded text-dark">Bolacha maizena, bolacha rosquinha, café, leite, achocolatado em pó</div>
            
            <label class="pl-2"><strong>Janta:</strong></label>
            <div class="bg-white p-2 mb-4 border rounded text-dark">Arroz, feijão, frango desfiado e salada de alface e tomate</div>
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