@extends('layouts.app')

<nav class="main-header navbar navbar-expand-md navbar-light navbar-laravel"><div class="container">
        <a class="navbar-brand p-0 " href="{{url('/')}}">
            <img src="{{asset('img/logo.png')}}" alt="" class="logo-welcome">
        </a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler collapsed">
            <span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="navbar-collapse collapse" style="">
            <ul class="navbar-nav mr-auto">

            </ul>
            {{----}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/trabaja')}}">Trabajo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/pauta')}}">Pauta</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                    </li>
                    {{--    <li class="nav-item">--}}
                    {{--        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--    </li>--}}
                @else
                    <li class="nav-item dropdown" style="list-style: none">
                        <a style="width: 200%" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="color: black !important;" class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <a style="color: black !important;" class="dropdown-item" href="{{ url('home') }}">
                                {{ __('Administrador') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
            {{----}}
        </div>
    </div>
</nav>



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
