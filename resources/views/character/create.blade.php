@extends('layouts.baseCreate')

@section('form')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese un nombre">
</div>
<div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input type="text" name="photo" id="photo" class="form-control" placeholder="Ingrese un link">
</div>
@endsection