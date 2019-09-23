@php
    $pageHeader = "CREAR CLIENTE";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.client.partals.form')
        @slot('url', route('clients.store'))
        @slot('action', "CREAR CLIENTE")
    @endcomponent

@stop