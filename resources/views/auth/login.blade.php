@extends('layouts.app_login')
@section('content')
    <div class="row">
        <div class="text-center">
            <img src="{{asset('img/reginas_brasao.png')}}" alt="Logo da Reginas">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="height: 100pspx;">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login - OS Reginas</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input id="login" type="login" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Login">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            <!-- Change this to a button or input when using this as a form -->
                            <br>
                            <a href="{{route('register')}}">Novo Usuário?</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
