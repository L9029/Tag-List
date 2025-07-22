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
}
