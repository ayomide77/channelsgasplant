<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactFormValidationTest extends TestCase
{
    

/**
 * @test
 * @dataProvider requiredFormValidationProvider
 */
public function validates_contact_form($Input, $InputValue)
{
    $this->post('/contact', [$Input => $InputValue])->assertSessionHasErrors($Input);
}

public function requiredFormValidationProvider()
{
    return [
    ['name', ''],
    ['message', ''],
    ['email', ''],
    ['email', 'test@contact.com'],
    ];

}




}