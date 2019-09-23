@extends('layouts.app')
@section('content')
    <style>

        @media (min-width: 768px) {
            .grid-container {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
                grid-template-rows: 1fr;
                grid-template-areas: ". . . . .";
            }

            .info-align {
                text-align: justify;
            }
        }

        @media (max-width: 425px) {
            .grid-container {
                display: grid;
                grid-template-rows: 1fr;
            }

            .info-align {
                text-align: center;
            }
        }

    </style>
<nav class="bg-welcome3 navbar navbar-expand-md navbar-light navbar-laravel"><div class="container">
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

<section class="bg-welcome3 pb-5">
    <div class="offset-md-2 pt-3 offset-1">
        <div class="row ">
            <div class="col-lg-6 text-rigth offset-sm-1 offset-md-0 text-white mt-4">
                 <h1 class="margen-trabaja">Trabaja con nosotros</h1>
                 <p><h3>Todos los dìas buscamos nuevos pregoneros</br>que se unan a nuestra familia</h3></p>
            </div>
            <div class="col-lg-4 offset-md-1 offset-sm-1 offset-md-0 text-rigth text-white imagen mt-4 ">
                 <p>Beneficios:</p>
                 <ul>
                      <li>Gana dinero hablando sobre marcas de tu preferencia a tu familia y amigos</li>
                      <li>Ni tus allegados ni tu, necesitan comprar algo Con el hecho de que hables de la marca, ya ganas dinero</li>
                      <li>No requieres de tiempo exclusivo para trabajar como pregonero Puedes hablar de las marcas en tu casa, trabajo, o donde sea que te encuentres</li>
                      <li>Sé el primero enterarte de nuevos productos y descuentos</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-4">
        <div class="text-center">
            <h1>¿Còmo funciona?</h1>
        </div>
        <div class="mt-5 text-center">
            <div class="grid-container">
                <div class="col-xs-12">
                    <img src="{{asset('img/Asignaciòn.png')}}" alt="" class="img-responsive center-block iconos-trabaja">
                    <h4 class="como-funciona text-center"><strong>1.Escoge el pregón</strong></h4>
                    <p class="container info-align">Te estaremos enviando distintos pregones a nuestra app de las marcas aliadas para que refieras a tus allegados las que más te gustan</p>
                </div>
                <div>
                    <img src="{{asset('img/capacitar.png')}}" alt="" class="img-responsive center-block iconos-trabaja">
                    <h4 class="como-funciona text-center"><strong>2.Experiencia</strong></h4>
                    <p class="container info-align">Te enviaremos una experiencia de marca para que conozcas sobre el producto o servicio a referir, esta puede ser desde leer un texto hasta probar el producto</p>
                </div>
                <div>
                    <img src="{{asset('img/Pregòn.png')}}" alt="" class="img-responsive center-block iconos-trabaja">
                    <h4 class="como-funciona text-center"><strong>3.Dar el pregón</strong></h4>
                    <p class="container info-align">Deberás contarle a la mayor cantidad de personas posibles sobre la marca</p>
                </div>
                <div>
                    <img src="{{asset('img/Checklist.png')}}" alt="" class="img-responsive center-block iconos-trabaja">
                    <h4 class="como-funciona text-center"><strong>4.Llenar formulario</strong></h4>
                    <p class="container info-align">Cada vez que le cuentes a alguien el pregón, deberás llenar un pequeño formulario sobre esta persona. Tranquilo, no te toma más de 2 minutos llenarlo</p>
                </div>
                <div>
                    <img src="{{asset('img/Pago.png')}}" alt="" class="img-responsive center-block iconos-trabaja">
                    <h4 class="como-funciona text-center"><strong>5.Pago</strong></h4>
                    <p class="container info-align">Te pagaremos por cada persona que refieras, acumula dinero y solicitalo en el momento que quieras.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="mt-4 pb-4 formulariopregon" >
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-lg-offset-1 mt-5">
                 <h1 class="como-funciona letra-empezar"><strong>¿Listo para empezar?</strong></h1>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 text-left como-funciona letra-from mt-5">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                    <form id="createpregonero" action="{{route('interesados')}}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Nombre:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Nombre" name="name"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Celular:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Teléfono" name="phone"
                          required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="text-input">Correo:</label>
                        <div class="col-md-9">
                          <input type="text" id="nit-input"  class="form-control" placeholder="Correo" name="email"
                          required>
                        </div>
                    </div>
                    <div class="form-group text-center">
                            <button type="submit" class="btn btn-redimeloform mt-2" id="submit">Enviar</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
</section>
        
@endsection