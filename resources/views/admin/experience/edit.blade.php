@php
    $pageHeader = "EDITAR EXPERIENCIA";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.experience.partals.form')
        @slot('users', $users)
        @slot('pregons', $pregons)
        @slot('experience', $experience)
        @slot('method', 'PUT')
        @slot('url', route('experiences.update',$experience->id))
        @slot('action', "EDITAR EXPERIENCIA")
        @slot('this_update', "true")
    @endcomponent

@stop