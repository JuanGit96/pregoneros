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
        <input type="hidden" value="{{(isset($faq->id)?$faq->id:"")}}" name="id">
    @endif

    <div class="form-group">
        <label for="pregunta">Pregunta</label>
        <input type="text" class="form-control"
               id="pregunta" name="pregunta" value="{{(isset($faq->pregunta)?$faq->pregunta:old('pregunta'))}}"
               placeholder="">
    </div>

    <div class="form-group">
        <label for="respuesta">Respuesta</label>
        <input type="text" class="form-control"
               id="respuesta" name="respuesta" value="{{(isset($faq->respuesta)?$faq->respuesta:old('respuesta'))}}"
               placeholder="">
    </div>

    <button type="submit" class="btn btn-primary">{{$action}}</button>
    <a class="btn btn-info" href="{{url('/admin/faqs')}}">Regresar al listado</a>
</form>