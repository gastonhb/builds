@extends('layouts.baseIndex')

@section('tableHeaders')
    <th scope="col" style="width:10%">Personaje</th>
    <th scope="col" style="width:25%">Set</th>
    <th scope="col" style="width:7%">Flor</th>
    <th scope="col" style="width:7%">Pluma</th>
    <th scope="col" style="width:7%">Reloj</th>
    <th scope="col" style="width:7%">Cáliz</th>
    <th scope="col" style="width:7%">Corona</th>
    <th scope="col" style="width:20%">Subestadísticas</th>
    <th scope="col" style="width:10%"></th>
@endsection

@section('tableBody')
    @foreach($elements as $element)
        <tr class="row-flex">
            <td style="width:10%">{{ $element->character->name }}</td>
            <td style="width:25%">{{ $element->set->name }}</td>
            <td style="width:7%">{{ $element->flower->stat->name }}</td>
            <td style="width:7%">{{ $element->plume->stat->name}}</td>
            <td style="width:7%">{{ $element->sands->stat->name }}</td>
            <td style="width:7%">{{ $element->goblet->stat->name }}</td>
            <td style="width:7%">{{ $element->circlet->stat->name }}</td>
            <td style="width:20%">
                @foreach($element->substats as $sub)
                    {{ $sub->substat->name }}
                @endforeach
            </td>
            @include('layouts.editAndDeletebuttons')
        </tr>
    @endforeach
@endsection
