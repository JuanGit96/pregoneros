@php
    $pageHeader = "EDITAR PREGÓN";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.pregon.partals.form')
        @slot('pregon', $pregon)
        @slot('method', 'PUT')
        @slot('url', route('pregons.update',$pregon->id))
        @slot('action', "EDITAR PREGÓN")
        @slot('campaigns', $campaigns)
        @slot('this_update', "true")
    @endcomponent

@stop


@section("scripts_afterpage")

    @parent


@stop