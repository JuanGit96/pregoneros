@php
    $pageHeader = "EDITAR CLIENTE";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.client.partals.form')
        @slot('client', $client)
        @slot('method', 'PUT')
        @slot('url', route('clients.update',$client->id))
        @slot('action', "EDITAR CLIENTE")
        @slot('this_update', "true")
    @endcomponent

@stop