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
<form method="post" action="{{$url}}">
{{ csrf_field() }}<!--Protección de ataques laravel(token)-->

    <input name="_method" type="hidden" value="{{(isset($method)?$method:"post")}}">

    @if(isset($this_update))
        <input type="hidden" value="true" name="this_update">
        <input type="hidden" value="{{(isset($pregonSuccess->id)?$pregonSuccess->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="pregon_id">Pregon</label>
        <select class="form-control" id="pregon_id" name="pregon_id">
            <option value="" {{(isset($pregonSuccess->pregon_id))?"":"selected"}}>sin pregón asociado</option>
            @foreach($pregons as $pregon)
                <option {{(!isset($pregonSuccess->pregon_id))?"":($pregonSuccess->pregon_id == $pregon->id)?"selected":""}}
                        value="{{$pregon->id}}">{{$pregon->identificador_pregon}} / {{$pregon->objetivo}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="user_id">Usuario</label>
        <select class="form-control" id="user_id" name="user_id">
            <option value="" {{(isset($pregonSuccess->user_id))?"":"selected"}}>sin usuario asociado</option>
            @foreach($users as $user)
                <option {{(!isset($pregonSuccess->user_id))?"":($pregonSuccess->user_id == $user->id)?"selected":""}}
                        value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="nombre">Nombre completo</label>
        <input type="text" class="form-control"
               id="nombre" name="nombre" value="{{(isset($pregonSuccess->nombre)?$pregonSuccess->nombre:old('nombre'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="codigo_redime">Código para redimir</label>
        <input type="text" class="form-control"
               id="codigo_redime" name="codigo_redime" value="{{(isset($pregonSuccess->codigo_redime)?$pregonSuccess->codigo_redime:old('codigo_redime'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="celular">Celular</label>
        <input type="number" class="form-control"
               id="celular" name="celular" value="{{(isset($pregonSuccess->celular)?$pregonSuccess->celular:old('celular'))}}"
               placeholder="">
    </div>


    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control"
               id="email" name="email" value="{{(isset($pregonSuccess->email)?$pregonSuccess->email:old('email'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="number" class="form-control"
               id="edad" name="edad" value="{{(isset($pregonSuccess->edad)?$pregonSuccess->edad:old('edad'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="sexo">Sexo</label>
        <select class="form-control" id="sexo" name="sexo">
            <option value="" {{(isset($pregonSuccess->sexo))?"":"selected"}}>sin seleccionar</option>
            <option value="1" {{(!isset($pregonSuccess->sexo))?"":($pregonSuccess->sexo == 1)?"selected":""}}>Masculino</option>
            <option value="0" {{(!isset($pregonSuccess->sexo))?"":($pregonSuccess->sexo == 0)?"selected":""}}>Femenino</option>
            <option value="2" {{(!isset($pregonSuccess->sexo))?"":($pregonSuccess->sexo == 2)?"selected":""}}>Otro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="donde_lo_conoces">¿Donde lo conces?</label>
        <select class="form-control" id="donde_lo_conoces" name="donde_lo_conoces">
            <option value="" {{(isset($pregonSuccess->donde_lo_conoces))?"":"selected"}}>sin seleccionar</option>
            <option value="Familiar que vive conmigo" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Familiar que vive conmigo")?"selected":""}}>Familiar que vive conmigo</option>
            <option value="Familiar que no vive conmigo" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Familiar que no vive conmigo")?"selected":""}}>Familiar que no vive conmigo</option>
            <option value="Amigo cercano" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Amigo cercano")?"selected":""}}>Amigo cercano</option>
            <option value="Compañero de trabajo / universidad" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Compañero de trabajo / universidad")?"selected":""}}>Compañero de trabajo / universidad</option>
            <option value="Primera vez que hablo con esta persona" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Primera vez que hablo con esta persona")?"selected":""}}>Primera vez que hablo con esta persona</option>
            <option value="Otro" {{(!isset($pregonSuccess->donde_lo_conoces))?"":($pregonSuccess->donde_lo_conoces == "Otro")?"selected":""}}>Otro</option>
        </select>
    </div>

    <div class="form-group">
        <label for="interesado">¿Interesado?</label>
        <select class="form-control" id="interesado" name="interesado">
            <option value="" {{(isset($pregonSuccess->interesado))?"":"selected"}}>sin seleccionar</option>
            <option value="1" {{(!isset($pregonSuccess->interesado))?"":($pregonSuccess->interesado == true)?"selected":""}}>Si</option>
            <option value="0" {{(!isset($pregonSuccess->interesado))?"":($pregonSuccess->interesado == false)?"selected":""}}>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="why">¿Por qué?</label>
        <input type="text" class="form-control"
               id="why" name="why" value="{{(isset($pregonSuccess->why)?$pregonSuccess->why:old('why'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="comentarios">Comentarios</label>
        <input type="text" class="form-control"
               id="comentarios" name="comentarios" value="{{(isset($pregonSuccess->comentarios)?$pregonSuccess->comentarios:old('comentarios'))}}"
               placeholder="">
    </div>

    @if(isset($this_update) && $this_update)
        <div id="map_content" class="form-group" style="pointer-events: none">
    @else
        <div id="map_content" class="form-group">
    @endif
        <label for="ubicacion">Direccion</label>
        <input autocomplete="on" type="text" class="form-control" id="ubicacion" name="ubicacion"
               value="{{(isset($pregonSuccess->ubicacion)?$pregonSuccess->ubicacion:old('ubicacion'))}}"
               aria-describedby="addressHelp" placeholder="Selecciona en el mapa (Recomendado)">
        <div id="map"
             style="width:100%;
        height: 300px;">
        </div>

        <input type="hidden" name="latitud" id="latitud" title="latitud" value="{{(isset($pregonSuccess->latitud)?$pregonSuccess->latitud:old('latitud'))}}">
        <input type="hidden" name="longitud" id="longitud" title="longitud" value="{{(isset($pregonSuccess->longtud)?$pregonSuccess->longtud:old('longtud'))}}">
    </div>

    <div class="form-group">
        <label for="audio1">Audio #1</label>
        <input type="file" class="form-control" id="audio1" name="audio1" value="{{old('audio1')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($pregonSuccess->audio1))
        <audio src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio1)}}" controls>
            <p>Lo sentimos tu navegador no soporta html5</p>
        </audio>
    @endif

    <div class="form-group">
        <label for="audio2">Audio #2</label>
        <input type="file" class="form-control" id="audio2" name="audio2" value="{{old('audio2')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($pregonSuccess->audio2))
        <audio src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->audio2)}}" controls>
            <p>Lo sentimos tu navegador no soporta html5</p>
        </audio>
    @endif

    <div class="form-group">
        <label for="photo">Foto</label>
        <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($pregonSuccess->photo))

        <img width="327px" src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->photo)}}" >

    @endif

    <div class="form-group">
        <label for="video">Video</label>
        <input type="file" class="form-control" id="video" name="video" value="{{old('video')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($pregonSuccess->video))

        <video src="{{asset('storage/'.$pregonSuccess->pregon->campaign->client_id.'/'.$pregonSuccess->pregon->campaign_id.'/'.$pregonSuccess->pregon_id.'/'.$pregonSuccess->user_id.'/'.$pregonSuccess->video)}}" controls width="327px"></video>

    @endif


    <div class="form-group">
        <label for="approved">Aprovado</label>
        <select class="form-control" id="approved" name="approved">
            <option value="" {{(isset($pregonSuccess->approved))?"":"selected"}}>sin seleccionar</option>
            <option value="1" {{(!isset($pregonSuccess->approved))?"":($pregonSuccess->approved == true)?"selected":""}}>Si</option>
            <option value="0" {{(!isset($pregonSuccess->approved))?"":($pregonSuccess->approved == false)?"selected":""}}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/usuarioPregons')}}">Regresar al listado</a>
</form>

@section('scripts_afterpage')
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script src="{{asset('js/map.js')}}"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA70fslcm8mwK6ZSGPOc_S0SNaAn74G_6Y&callback=initMap&libraries=places">
    </script>
@endsection

