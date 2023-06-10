@extends('layouts.basic')

@section('title', 'Personaje')

@section('body')
    <div class="max-w-sm mx-auto overflow-hidden shadow-lg">
        <img class="w-full" src="{{ $personaje['image'] }}" alt="{{ $personaje['name'] }}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $personaje['name'] }}</div>
            <p class="text-gray-700 text-base">
                <span class="font-bold">Species:</span> {{ $personaje['species'] }} <br>
                <span class="font-bold">Status:</span> {{ $personaje['status'] }} <br>
                <span class="font-bold">Type:</span> {{ $personaje['type'] ?? '-' }} <br>
                <span class="font-bold">Gender:</span> {{ $personaje['gender'] ?? '-' }} <br>
                <span class="font-bold">Origin:</span> {{ $personaje['origin']['name'] ?? '-' }} <br>
                <span class="font-bold">Location:</span> {{ $personaje['location']['name'] ?? '-' }}
            </p>
        </div>
    </div>
@endsection
