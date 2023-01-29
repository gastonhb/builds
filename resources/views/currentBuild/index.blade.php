@extends('layouts.baseIndex')

@section('tableHeaders')
    <th scope="col" style="width:10%">Personaje</th>
    <th scope="col" style="width:25%">Set</th>
    <th scope="col" style="width:11%">Flor</th>
    <th scope="col" style="width:11%">Pluma</th>
    <th scope="col" style="width:11%">Reloj</th>
    <th scope="col" style="width:11%">Cáliz</th>
    <th scope="col" style="width:11%">Corona</th>
    <th scope="col" style="width:10%"></th>
@endsection

@section('tableBody')
    @foreach($elements as $element)
        <tr class="row-flex">
            <td style="width:10%">{{ $element->character->name }}</td>
            <td style="width:25%">{{ $element->set->name }}</td>
            <td style="width:11%">{{ $element->flower->stat->name }}</td>
            <td style="width:11%">{{ $element->plume->stat->name}}</td>
            <td style="width:11%">{{ $element->sands->stat->name }}</td>
            <td style="width:11%">{{ $element->goblet->stat->name }}</td>
            <td style="width:11%">{{ $element->circlet->stat->name }}</td>
            @include('layouts.editAndDeletebuttons')
        </tr>
    @endforeach
@endsection
