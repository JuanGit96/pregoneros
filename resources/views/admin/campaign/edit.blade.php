@php
    $pageHeader = "EDITAR CAMPAÑA";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.campaign.partals.form')
        @slot('campaign', $campaign)
        @slot('method', 'PUT')
        @slot('url', route('campaigns.update',$campaign->id))
        @slot('action', "EDITAR CAMPAÑA")
        @slot('this_update', "true")
        @slot('clients', $clients)
    @endcomponent

@stop