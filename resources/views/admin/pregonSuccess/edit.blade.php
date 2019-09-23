@php
    $pageHeader = "EDITAR PREGON EXITOSO";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.pregonSuccess.partals.form')
        @slot('users', $users)
        @slot('pregons', $pregons)
        @slot('pregonSuccess', $pregonSuccess)
        @slot('method', 'PUT')
        @slot('url', route('usuarioPregons.update',$pregonSuccess->id))
        @slot('action', "EDITAR PREGON REALIZADO")
        @slot('this_update', "true")
    @endcomponent

@stop

