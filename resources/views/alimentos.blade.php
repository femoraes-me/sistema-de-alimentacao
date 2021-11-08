@extends('layouts.admin')

@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastrar alimentos</h1>
            </div>
            <form class="user">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control" placeholder="Alimento">
                        <!--id="exampleFirstName"-->
                    </div>
                    <div class="dropdown mb-4 col-sm-6">
                        <button class="btn btn-color letra dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecione o tipo
                        </button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">KG</a>
                            <a class="dropdown-item" href="#">g</a>
                            <a class="dropdown-item" href="#">L</a>
                        </div>
                    </div>
                </div>
                <a href="/estoque" class="btn btn-color letra btn-block">
                    Cadastrar alimento
                </a>

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
