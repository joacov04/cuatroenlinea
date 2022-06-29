<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ColorTest extends TestCase
{
    public function test_red()
    {
        $response = $this->get('/jugar/1234567');
        $content = $response->getContent();

        $this->assertEquals(4, substr_count($content, 'red-500'));
    }

    public function test_blue()
    {
        $response = $this->get('/jugar/1234567');
        $content = $response->getContent();

        // 10 because of 7 are the ones that spins when hovering, 3 from the
        // chips played
        $this->assertEquals(10, substr_count($content, 'sky-500'));
    }
}
