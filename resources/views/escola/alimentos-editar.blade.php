@extends('layouts.admin')

@section('content')
    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Editar alimento</h1>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success card text-center m-4 col-8">{{ session('message') }}</div>
                @endif

                <div class="card p-4 col-10">

                    <form action="{{ route('alimentos.salvar', $alimento->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="alimento">Nome do alimento</label>
                            <input type="text" id="alimento" name="alimento" class="form-control"
                                placeholder="Ex: Arroz, Feijão, Óleo" value="{{ $alimento->nome }}">
                            <datalist id="alimento">
                                <option value="Chocolate">
                                <option value="Coconut">
                                <option value="Mint">
                                <option value="Strawberry">
                                <option value="Vanilla">
                            </datalist>

                        </div>

                        <div class="form-group">
                            <label for="alimento">Unidade de medida</label>
                            <select id="unidade" name="unidade" class="form-control">
                                <option value="KG" {{ $alimento->unidade == 'KG' ? 'selected' : '' }}>Quilograma</option>
                                <option value="g" {{ $alimento->unidade == 'g' ? 'selected' : '' }}>Grama</option>
                                <option value="mg" {{ $alimento->unidade == 'mg' ? 'selected' : '' }}>Miligrama</option>
                                <option value="L" {{ $alimento->unidade == 'L' ? 'selected' : '' }}>Litro</option>
                                <option value="mL" {{ $alimento->unidade == 'mL' ? 'selected' : '' }}>Miliitro</option>
                            </select>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-center">
                            <input type="submit" value="Editar" class="btn btn-color letra px-4 w-25">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
