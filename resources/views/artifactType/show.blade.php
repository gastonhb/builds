@extends('layouts.navbar')
@section('contents')

<div class="card">
    <div class="card-header position-relative">
       {{$title}}
        <a href="/artifact-types/{{ $artifactType->id }}/stats/create" class="btn btn-danger waves-effect rounded-circle position-absolute top-100 end-0 translate-middle">
            <i class="fa-sharp fa-solid fa-plus text-white"></i>
        </a>
    </div>
    <div class="card-body">
        <p><b>Tipo de artefacto: </b> {{ $artifactType->name }}</p>
        <p><b>Estadísticas</b></p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($artifactType->stats as $stat)
                    <tr class="row-flex">
                        <td class="col">{{ $stat->name }}</td>
                        <td class="col text-end">
                            <a href="/artifact-types/{{ $artifactType->id }}/stats/{{ $stat->id }}/edit" class="btn px-2">
                                <i class="fa-solid fa-pen text-body-tertiary"></i>
                            </a>
                            <form action="{{ route ('artifact-types.stats.destroy', [$artifactType, $stat]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="fa-solid fa-trash text-body-tertiary"></i>
                                </button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
