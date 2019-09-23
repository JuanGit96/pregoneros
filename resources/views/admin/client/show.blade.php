@php
    $pageHeader = "DATOS DEL CLIENTE";
@endphp

@extends("admin.layout")

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del cliente #{{$client->id}}</h1>
        </div>
        <p><b>Nombre del usuario:</b> {{$client->razon_social}}</p>
        <p><b>e-mail del Usuario</b> {{$client->nit}}</p>
        <p><b>Apellido del Usuario:</b> {{$client->lastName}}</p>
        <p><b>Fecha de nacimiento del Usuario:</b> {{$client->email}}</p>
        <p><b>Teléfono del Usuario:</b> {{$client->telefono}}</p>
        <p><b>rol del Usuario:</b> {{$client->web}}</p>
        <p><b>Fecha de creación:</b> {{$client->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$client->updated_at}}</p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/clients')}}">Regresar al listado</a>
        </p>
    </div>


@stop