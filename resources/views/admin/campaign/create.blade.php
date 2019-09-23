@php
    $pageHeader = "CREAR CAMPAÑA";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.campaign.partals.form')
        @slot('url', route('campaigns.store'))
        @slot('clients', $clients)
        @slot('action', "CREAR CAMPAÑA")
    @endcomponent

@stop