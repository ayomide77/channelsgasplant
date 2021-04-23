<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Channels Gas Plant');
    }

    
    public function testAboutPage()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        $response->assertSee('About Us');
    }


    public function testContactage()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        $response->assertSee('Submit');
    }

    
}
