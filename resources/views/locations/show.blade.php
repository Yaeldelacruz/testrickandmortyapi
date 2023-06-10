@extends('layouts.basic')

@section('title', 'Datos del lugar')

@section('style')
    <style>
        body {
            background-color: {{ $fondo }};
        }
    </style>
@endsection

@section('body')
    {{-- Informacion del lugar en que se encuentra --}}
    <div class="container mx-auto my-3 bg-white rounded-md py-6">
        <h1 class="text-4xl text-center font-bold mb-4" style="color: {{ $fondo }}">Información del lugar</h1>
        <div class="grid grid-cols-3 grid-flow-row gap-4 text-center">
            <div>
                <h4 class="my-2 text-blue-600 text-2xl font-semibold">Nombre:</h4>
                <h6 class="my-2 text-base font-semibold">{{ $location['name'] }}</h6>
            </div>
            <div>
                <h4 class="my-2 text-blue-600 text-2xl font-semibold">Tipo:</h4>
                <h6 class="my-2 text-base font-semibold">{{ $location['type'] }}</h6>
            </div>
            <div>
                <h4 class="my-2 text-blue-600 text-2xl font-semibold">Dimensión:</h4>
                <h6 class="my-2 text-base font-semibold">{{ $location['dimension'] }}</h6>
            </div>
        </div>
    </div>

    {{-- Informacion de los residentes del lugar --}}
    <div class="my-3 bg-white rounded-md py-6 container mx-auto">
        <h1 class="text-gray-700 text-4xl text-center font-bold mb-4">Residentes:</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ml-24">
            @foreach ($residents as $resident)
                <div class="max-w-sm rounded-md overflow-hidden shadow-lg">
                    <div class="flex items-center justify-center">
                        <a href="#" data-resident="{{ json_encode($resident) }}" class="resident-link">
                            <img class="w-48 h-48" src="{{ $resident['image'] }}" alt="Imagen del residente">
                        </a>
                    </div>
                    <div class="border border-gray-300 p-4 rounded-md">
                        <div class="font-bold text-xl mb-2">{{ $resident['name'] }}</div>
                        <p class="text-gray-700"><span class="font-semibold">Estado:</span> {{ $resident['status'] }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Especie:</span> {{ $resident['species'] }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Origen:</span> {{ $resident['origin'] }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Episodios:</span></p>
                        <ul class="list-disc list-inside text-blue-700 hover:text-blue-950">
                            @foreach ($resident['episodeLinks'] as $episode)
                                <li class="list-none"><a href="{{ $episode['url'] }}">{{ $episode['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal y/o alerta -->
    <div class="modal hidden fixed w-full h-full top-0 left-0 flex items-center justify-center" id="residentModal">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-3/4 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Contenido de informacion en forma alerta -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Botón de cierre de info -->
                <div class="flex justify-end items-center">
                    <button class="modal-close cursor-pointer z-50 bg-red-700 px-3 py-1 text-white rounded-md">
                        x
                    </button>
                </div>

                <!-- Contenido de la información del personaje -->
                <div id="residentInfo" class="mt-4">
                    <!-- Aquí se mostrará la información del personaje -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtener el elemento del modal y el enlace del resident
            const modal = document.getElementById('residentModal');
            const residentLinks = document.querySelectorAll('.resident-link');

            // Agregar evento de clic a cada enlace del resident
            residentLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                event.preventDefault();

                // Obtener los datos del resident
                const residentData = JSON.parse(link.getAttribute('data-resident'));

                // Mostrar la información del resident en el modal
                const residentInfo = document.getElementById('residentInfo');
                residentInfo.innerHTML = `
                    <h2 class="text-xl font-bold">${residentData.name}</h2>
                    <p><span class="font-bold">Estado:</span> ${residentData.status}</p>
                    <p><span class="font-bold">Género:</span> ${residentData.gender}</p>
                    <p><span class="font-bold">Origen:</span> ${residentData.origin}</p>
                `;

                    // Abrir el modal
                    modal.classList.remove('hidden');
                });
            });

            // Agregar evento de clic al botón de cierre del modal
            const modalCloseBtn = document.querySelector('.modal-close');
            modalCloseBtn.addEventListener('click', function () {
            // Cerrar el modal
                modal.classList.add('hidden');
            });
        });
    </script>
@endsection


