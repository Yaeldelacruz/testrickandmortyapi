@extends('layouts.basic')

@section('title', 'Personajes')

@section('body')
    <h1 class="text-2xl font-bold mb-4 text-blue-600 text-center">Personajes</h1>

    <table class="w-full border-collapse text-center">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Nombre</th>
                <th class="py-2 px-4 border">Especie</th>
                <th class="py-2 px-4 border">Estado</th>
                <th class="py-2 px-4 border">Tipo</th>
                <th class="py-2 px-4 border">Genero</th>
                <th class="py-2 px-4 border">Origen</th>
                <th class="py-2 px-4 border">Localizacion</th>
                <th class="py-2 px-4 border">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($characters as $character)
                <tr>
                    <td class="py-2 px-4 border hover:bg-gray-100 text-blue-600">
                        <a href="{{ route('character.save', $character['id']) }}">{{ $character['name'] }}</a>
                    </td>
                    <td class="py-2 px-4 border">{{ $character['species'] }}</td>
                    <td class="py-2 px-4 border">{{ $character['status'] }}</td>
                    <td class="py-2 px-4 border">{{ $character['type'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $character['gender'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $character['origin']['name'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">{{ $character['location']['name'] ?? '-' }}</td>
                    <td class="py-2 px-4 border">
                        <form action="{{ route('character.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ $character['name'] }}">
                            <input type="hidden" name="species" value="{{ $character['species'] }}">
                            <input type="hidden" name="status" value="{{ $character['status'] }}">
                            <input type="hidden" name="type" value="{{ $character['type'] ?? '' }}">
                            <input type="hidden" name="gender" value="{{ $character['gender'] ?? '' }}">
                            <input type="hidden" name="origin" value="{{ $character['origin']['name'] ?? '' }}">
                            <input type="hidden" name="location" value="{{ $character['location']['name'] ?? '' }}">
                            <button type="submit" class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white py-2 px-4 rounded-md">Guardar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
