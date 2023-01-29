<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtifactType;

class ArtifactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artifactTypes = ArtifactType::all();
        return view('artifactType.index')->with(['href' => 'artifact-types', 'title' => 'Tipos de artefactos', 'elements' => $artifactTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artifactType.create')->with(['href' => 'artifact-types', 'title' => 'Agregar tipo de artefacto']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artifactType = new ArtifactType();
        $artifactType->name = $request->get('name');

        $artifactType->save();
        return redirect('/artifact-types');
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
        return view('artifactType.show')->with(['href' => 'artifact-types', 'title' => 'Tipo de artefacto', 'artifactType' => $artifactType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artifactType = ArtifactType::find($id);
        return view('artifactType.edit')->with(['href' => 'artifact-types', 'title' => 'Editar tipo de artefacto', 'element' => $artifactType]);
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
        $artifactType = ArtifactType::find($id);
        $artifactType->name = $request->get('name');

        $artifactType->save();
        return redirect('/artifact-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artifactType = ArtifactType::find($id);
        
        $artifactType->delete();
        return redirect('/artifact-types');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats(Request $request)
    {
        $stats = ArtifactType::with('stats')->where('name', '=', $request->get('name'))->first();
        return $stats;
    }
}
