@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">

        <!-- page heading -->
        <div class="text-left">
            <h1 class="h3 text-gray-900 mb-4">Cadastrar Cardápio do Dia</h1>
        </div>

        <!-- Mensagem de retorno -->
        @include('layouts._partials.return_message')

        <!-- formulário -->
        <form action="{{ route('escola.cardapio.store') }}" method="POST">
            @csrf
            <!--campo data -->
            <div class="form-group">
                <label for="data">Dia:</label>
                <input type="date" class="text-secondary border p-1 rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                    id="data_cardapio" name="data" value="{{ old('data') }}" maxlength="100">
                <strong class="invalid-feedback">{{ $errors->first('data') }}</strong>
            </div>

            <div class="card border-light shadow-sm">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 p-2">
                            <!-- inputs café da manhã -->
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <label for="cardapio_manha">Café da Manhã</label>
                                    <input type="hidden" name="cardapios[0][alimentacao]" value="café da manhã">
                                    <input type="text" name="cardapios[0][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.0.cardapio') ? 'is-invalid' : '' }} "
                                        value="{{ old('cardapios.0.cardapio') }}"
                                        placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..."
                                        maxlength="100">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.0.cardapio') }}</strong>
                                </div>

                                <div class="form-group col-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="cardapios[0][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.0.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.0.quantidade') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.0.quantidade') }}</strong>
                                </div>

                                <div class="form-group col-2">
                                    <label>Repetições</label>
                                    <input type="number" name="cardapios[0][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.0.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.0.repeticoes') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.0.repeticoes') }}
                                    </strong>
                                </div>
                            </div>

                            <!-- inputs almoço -->
                            <div class="form-row">
                                <input type="hidden" name="cardapios[1][alimentacao]" value="almoço">
                                <div class="form-group col-8">
                                    <label for="almoco">Almoço</label>
                                    <input type="text" name="cardapios[1][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.1.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.cardapio') }}"
                                        placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                        maxlength="100">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.1.cardapio') }}</strong>
                                </div>
                                <div class="form-group col-2">
                                    <label>Quantidade</label>
                                    <input type="number" name="cardapios[1][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.1.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.quantidade') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.1.quantidade') }}
                                    </strong>
                                </div>
                                <div class="form-group col-2">
                                    <label>Repetições</label>
                                    <input type="number" name="cardapios[1][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.1.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.1.repeticoes') }}">
                                    <strong
                                        class="invalid-feedback">{{ $errors->first('cardapios.1.repeticoes') }}</strong>
                                </div>
                            </div>


                            <!-- inputs café da tarde -->
                            <div class="form-row">
                                <input type="hidden" name="cardapios[2][alimentacao]" value="café da tarde">
                                <div class="form-group col-8">
                                    <label for="lanche_tarde">Lanche da Tarde</label>
                                    <input type="text" name="cardapios[2][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.2.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.cardapio') }}"
                                        placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..."
                                        maxlength="100">
                                    <strong
                                        class="invalid-feedback">{{ $errors->first('cardapios.2.cardapio') }}</strong>
                                </div>
                                <div class="form-group col-2">
                                    <label>Quantidade</label>
                                    <input name="cardapios[2][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.2.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.quantidade') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.2.quantidade') }}</strong>
                                </div>
                                <div class="form-group col-2">
                                    <label>Repetições</label>
                                    <input name="cardapios[2][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.2.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.2.repeticoes') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.2.repeticoes') }}
                                    </strong>
                                </div>
                            </div>

                            <!-- inputs jantar -->
                            <div class="form-row">
                                <input type="hidden" name="cardapios[3][alimentacao]" value="jantar">
                                <div class="col-8">
                                    <label for="janta">Janta</label>
                                    <input type="text" name="cardapios[3][cardapio]"
                                        class="form-control {{ $errors->has('cardapios.3.cardapio') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.cardapio') }}"
                                        placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                        maxlength="100">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.3.cardapio') }}</strong>
                                </div>
                                <div class="col-2">
                                    <label>Quantidade</label>
                                    <input name="cardapios[3][quantidade]"
                                        class="form-control {{ $errors->has('cardapios.3.quantidade') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.quantidade') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.3.quantidade') }}
                                    </strong>
                                </div>
                                <div class="col-2">
                                    <label>Repetições</label>
                                    <input name="cardapios[3][repeticoes]"
                                        class="form-control {{ $errors->has('cardapios.3.repeticoes') ? 'is-invalid' : '' }}"
                                        value="{{ old('cardapios.3.repeticoes') }}">
                                    <strong class="invalid-feedback">{{ $errors->first('cardapios.3.repeticoes') }}
                                    </strong>
                                </div>
                            </div>

                            <!-- botão cadastrar -->
                            <div class="form-group mt-4 mb-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success px-5">Cadastrar</button>
                            </div>
                        </div>
                    </div>
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
