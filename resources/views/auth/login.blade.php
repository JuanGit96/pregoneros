@extends('layouts.app')

@section('content')
<nav class="main-header navbar navbar-expand-md navbar-light navbar-laravel"><div class="container">
        <a class="navbar-brand p-0 " href="{{url('/')}}">
            <img src="{{asset('img/logo.png')}}" alt="" class="logo-welcome">
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler collapsed">
            <span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="navbar-collapse collapse" style="">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/trabaja')}}">Trabajo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/pauta')}}">Pauta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="bg-welcome banner-login">
    <div class="container login">
        <div class="row pt-5 pb-5 margen-login">
            <!-- <div class="col text-center">
                <img src="{{asset('img/logo.png')}}" alt="logo" width="50%" >
            </div> -->
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body pt-5">
                        @if ($errors->any())
                            @if($errors->first() == "Tú, como pregonero no puedes ingresar desde la web")
                                <div class="alert alert-warning">
                                    <ul>
                                        <li>{{ $errors->first() }}</li>
                                    </ul>
                                </div>
                            @endif
                        @endif
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Entrar') }}
                                    </button>
    
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
