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
        <input type="hidden" value="{{(isset($redention->id)?$redention->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control"
               id="name" name="name" value="{{(isset($redention->name)?$redention->name:old('name'))}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="lastName">Apellido</label>
        <input type="text" class="form-control"
               id="code" name="code" value="{{(isset($redention->code)?$redention->code:old('code'))}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="role_id">Rol</label>
        <select class="form-control" id="usuario_redime" name="usuario_redime">
            <option value="" {{(isset($redention->usuario_redime))?"":"selected"}}>sin usuario asociado</option>
            @foreach($users as $user)
                <option {{(!isset($redention->usuario_redime))?"":($redention->usuario_redime == $user->id)?"selected":""}}
                        value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/redentions')}}">Regresar al listado</a>
</form>