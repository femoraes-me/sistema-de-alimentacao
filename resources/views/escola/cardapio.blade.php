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


            @if (session()->has('message'))
                <div class="alert alert-success card text-center m-4 col-8">{{ session('message') }}</div>
            @endif

            <div class="col-10">

                <form action="{{ route('escola.cardapio.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="data">Dia:</label>
                        <input type="date"
                            class="text-secondary border p-1 rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                            id="data_cardapio" name="data" value="{{ old('data') }}" maxlength="100">
                        <div class="invalid-feedback">{{ $errors->first('data') }}</div>
                    </div>


                    <div class="card pt-4 px-4">
                        <div class="form-group">
                            <label for="data">Dia:</label>
                            <input 
                                type="date"
                                class="text-secondary border p-1 rounded {{ $errors->has('data') ? 'is-invalid' : '' }}"
                                name="data" 
                                value="{{ old('data') }}" 
                                maxlength="100"
                            >
                            <div class="invalid-feedback">{{ $errors->first('data') }}</div>
                        </div>

                        <div class="card pt-4 px-4">
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="cardapio_manha">Café da Manhã</label>
                                        <input 
                                            type="text" 
                                            name="cardapio[lanche_manha]"
                                            class="form-control {{ $errors->has('cardapio.lanche_manha') ? 'is-invalid' : '' }} "
                                            value="{{ old('cardapio.lanche_manha') }}"
                                            placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..." 
                                            maxlength="100"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_manha') }}</div>
                                    </div>
                                    <div class="col-2">
                                        <label>Quantidade</label>
                                        <input 
                                            type="number"
                                            name="quantidade[lanche_manha_quantidade]"
                                            class="form-control {{ $errors->has('quantidade.lanche_manha_quantidade') ? 'is-invalid' : '' }}"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('quantidade.lanche_manha_quantidade') }}</div>
                                    </div>        
                                    <div class="col-2">
                                        <label>Repetições</label>
                                        <input 
                                            type="number"
                                            name="repeticoes[lanche_manha_repeticoes]"
                                            class="form-control {{ $errors->has('repeticoes.lanche_manha_repeticoes') ? 'is-invalid' : '' }}"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('repeticoes.lanche_manha_repeticoes') }}</div>
                                    </div>   
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="almoco">Almoço</label>
                                        <input 
                                            type="text" 
                                            name="cardapio[almoco]"
                                            class="form-control {{ $errors->has('cardapio.almoco') ? 'is-invalid' : '' }}"
                                            value="{{ old('cardapio.almoco') }}"
                                            placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                            maxlength="100"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('cardapio.almoco') }}</div>
                                    </div>
                                    <div class="col-2">
                                        <label>Quantidade</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
                                    </div>        
                                    <div class="col-2">
                                        <label>Repetições</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
                                    </div>   
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="lanche_tarde">Lanche da Tarde</label>
                                        <input 
                                            type="text" 
                                            name="cardapio[lanche_tarde]"
                                            class="form-control {{ $errors->has('cardapio.lanche_tarde') ? 'is-invalid' : '' }}"
                                            value="{{ old('cardapio.lanche_tarde') }}"
                                            placeholder="Ex: Bolacha maizena, bolacha rosquinha, café, leite..." 
                                            maxlength="100"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('cardapio.lanche_tarde') }}</div>
                                    </div>
                                    <div class="col-2">
                                        <label>Quantidade</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
                                    </div>        
                                    <div class="col-2">
                                        <label>Repetições</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
                                    </div>  
                                </div> 
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="janta">Janta</label>
                                        <input 
                                            type="text" 
                                            name="cardapio[janta]"
                                            class="form-control {{ $errors->has('cardapio.janta') ? 'is-invalid' : '' }}"
                                            value="{{ old('cardapio.janta') }}"
                                            placeholder="Ex: Arroz, feijão, frango desfiado e salada de alface e tomate..."
                                            maxlength="100"
                                        >
                                        <div class="invalid-feedback">{{ $errors->first('cardapio.janta') }}</div>
                                    </div>
                                    <div class="col-2">
                                        <label>Quantidade</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
                                    </div>        
                                    <div class="col-2">
                                        <label>Repetições</label>
                                        <input 
                                            type="number"
                                            class="form-control"
                                        >
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
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

@endsection
