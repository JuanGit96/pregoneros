@php
    $pageHeader = "PANEL DE CONTROL - CAMPAÑAS";
    $pathRoute = "campaigns.";
@endphp

@extends("admin.layout")

@section("admin_content")

    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nueva campaña
        <i class="fa fa-plus-circle"></i>
        </a>
    </p>
    
    <div class="box box-default table-responsive">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Objetivo</th>
                <th scope="col">Código</th>
                <th scope="col">Presupuesto</th>
                <th scope="col">Alcance (Personas)</th>
                <th scope="col">Cliente asociado</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($campaigns as $campaign)
                <tr>
                    <th scope="row"> {{$campaign->id}}</th>
                    <td> {{$campaign->object}}</td>
                    <td> {{$campaign->code}}</td>
                    <td> {{$campaign->budget}}</td>
                    <td> {{$campaign->scope}}</td>
                    <td> {{$campaign->client->razon_social}}</td>
                    <td> {{$campaign->created_at}}</td>
                    <td> {{$campaign->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$campaign->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$campaign->id}}"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $campaign->id)}}"><span class="fa fa-pencil"></span></a>
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                        </form>
                        {{--Cambio de estado--}}
                        <form method="post" action="{{route('campaigns.update',$campaign->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" value="true" name="this_update">
                            <input type="hidden" value="true" name="moduleStatus">
                            <input type="hidden" value="{{(isset($campaign->id)?$campaign->id:"")}}" name="id">
                            <div class="form-group">
                                <input type="hidden" id="moduleStatus" name="moduleStatus" value="{{(!isset($campaign->moduleStatus))?"":($campaign->moduleStatus == true)?"0":"1"}}">
                                <button type="submit" class="btn btn-xs {{(!isset($campaign->moduleStatus))?"":($campaign->moduleStatus == true)?"btn-danger":"btn-success"}}">{{(!isset($campaign->moduleStatus))?"":($campaign->moduleStatus == true)?"OCULTARCAMPAÑA":"MOSTRAR CAMPAÑA"}}</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <h3 class="alert alert-danger text-center">Noy Hay registros Aún</h3>
            @endforelse
        </table>
        {{--Paginación--}}
        <div class="center-block">
            {{$campaigns->links()}}
        </div>
    </div>


@stop