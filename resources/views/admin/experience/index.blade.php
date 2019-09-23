@php
    $pageHeader = "PANEL DE CONTROL - EXPERIENCIA";
    $pathRoute = "experiences.";
@endphp

@extends("admin.layout")

@section("admin_content")

    @superadmin
    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nueva Respuesta a experiencia
            <i class="fa fa-plus-circle"></i>

        </a>
    </p>
    @endsuperadmin

    <div class="box box-default table-responsive">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table" id="experiencesTable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Pregon</th>
                <th scope="col">opinion</th>
                <th scope="col">¿lo comprarias?</th>
                <th scope="col">¿Por que?</th>
                <th scope="col">aprobado</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($experiences as $experience)
                <tr>
                    <th scope="row"> {{$experience->id}}</th>
                    <td> {{$experience->user->name}}</td>
                    <td> {{$experience->pregon->identificador_pregon}}</td>
                    <td> {{$experience->opinion}}</td>
                    <td> {{($experience->lo_comprarias == 1)?"Si":"No"}}</td>
                    <td> {{$experience->why}}</td>
                    <td><i class="fa {{($experience->approved == 1)?"fa-check text-green":"fa-close text-red"}} fa-3x"></i></td>
                    <td> {{$experience->created_at}}</td>
                    <td> {{$experience->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$experience->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$experience->id}}"><span class="fa fa-eye"></span></a>
                            @superadmin
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $experience->id)}}"><span class="fa fa-pencil"></span></a>
                            @endsuperadmin
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @empty
                <h3 class="alert alert-danger text-center">Noy Hay registros Aún</h3>
            @endforelse
        </table>
        {{--Paginación--}}
{{--        <div class="center-block">--}}
{{--            {{$experiences->links()}}--}}
{{--        </div>--}}
    </div>

@stop

@section("scripts_afterpage")

    @parent

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#experiencesTable').DataTable({
                //"info": false,
                //"paging": false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ pregones realizados",
                    "zeroRecords": "Lo sentimos. No se encontraron registros.",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros aún.",
                    "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                    "search" : "Buscar :",
                    "LoadingRecords": "Cargando ...",
                    "Processing": "Procesando...",
                    "SearchPlaceholder": "Comience a teclear...",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                    }

                }
            });
        } );
    </script>
@stop