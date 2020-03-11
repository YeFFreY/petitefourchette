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

        $this->get('/employees')
            ->assertSee($attributes['firstName'])
            ->assertSee($attributes['lastName']);
    }

    /** @test */
    public function an_employee_requires_a_firstname_lastname_email_and_startDate()
    {
        $attributes = factory('App\Employee')->raw([
            'firstName' => '',
            'lastName' => '',
            'email' => '',
            'startDate' => ''
        ]);

        $this->post('/employees', $attributes)->assertSessionHasErrors(['firstName', 'lastName', 'email', 'startDate']);
    }

    /** @test */
    public function a_user_can_view_an_employee()
    {
        $this->withoutExceptionHandling();

        $employee = factory('App\Employee')->create();

        $this->get($employee->path())
            ->assertSee($employee->firstName)
            ->assertSee($employee->lastName)
            ->assertSee($employee->email);
    }
}
