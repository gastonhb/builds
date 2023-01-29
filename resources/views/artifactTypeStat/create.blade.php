@extends('layouts.navbar')
@section('contents')
<div class="card">
    <div class="card-header">
        Agregar estadística de artefacto
    </div>
    <div class="card-body">
        <form action="/artifact-types/{{ $artifactType->id }}/stats" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Estadística</label>
                <select id="stat" name="stat" class="form-select">
                    <option selected>Seleccione una estadística</option>
                    @foreach($stats as $stat)
                        <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-12 mx-auto d-flex justify-content-end mb-2">
                <div class="me-3" style="width: 90px">
                    <a href="/artifact-types/{{ $artifactType->id }}" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="me-3" style="width: 90px">
                    <button class="btn btn-primary" type="submit" name="save" id="save">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
