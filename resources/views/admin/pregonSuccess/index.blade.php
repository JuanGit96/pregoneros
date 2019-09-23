@php
    $pageHeader = "PANEL DE CONTROL - PREGON EXITOSO";
    $pathRoute = "usuarioPregons.";
@endphp

@extends("admin.layout")

@section("admin_content")

    @superadmin
    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nuevo Pregon Realizado
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

        <table class="table" id="pregonSuccessTable">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">pregon</th>
                <th scope="col">usuario</th>
                <th scope="col">nombre</th>
                <th scope="col">celular</th>
                <th scope="col">correo</th>
                <th scope="col">edad</th>
                <th scope="col">sexo</th>
                <th scope="col">donde lo conoce</th>
                <th scope="col">interesado</th>
                <th scope="col">¿Por qué?</th>
                <th scope="col">comentarios</th>
                <th scope="col">ubicacion</th>
                <th scope="col">aprobado</th>
                <th scope="col">tipo de pregón</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($pregonesSuccess as $pregonSuccess)
                <tr>
                    <th scope="row"> {{$pregonSuccess->id}}</th>
                    <td> {{$pregonSuccess->pregon->identificador_pregon}}</td>
                    <td> {{$pregonSuccess->user->name}}</td>
                    <td> {{$pregonSuccess->nombre}}</td>
                    <td> {{$pregonSuccess->celular}}</td>
                    <td> {{$pregonSuccess->email}}</td>
                    <td>{{$pregonSuccess->edad}}</td>
                    <td>{{($pregonSuccess->sexo == 1)?"Masculino":($pregonSuccess->sexo == 0)?"Femenino":"Otro"}}</td>
                    <td>{{$pregonSuccess->donde_lo_conoces}}</td>
                    <td>{{($pregonSuccess->interesado == 1)?"Si":"No"}}</td>
                    <td>{{$pregonSuccess->why}}</td>
                    <td>{{$pregonSuccess->comentarios}}</td>
                    <td>{{$pregonSuccess->ubicacion}}</td>
                    <td><i class="fa {{($pregonSuccess->approved == 1)?"fa-check text-green":"fa-close text-red"}} fa-3x"></i></td>
                    <td>{{($pregonSuccess->pregonType == 1)?"Online":"Presencial"}}</td>
                    <td> {{$pregonSuccess->created_at}}</td>
                    <td> {{$pregonSuccess->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$pregonSuccess->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$pregonSuccess->id}}"><span class="fa fa-eye"></span></a>
                            @superadmin
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $pregonSuccess->id)}}"><span class="fa fa-pencil"></span></a>
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
{{--            {{$pregonesSuccess->links()}}--}}
{{--        </div>--}}
    </div>

@stop

@section("scripts_afterpage")

    @parent

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#pregonSuccessTable').DataTable({
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