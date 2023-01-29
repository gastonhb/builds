@extends('layouts.navbar')
@section('contents')
<div class="card">
    <div class="card-header">
        Agregar estadistica principal
    </div>
    <div class="card-body">
        <form action="/stats" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese un nombre">
            </div>

            <div class="col col-12 mx-auto d-flex justify-content-end mb-2">
                <div class="me-3" style="width: 90px">
                    <a href="/stats" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="me-3" style="width: 90px">
                    <button class="btn btn-primary" type="submit" name="save" id="save">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection