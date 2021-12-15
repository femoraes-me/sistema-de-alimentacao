@extends('layouts.admin')
@section('content')
    <!-- Main Content-->
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Usuários</h1>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control mr-2 w-50" value="" placeholder="Pesquisar...">
                <button type="submit" class="btn letra btn-primary "><i class="fa fa-search"></i></button>
            </div>
            <a class="btn letra btn-primary font-weight-bolder ml-2" id="escolaCadastro"
                href="{{ route('secretaria.usuarios.create') }}">Cadastrar Usuário</a>
        </div>

        <!-- cofirmation modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mt-3 mb-2">
                        <!-- nome do usuario -->
                    </div>
                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn btn-success" id="btnConfirm">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->

        @include('layouts._partials.return_message')

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
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td class="align-middle text-center">{{ $usuario->id }}</td>
                                <td class="align-middle" id="tdNome">{{ $usuario->name }}</td>
                                <td class="align-middle">
                                    <div class="row justify-content-center">
                                        <form action="{{ route('secretaria.usuarios.destroy', $usuario->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" id="btnDelete"
                                                data-toggle="modal" data-target="#confirmationModal">
                                                <i class="fa fa-trash fa-fw"></i>
                                            </button>
                                        </form>
                                            <a href="{{ route('secretaria.usuarios.show', $usuario->id) }}"
                                                class="btn btn-sm btn-primary ml-2">
                                                <i class="fas fa-edit fa-fw"></i>
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Cria Paginação -->

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/secretaria/users/index.js') }}"></script>
@endsection
