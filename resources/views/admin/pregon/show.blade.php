@php
    $pageHeader = "DETALLES DE PREGÓN";
@endphp

@extends("admin.layout")

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle de pregón #{{$pregon->id}}</h1>
        </div>
        <p><b>Identificador de pregón:</b> {{$pregon->identificador_pregon}}</p>
        <p><b>Código para redimir:</b> {{$pregon->codigo_redime}}</p>
        <p><b>Beneficio al redimir:</b> {{$pregon->beneficio_redime}}</p>
        <p><b>Objetivo:</b> {{$pregon->objetivo}}</p>
        <p><b>Pago:</b> {{$pregon->pago}}</p>
        <p><b>Fecha limite:</b> {{$pregon->fecha_limite}}</p>
        <p><b>Pregon:</b> {{$pregon->pregon}}</p>
        <p><b>Experiencia:</b> {{$pregon->experiencia}}</p>
        <p><b>Tipo de pregón:</b> {{$pregon->evidencia}}</p>
        <p><b>Campaña asociada:</b> {{$pregon->campaign->client->razon_social}} / {{$pregon->campaign->code}}</p>
        <p><b>Fecha de creación:</b> {{$pregon->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$pregon->updated_at}}</p>

        <p><b>Material de apoyo:</b></p>
        @if(isset($pregon->support_material))
            <div class="row">
                <a download="{{$pregon->support_material}}" title="material de apoyo" href="{{asset('storage/'.$pregon->campaign->client_id.'/'.$pregon->campaign_id.'/'.$pregon->id.'/support_material/'.$pregon->support_material)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @else
            <p><h5>NO hay material de apoyoasociado a este pregón</h5></p>
        @endif

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/pregons')}}">Regresar al listado</a>
        </p>
    </div>


@stop