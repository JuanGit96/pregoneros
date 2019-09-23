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
        <input type="hidden" value="{{(isset($user->id)?$user->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control"
               id="name" name="name" value="{{(isset($user->name)?$user->name:old('name'))}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="lastName">Apellido</label>
        <input type="text" class="form-control"
               id="lastName" name="lastName" value="{{(isset($user->lastName)?$user->lastName:old('lastName'))}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control"
               id="email" name="email" value="{{(isset($user->email))?$user->email:old('email')}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="phone">Teléfono</label>
        <input type="number" class="form-control"
               id="phone" name="phone" value="{{(isset($user->phone)?$user->phone:old('phone'))}}"
               placeholder="">
    </div>
    <div class="form-group">
        <label for="role_id">Rol</label>
        <select class="form-control" id="role_id" name="role_id">
            <option value="" {{(isset($user->role_id))?"":"selected"}}>sin rol</option>
            @foreach($roles as $role)
                <option {{(!isset($user->role_id))?"":($user->role_id == $role->id)?"selected":""}}
                        value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="dateBirth">Fecha de nacimiento</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input value="{{(isset($user->dateBirth)?$user->dateBirth:old('dateBirth'))}}" type="date" name="dateBirth" class="form-control pull-right" id="datepicker">
        </div>
    </div>


    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmacion de Contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="">
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/users')}}">Regresar al listado</a>
</form>