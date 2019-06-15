@extends('layouts.app_login')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Novo Usuário - OS Reginas</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="id_tp_usuario" id="id_tp_usuario" value="2">
                        <fieldset>
                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Login">

                                @error('login')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="id_departamento" id="id_departamento" class="form-control">
                                    <option value="">Selecione um departamento...</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{$departamento->id_depto}}">{{$departamento->desc_depto}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Digite a senha novamente">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Registrar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
