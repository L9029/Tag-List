<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(): void
    {
        $this->withoutMiddleware(); // Desactiva el middleware para pruebas

        // Realiza una solicitud POST a la ruta "tags" con los datos del tag "PHP"
        $this
            ->post("tags", ["tag" => "PHP"])
            // Verifica que la respuesta redirige a la ruta "/"
            ->assertRedirect("/");

        // Verifica que en la base de datos exista un registro en la tabla "tags"
        // con el campo "name" igual a "PHP".
        $this->assertDatabaseHas("tags", [
            "name" => "PHP",
        ]);
    }

    public function test_destroy(): void
    {
        $this->withoutMiddleware(); // Desactiva el middleware para pruebas

        // Crea un tag en la base de datos
        $tag = Tag::factory()->create();

        // Realiza una solicitud DELETE a la ruta del tag creado
        $this
            ->delete("tags/{$tag->id}")
            // Verifica que la respuesta redirige a la ruta "/"
            ->assertRedirect("/");

        // Verifica que el registro del tag ya no existe en la base de datos
        $this->assertDatabaseMissing("tags", [
            "name" => $tag->name,
        ]);
    }

    public function test_validate_name_required(): void
    {
        $this->withoutMiddleware(); // Desactiva el middleware para pruebas

        // Realiza una solicitud POST a la ruta "tags" con un campo "name" vacío
        $this
            ->post("tags", [
                "name" => "",
            ])
            // Verifica que la respuesta es un error de validación
            ->assertSessionHasErrors(["tag"]);

        // Verifica que no se haya creado ningún tag en la base de datos
        $this->assertDatabaseCount("tags", 0);
    }
}
