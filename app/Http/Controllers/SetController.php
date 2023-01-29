<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sets = Set::all();
        return view('set.index')->with(['href' => 'sets', 'title' => 'Set de artefactos', 'elements' => $sets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('set.create')->with(['href' => 'sets', 'title' => 'Agregar set de artefactos']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $set = new Set();
        $set->name = $request->get('name');
        $set->photo = $request->get('photo');

        $set->save();
        return redirect('/sets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $set = Set::find($id);
        return view('set.show')->with('set', $set);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $set = Set::find($id);
        return view('set.edit')->with(['href' => 'sets', 'title' => 'Editar set de artefactos', 'element' => $set]);
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
        $set = Set::find($id);
        $set->name = $request->get('name');
        $set->photo = $request->get('photo');

        $set->save();
        return redirect('/sets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $set = Set::find($id);
        
        $set->delete();
        return redirect('/sets');
    }
}
