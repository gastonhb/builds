<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\ArtifactType;
use App\Models\ArtifactTypeStat;
use App\Models\Build;
use App\Models\BuildSubstat;
use App\Models\Character;
use App\Models\Set;
use App\Models\Stat;
use App\Models\Substat;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $builds = Build::with('character')
            ->with('set')
            ->with('flower')
            ->with('plume')
            ->with('sands')
            ->with('goblet')
            ->with('circlet')
            ->with('substats')
            ->get();

        return view('build.index')->with(['href' => 'builds', 'title' => 'Build', 'elements' => $builds]);
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

        return view('build.create')->with(['href' => 'builds', 'title' => 'Agregar build', 'characters' => $characters, 'sets' => $sets, 'flowerStats' => $flowerStats, 'plumeStats' => $plumeStats, 'sandsStats' => $sandsStats, 'gobletStats' => $gobletStats, 'circletStats' => $circletStats, 'flowerDefault' => $flowerDefault, 'plumeDefault' => $plumeDefault, 'sandsDefault' => $sandsDefault, 'gobletDefault' => $gobletDefault, 'circletDefault' => $circletDefault, 'substats' => $substats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $build = new Build();
            $build->character_id = $request->get('character');
            $build->set_id = $request->get('set1');
            $build->flower_id = $request->get('flower');
            $build->plume_id = $request->get('plume');
            $build->sands_id = $request->get('sands');
            $build->goblet_id = $request->get('goblet');
            $build->circlet_id = $request->get('circlet');
            $build->full = $request->boolean('full');

            $build->save();

            if (!$request->get('full')) {
                $build2 = new Build();
                $build2->character_id = $request->get('character');
                $build2->set_id = $request->get('set2');
                $build2->flower_id = $request->get('flower');
                $build2->plume_id = $request->get('plume');
                $build2->sands_id = $request->get('sands');
                $build2->goblet_id = $request->get('goblet');
                $build2->circlet_id = $request->get('circlet');
                $build2->full = $request->boolean('full');

                $build2->save();
                $build2->id;
            }

            $requestArray = $request->all();

            foreach ($requestArray as $key => $item) {
                if (Str::startsWith($key, 'substatId_')) {
                    $substatVar = explode('_', $key);
                    $substatId = $substatVar[1];
                    
                    $build1Substat = new BuildSubstat();
                    $build1Substat->build_id = $build->id;
                    $build1Substat->substat_id = $substatId;

                    $build1Substat->save();

                    if (!$request->get('full')) {
                        $build2Substat = new BuildSubstat();
                        $build2Substat->build_id = $build2->id;
                        $build2Substat->substat_id = $substatId;

                        $build2Substat->save();
                    }
                }
            }
        });
        
        return redirect('/builds');
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
        $build = Build::with('character')
            ->with('set')
            ->with('flower')
            ->with('plume')
            ->with('sands')
            ->with('goblet')
            ->with('circlet')
            ->with('substats')
            ->get()
            ->find($id);

        $buildSubstat = BuildSubstat::find($id);
        $characters = Character::all();
        $sets = Set::all();

        $flowerStats = (ArtifactType::with('stats')->where('name', '=', 'Flor')->first())->stats;
        $plumeStats = (ArtifactType::with('stats')->where('name', '=', 'Pluma')->first())->stats;
        $sandsStats = (ArtifactType::with('stats')->where('name', '=', 'Reloj')->first())->stats;
        $gobletStats = (ArtifactType::with('stats')->where('name', '=', 'Cáliz')->first())->stats;
        $circletStats = (ArtifactType::with('stats')->where('name', '=', 'Corona')->first())->stats;

        $substats = Substat::all();

        return view('build.edit')->with(['href' => 'builds', 'title' => 'Editar build', 'characters' => $characters, 'sets' => $sets, 'flowerStats' => $flowerStats, 'plumeStats' => $plumeStats, 'sandsStats' => $sandsStats, 'gobletStats' => $gobletStats, 'circletStats' => $circletStats, 'substats' => $substats, 'element' => $build]);
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
        DB::transaction(function () use ($request, $id){
            $build = Build::find($id);
            $build->character_id = $request->get('character');
            $build->set_id = $request->get('set');
            $build->flower_id = $request->get('flower');
            $build->plume_id = $request->get('plume');
            $build->sands_id = $request->get('sands');
            $build->goblet_id = $request->get('goblet');
            $build->circlet_id = $request->get('circlet');

            $build->save();

            $requestArray = $request->all();

            $substatsIds = collect([]);
            foreach ($requestArray as $key => $item) {
                if (Str::startsWith($key, 'substatId_')) {

                    $substatVar = explode('_', $key);
                    $substatId = $substatVar[1];

                    $substatsIds->push($substatId);

                    $buildSubstat = BuildSubstat::firstOrNew(
                        ['build_id' => $id ,
                        'substat_id' => $substatId]
                    );

                    $buildSubstat->save();
                }
            }

            foreach ($build->substats as $substat) {
                if (!$substatsIds->contains($substat->substat_id)) {
                    $buildSubstat = BuildSubstat::where('build_id', '=', $build->id)->where('substat_id', '=', $substat->substat_id)->first();
                    $buildSubstat->delete();
                }
            }
            $build->substats->contains('substat_id', $substat->id);
        });
        
       return redirect('/builds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $build = Build::find($id);
        $buildSubstats = BuildSubstat::where('build_id', '=', $id)->get();

        foreach ($buildSubstats as $buildSubstat) {
            $buildSubstatToDelete = BuildSubstat::find($buildSubstat->id);
            $buildSubstatToDelete->delete();
        }

        $build->delete();
        return redirect('/builds');
    }
}
