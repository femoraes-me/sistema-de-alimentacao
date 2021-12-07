@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">

        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">
                @foreach ($escola as $escola)
                    {{ $escola->nome }}
                @endforeach
            </h1>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <form action="">
                    <div class="card pb-4 px-3">
                        <div class="form-row justify-content-center">
                            <div class="form-group p-4 col-8">
                                <label for="qtd_alunos" class="">Quantidade de alunos</label>
                                <input type="text" id="qtd_alunos" value="{{ $escola->qtd_alunos }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" id='btnSave' class="btn btn-primary" disabled>Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var qtdAlunosInput = $('#qtd_alunos');
            var oldData = qtdAlunosInput.val();

            qtdAlunosInput.bind('change keyup input', function() {
                if (oldData !== qtdAlunosInput.val()) {
                    console.log(qtdAlunosInput.val());
                    $('#btnSave').removeAttr("disabled");
                } else {
                    $('#btnSave').attr("disabled", 'true');
                }
            })

        });
    </script>
@endsection
