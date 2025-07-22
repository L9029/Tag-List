<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Tag;
use Tests\TestCase;

class HomeTest extends TestCase
{

    use RefreshDatabase;

    public function test_empty(): void
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('No hay etiquetas');
    }

    public function test_with_data(): void {
        $tag = Tag::factory()->create();

        $this->assertNotEmpty($tag->name);

        $this
            ->get('/')
            ->assertStatus(200)
            ->assertDontSee('No hay etiquetas')
            ->assertSee($tag->name);
    }
}
