<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class editTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_edit()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
