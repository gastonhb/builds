@extends('layouts.baseCreate')

@section('form')
    <div class="row m-auto mb-2 text-start">
        <div class="col col-6">
            <label for="" class="form-label">Personaje:</label>
            <select id="character" name="character" class="form-select">
                <option selected disabled>Seleccione un personaje</option>
                @foreach($characters as $character)
                    <option value="{{ $character->id }}">{{ $character->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Set:</label>
            <select id="set" name="set" class="form-select">
                <option selected disabled>Seleccione un set</option>
                @foreach($sets as $set)
                    <option value="{{ $set->id }}">{{ $set->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-2">

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

@endsection
