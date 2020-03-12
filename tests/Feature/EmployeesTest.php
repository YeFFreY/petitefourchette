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
        $this->actingAs(factory('App\User')->create());

        $attributes = [
            'first_name' => $this->faker->firstNameFemale,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];

        $this->post('/employees', $attributes)->assertRedirect('/employees');

        $this->assertDatabaseHas('employees', $attributes);

        $this->get('/employees')
            ->assertSee($attributes['first_name'])
            ->assertSee($attributes['last_name']);
    }

    /** @test */
    public function an_employee_requires_a_firstname_lastname_email_and_startDate()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Employee')->raw([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'start_date' => ''
        ]);

        $this->post('/employees', $attributes)->assertSessionHasErrors(['first_name', 'last_name', 'email', 'start_date']);
    }

    /** @test */
    public function only_authenticated_users_can_create_employees()
    {
        $attributes = factory('App\Employee')->raw();
        $this->post('/employees', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_view_an_employee()
    {
        $employee = factory('App\Employee')->create();

        $this->get($employee->path())
            ->assertSee($employee->firstName)
            ->assertSee($employee->lastName)
            ->assertSee($employee->email);
    }
}
