@extends('layouts.basic')

@section('title', 'Lugares')

@section('body')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Lugares del universo Rick and Morty</h1>
        <table class="w-full border border-gray-400 rounded-md border-separate text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b font-bold">Nombre:</th>
                    <th class="py-2 px-4 border-b font-bold">Tipo:</th>
                    <th class="py-2 px-4 border-b font-bold">Dimension:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('location.show', ['id' => $location['id']]) }}" class="text-blue-500 hover:text-blue-700">
                                {{ $location['name'] }}
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b">{{ $location['type'] }}</td>
                        <td class="py-2 px-4 border-b">{{ $location['dimension'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
