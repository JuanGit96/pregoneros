@php
    $pageHeader = "CREAR PREGUNTA FRECUENTE";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.faq.partals.form')
        @slot('url', route('faqs.store'))
        @slot('action', "CREAR PREGUNTA FRECUENTE")
    @endcomponent

@stop