@php
    $pageHeader = "PANEL DE CONTROL - REDENCIONES";
    $pathRoute = "redentions.";
@endphp

@extends("admin.layout")

@section("admin_content")

    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nueva Redencion
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
                <th scope="col">Código</th>
                <th scope="col">Usuario que redime</th>
                <th scope="col">Pregonero asociado</th>
                <th scope="col">Checklist asociado</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($redentions as $redention)
                <tr>
                    <th scope="row"> {{$redention->id}}</th>
                    <td> {{$redention->code}}</td>
                    <td><a href="{{route('users.index')}}/{{$redention->usuario_redime}}">{{$redention->user->name." ".$redention->user->lastName}}</a></td>
                    @if($redention->pregonero != null)
                        <td> <a href="{{route('users.index')}}/{{$redention->pregonero_id}}">{{$redention->pregonero->name." ".$redention->pregonero->lastName}}</a></td>
                    @else
                        @if($redention->usuarioPregon != null)
                            <td> <a href="{{route('users.index')}}/{{$redention->usuarioPregon->user_id}}">{{$redention->usuarioPregon->user->name." ".$redention->usuarioPregon->user->lastName}}</a></td>
                        @else
                            <td>--</td>
                        @endif

                    @endif

                    @if($redention->usuarioPregon != null)
                        <td><a href="{{route('usuarioPregons.index')}}/{{$redention->checklist_id}}">Checklist No. {{$redention->checklist_id}}</a></td>
                    @else
                        <td> --</td>
                    @endif
                    <td> {{$redention->created_at}}</td>
                    <td> {{$redention->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$redention->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$redention->id}}"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $redention->id)}}"><span class="fa fa-pencil"></span></a>
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @empty
                <h3 class="alert alert-danger text-center">Noy Hay registros Aún</h3>
            @endforelse
        </table>
        {{--Paginación--}}
        <div class="center-block">
            {{$redentions->links()}}
        </div>
    </div>


@stop