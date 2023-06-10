<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::resource('characters', CharacterController::class)->parameters(['characters'=> 'character'])->names('character');
Route::get('charactersave',[CharacterController::class, 'save'])->name('character.save');
Route::controller(LocationController::class)->group(function(){
    Route::get('locations', 'index')->name('location.index');
    Route::get('locations/{id}', 'show')->name('location.show');
});
