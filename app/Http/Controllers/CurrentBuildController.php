<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ArtifactType;
use App\Models\ArtifactTypeStat;
use App\Models\Build;
use App\Models\BuildSubstat;
use App\Models\Character;
use App\Models\CurrentBuild;
use App\Models\Set;
use App\Models\Stat;
use App\Models\Substat;

class CurrentBuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentsBuilds = CurrentBuild::with('character')
            ->with('set')
            ->with('flower')
            ->with('plume')
            ->with('sands')
            ->with('goblet')
            ->with('circlet')
            ->get();

        return view('currentBuild.index')->with(['href' => 'current-builds', 'title' => 'Artefactos actuales', 'elements' => $currentsBuilds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characters = Character::all();
        $sets = Set::all();

        $flowerStats = (ArtifactType::with('stats')->where('name', '=', 'Flor')->first())->stats;
        $plumeStats = (ArtifactType::with('stats')->where('name', '=', 'Pluma')->first())->stats;
        $sandsStats = (ArtifactType::with('stats')->where('name', '=', 'Reloj')->first())->stats;
        $gobletStats = (ArtifactType::with('stats')->where('name', '=', 'Cáliz')->first())->stats;
        $circletStats = (ArtifactType::with('stats')->where('name', '=', 'Corona')->first())->stats;

        $flowerDefault = Stat::where('name', '=', 'VIDA')->first();
        $plumeDefault = Stat::where('name', '=', 'ATQ')->first();
        $sandsDefault = Stat::where('name', '=', 'RE%')->first();
        $gobletDefault = Stat::where('name', '=', 'ATQ%')->first();
        $circletDefault = Stat::where('name', '=', 'PC%')->first();

        $substats = Substat::all();

        return view('currentBuild.create')->with(['href' => 'current-builds', 'title' => 'Agregar build actual', 'characters' => $characters, 'sets' => $sets, 'flowerStats' => $flowerStats, 'plumeStats' => $plumeStats, 'sandsStats' => $sandsStats, 'gobletStats' => $gobletStats, 'circletStats' => $circletStats, 'flowerDefault' => $flowerDefault, 'plumeDefault' => $plumeDefault, 'sandsDefault' => $sandsDefault, 'gobletDefault' => $gobletDefault, 'circletDefault' => $circletDefault, 'substats' => $substats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentBuild = new CurrentBuild();
        $currentBuild->character_id = $request->get('character');
        $currentBuild->set_id = $request->get('set');
        $currentBuild->flower_id = $request->get('flower');
        $currentBuild->plume_id = $request->get('plume');
        $currentBuild->sands_id = $request->get('sands');
        $currentBuild->goblet_id = $request->get('goblet');
        $currentBuild->circlet_id = $request->get('circlet');

        $currentBuild->save();
        
        return redirect('/current-builds');
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
        $currentBuild = CurrentBuild::with('character')
            ->with('set')
            ->with('flower')
            ->with('plume')
            ->with('sands')
            ->with('goblet')
            ->with('circlet')
            ->find($id);

        $characters = Character::all();
        $sets = Set::all();

        $flowerStats = (ArtifactType::with('stats')->where('name', '=', 'Flor')->first())->stats;
        $plumeStats = (ArtifactType::with('stats')->where('name', '=', 'Pluma')->first())->stats;
        $sandsStats = (ArtifactType::with('stats')->where('name', '=', 'Reloj')->first())->stats;
        $gobletStats = (ArtifactType::with('stats')->where('name', '=', 'Cáliz')->first())->stats;
        $circletStats = (ArtifactType::with('stats')->where('name', '=', 'Corona')->first())->stats;

        $substats = Substat::all();

        return view('currentBuild.edit')->with(['href' => 'current-builds', 'title' => 'Editar build actual', 'characters' => $characters, 'sets' => $sets, 'flowerStats' => $flowerStats, 'plumeStats' => $plumeStats, 'sandsStats' => $sandsStats, 'gobletStats' => $gobletStats, 'circletStats' => $circletStats, 'substats' => $substats, 'element' => $currentBuild]);

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
        $currentBuild = CurrentBuild::find($id);
        $currentBuild->character_id = $request->get('character');
        $currentBuild->set_id = $request->get('set');
        $currentBuild->flower_id = $request->get('flower');
        $currentBuild->plume_id = $request->get('plume');
        $currentBuild->sands_id = $request->get('sands');
        $currentBuild->goblet_id = $request->get('goblet');
        $currentBuild->circlet_id = $request->get('circlet');

        $currentBuild->save();

        
       return redirect('/current-builds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentBuild = CurrentBuild::find($id);
        $currentBuild->delete();

        return redirect('/current-builds');
    }
}
