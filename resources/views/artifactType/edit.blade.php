@extends('layouts.baseEdit')

@section('form')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $element->name }}" placeholder="Ingrese un nombre">
</div>
@endsection