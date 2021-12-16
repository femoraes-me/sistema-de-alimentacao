@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">
            <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">Alimentos</h1>
                </div>

            </div>

            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4 pb-2 px-2 mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-secondary">
                                <tr>
                                    <th class="col-md-1 text-center">ID</th>
                                    <th>Alimento</th>
                                    <th class="text-center">Unidade</th>
                                    @if (Auth::user()->role == 'secretaria')
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Excluir</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot class="table-secondary">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Alimento</th>
                                    <th class="text-center">Unidade</th>

                                    @if (Auth::user()->role == 'secretaria')
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Excluir</th>
                                    @endif
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($alimentos as $alimento)
                                    <tr>
                                        <td class="text-center">{{ $alimento->id }}</td>
                                        <td class="text-uppercase">{{ $alimento->nome }}</td>
                                        <td class="text-center">{{ $alimento->unidade }}</td>
                                        @if (Auth::user()->role == 'secretaria')
                                            <td>
                                                <div class="row justify-content-center p-0">
                                                    <a href="{{ route('alimentos.editar', $alimento->id) }}">
                                                        <i class="far fa-edit text-primary"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <div class="row justify-content-center p-0">
                                                    <a href="{{ route('alimentos.apagar', $alimento->id) }}">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>

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
