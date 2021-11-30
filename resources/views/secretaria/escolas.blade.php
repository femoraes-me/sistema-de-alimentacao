@extends('layouts.admin')
@section('pageHeading')
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Escolas</h1>
        </div>
    </div>
@endsection
@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container-fluid mt-4">
            <form action="" method="">
                @csrf
                <div class="form-group col-md-8">
                    <label for="data_consumo">Dia:</label>
                    <input type="date" name="" id="" class="text-secondary border rounded p-1">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="card border-light shadow pb-2 px-2">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center col-1">ID</th>
                                    <th class="text-left col-8">Nome</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>IFSP - Carguatatuba</td>
                                    <td class="text-center">
                                        <div class="align-self-center">
                                            <a href="" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="" method="">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </form>
                                            <a href="" class="btn btn-sm btn-secondary">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                        </div>



                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-success px-5">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
