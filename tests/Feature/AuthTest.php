<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
   use RefreshDatabase;
    /*
    @test
    */ 
     public function redirect_unauthorized_user(){
    $response = $this->get('/home')->assertRedirect('/');
    }

     /*
    @test
    */ 
    public function Authenticated_User(){

        $this->actingAs(factory(User::class)->create([
        'name' => 'John Doe', 
        'email' => 'john@gmail.com',
        'phone' => '08067405876',
        'password' => bcrypt('customer')]));

        $response = $this->get('/home')->assertOk();
    }
}
