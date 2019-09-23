@php
    $pageHeader = "CREAR EXPERIENCIA";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.experience.partals.form')
        @slot('users', $users)
        @slot('pregons', $pregons)
        @slot('url', route('experiences.store'))
        @slot('action', "CREAR EXPERIENCIA")
    @endcomponent

@stop