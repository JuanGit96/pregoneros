@extends('layouts.app')
@section('content')
<nav class="vista-redimelo navbar navbar-expand-md navbar-light navbar-laravel"><div class="container">
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
<section class="vista-redimelo">
    <div class="container color-redimelo">
        <div class="row">
            <div class="col-lg-6 text-left text-white">
                 <h1>Redime tu código</h1>
                <p><h2>Ayúdanos con los siguientes datos<br>para hacer efectivo tu código</h2></p>
            </div>
            <div class="col-lg-6 text-left text-white mt-5">
                    <form id="crearcliente" action="{{route('redimecdigo')}}" method="post">
                        @csrf
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Nombre:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Nombre" name="nombre"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Edad:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Edad" name="edad"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Celular:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Celular" name="celular"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Correo:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Correo" name="correo"
                          required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Código:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Código" name="codigo"
                          required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 form-control-label" for="text-input">¿Quién te dio el código?:</label>
                        <div class="col-md-6">
                            <input type="text" id="nit-input"  class="form-control" placeholder="Nombre y Apellido" name="propietario_codigo"
                                   required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                            <button type="submit" class="btn btn-redimeloform mt-2" id="submit"
                            {{--onclick="redimir('{{ route('crearcliente')}}')"--}}>Enviar</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</section>
        
@endsection