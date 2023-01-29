<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtifactType;
use App\Models\Stat;

class ArtifactTypeStatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artifactTypes = ArtifactType::with('stats')->get();

        return view('artifactTypeStat.index')->with(['href' => 'artifact-type-stats', 'title' => 'Estaditicas de artefactos', 'elements' => $artifactTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($artifactTypeId)
    {
        $artifactType = ArtifactType::find($artifactTypeId);
        $stats = Stat::all();
        
        return view('artifactTypeStat.create')->with([ 'artifactType' => $artifactType, 'stats' => $stats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $artifactTypeId)
    {
        $artifactType = ArtifactType::find($artifactTypeId);

        $statId = $request->get('stat');
        $artifactTypeStat = $artifactType->stats()->attach($statId);

        return view('artifactType.show')->with(['href' => 'artifact-types', 'title' => 'Tipo de artefacto', 'artifactType' => $artifactType]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artifactType = ArtifactType::find($id);
        return view('artifactTypeStat.show')->with('artifactType', $artifactType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $artifactTypeId
     * @param  int  $statId
     * @return \Illuminate\Http\Response
     */
    public function edit($artifactTypeId, $statId)
    {
        $artifactType = ArtifactType::find($artifactTypeId);
        $stat = Stat::find($statId);

        $artifactTypes = ArtifactType::all();
        $stats = Stat::all();

        return view('artifactTypeStat.edit')->with(['href' => 'artifact-type-stats', 'title' => 'Editar estadistica de artefacto', 'selectedArtifactType' => $artifactType, 'artifactTypes' => $artifactTypes, 'selectedStat' => $stat, 'stats' => $stats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $artifactTypeId, $statId)
    {
        $artifactType = ArtifactType::find($artifactTypeId);
        $newStatId = $request->get('stat');

        if ($statId !== $newStatId) {
            $artifactType->stats()->detach($statId);
            $artifactType->stats()->attach($newStatId);
        }

        return view('artifactType.show')->with(['href' => 'artifact-types', 'title' => 'Tipo de artefacto', 'artifactType' => $artifactType]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $artifactTypeId
     * @param  int  $statId
     * @return \Illuminate\Http\Response
     */
    public function destroy($artifactTypeId, $statId)
    {
        $artifactType = ArtifactType::find($artifactTypeId);
        
        $artifactType->stats()->detach($statId);

        return view('artifactType.show')->with(['href' => 'artifact-types', 'title' => 'Tipo de artefacto', 'artifactType' => $artifactType]);
    }
}
