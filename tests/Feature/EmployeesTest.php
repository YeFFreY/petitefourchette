<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_employee()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'firstName' => $this->faker->firstNameFemale,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phoneNumber' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
        ];

        $this->post('/employees', $attributes)->assertRedirect('/employees');

        $this->assertDatabaseHas('employees', $attributes);

        $this->get('/employees')->assertSee($attributes['email']);
    }
}
