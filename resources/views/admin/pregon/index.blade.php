@php
    $pageHeader = "PANEL DE CONTROL - PREGÓN";
    $pathRoute = "pregons.";
@endphp

@extends("admin.layout")

@section("admin_content")

    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nuevo Pregon
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
                <th scope="col">Identificador</th>
                <th scope="col">objetivo</th>
                <th scope="col">pago</th>
                <th scope="col">fecha limite</th>
                <th scope="col">objetivo de campaña</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($pregons as $pregon)
                <tr>
                    <th scope="row"> {{$pregon->id}}</th>
                    <td> {{$pregon->identificador_pregon}}</td>
                    <td> {{$pregon->objetivo}}</td>
                    <td>{{$pregon->pago}}</td>
                    <td>{{$pregon->fecha_limite}}</td>
                    <td>{{$pregon->campaign->object}}</td>
                    <td> {{$pregon->created_at}}</td>
                    <td> {{$pregon->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$pregon->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$pregon->id}}"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $pregon->id)}}"><span class="fa fa-pencil"></span></a>
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                        </form>
                        {{--Cambio de estado--}}
                        <form method="post" action="{{route($pathRoute.'update',$pregon->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" value="true" name="this_update">
                            <input type="hidden" value="true" name="moduleStatus">
                            <input type="hidden" value="{{(isset($pregon->id)?$pregon->id:"")}}" name="id">
                            <div class="form-group">
                                <input type="hidden" id="moduleStatus" name="moduleStatus" value="{{(!isset($pregon->moduleStatus))?"":($pregon->moduleStatus == true)?"0":"1"}}">
                                <button type="submit" class="btn btn-xs {{(!isset($pregon->moduleStatus))?"":($pregon->moduleStatus == true)?"btn-danger":"btn-success"}}">{{(!isset($pregon->moduleStatus))?"":($pregon->moduleStatus == true)?"OCULTAR PREGÓN":"MOSTRAR PREGÓN"}}</button>
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
            {{$pregons->links()}}
        </div>
    </div>

@stop