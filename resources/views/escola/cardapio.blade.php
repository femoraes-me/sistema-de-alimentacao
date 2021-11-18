@extends('layouts.admin')

@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="">
                <h1 class="h3 text-gray-900 mb-4">Cadastrar Cardápio do Dia</h1>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <form action="{{ route('cardapio.store') }}" method="POST">
                @csrf

                <div class="form-group  col-md-6">
                    <label for="data">Data do Cardápio:</label>
                    <input type="date"
                        class="text-secondary border border-secondary rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                        id="data_cardapio" name="data" value="{{ old('data') }}" data-mask="" placeholder="Buscar..."
                        maxlength="100">
                    <div class="invalid-feedback">{{ $errors->first('data') }}</div>
                </div>

                <div class="bg-secondary p-3 mb-2 col-md-8 rounded">
                    <div class="form-group">
                        <label for="cardapio_manha"></label>
                        <input type="text" name="cardapio[lanche_manha]"
                            class="form-control {{ $errors->has('cardapio.lanche_manha') ? 'is-invalid' : '' }} "
                            id="cardapio_manha" value="{{ old('cardapio.lanche_manha') }}" placeholder="Cardápio da Manhã"
                            maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_manha') }}</div>
                    </div>

                    <div class="form-group">
                        <label for="almoco"></label>
                        <input type="text" name="cardapio[almoco]"
                            class="form-control {{ $errors->has('cardapio.almoco') ? 'is-invalid' : '' }}"
                            id="cardapio_manha" value="{{ old('cardapio.almoco') }}" placeholder="Almoço" maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('cardapio.almoco') }}</div>
                    </div>

                    <div class="form-group">
                        <label for="lanche_tarde"></label>
                        <input type="text" name="cardapio[lanche_tarde]"
                            class="form-control {{ $errors->has('cardapio.lanche_tarde') ? 'is-invalid' : '' }}"
                            id="cardapio_manha" value="{{ old('cardapio.lanche_tarde') }}" placeholder="Lanche da Tarde"
                            maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_tarde') }}</div>
                    </div>

                    <div class="form-group">
                        <label for="janta"></label>
                        <input type="text" name="cardapio[janta]"
                            class="form-control {{ $errors->has('cardapio.janta') ? 'is-invalid' : '' }}" id="janta"
                            value="{{ old('cardapio.janta') }}" placeholder="Janta" maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('cardapio.janta') }}</div>
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-success px-4 w-50">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

@endsection
