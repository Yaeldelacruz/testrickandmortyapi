<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class LocationController extends Controller
{
    public function index(){
        $response = Http::get("https://rickandmortyapi.com/api/location");

        if($response->successful()){
            $locations = $response->json()['results'];
            return view('locations.index', compact('locations'));
        }
        else {
            abort(500, 'Error no se encuentran lugares');
        }
    }
    public function show($id){
        $response = Http::get("https://rickandmortyapi.com/api/location/{$id}");

        if($response->successful()){
            $location = $response->json();
            $residents = [];
            foreach($location['residents'] as $key => $resident){
                if ($key >= 5){
                    break; // Salir del bucle después de los primeros 5 residentes
                }
                $residentData = Http::get($resident)->json();
                $originData = Http::get($residentData['origin']['url'])->json();
                $episodeLinks = collect($residentData['episode'])
                ->take(3)
                ->map(function($episode){
                    $episodeData = Http::get($episode)->json();
                    return [
                        'name' => $episodeData['name'],
                        'url' => $episodeData['url'],
                    ];
                })->sortBy('name')->values()->all();
                $residents[] = [
                    'name' => $residentData['name'],
                    'status' => $residentData['status'],
                    'species' => $residentData['species'],
                    'origin' => $originData['name'],
                    'image' => $residentData['image'],
                    'episodeLinks' => $episodeLinks
                ];
            }
            usort($residents, function ($a, $b){
                return strcmp($a['name'], $b['name']);
            });
            if($id < 50){
                $fondo = '#009929';
            }
            elseif($id >= 50 && $id < 80){
                $fondo = '#27a3df';
            }
            else{
                $fondo = '#ef2947';
            }
            return view('locations.show', compact('location', 'residents', 'fondo'));
        }
        else{
            abort(500, 'Error al obtener informacion del lugar');
        }
    }
}

