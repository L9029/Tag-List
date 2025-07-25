<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>

        <form action="tags" method="post">
            @csrf
            <label for="tag">Nombre de la etiqueta</label>
            <input type="text" name="tag" id="tag" required>
            <button type="submit">Crear Etiqueta</button>
        </form>

        <h4>Listado de Etiquetas</h4>

        <table>
            @forelse ($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->name }}
                    </td>
                    <td>
                        <form action="tags/{{ $tag->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        <p>No hay etiquetas</p>
                    </td>
                </tr>
            @endforelse
        </table>
    </body>
</html>
