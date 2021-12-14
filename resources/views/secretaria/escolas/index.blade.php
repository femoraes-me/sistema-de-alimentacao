@extends('layouts.admin')
@section('content')
    <!-- Main Content-->
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Escolas</h1>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control mr-2 w-50" value="" placeholder="Pesquisar...">
                <button type="submit" class="btn letra btn-primary "><i class="fa fa-search"></i></button>
            </div>
            <button class="btn letra btn-primary font-weight-bolder ml-2" id="showForm">Cadastrar Escola</button>
            <button class="btn letra btn-secondary font-weight-bolder ml-2 {{ sizeof($errors) == 0 ? 'd-none' : '' }}" id="hideForm">Fechar</button>
        </div>

        @include('layouts._partials.return_message')
        <!-- Form de cadastro de Escola -->
        <div class="card {{ sizeof($errors) == 0 ? 'd-none' : '' }}" id="formEscola">
            <div class="card-header py-3 px-5">
                <strong class="h3 aling-middle m-5">Cadastro de Escola</strong>
            </div>
            <div class="card-body px-5 mx-5">
                <form action="{{ route('secretaria.escolas.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="">Nome da Escola</label>
                            <input name="nome" value="{{ old('nome') }}" type="text"
                                class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome">
                            <strong class="invalid-feedback">{{ $errors->first('nome') }}</strong>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Quantidade de Alunos</label>
                            <input name="qtd_alunos" type="text"
                                class="form-control text-center {{ $errors->has('qtd_alunos') ? 'is-invalid' : '' }}"
                                id="qtd_alunos" value="{{ old('qtd_alunos') }}">
                            <strong class="invalid-feedback">{{ $errors->first('qtd_alunos') }}</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="telefone">Telefone</label>
                            <input type="text"
                                class="form-control phone {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                                name="telefone" id="telefone">
                            <strong class="invalid-feedback">{{ $errors->first('telefone') }}</strong>
                        </div>
                    </div>
                    <div class="form-group mb-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success px-3" id="btnCadastrar">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- -->

        <!-- cofirmation modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mt-3 mb-2">
                        <!-- nome da escola-->
                    </div>
                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn btn-success" id="btnConfirm">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->


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
                                <td class="align-middle" id="tdNome">{{ $escola->nome }}</td>
                                <td class="align-middle">
                                    <div class="row justify-content-center">
                                        <form action="{{ route('secretaria.escolas.destroy', $escola->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" id="btnDelete"
                                                data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-trash "></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('secretaria.escolas.actions', $escola->id) }}"
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
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/secretaria/escolas/index.js') }}"></script>
@endsection
