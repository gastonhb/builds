<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Substat;

class SubstatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $substats = Substat::all();
        return view('substat.index')->with(['href' => 'substats', 'title' => 'Subestaditiscas', 'elements' => $substats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('substat.create')->with(['href' => 'substats', 'title' => 'Agregar subestadística']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $substat = new Substat();
        $substat->name = $request->get('name');

        $substat->save();
        return redirect('/substats');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $substat = Substat::find($id);
        return view('substat.show')->with('substat', $substat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $substat = Substat::find($id);
        return view('substat.edit')->with(['href' => 'substats', 'title' => 'Subestaditiscas', 'element' => $substat]);
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
        $substat = Substat::find($id);
        $substat->name = $request->get('name');

        $substat->save();
        return redirect('/substats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $substat = Substat::find($id);
        
        $substat->delete();
        return redirect('/substats');
    }
}
