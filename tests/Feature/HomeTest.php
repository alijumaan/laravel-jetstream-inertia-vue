<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home_page_is_loaded()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}