@extends('layouts.admin')

@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastrar Cardápio do Dia</h1>
            </div>   
            
            <form action="">
                
                <div class="form-group col-md-6">
                    <label for="data_cardapio">Cardápio do dia:</label>
                    <input
                        type="date"
                        class="form-control"
                        id="data_cardapio"
                        name="data_cardapio"
                        value=""
                        data-mask=""
                        placeholder="Buscar..."
                    >
                </div>

                <div class="form-group col-md-6">
                    <label for="cardapio_Manhã"></label>
                    <input type="text" class="form-control" id="cardapio_manha" placeholder="Cardápio da Manhã">
                </div>

                <div class="form-group col-md-6">
                    <label for="cardapio_Manhã"></label>
                    <input type="text" class="form-control" id="cardapio_manha" placeholder="Almoço">
                </div>

                <div class="form-group col-md-6">
                    <label for="cardapio_Manhã"></label>
                    <input type="text" class="form-control" id="cardapio_manha" placeholder="Lanche da Tarde">
                </div>

                <div class="form-group col-md-6">
                    <label for="cardapio_Manhã"></label>
                    <input type="text" class="form-control" id="cardapio_manha" placeholder="Janta">
                </div>

                <div class="form-group col-md-6">
                    <input type="submit" value="Cadastrar" class="btn btn-primary px-4">
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