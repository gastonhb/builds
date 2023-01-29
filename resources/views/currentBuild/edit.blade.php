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
                <option selected value="{{ $element->flower->id }}">{{ $element->flower->stat->name }}</option>
                @foreach($flowerStats as $flowerStat)
                    @if( $flowerStat->pivot->id <> $element->flower->id)
                        <option value="{{ $flowerStat->pivot->id }}" @selected(old('flower') == $element->flower)>{{ $flowerStat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Pluma:</label>
            <select id="plume" name="plume" class="form-select">
                <option selected value="{{ $element->plume->id }}">{{ $element->plume->stat->name }}</option>
                @foreach($plumeStats as $plumeStat)
                    @if( $plumeStat->pivot->id <> $element->plume->id)
                        <option value="{{ $plumeStat->pivot->id }}" @selected(old('plume') == $element->plume)>{{ $plumeStat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Reloj:</label>
            <select id="sands" name="sands" class="form-select">
                <option selected value="{{ $element->sands->id }}">{{ $element->sands->stat->name }}</option>
                @foreach($sandsStats as $sandsStat)
                    @if( $sandsStat->pivot->id <> $element->sands->id)
                        <option value="{{ $sandsStat->pivot->id }}" @selected(old('sands') == $element->sands)>{{ $sandsStat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Cáliz:</label>
            <select id="goblet" name="goblet" class="form-select">
                <option selected value="{{ $element->goblet->id }}">{{ $element->goblet->stat->name }}</option>
                @foreach($gobletStats as $gobletStat)
                    @if( $gobletStat->pivot->id <> $element->goblet->id)
                        <option value="{{ $gobletStat->pivot->id }}" @selected(old('goblet') == $element->goblet)>{{ $gobletStat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col col-4 col-md-2 m-auto px-md-0">
            <label for="" class="form-label">Corona:</label>
            <select id="circlet" name="circlet" class="form-select">
                <option selected value="{{ $element->circlet->id }}">{{ $element->circlet->stat->name }}</option>
                @foreach($circletStats as $circletStat)
                    @if( $circletStat->pivot->id <> $element->circlet->id)
                        <option value="{{ $circletStat->pivot->id }}" @selected(old('circlet') == $element->circlet)>{{ $circletStat->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
@endsection
