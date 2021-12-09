@extends('layouts.admin')

@section('content')
    <div id="content">
        <!-- Main Content-->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4">Cadastrar alimentos</h1>
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success card text-center m-4 col-8">{{ session('message') }}</div>
                @endif

                <div class="card p-4 col-10">

                    <form action="{{ route('alimentos.cadastrar') }}" method="POST" id="formAlimentos">
                        @csrf
                        <div class="form-group">
                            <label for="alimento">Nome do alimento</label>
                            <input type="text" id="alimento" name="alimento" class="form-control"
                                placeholder="Ex: Arroz, Feijão, Óleo">
                        </div>

                        <div class="form-group">
                            <label for="alimento">Unidade de medida</label>
                            <select form="formAlimentos" id="unidade" name="unidade" class="form-control">
                                <option value="KG">Quilograma</option>
                                <option value="g">Grama</option>
                                <option value="mg">Miligrama</option>
                                <option value="L">Litro</option>
                                <option value="mL">Miliitro</option>
                            </select>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-center">
                            <input type="submit" value="Cadastrar" class="btn btn-success letra px-4 w-25">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
