@php
$pageHeader = "CREAR REDENCIÓN"
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.redention.partals.form')
        @slot('url', route('redentions.store'))
        @slot('users', $users)
        @slot('action', "CREAR REDENCION")
    @endcomponent

@stop