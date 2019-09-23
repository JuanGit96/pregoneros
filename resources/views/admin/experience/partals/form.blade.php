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
        <input type="hidden" value="{{(isset($experience->id)?$experience->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="user_id">Usuario relacionado</label>
        <select class="form-control" id="user_id" name="user_id">
            <option value="" {{(isset($experience->user_id))?"":"selected"}}>sin usuario relacionado</option>
            @foreach($users as $user)
                <option {{(!isset($experience->user_id))?"":($experience->user_id == $user->id)?"selected":""}}
                        value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="pregon_id">Pregon</label>
        <select class="form-control" id="pregon_id" name="pregon_id">
            <option value="" {{(isset($experience->pregon_id))?"":"selected"}}>sin pregón asociado</option>
            @foreach($pregons as $pregon)
                <option {{(!isset($experience->pregon_id))?"":($experience->pregon_id == $pregon->id)?"selected":""}}
                        value="{{$pregon->id}}">{{$pregon->identificador_pregon}} / {{$pregon->objetivo}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="opinion">¿Qué opinas del producto/servicio?</label>
        <input type="text" class="form-control"
               id="opinion" name="opinion" value="{{(isset($experience->opinion)?$experience->opinion:old('opinion'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="lo_comprarias">¿lo comprarias?</label>
        <select class="form-control" id="lo_comprarias" name="lo_comprarias">
            <option value="" {{(isset($experience->lo_comprarias))?"":"selected"}}>sin seleccionar</option>
            <option value="1" {{(!isset($experience->lo_comprarias))?"":($experience->lo_comprarias == true)?"selected":""}}>Si</option>
            <option value="0" {{(!isset($experience->lo_comprarias))?"":($experience->lo_comprarias == false)?"selected":""}}>No</option>
        </select>
    </div>


    <div class="form-group">
        <label for="why">¿Por qué?</label>
        <input type="text" class="form-control"
               id="why" name="why" value="{{(isset($experience->why)?$experience->why:old('why'))}}"
               placeholder="">
    </div>


    
    
    


    <div class="form-group">
        <label for="audio1">Audio #1</label>
        <input type="file" class="form-control" id="audio1" name="audio1" value="{{old('audio1')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($experience->audio1))
        <audio src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio1)}}" controls>
            <p>Lo sentimos tu navegador no soporta html5</p>
        </audio>
    @endif

    <div class="form-group">
        <label for="audio2">Audio #2</label>
        <input type="file" class="form-control" id="audio2" name="audio2" value="{{old('audio2')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($experience->audio2))
        <audio src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->audio2)}}" controls>
            <p>Lo sentimos tu navegador no soporta html5</p>
        </audio>
    @endif

    <div class="form-group">
        <label for="photo">Foto</label>
        <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($experience->photo))

        <img src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->photo)}}" >

    @endif

    <div class="form-group">
        <label for="video">Video</label>
        <input type="file" class="form-control" id="video" name="video" value="{{old('video')}}"
               aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if(isset($experience->video))

        <video src="{{asset('storage/'.$experience->pregon->campaign->client_id.'/'.$experience->pregon->campaign_id.'/'.$experience->pregon_id.'/'.$experience->user_id.'/'.$experience->video)}}" controls width="300"></video>

    @endif
    
    
    
    
    
    
    
    
    

    <div class="form-group">
        <label for="approved">Aprovado</label>
        <select class="form-control" id="approved" name="approved">
            <option value="" {{(isset($experience->approved))?"":"selected"}}>sin seleccionar</option>
            <option value="1" {{(!isset($experience->approved))?"":($experience->approved == true)?"selected":""}}>Si</option>
            <option value="0" {{(!isset($experience->approved))?"":($experience->approved == false)?"selected":""}}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/experiences')}}">Regresar al listado</a>
</form>