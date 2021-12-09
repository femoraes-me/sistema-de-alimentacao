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
                    @if (Auth::user()->role == 'secretaria')
                        <a href="{{ route('alimentos.novo') }}" style="float: right"
                            class="btn letra btn-primary btn-icon-split icon-white">
                            <span class="icon text-white-50">
                                <i class="fas fa-apple-alt"></i>
                            </span>
                            <span class="text">Cadastrar alimentos</span>
                        </a>
                    @endif
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
                                    <th class="text-center">Unidade</th>
                                    <th class="text-center">Quantidade</th>
                                    @if (Auth::user()->role == 'secretaria')
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Excluir</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th class="text-center">Unidade</th>
                                    <th class="text-center">Quantidade</th>
                                    @if (Auth::user()->role == 'secretaria')
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Excluir</th>
                                    @endif
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($estoques as $estoque)
                                    <tr>
                                        <td>{{ $estoque->id }}</td>
                                        <td>{{ $estoque->alimentos->nome }}</td>
                                        <td class="text-center">{{ $estoque->alimentos->unidade }}</td>
                                        <td class="text-center">{{ $estoque->quantidade }}</td>
                                        @if (Auth::user()->role == 'secretaria')
                                            <td class="text-center"> <a href="{{ route('alimentos.editar', $estoque->id) }}"><i
                                                        class="far fa-edit text-purple"></i></a>
                                            <td class="text-center"> <a href="{{ route('alimentos.apagar', $estoque->id) }}"><i
                                                        class="fas fa-trash text-red"></i></a>
                                        @endif
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
