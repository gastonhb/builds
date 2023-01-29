<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
 
use App\Models\ArtifactType;
use App\Models\ArtifactTypeStat;
use App\Models\Build;
use App\Models\BuildSubstat;
use App\Models\Character;
use App\Models\CurrentBuild;
use App\Models\Set;
use App\Models\Stat;
use App\Models\Substat;

class CheckArtifactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sets = Set::all();
        $artifactTypes = ArtifactType::all();
        $artifactTypeDefault = ArtifactType::where('name', '=', 'Reloj')->first();
        $sandsStats = (ArtifactType::with('stats')->where('name', '=', 'Reloj')->first())->stats;
        $sandsDefault = Stat::where('name', '=', 'RE%')->first();
        $substats = Substat::all();

        /* $characters = Character::with('currentBuild')
            ->whereHas('set', function (Builder $query) {
                $query->where('name', '=', 'Cáscara de Sueños Opulentos');
            })->get(); */
        /* join('current_builds', 'characters.id', '=', 'current_builds.character_id')
            ->join('sets', 'sets.id', '=', 'current_builds.set_id')
            ->get(); 
            ('set.name', '=', 'Cáscara de Sueños Opulentos')->get();
            */
        

        return view('checkArtifact.index')->with(['href' => '/', 'title' => 'Comprobar artefactos', 'artifactTypes' => $artifactTypes, 'artifactTypeDefault' => $artifactTypeDefault, 'sets' => $sets, 'sandsStats' => $sandsStats, 'sandsDefault' => $sandsDefault, 'substats' => $substats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $set = $request->get('set');
        $stat = $request->get('stat');

        switch ($request->get('artifactType')) {
            case 'Flor':
                $artifactType = 'flower';
                break;
            case 'Pluma':
                $artifactType = 'plume';
                break;
            case 'Reloj':
                $artifactType = 'sands';
                break;
            case 'Cáliz':
                $artifactType = 'goblet';
                break;
            case 'Corona':
                $artifactType = 'circlet';
                break;
        }

        $builds = Build::with('character')
            ->with('set')
            ->with('substats')
            ->where('set_id', '=', $set)
            ->with([$artifactType => function ($query) use ($stat) {
                $query->where('stat_id', '=', $stat);
            }])
            ->get();

        return ['builds' => $builds, 'artifactType' => $artifactType];
    }
}
