<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasicPlayTest extends TestCase
{
    public function test_basic_route()
    {
        $response = $this->get('/jugar/1');

        $response->assertStatus(200);
    }
}
