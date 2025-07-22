<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(): void
    {
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
}
