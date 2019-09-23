@extends('layouts.app')
@section('content')

    <style>
        footer{
            min-height: 317px;
        }
    </style>

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





<section class="bg-welcome min-height pt-3">
    <div class="container" style="margin-top: 112px;">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-error">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 text-left text-white">
                 <h1>Pregoneros es una plataforma que te acerca a la promociones de tus marcas preferidas</h1>
            </div>
            <div class="col-lg-6 text-center text-white imagen mt-4">
                <img src="{{asset('img/imagen.png')}}" alt="logo" class="logo-imagen">
            </div>
        </div>
    </div>
</section>
{{--<section>--}}
{{--    <div class="container margen">--}}
{{--        <div class="row mt-5 ">--}}
{{--            <div class="col-lg-12 text-center text-black">--}}
{{--                <h1> <strong>¿Uno de nuestros pregoneros te dio un código?</strong></h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row mt-5">--}}
{{--            <div class="col-lg-12 text-center text-white letra-redimelo">--}}
{{--               <a href="{{url('/redime')}}" role="button" class="btn btn-redimelo">Redímelo aquí</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
        
@endsection
