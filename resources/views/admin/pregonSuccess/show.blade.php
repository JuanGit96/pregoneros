@php
    $pageHeader = "DETALLES DE PREGON EXITOSO";
@endphp

@extends("admin.layout")

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del usuario #{{$pregonSuccess->id}}</h1>
        </div>
        <p><b>Pregon asociado:</b> {{$pregonSuccess->pregon->identificador_pregon}}</p>
        <p><b>Usuario pregonero:</b> {{$pregonSuccess->user->name}}</p>
        <p><b>Nombre:</b> {{$pregonSuccess->nombre}}</p>
        <p><b>Celular:</b> {{$pregonSuccess->celular}}</p>
        <p><b>Correo electrónico:</b> {{$pregonSuccess->email}}</p>
        <p><b>Edad:</b> {{$pregonSuccess->edad}}</p>
        <p><b>Sexo:</b> {{($pregonSuccess->sexo == 0)?"Femenino":($pregonSuccess->sexo == 1)?"Masculino":"Otro"}}</p>
        <p><b>¿Donde lo conoces?:</b> {{$pregonSuccess->donde_lo_conoces}}</p>
        <p><b>¿Interesado?:</b> {{($pregonSuccess->interesado == 1)?"Si":"No"}}</p>
        <p><b>¿Por qué?:</b> {{$pregonSuccess->why}}</p>
        <p><b>comentarios:</b> {{$pregonSuccess->comentarios}}</p>
        <p><b>Ubcacion:</b> {{$pregonSuccess->ubicacion}}</p>
        <p><b>Tipo de pregón:</b> {{($pregonSuccess->pregonType == 2)?"Presencial":"Online"}}</p>
        <p><b>Fecha de creación:</b> {{$pregonSuccess->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$pregonSuccess->updated_at}}</p>
        <p><b>Foto:</b></p>
        @if(isset($pregonSuccess->photo))

            <img width="327px" src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->photo)}}" >
            <div class="row">
                <a download="foto" title="foto" href="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->photo)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>Audio1:</b></p>
        @if(isset($pregonSuccess->audio1))
            <audio src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio1)}}" controls>
                <p>Lo sentimos tu navegador no soporta html5</p>
            </audio>
            <div class="row">
                <a download="audio1" title="audio1" href="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio1)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>Audio2:</b></p>
        @if(isset($pregonSuccess->audio2))
            <audio src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio2)}}" controls>
                <p>Lo sentimos tu navegador no soporta html5</p>
            </audio>
            <div class="row">
                <a download="audio2" title="audio2" href="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio2)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>video:</b></p>
        @if(isset($pregonSuccess->video))

            <video src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->video)}}" controls width="327px"></video>
            <div class="row">
                <a download="video" title="video" href="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->video)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>aprobado:</b> <i class="fa {{($pregonSuccess->approved == 1)?"fa-check text-green":"fa-close text-red"}} fa-3x"></i></p>

        <form method="post" action="{{route('usuarioPregons.update',$pregonSuccess->id)}}">
        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="true" name="this_update">
            <input type="hidden" value="{{(isset($pregonSuccess->id)?$pregonSuccess->id:"")}}" name="id">
            <div class="form-group">
                <input type="hidden" id="approved" name="approved" value="{{(!isset($pregonSuccess->approved))?"":($pregonSuccess->approved == true)?"0":"1"}}">
                <button type="submit" class="btn {{(!isset($pregonSuccess->approved))?"":($pregonSuccess->approved == true)?"btn-danger":"btn-success"}}">{{(!isset($pregonSuccess->approved))?"":($pregonSuccess->approved == true)?"DESAPROBAR PREGON":"APROBAR PREGON"}}</button>
            </div>
        </form>



        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/usuarioPregons')}}">Regresar al listado</a>
        </p>
    </div>


@stop