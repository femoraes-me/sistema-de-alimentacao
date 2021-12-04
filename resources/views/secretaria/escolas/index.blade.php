@extends('layouts.admin')
@section('content')
    <!-- Main Content-->
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Escolas</h1>
        </div>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control mr-2 w-50" value="" placeholder="Pesquisar...">
                <button type="submit" class="btn letra btn-color "><i class="fa fa-search"></i></button>
            </div>
            <button class="btn letra btn-color font-weight-bolder ml-2" id="escolaCadastro">Cadastrar Escola</button>
        </div>

        @include('layouts._partials.register')
        @include('layouts._partials.edit')

        <div class="card border-light shadow-sm pb-2 px-2 mt-2">
            <div class="card-body">
                <table class="table m-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center col-1">ID</th>
                            <th class="text-left col-8">Nome</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($escolas as $escola)
                            <tr>
                                <td class="align-middle text-center">{{ $escola->id }}</td>
                                <td class="align-middle">{{ $escola->nome }}</td>
                                <td class="align-middle">
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                                            <i class="fa fa-trash "></i>
                                        </button>
                                        <a href="{{ route('secretaria.escolas.actions') }}"
                                            class="btn btn-sm btn-secondary ml-2">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Cria Paginação -->
                <div class="d-flex justify-content-start mt-3">
                    {{ $escolas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

           
           
        });
    </script>
@endsection
