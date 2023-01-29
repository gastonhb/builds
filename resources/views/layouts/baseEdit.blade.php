@extends('layouts.navbar')
@section('contents')
<div class="card">
    <div class="card-header">
        {{$title}}
    </div>
    <div class="card-body">
        <form action="/{{$href}}/{{ $element->id }}" method="post">
            @csrf
            @method('PUT')
            @yield('form')
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