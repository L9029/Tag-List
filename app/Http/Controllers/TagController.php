<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function store(Request $request)
    {
        // Valida los datos del request
        $request->validate([
            'tag' => 'required|string|max:255',
        ]);

        // Crea un nuevo tag en la base de datos
        Tag::create([
            'name' => $request->input('tag'),
        ]);

        // Redirige a la ruta raíz
        return redirect('/');

    }

    public function destroy($id)
    {
        // Encuentra el tag por su ID
        $tag = Tag::findOrFail($id);

        // Elimina el tag de la base de datos
        $tag->delete();

        // Redirige a la ruta raíz
        return redirect('/');
    }
}
