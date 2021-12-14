@extends('layouts.admin')

@section('content')
    <!-- Main Content-->
    <div class="container-fluid mt-4">
        <div class="text-left">
            <h1 class="h2 text-gray-900 mb-4">Cadastar Usuários</h1>
        </div>

        @include('layouts._partials.return_message')

        <div class="card">
            <div class="card-body px-5">
                    <div class="pt-3 px-5">
                        <form method="POST" action="{{ route('secretaria.usuarios.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">{{ __('Nome de Usuário') }}</label>
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Escola</label>
                                <select class="form-control @error('escolas_id') is-invalid @enderror" id="escolas_id"
                                    name="escolas_id">
                                    <option value="">Selecione</option>
                                    @foreach ($escolas as $escola)
                                        <option class="option" value="{{ $escola->id }}">
                                            {{ $escola->nome }}</option>
                                    @endforeach
                                </select>

                                @error('escola_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" @if (array_key_exists('role', old()))
                                checked
                                @endif class="custom-control-input" id="userRole" name="role">
                                <label class="custom-control-label" for="userRole">Pertence a SEDUC</label>
                            </div>

                            <div class="form-group mt-4 d-flex justify-content-center">
                                <input type="submit" value="Cadastrar" class="btn btn-success px-4 py-2">
                            </div>
                        </form>
                    </div>

            

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/secretaria/users/register.js')}}"></script>
@endsection
