@extends('layouts.baseEdit')

@section('form')
    <div class="row m-auto mb-2 text-start">
        <div class="col col-6">
            <label for="" class="form-label">Personaje:</label>
            <select id="character" name="character" class="form-select">
                <option selected value="{{ $element->character->id }}">{{ $element->character->name }}</option>
                @foreach($characters as $character)
                    @if($character->name <> $element->character->name)
                        <option value="{{ $character->id }}">{{ $character->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="" class="form-label">Set:</label>
            <select id="set" name="set" class="form-select" >
            <option selected value="{{ $element->set->id }}">{{ $element->set->name }}</option>
                @foreach($sets as $set)
                    @if($set->name <> $element->set->name)
                        <option value="{{ $set->id }}">{{ $set->name }}</option>
                    @endif
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
                    <option value="{{ $flowerStat->pivot->id }}" @selected(old('flower') == $element->flower)>{{ $flowerStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Pluma:</label>
            <select id="plume" name="plume" class="form-select">
                <option selected value="{{ $element->plume->id }}">{{ $element->plume->stat->name }}</option>
                @foreach($plumeStats as $plumeStat)
                    <option value="{{ $plumeStat->pivot->id }}" @selected(old('plume') == $element->plume)>{{ $plumeStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Reloj:</label>
            <select id="sands" name="sands" class="form-select">
                <option selected value="{{ $element->sands->id }}">{{ $element->sands->stat->name }}</option>
                @foreach($sandsStats as $sandsStat)
                    <option value="{{ $sandsStat->pivot->id }}" @selected(old('sands') == $element->sands)>{{ $sandsStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Cáliz:</label>
            <select id="goblet" name="goblet" class="form-select">
                <option selected value="{{ $element->goblet->id }}">{{ $element->goblet->stat->name }}</option>
                @foreach($gobletStats as $gobletStat)
                    <option value="{{ $gobletStat->pivot->id }}" @selected(old('goblet') == $element->goblet)>{{ $gobletStat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Corona:</label>
            <select id="circlet" name="circlet" class="form-select">
                <option selected value="{{ $element->circlet->id }}">{{ $element->circlet->stat->name }}</option>
                @foreach($circletStats as $circletStat)
                    <option value="{{ $circletStat->pivot->id }}" @selected(old('circlet') == $element->circlet)>{{ $circletStat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <hr class="mt-4 mb-2">
    <h5>Subestadísticas</h5>
    <div class="row m-auto mb-2">
        @foreach($substats as $substat)
            <div class="col col-3 col-md-2 col-lg-1 col-xl-1 form-check form-check-inline m-auto mb-2">
                @if($element->substats->contains('substat_id', $substat->id))
                    <input class="form-check-input" type="checkbox" id="{{'substatId' . $substat->id}}" name="{{'substatId_' . $substat->id}}" checked>
                @else
                    <input class="form-check-input" type="checkbox" id="{{'substatId' . $substat->id}}" name="{{'substatId_' . $substat->id}}">
                @endif
                <label class="form-check-label" for="{{$substat->name}}">
                    {{$substat->name}}
                </label>
            </div>
        @endforeach
    </div>
@endsection
