@php
    $pageHeader = "DATOS DE LA EXPERIENCIA";
@endphp

@extends("admin.layout")

@section("admin_content")


    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle de la experiencia #{{$experience->id}}</h1>
        </div>
        <p><b>Pregon asociado:</b> {{$experience->pregon->identificador_pregon}}</p>
        <p><b>Usuario pregonero:</b> {{$experience->user->name}}</p>
        <p><b>opinion:</b> {{$experience->opinion}}</p>
        <p><b>¿lo comprarias?:</b> {{($experience->lo_comprarias == 1)?"Si":"No"}}</p>
        <p><b>¿Por que?:</b> {{$experience->why}}</p>

        <p><b>Imagen:</b></p>

        @if(isset($experience->photo))

            <img src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->photo)}}" >
            <div class="row">
                <a download="foto" title="foto" href="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->photo)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
            

        @endif
        <p><b>Audio1:</b></p>
        @if(isset($experience->audio1))
            <audio src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio1)}}" controls>
                <p>Lo sentimos tu navegador no soporta html5</p>
            </audio>
            <div class="row">
                <a download="audio1" title="audio1" href="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio1)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>Audio2:</b></p>
        @if(isset($experience->audio2))
            <audio src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio2)}}" controls>
                <p>Lo sentimos tu navegador no soporta html5</p>
            </audio>
            <div class="row">
                <a download="audio2" title="audio2" href="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio2)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif
        <p><b>video:</b></p>
        @if(isset($experience->video))

            <video src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->video)}}" controls width="300"></video>
            <div class="row">
                <a download="video" title="video" href="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->video)}}"><i class="fa fa-download fa-3x"></i></a>
            </div>
        @endif

        <p><b>Fecha de creación:</b> {{$experience->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$experience->updated_at}}</p>
        
        
        <p><b>aprobado:</b> <i class="fa {{($experience->approved == 1)?"fa-check text-green":"fa-close text-red"}} fa-3x"></i></p>



        <form method="post" action="{{route('experiences.update',$experience->id)}}">
        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="true" name="this_update">
            <input type="hidden" value="{{(isset($experience->id)?$experience->id:"")}}" name="id">
            <div class="form-group">
                <input type="hidden" id="approved" name="approved" value="{{(!isset($experience->approved))?"":($experience->approved == true)?"0":"1"}}">
                <button type="submit" class="btn {{(!isset($experience->approved))?"":($experience->approved == true)?"btn-danger":"btn-success"}}">{{(!isset($experience->approved))?"":($experience->approved == true)?"DESAPROBAR EXPERIENCIA":"APROBAR EXPERIENCIA"}}</button>
            </div>
        </form>


        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/experiences')}}">Regresar al listado</a>
        </p>
    </div>


@stop
