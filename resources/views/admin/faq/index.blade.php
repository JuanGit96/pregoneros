@php
    $pageHeader = "PANEL DE CONTROL - PREGUNTA FRECUENTE";
    $pathRoute = "faqs.";
@endphp

@extends("admin.layout")

@section("admin_content")

    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nueva pregunta frecuente
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
                <th scope="col">Pregunta</th>
                <th scope="col">Respuesta</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Fecha de edición</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($faqs as $faq)
                <tr>
                    <th scope="row"> {{$faq->id}}</th>
                    <td> {{$faq->pregunta}}</td>
                    <td> {{$faq->respuesta}}</td>
                    <td> {{$faq->created_at}}</td>
                    <td> {{$faq->updated_at}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$faq->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$faq->id}}"><span class="fa fa-eye"></span></a>
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $faq->id)}}"><span class="fa fa-pencil"></span></a>
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
            {{$faqs->links()}}
        </div>
    </div>

@stop