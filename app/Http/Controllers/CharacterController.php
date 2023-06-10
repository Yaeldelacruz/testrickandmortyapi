<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get("https://rickandmortyapi.com/api/character");

        if($response->successful()){
            $characters = $response->json()['results'];
            return view('characters.index', compact('characters'));
        }
        else{
            abort(500, 'Error, no se pueden obtener los personajes');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        $character = Character::create($request->all());

        return redirect()->route('character.save')->with('success', 'Personaje guardado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($character)
    {
        $response = Http::get("https://rickandmortyapi.com/api/character/{$character}");

        if($response->successful()){
            $personaje = $response->json();
            return view('characters.show', compact('personaje'));
        }
        else{
            abort(500, 'Error, no se puede mostrar la informacion del personaje');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.save')->with('del', 'Personaje elimiando');
    }
    public function save(){
        $charactersave = Character::all();
        return view('characters.save', compact('charactersave'));
    }
}
