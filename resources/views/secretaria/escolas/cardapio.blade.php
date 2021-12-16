@extends('layouts.admin')
@section('content')
    <!-- Main Content-->

    <div class="container-fluid mt-4">

        <div class="col-10 text-left">
            <h1 class="h2 text-gray-900 mb-4">CARDÁPIO: {{ $escola->nome }}</h1>
        </div>

        <div class="d-flex justify-content-between">
            <div class="">
                <label for="data_consumo">Dia:</label>
                <input type="date" name="data_cardapio" id="data_cardapio"
                    class="text-secondary border rounded p-1 {{ $errors->has('data_consumo') ? 'is-invalid' : '' }}">
                <button type="submit" class="btn letra btn-dark px-4"
                    onclick="location.search = `?data=${$('#data_cardapio').val()}`;">
                    <i class="fa fa-search"></i>Buscar
                </button>
                <div class="invalid-feedback"></div>
            </div>
            <div class="">
                <button onclick="history.back()" class="btn letra btn-danger font-weight-bolder ml-2 px-4"
                    id="escolaCadastro">Voltar</button>
            </div>
        </div>

        <br>
        <div class="card p-4 bg-white border mt-4 text-uppercase">
            <div class="row mb-2">
                <div class="col-7 mr-4"><strong>REFEIÇÃO</strong></div>
                <div class="col-2 mr-4"><strong>QUANTIDADE</strong></div>
                <div class="col-2"><strong>REPETIÇÕES</strong></div>
            </div>
            @foreach ($refeicoes as $refeicao)
                <div class="">{{ $refeicao->alimentacao }}</div>
                <div class="row pl-2">
                    <input name="cafe_da_manha" id="cafe_da_manha"
                        class="bg-light p-2 mb-4 border rounded text-dark col-7 mr-4" value="{{ $refeicao->cardapio }}">
                    <input name="cafe_da_manha" id="cafe_da_manha"
                        class="bg-light p-2 mb-4 border rounded text-dark col-2 mr-4" value="{{ $refeicao->quantidade }}">
                    <input name="cafe_da_manha" id="cafe_da_manha" class="bg-light p-2 mb-4 border rounded text-dark col-2"
                        value="{{ $refeicao->repeticoes }}">
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
@endsection
