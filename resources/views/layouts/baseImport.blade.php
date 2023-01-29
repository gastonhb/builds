@extends('layouts.navbar')
@section('contents')
<div class="card">
    <div class="card-header">
        {{$title}}
    </div>
    <div class="card-body">
        <form action="/{{$href}}-upload" method="post">
            @csrf
            @yield('form')
            <div class="row mb-3">
                <div class="col col-12">
                    <label for="file" id="fileLbl" name="fileLbl" class="form-label"><b>Seleccione un archivo</b></label>
                    <input class="form-control" type="file" id="file" name="file" accept="csv, xlsx">
                </div>
            </div>
            <div class="col col-12 mx-auto d-flex justify-content-end mb-2">
                <div class="me-3" style="width: 90px">
                    <a href="/{{$href}}" class="btn btn-secondary">Cancelar</a>
                </div>
                <div class="me-3" style="width: 90px">
                    <button class="btn btn-primary" type="submit" name="save" id="save">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection