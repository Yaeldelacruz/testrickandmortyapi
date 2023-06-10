@extends('layouts.basic')

@section('title', 'Guardados')

@section('body')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Personajes guardados</h1>
        <table class="w-full border border-gray-400 rounded-md border-separate text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b font-bold">Nombre:</th>
                    <th class="py-2 px-4 border-b font-bold">Especie:</th>
                    <th class="py-2 px-4 border-b font-bold">Estado:</th>
                    <th class="py-2 px-4 border-b font-bold">Tipo:</th>
                    <th class="py-2 px-4 border-b font-bold">Genero:</th>
                    <th class="py-2 px-4 border-b font-bold">Origen:</th>
                    <th class="py-2 px-4 border-b font-bold">Lugar:</th>
                    <th class="py-2 px-4 border-b font-bold">Accion:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($charactersave as $save)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">
                            {{ $save->name }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->species }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->status }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->type }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->gender }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->origin }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $save->location }}
                        </td>
                        <td>
                            <form action="{{ route('character.destroy',$save) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-white border border-red-600 text-red-600 hover:bg-red-600 hover:text-white py-2 px-4 rounded-md">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (session('del'))
        <div class="bg-red-500 text-white p-4 mb-4">
            {{ session('del') }}
        </div>
    @elseif (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif
@endsection
