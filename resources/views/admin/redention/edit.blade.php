@php
    $pageHeader = "EDITAR REDENCIÓN"
@endphp

@extends("admin.layout")

@section("admin_content")


    @component('admin.redention.partals.form')
        @slot('redention', $redention)
        @slot('method', 'PUT')
        @slot('users', $users)
        @slot('url', route('redentions.update',$redention->id))
        @slot('action', "EDITAR REDENCION")
        @slot('this_update', "true")
    @endcomponent


@stop