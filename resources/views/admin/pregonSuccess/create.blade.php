@php
    $pageHeader = "CREAR PREGON EXITOSO";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.pregonSuccess.partals.form')
        @slot('users', $users)
        @slot('pregons', $pregons)
        @slot('url', route('usuarioPregons.store'))
        @slot('action', "CREAR PREGON REALIZADO")
    @endcomponent

@stop