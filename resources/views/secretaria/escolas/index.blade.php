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
                                        <button href="" value="{{ $escola->id }}" class="btn btn-sm btn-primary mr-2"
                                            id="btnEditar">
                                            <i class="fas fa-edit"></i>
                                        </button>
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

            /*teste
            $(document).on('click', '#btnEditar', function(e) {
                e.preventDefault();
                var escolaID = $(this).val();
                console.log(escolaID);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "GET",
                    url: "/secretaria/escolas/edit"+escolaID,
                    success: function(response) {
                        console.log(response)
                    }
                });
            });*/

            //realiza cadastro de escola
            $(document).on('click', '#btnCadastrar', function(e) {
                e.preventDefault();
                var data = {
                    'nome': $('#nome').val(),
                    'qtd_alunos': $('#qtd_alunos').val()
                }
                //console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var inputNome = $('#nome');
                var inputQtd_alunos = $('#qtd_alunos');

                function verification(divName) {
                    return divName.hasClass('is-invalid');
                }

                function isKeyExists(obj, key) {
                    return key in obj;
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('secretaria.escolas.store') }}",
                    data: data,
                    success: function(response) {
                        $('.alert').show();
                        $('#divMessage').removeClass('d-none');
                        if (!$('#message').hasClass('alert-success')) {
                            $('#message').addClass('alert-success');
                            $('#message').append("<span>" + response.message + "</span>");
                        }
                        $('#formEscola').find('input').val("");
                        $('#formEscola').find('input').removeClass("is-invalid");
                        $('.invalid-feedback').empty();
                    },
                    error: function(data) {
                        $('.alert').hide();
                        if (data.status === 422) {
                            $('#divMessage').addClass('d-none');
                            var errors = data.responseJSON['errors'];
                            if (isKeyExists(errors, "nome") && !verification(inputNome)) {
                                $('#nome').addClass('is-invalid');
                                $('#nomeErrorMessage').append(errors['nome']);
                            } else if (!isKeyExists(errors, "nome") && verification(
                                    inputNome)) {
                                $('#nome').removeClass('is-invalid');
                                $('#nomeErrorMessage').empty();
                            }

                            if (isKeyExists(errors, "qtd_alunos") && !verification(
                                    inputQtd_alunos)) {
                                $('#qtd_alunos').addClass('is-invalid');
                                $('#qtd_alunosErrorMessage').append(errors['qtd_alunos']);
                            } else if (!isKeyExists(errors, "qtd_alunos") && verification(
                                    inputNome)) {
                                $('#qtd_alunos').removeClass('is-invalid');
                                $('#qtd_alunosErrorMessage').empty();
                            }
                        } else {
                            $('#divMessage').removeClass('d-none');
                            $('#message').addClass('alert-danger');
                            $('#message').append('Erro ao cadastrar escola');
                        }
                    }

                });
            });
        });
    </script>
@endsection
