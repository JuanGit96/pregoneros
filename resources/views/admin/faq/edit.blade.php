@php
    $pageHeader = "EDITAR PREGUNTA FRECUENTE";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.faq.partals.form')
        @slot('faq', $faq)
        @slot('method', 'PUT')
        @slot('url', route('faqs.update',$faq->id))
        @slot('action', "EDITAR PREGUNTA FRECUENTE")
        @slot('this_update', "true")
    @endcomponent

@stop