@extends('layouts.baseCreate')

@section('form')
    <div class="row m-auto mb-2">
        <div class="col col-6">
            <label for="" class="form-label">Personaje:</label>
            <select id="character" name="character" class="form-select">
                <option selected disabled>Seleccione un personaje</option>
                @foreach($characters as $character)
                    <option value="{{ $character->id }}">{{ $character->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-2">
    <h5>Set de artefactos</h5>
    <div class="row m-auto mb-2">
        <div class="col form-check ms-3">
            <input class="form-check-input" type="checkbox" id="full" name="full" checked onClick="toggleSelect()">
            <label class="form-check-label" for="full">
                Es full (4 artefactos del mismo set).
            </label>
        </div>
    </div>

    <div class="row m-auto mb-2 text-start">
        <div class="col">
            <label for="" class="form-label">Primer set:</label>
            <select id="set1" name="set1" class="form-select">
                <option selected disabled>Seleccione un set</option>
                @foreach($sets as $set)
                    <option value="{{ $set->id }}">{{ $set->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Segundo set:</label>
            <select id="set2" name="set2" class="form-select" >
                <option selected disabled>Seleccione un set</option>
                @foreach($sets as $set)
                    <option value="{{ $set->id }}">{{ $set->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-2">
    <h5>Estadísticas</h5>
    <div class="row m-auto mb-2">
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Flor:</label>
            <select id="flower" name="flower" class="form-select">
                @foreach($flowerStats as $flowerStat)
                    <option value="{{ $flowerStat->pivot->id }}" @selected(old('flower') == $flowerDefault)>{{ $flowerStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Pluma:</label>
            <select id="plume" name="plume" class="form-select">
                @foreach($plumeStats as $plumeStat)
                    <option value="{{ $plumeStat->pivot->id }}" @selected(old('plume') == $plumeDefault)>{{ $plumeStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Reloj:</label>
            <select id="sands" name="sands" class="form-select">
                @foreach($sandsStats as $sandsStat)
                    <option value="{{ $sandsStat->pivot->id }}" @selected(old('sands') == $sandsDefault)>{{ $sandsStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Cáliz:</label>
            <select id="goblet" name="goblet" class="form-select">
                @foreach($gobletStats as $gobletStat)
                    <option value="{{ $gobletStat->pivot->id }}" @selected(old('goblet') == $gobletDefault)>{{ $gobletStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Corona:</label>
            <select id="circlet" name="circlet" class="form-select">
                @foreach($circletStats as $circletStat)
                    <option value="{{ $circletStat->pivot->id }}" @selected(old('circlet') == $circletDefault)>{{ $circletStat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-2">
    <h5>Subestadísticas</h5>
    <div class="row m-auto mb-2">
        @foreach($substats as $substat)
            <div class="col col-3 col-md-2 col-lg-1 col-xl-1 form-check form-check-inline m-auto mb-2">
                <input class="form-check-input" type="checkbox" id="{{'substatId' . $substat->id}}" name="{{'substatId_' . $substat->id}}">
                <label class="form-check-label" for="{{$substat->name}}">
                    {{$substat->name}}
                </label>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        window.onload = toggleSelect();
        function toggleSelect()
        {
            let isChecked = document.getElementById("full").checked;
            document.getElementById("set2").disabled = isChecked;
        }
    </script>
@endsection