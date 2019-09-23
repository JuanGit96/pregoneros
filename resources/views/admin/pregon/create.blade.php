@php
    $pageHeader = "CREAR PREGÓN";
@endphp

@extends("admin.layout")

@section("admin_content")

    @component('admin.pregon.partals.form')
        @slot('url', route('pregons.store'))
        @slot('campaigns', $campaigns)
        @slot('action', "CREAR PREGÓN")
        @slot('this_update', "false")
    @endcomponent

@stop

@section("scripts_afterpage")

    @parent

    <script>
        $("#campaign_id").change(function () {
            var campaignid = $(this).val();

            var url = "{{route('capturecodepregon','%campaing%')}}";
            url = url.replace('%campaing%',campaignid);

            $.ajax({
                url : url,
                type : "GET",
                success : function (data) {
                    $("#identificador_pregon").val(data.identificador);
                }
            });
        });
    </script>
@stop