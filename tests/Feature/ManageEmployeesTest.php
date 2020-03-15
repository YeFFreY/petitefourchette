<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEmployeesTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_employee()
    {
        $this->signIn();

        $this->get('/employees/create')->assertOk();

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
    public function a_user_can_update_an_employee()
    {
        $employee = factory('App\Employee')->create();

        $this->signIn();

        $this->get($employee->path().'/edit')->assertOk();

        $this->patch($employee->path(), $attributes = [
            'first_name' => 'Changed',
            'last_name' => 'Changed',
            'email' => 'Changed@Email.com',
            'start_date' => $this->faker->date()
            ]
            )->assertRedirect($employee->path());
        
        $this->assertDatabaseHas('employees', $attributes);
    }

    /** @test */
    public function an_employee_requires_a_firstname_lastname_email_and_startDate()
    {
        $this->signIn();

        $attributes = factory('App\Employee')->raw([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'start_date' => ''
        ]);

        $this->post('/employees', $attributes)->assertSessionHasErrors(['first_name', 'last_name', 'email', 'start_date']);
    }

    /** @test */
    public function guests_cannot_manage_employees()
    {
        $employee = factory('App\Employee')->create();

        $this->get('/employees')->assertRedirect('login');
        $this->get('/employees/create')->assertRedirect('login');
        $this->get($employee->path().'edit')->assertRedirect('login');
        $this->get($employee->path())->assertRedirect('login');
        $this->post('/employees', $employee->toArray())->assertRedirect('login');
    }


    /** @test */
    public function a_user_can_view_an_employee()
    {
        $this->signIn();

        $employee = factory('App\Employee')->create();

        $this->get($employee->path())
            ->assertSee($employee->firstName)
            ->assertSee($employee->lastName)
            ->assertSee($employee->email);
    }
}
