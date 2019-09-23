@extends('layouts.app')
@section('content')
<nav class="bg-welcome4 navbar navbar-expand-md navbar-light navbar-laravel"><div class="container">
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
<section class="bg-welcome4 pb-5">
    <div class="offset-md-2 pt-3 offset-1">
        <div class="row">
            <div class="col-lg-6 text-rigth text-white">
                 <h2 class="text-rigth mt-0">¿Qué es pregoneros?</h2>
                 <p><h3>Un canal publicitario que permite la difusión masiva de mensajes por medio del voz a voz (online y offline)</h3></p>
                 <p><h3>Logrando un seguimiento 24/7 mediante una </br> plataforma digital.</h3></p>

            </div>
            <div class="col-lg-4 text-rigth text-white imagen">
                <h4>Beneficios</h4>
                 <ul>
                      <li>Propagación exponencial de mensajes</li>
                      <li>No habla la marca, habla el usuario</li>
                      <li>Alcance donde la publicidad tradicional no llega</li>
                      <li>Medición del impacto</li>
                      <li>DATA demográfica</li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{--<section>--}}
    {{--<div class="container">--}}
        {{--<div class="text-center mt-5">--}}
            {{--<h1>Productos</h1>--}}
        {{--</div>--}}
        {{--<div class="row mt-5 text-center">--}}
            {{--<div class="col-sm-12 col-lg-6 col-md-6 center-block">--}}
              {{--<img src="{{asset('img/pregon1.png')}}" w-50 alt="" >--}}
              {{--<h4 class="pregon"><strong>Pregon Sales</strong></h4>--}}
              {{--<p class="text-center">Si tu objetivo es ventas.</p>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6">--}}
              {{--<img src="{{asset('img/pregon2.png')}}" alt="" >--}}
              {{--<h4 class="pregon"><strong>Pregon All Day</strong></h4>--}}
              {{--<p class="text-center">Si tu objetivo es posicionamiento.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
<section class="">
    <div class="container">
        <div class="row mt-5 pb-5">
          <!--   <div class="col-sm-6 col-sm-offset-1 mt-5"> -->
            <div class="col-md-8 text-rigth text-white mt-5">
                 <h1 class="pregon letra-proyecto"><strong>¿Tienes un proyecto en mente?</strong></h1>
            </div>
            <div class="col-md-4 text-left pregon mt-5">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form id="createcliente" action="{{route('interesados')}}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3">
                            <label class="form-control-label" for="text-input">Nombre:</label>
                        </div>
                        <div class="col-md-9 col-lg-9 col-md-12 col-sm-12">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Nombre" name="name"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                         <div class="col-lg-3 col-md-3">
                             <label class="form-control-label" for="text-input">Empresa:</label>
                         </div>
                        <div class="col-md-9 col-lg-9 col-md-12 col-sm-12">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Empresa" name="company"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                         <div class="col-lg-3 col-md-3">
                             <label class="form-control-label" for="text-input">Celular:</label>
                         </div>
                        <div class="col-md-9 col-lg-9 col-md-12 col-sm-12">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Celular" name="phone"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                         <div class="col-lg-3 col-md-3">
                             <label class="form-control-label" for="text-input">Correo:</label>
                         </div>
                        <div class="col-md-9 col-lg-9 col-md-12 col-sm-12">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Correo" name="email"
                          required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button style="background: #242729" type="submit" class="btn btn-redimeloform mt-2" id="submit">Enviar</button>
                    </div>
              </form>
            </div>
        </div>
    </div>
</section>
        
@endsection