@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">

        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">
                Editar Escola
            </h1>
        </div>

        @include('layouts._partials.return_message')

        <div class="card border-light shadow-sm">
            <div class="card-header py-3 px-4">
                <strong class="h3 aling-middle m-4">
                    @foreach ($escola as $escola)
                        {{ $escola->nome }}
                    @endforeach
                </strong>
            </div>
            <form action="{{ route('escola.update', Auth::user()->escolas_id) }}" method="POST" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="form-row justify-content-center px-5 pb-5 pt-4">
                    <div class="form-group col-md-8">
                        <label for="qtd_alunos" class="">Quantidade de alunos</label>
                        <input type="text" id="qtd_alunos" name="qtd_alunos" value="{{ $escola->qtd_alunos }}"
                            class="form-control @error('qtd_alunos') is-invalid @enderror">
                        @error('qtd_alunos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control phone {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                            name="telefone" id="telefone" value="{{ $escola->telefone }}">
                        <strong class="invalid-feedback">{{ $errors->first('telefone') }}</strong>
                    </div>

                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" id='btnSave' class="btn btn-primary" disabled>Salvar</button>
                </div>

            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/escola/edit.js') }}"></script>
@endsection
