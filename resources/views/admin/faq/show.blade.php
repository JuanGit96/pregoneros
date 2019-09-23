@php
    $pageHeader = "DETALLES PREGUNTA FRECUENTE";
@endphp

@extends("admin.layout")

@section("admin_content")


    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del usuario #{{$faq->id}}</h1>
        </div>
        <p><b>Pregunta frecuente:</b> {{$faq->pregunta}}</p>
        <p><b>Respuesta:</b> {{$faq->respuesta}}</p>
        <p><b>Fecha de creación:</b> {{$faq->created_at}}</p>
        <p><b>Fecha de edición:</b> {{$faq->updated_at}}</p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/faqs')}}">Regresar al listado</a>
        </p>
    </div>


@stop