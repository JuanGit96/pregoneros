@php
    $pageHeader = "DETALLES DE REDENCIÓN"
@endphp

@extends("admin.layout")

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del usuario #{{$redention->id}}</h1>
        </div>
        <p><b>¿Quien te dio el Código?: </b> {{$redention->name}}</p>
        <p><b>Código: </b> {{$redention->code}}</p>
        <p><b>Usuario asociado: </b> {{$redention->user->name." ".$redention->user->lastName}}</p>
        <p><b>Fecha de creación:</b> {{$redention->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$redention->updated_at}}</p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/redentions')}}">Regresar al listado</a>
        </p>
    </div>

@stop