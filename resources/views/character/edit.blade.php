@extends('layouts.baseEdit')

@section('form')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $element->name }}" placeholder="Ingrese un nombre">
</div>
<div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input type="text" name="photo" id="photo" class="form-control" value="{{ $element->photo }}" placeholder="Ingrese un link">
</div>
@endsection