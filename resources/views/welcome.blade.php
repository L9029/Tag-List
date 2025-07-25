<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-200 py-10">
        <div class="container max-w-lg mx-auto bg-white p-5 rounded shadow">
            <form action="tags" method="post" class="flex mb-4">
                @csrf
                <input type="text" name="tag" id="tag" required class="rounded-l bg-gray-200 p-4 w-full outline-none" placeholder="Nueva etiqueta">
                <button type="submit" class="rounded-l px-8 bg-blue-500 text-white outline-none hover:bg-blue-600">Crear Etiqueta</button>
            </form>

            <h4 class="text-lg text-center mb-4">Listado de Etiquetas</h4>

            <table class="table-auto w-full border-collapse border border-gray-300">
                @forelse ($tags as $tag)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-200' }}">
                        <td class="px-4 py-2 text-center w-2/4">
                            <span class="block w-full text-center">{{ $tag->name }}</span>
                        </td>
                        <td class="px-4 py-2 text-center w-2/4">
                            <span class="block w-full text-center">{{ $tag->slug }}</span>
                        </td>
                        <td class="px-4 py-2 text-right w-1/4">
                            <form action="tags/{{ $tag->id }}" method="post" class="w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">Eliminar</button> <!-- Botón rojo ocupa toda la casilla -->
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-2 text-center bg-gray-200">
                            <p>No hay etiquetas</p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </body>
</html>
