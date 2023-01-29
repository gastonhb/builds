@extends('layouts.baseIndex')

@section('tableHeaders')
    <th scope="col">Tipo de artefacto</th>
    <th scope="col">Estadística</th>
    <th scope="col"></th>
@endsection

@section('tableBody')
    @foreach($elements as $element)
        @foreach($element->stats as $stat)
            {{$element}}
            <tr class="row-flex">
                <td class="col">{{ $element->name }}</td>
                <td class="col">{{ $stat->id }}</td>
                @include('layouts.editAndDeletebuttons')
            </tr>
        @endforeach
    @endforeach
@endsection
