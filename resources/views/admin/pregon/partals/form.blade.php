@if($errors->any())<!--Si tenemos algun error-->
<div class="alert alert-danger">
    <h5>Porfavor corrige los errores</h5>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" id="pregonform" action="{{$url}}" enctype="multipart/form-data">
{{ csrf_field() }}<!--Protección de ataques laravel(token)-->

    <input name="_method" type="hidden" value="{{(isset($method)?$method:"post")}}">

    @if(isset($this_update) && $this_update == "true")
        <input type="hidden" value="true" name="this_update">
        <input type="hidden" value="{{(isset($pregon->id)?$pregon->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="identificador_pregon">Identificador de pregon</label>
        <input type="text" class="form-control" readonly
               id="identificador_pregon" name="identificador_pregon"
               value="{{(isset($pregon->identificador_pregon)?$pregon->identificador_pregon:"")}}"
               placeholder="">
    </div>

{{--    <div class="form-group">--}}
{{--        <label for="codigo_redime">Código para redimir</label>--}}
{{--        <input type="text" class="form-control"--}}
{{--               id="codigo_redime" name="codigo_redime" value="{{(isset($pregon->codigo_redime)?$pregon->codigo_redime:old('codigo_redime'))}}"--}}
{{--               placeholder="">--}}
{{--    </div>--}}


    <div class="form-group">
        <label for="beneficio_redime">Beneficio al redimir</label>
        <textarea class="form-control" rows="5" id="beneficio_redime" name="beneficio_redime"
                  placeholder="">{{(isset($pregon->beneficio_redime)?$pregon->beneficio_redime:old('beneficio_redime'))}}</textarea>
    </div>
    <div class="form-group">
        <label for="objetivo">Objetivo</label>
        <input type="text" class="form-control"
               id="objetivo" name="objetivo" value="{{(isset($pregon->objetivo))?$pregon->objetivo:old('objetivo')}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="pago">Pago</label>
        <textarea class="form-control" rows="5" id="pago" name="pago"
                  placeholder="">{{(isset($pregon->pago)?$pregon->pago:old('pago'))}}</textarea>
    </div>

    <div class="form-group">
        <label for="campaign_id">Campaña asociada</label>
        <select class="form-control" id="campaign_id" name="campaign_id">
            <option value="" {{(isset($pregon->campaign_id))?"":"selected"}}>sin campaña asociada</option>
            @foreach($campaigns as $campaign)
                <option {{(!isset($pregon->campaign_id))?"":($pregon->campaign_id == $campaign->id)?"selected":""}}
                        value="{{$campaign->id}}">{{$campaign->client->razon_social}} / {{$campaign->code}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha_limite">Fecha de limite</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input value="{{(isset($pregon->fecha_limite)?$pregon->fecha_limite:old('fecha_limite'))}}"
                   type="date" name="fecha_limite" class="form-control pull-right" id="datepicker">
        </div>
    </div>

    <div class="form-group">
        <label for="pregon">Pregon</label>
        <textarea class="form-control" rows="5" id="pregon" name="pregon"
                  placeholder="">{{(isset($pregon->pregon)?$pregon->pregon:old('pregon'))}}</textarea>
    </div>

    <div class="form-group">
        <label for="experiencia">Experiencia</label>
        <textarea class="form-control" rows="5" id="experiencia" name="experiencia"
                  placeholder="">{{(isset($pregon->experiencia)?$pregon->experiencia:old('experiencia'))}}</textarea>
    </div>

    <div class="form-group">
        <label for="evidencia">Tipo de pregón</label>
        <textarea class="form-control" rows="5" id="evidencia" name="evidencia"
                  placeholder="">{{(isset($pregon->evidencia)?$pregon->evidencia:old('evidencia'))}}</textarea>
    </div>

    <div class="form-group">
        <label for="support_material">Material de apoyo</label>
        <input type="file" class="form-control"
               id="support_material" name="support_material">
    </div>

    @if(isset($pregon->support_material))
        <div class="row">
            <a download="matrial de apoyo" title="material de apoyo" href="{{asset('storage/'.$pregon->campaign->client_id.'/'.$pregon->campaign_id.'/'.$pregon->id.'/support_material/'.$pregon->support_material)}}"><i class="fa fa-download fa-3x"></i></a>
        </div>
    @endif

    <div class="alert alert-info">
        <i class="fa fa-info-circle"></i>
        Porfavor selecciona que elementos multimedia necesitas que el pregonero envie como evidencia <b>(Maximo dos campos)</b>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input class="checkaudio" type="checkbox" name="check_audio">
                Audio
            </label>
        </div>

        <div class="checkbox ">
            <label>
                <input class="checkvideo" type="checkbox" name="check_video">
                Video
            </label>
        </div>

        <div class="checkbox ">
            <label>
                <input class="checkfoto" type="checkbox" name="check_foto">
                Foto
            </label>
        </div>
    </div>

    <button type="submit" class="submitbutton btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/pregons')}}">Regresar al listado</a>
</form>

@section("scripts_afterpage")
    @parent
    <script>

       $("#pregonform").submit(function (e) {

           var elementos = 0;

           if( $('.checkaudio').prop('checked') ) {
               elementos = elementos+1;
           }

           if( $('.checkvideo').prop('checked') ) {
               elementos = elementos+1;
           }

           if( $('.checkfoto').prop('checked') ) {
               elementos = elementos+1;
           }

           if (elementos >= 3)
           {
               alert("porfavor no seleccione mas de dos elementos");
               e.preventDefault(); // Cancel the submit
               return false;
           }

           if ("{{$this_update}}" === "false")
           {
               if (elementos <= 0)
               {
                   alert("porfavor seleccione al menos un campo en evidencia");
                   e.preventDefault(); // Cancel the submit
                   return false;
               }
           }

       });
    </script>
@show