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
        <input type="hidden" value="{{(isset($client->id)?$client->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="razon_social">Nombre de empresa</label>
        <input type="text" class="form-control"
               id="razon_social" name="razon_social" value="{{(isset($client->razon_social)?$client->razon_social:old('razon_social'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control"
               id="email" name="email" value="{{(isset($client->email))?$client->email:old('email')}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="nit">Nit</label>
        <input type="text" class="form-control"
               id="nit" name="nit" value="{{(isset($client->nit)?$client->nit:old('nit'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control"
               id="telefono" name="telefono" value="{{(isset($client->telefono)?$client->telefono:old('telefono'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="indicativo">Indicativo de empresa (Código unico)</label>
        <input type="text" class="form-control"
               id="indicativo" name="indicativo" value="{{(isset($client->indicativo)?$client->indicativo:old('indicativo'))}}"
               placeholder="">
    </div>


    <div class="form-group">
        <label for="web">Pagina web</label>
        <input type="text" class="form-control"
               id="web" name="web" value="{{(isset($client->web)?$client->web:old('web'))}}"
               placeholder="">
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/clients')}}">Regresar al listado</a>
</form>