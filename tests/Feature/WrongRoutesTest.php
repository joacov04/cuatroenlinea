<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WrongRoutesTest extends TestCase
{
    public function test_invalid_number_left()
    {
        // comment for test
        $response = $this->get('/jugar/0');

        $response->assertStatus(200);
    }

    public function test_invalid_number_right()
    {
        $response = $this->get('/jugar/8');

        $response->assertStatus(200);
    }

    public function test_char_in_route()
    {
        $response = $this->get('/jugar/abcd');

        $response->assertStatus(200);
    }
}
