@extends('layouts.baseIndex')

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
