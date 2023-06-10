<!DOCTYPE html>
<html lang="es">
    @include('layouts.partials.head')
<body>
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <div class="text-blue-600 rounded-md px-4 py-2 my-2 border border-blue-600 bg-white hover:bg-blue-600 hover:text-white font-semibold">
                <a href="{{ route('character.index') }}">Personajes</a>
            </div>
            <div class="text-blue-600 rounded-md px-4 py-2 my-2 border border-blue-600 bg-white hover:bg-blue-600 hover:text-white font-semibold">
                <a href="{{ route('location.index') }}">Lugares</a>
            </div>
            <div class="text-blue-600 rounded-md px-4 py-2 my-2 border border-blue-600 bg-white hover:bg-blue-600 hover:text-white font-semibold">
                <a href="{{ route('character.save') }}">Personajes Guardados</a>
            </div>
        </nav>
        @yield('body')
    </div>
    @yield('scripts')
</body>
</html>
