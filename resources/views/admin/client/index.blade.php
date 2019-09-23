@php
    $pageHeader = "PANEL DE CONTROL - CLIENTE";
    $pathRoute = "clients.";
@endphp

@extends("admin.layout")

@section("admin_content")

    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nuevo cliente
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
                <th scope="col">Razón social</th>
                <th scope="col">Nit</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Web</th>
                <th scope="col">Indicativo</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($clients as $client)
                <tr>
                    <th scope="row"> {{$client->id}}</th>
                    <td> {{$client->razon_social}}</td>
                    <td> {{$client->nit}}</td>
                    <td> {{$client->email}}</td>
                    <td> {{$client->telefono}}</td>
                    <td> {{$client->web}}</td>
                    <td> {{$client->indicativo}}</td>
                    <td> {{$client->created_at}}</td>
                    <td> {{$client->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$client->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$client->id}}"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $client->id)}}"><span class="fa fa-pencil"></span></a>
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                        </form>
                        {{--Cambio de estado--}}
                        <form method="post" action="{{route('clients.update',$client->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" value="true" name="this_update">
                            <input type="hidden" value="true" name="moduleStatus">
                            <input type="hidden" value="{{(isset($client->id)?$client->id:"")}}" name="id">
                            <div class="form-group">
                                <input type="hidden" id="moduleStatus" name="moduleStatus" value="{{(!isset($client->moduleStatus))?"":($client->moduleStatus == true)?"0":"1"}}">
                                <button type="submit" class="btn btn-xs {{(!isset($client->moduleStatus))?"":($client->moduleStatus == true)?"btn-danger":"btn-success"}}">{{(!isset($client->moduleStatus))?"":($client->moduleStatus == true)?"OCULTAR CLIENTE":"MOSTRAR CLIENTE"}}</button>
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
            {{$clients->links()}}
        </div>
    </div>

@stop