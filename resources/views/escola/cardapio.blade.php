@extends('layouts.admin')

@section('content')

    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Cadastrar Cardápio do Dia</h1>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success card text-center m-4 col-8">{{ session('message') }}</div>
                @endif

                <div class="card p-4 col-10">

                    <form action="{{ route('cardapio.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="data">Data do Cardápio:</label>
                            <input type="date"
                                class="text-secondary border p-1 rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                                id="data_cardapio" name="data" value="{{ old('data') }}" maxlength="100">
                            <div class="invalid-feedback">{{ $errors->first('data') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="cardapio_manha">Cardápio da Manhã</label>
                            <input type="text" name="cardapio[lanche_manha]"
                                class="form-control {{ $errors->has('cardapio.lanche_manha') ? 'is-invalid' : '' }} "
                                id="cardapio_manha" value="{{ old('cardapio.lanche_manha') }}"
                                placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..." maxlength="100">
                            <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_manha') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="almoco">Almoço</label>
                            <input type="text" name="cardapio[almoco]"
                                class="form-control {{ $errors->has('cardapio.almoco') ? 'is-invalid' : '' }}"
                                id="cardapio_manha" value="{{ old('cardapio.almoco') }}"
                                placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                maxlength="100">
                            <div class="invalid-feedback">{{ $errors->first('cardapio.almoco') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="lanche_tarde">Lanche da Tarde</label>
                            <input type="text" name="cardapio[lanche_tarde]"
                                class="form-control {{ $errors->has('cardapio.lanche_tarde') ? 'is-invalid' : '' }}"
                                id="cardapio_manha" value="{{ old('cardapio.lanche_tarde') }}"
                                placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..." maxlength="100">
                            <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_tarde') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="janta">Janta</label>
                            <input type="text" name="cardapio[janta]"
                                class="form-control {{ $errors->has('cardapio.janta') ? 'is-invalid' : '' }}" id="janta"
                                value="{{ old('cardapio.janta') }}"
                                placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                maxlength="100">
                            <div class="invalid-feedback">{{ $errors->first('cardapio.janta') }}</div>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-center">
                            <input type="submit" value="Cadastrar" class="btn btn-success px-4 w-25">
                        </div>
                </div>

                </form>
            </div>
        </div>
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
