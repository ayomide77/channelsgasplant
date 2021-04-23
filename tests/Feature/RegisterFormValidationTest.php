<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterFormValidationTest extends TestCase
{
    /**
 * @test
 * @dataProvider requiredFormValidationProvider
 */
public function validates_contact_form($Input, $InputValue)
{
    $this->post('/register', [$Input => $InputValue])->assertSessionHasErrors($Input);
}

public function requiredFormValidationProvider()
{
    return [
    ['name', ''],
    ['email', ''],
    ['password', ''],
    ['phone', ''],
    ];

}
}
