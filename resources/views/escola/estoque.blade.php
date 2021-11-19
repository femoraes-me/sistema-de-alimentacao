@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">
            <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">Estoque de Alimentos</h1>
                </div>
                <div class="col-sm-4">
                    <!--- Botão de Cadastro -->
                    <div class="my-2"></div>
                    <a href="{{ route('alimentos.novo') }}" class="btn letra btn-color btn-icon-split icon-white">
                        <span class="icon text-white-50">
                            <i class="fas fa-apple-alt"></i>
                        </span>
                        <span class="text">Cadastrar alimentos</span>
                    </a>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 espaco">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tfoot class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($estoques as $estoque)
                                    <tr>
                                        <td>{{ $estoque->id }}</td>
                                        <td>{{ $estoque->alimentos->nome }}</td>
                                        <td>{{ $estoque->alimentos->unidade }}</td>
                                        <td>{{ $estoque->quantidade }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
