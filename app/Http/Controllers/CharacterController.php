<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Excel;
use App\Imports\CharacterImport;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        return view('character.index')->with(['href' => 'characters', 'title' => 'Personajes', 'elements' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character.create')->with(['href' => 'characters', 'title' => 'Agregar personaje']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character = new Character();
        $character->name = $request->get('name');
        $character->photo = $request->get('photo');

        $character->save();
        return redirect('/characters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Character::find($id);
        return view('character.show')->with('character', $character);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);
        return view('character.edit')->with(['href' => 'characters', 'title' => 'Editar personaje', 'element' => $character]);
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
        $character = Character::find($id);
        $character->name = $request->get('name');
        $character->photo = $request->get('photo');

        $character->save();
        return redirect('/characters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);
        
        $character->delete();
        return redirect('/characters');
    }

    /**
     * Import of excel
     *
     * @return \Illuminate\Http\Response
     */
    public function import() 
    {
        return view('character.import')->with(['href' => 'characters', 'title' => 'Importar personajes']);
    }

    public function upload(Request $request) 
    {
        Excel::import(new CharacterImport, 'C:\Users\tonga\Google Drive (gaston.herrerabaron@gmail.com)\Importaciones Genshin\Personajes.xlsx');
        return redirect('/characters');

    }
}
