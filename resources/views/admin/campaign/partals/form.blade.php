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
        <input type="hidden" value="{{(isset($campaign->id)?$campaign->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="object">Objectivo</label>
        <input type="text" class="form-control"
               id="object" name="object" value="{{(isset($campaign->object)?$campaign->object:old('object'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="code">Código identificativo</label>
        <input type="number" class="form-control"
               id="code" name="code" value="{{(isset($campaign->code))?$campaign->code:old('code')}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="budget">Presupuesto</label>
        <input type="number" class="form-control"
               id="budget" name="budget" value="{{(isset($campaign->budget)?$campaign->budget:old('budget'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="scope">Alcance</label>
        <input type="number" class="form-control"
               id="scope" name="scope" value="{{(isset($campaign->scope)?$campaign->scope:old('scope'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="client_id">Cliente</label>
        <select class="form-control" id="client_id" name="client_id">
            <option value="" {{(isset($campaign->client_id))?"":"selected"}}>sin cliente asociado</option>
            @foreach($clients as $client)
                <option {{(!isset($campaign->client_id))?"":($campaign->client_id == $client->id)?"selected":""}}
                        value="{{$client->id}}">{{$client->razon_social}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/campaigns')}}">Regresar al listado</a>
</form>