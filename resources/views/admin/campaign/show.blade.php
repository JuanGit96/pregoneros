@php
    $pageHeader = "DATOS DE CAMPAÑA";
@endphp

@extends("admin.layout")

@section("admin_content")


    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle de campaña #{{$campaign->id}}</h1>
        </div>
        <p><b>Objetivo de la campaña:</b> {{$campaign->object}}</p>
        <p><b>Código de la campaña</b> {{$campaign->code}}</p>
        <p><b>Presupuesto de la campaña:</b> {{$campaign->budget}}</p>
        <p><b>alcance:</b> {{$campaign->scope}}</p>
        <p><b>Cliente asociado:</b> {{$campaign->client->razon_social}}</p>
        <p><b>Fecha de creación:</b> {{$campaign->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$campaign->updated_at}}</p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/campaigns')}}">Regresar al listado</a>
        </p>
    </div>


@stop