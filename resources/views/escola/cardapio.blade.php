@extends('layouts.admin')
@section('pageHeading')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 mt-5 text-left">
                <h1 class="h3 text-gray-900 mb-4">Cadastrar Cardápio do Dia</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Main Content-->
    <div class="container mt-2">
        <div class="row justify-content-center">

            <!-- messagem -->
            @include('layouts._partials.return_message')

            <!-- formulário -->
            <div class="col-10">
                <form action="{{ route('escola.cardapio.store') }}" method="POST">
                    @csrf
                    <!--campo data -->
                    <div class="form-group">
                        <label for="data">Dia:</label>
                        <input type="date"
                            class="text-secondary border p-1 rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                            id="data_cardapio" name="data" value="{{ old('data') }}" maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('data') }}</div>
                    </div>

                    <div class="card pt-4 px-4">
                        <!-- inputs café da manhã -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-8">
                                    <label for="cardapio_manha">Café da Manhã</label>
                                    <input type="hidden" name="cardapios[0][alimentacao]" value="café da manhã">
                                    <input type="text" name="cardapios[0][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.0.cardapio') ? 'is-invalid' : '' }} "
                                        value="{{ old('cardapios.0.cardapio') }}"
                                        placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..."
                                        maxlength="100">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.0.cardapio') }}</div>
                                </div>

                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="cardapios[0][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.0.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.0.quantidade') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.0.quantidade') }}</div>
                                </div>

                                <div class="col-2">
                                    <label>Repetições</label>
                                    <input type="number" name="cardapios[0][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.0.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.0.repeticoes') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.0.repeticoes') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- inputs almoço -->
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="cardapios[1][alimentacao]" value="almoço">
                                <div class="col-8">
                                    <label for="almoco">Almoço</label>
                                    <input type="text" name="cardapios[1][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.1.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.cardapio') }}"
                                        placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                        maxlength="100">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.1.cardapio') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="cardapios[1][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.1.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.quantidade') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.1.quantidade') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Repetições</label>
                                    <input type="number" name="cardapios[1][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.1.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.repeticoes') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.1.repeticoes') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- inputs café da tarde -->
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="cardapios[2][alimentacao]" value="café da tarde">
                                <div class="col-8">
                                    <label for="lanche_tarde">Lanche da Tarde</label>
                                    <input type="text" name="cardapios[2][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.2.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.cardapio') }}"
                                        placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..."
                                        maxlength="100">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.2.cardapio') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input name="cardapios[2][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.2.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.quantidade') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.2.quantidade') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Repetições</label>
                                    <input name="cardapios[2][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.2.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.repeticoes') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.2.repeticoes') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- inputs jantar -->
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="cardapios[3][alimentacao]" value="jantar">
                                <div class="col-8">
                                    <label for="janta">Janta</label>
                                    <input type="text" name="cardapios[3][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.3.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.cardapio') }}"
                                        placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                        maxlength="100">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.3.cardapio') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input name="cardapios[3][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.3.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.quantidade') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.3.quantidade') }}</div>
                                </div>
                                <div class="col-2">
                                    <label>Repetições</label>
                                    <input name="cardapios[3][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.3.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.repeticoes') }}">
                                    <div class="invalid-feedback">{{ $errors->first('cardapios.3.repeticoes') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-center">
                            <input type="submit" value="Cadastrar" class="btn btn-success px-5">
                        </div>

                    </div>
                </form>
            </div>
        </div>

        </form>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

@endsection
