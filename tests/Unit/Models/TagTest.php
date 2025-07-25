<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Tag;

class TagTest extends TestCase
{
    public function test_slug(): void
    {
        $tag = new Tag();
        $tag->name = 'Test Tag';

        $this->assertEquals('test-tag', $tag->slug);
    }
}
