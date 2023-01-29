@extends('layouts.baseIndex')

@section('extraContents')
<div>
    <a class="btn btn-primary" href="/characters/import">
        Importar
    </a>
</div>
@endsection

@section('tableHeaders')
    <th scope="col"></th>
    <th scope="col">Nombre</th>
    <th scope="col"></th>
@endsection

@section('tableBody')
    @foreach($elements as $element)
        <tr class="row-flex">
            <td class="col col-1">{{ $element->photo }}</td>
            <td class="col">{{ $element->name }}</td>
            @include('layouts.editAndDeletebuttons')
        </tr>
    @endforeach
@endsection
