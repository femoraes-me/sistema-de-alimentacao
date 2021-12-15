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
                                </tr>
                            </thead>
                            <tfoot class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th class="text-center">Unidade</th>
                                    <th class="text-center">Quantidade</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($alimentos as $alimento)
                                    <tr>
                                        <td>{{ $alimento->id }}</td>
                                        <td>{{ $alimento->nome }}</td>
                                        <td class="text-center">{{ $alimento->unidade }}</td>
                                        <td class="text-center">{{ $alimento->quantidade }}</td>

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
