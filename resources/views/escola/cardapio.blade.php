@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h2 class="text-gray-800">Cadastrar Cardápio do Dia</h2>

            <div class="row justify-content-center shadow rounded">
                <div class="card-body col-md-12">

                    <form action="">
                        <div class="form-group">
                            <label for="date:">Dia:</label>
                            <input type="date" id="date">
                        </div>

                        <div class="form-group">
                            <input type="text" name="cardapio[lanchemanha]" class="form-control"
                            placeholder="Lanche Manhã">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cardapio[almoco]" class="form-control" 
                             placeholder="Almoço">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cardapio[lanchetarde]" class="form-control"
                            placeholder="Lanche da Tarde">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Janta</label>
                            <input type="text" name="cardapio[janta]" class="form-control"
                             placeholder="Janta">
                        </div>

                        <button></button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
